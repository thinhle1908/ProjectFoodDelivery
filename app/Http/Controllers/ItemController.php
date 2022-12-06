<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use App\Models\Item;
use App\Models\Item_Configuration;
use App\Models\Product;
use App\Models\Product_Category;
use App\Models\Variation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($product_id)
    {
        $product_category = Product_Category::where('product_id', $product_id)->get();
        try {
            if (!$product_category[0]->category_id) {
            }
        } catch (\Throwable $th) {
            abort(404);
        }
        $discounts = Discount::all();
        $variations = Variation::where('category_id', $product_category[0]->category_id)->get();



        return view('createItem')->with('variations', $variations)->with('discounts', $discounts);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $product_id)
    {

        $validated = $request->validate([
            'image' => 'required|image',
            'sku' => 'required',
            'price' => 'required',
            'sale_price' => 'required',
            'quantity' => 'required',
            'sold' => 'required',
            'variation_option' => 'required|array',
            'discount' => 'required'
        ]);
        //Move Image to forder and get name image
        $nameimg = $request->file('image')->hashName();
        request()->image->move(public_path('img/items'), $nameimg);
        try {
            //code...

            $item = Item::create([
                'image' => $nameimg,
                'sku' => $request->sku,
                'price' => $request->price,
                'sale_price' => $request->sale_price,
                'quantity' => $request->quantity,
                'sold' => $request->sold,
                'created_by' => Auth::id(),
                'updated_by' => Auth::id(),
                'product_id' => $product_id,
                'discount_id' => $request->discount,

            ]);

            foreach ($request->variation_option as $variation_option) {
                Item_Configuration::create([
                    'item_id' => $item->id,
                    'variation_option_id' => $variation_option
                ]);
            }
        } catch (\Exception $ex) {
            return $ex;
        }
        return redirect('saler/product/' . $product_id . '/items')->withSuccess('Create Sucessfuly');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $items = Item::where('product_id', $id)->where('created_by',Auth::user()->id)->get();
        return view('viewItem')->with('items', $items);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($product_id, $id)
    {
        $item = Item::find($id);
        $product_category = Product_Category::where('product_id', $product_id)->get();
        try {
            if (!$product_category[0]->category_id) {
            }
        } catch (\Throwable $th) {
            abort(404);
        }
        $discounts = Discount::all();
        $variations = Variation::where('category_id', $product_category[0]->category_id)->get();



        return view('editItem')->with('variations', $variations)->with('discounts', $discounts)->with('item', $item);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $product_id, $id)
    {
        $validated = $request->validate([
            'image' => 'image',
            'sku' => 'required',
            'price' => 'required',
            'sale_price' => 'required',
            'quantity' => 'required',
            'sold' => 'required',
            'variation_option' => 'required|array',
            'discount' => 'required'
        ]);

        $item = Item::find($id);
        $nameimg = $item->image;
        if ($request->image) {
            $image_path = 'img/items/' . $item->image;  // Value is not URL but directory file path
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
            //Move Image to forder and get name image
            $nameimg = $request->file('image')->hashName();
            request()->image->move(public_path('img/items'), $nameimg);
        }

        $item_configuration = Item_Configuration::where('item_id', $id)->delete();
        try {
            //code...

            $item->update([
                'image' => $nameimg,
                'sku' => $request->sku,
                'price' => $request->price,
                'sale_price' => $request->sale_price,
                'quantity' => $request->quantity,
                'sold' => $request->sold,
                'updated_by' => Auth::id(),
                'product_id' => $product_id,
                'discount_id' => $request->discount,

            ]);

            foreach ($request->variation_option as $variation_option) {
                Item_Configuration::create([
                    'item_id' => $item->id,
                    'variation_option_id' => $variation_option
                ]);
            }
        } catch (\Exception $ex) {
            return $ex;
        }
        return redirect('saler/product/' . $product_id . '/items')->withSuccess('Edit Sucessfuly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($product_id, $id)
    {
        $item = Item::find($id);
        if (!$item) {
            return redirect()->back()->withErrors(['msg' => 'Item does not exist
            ']);
        }
        try {
            $item_configuration = Item_Configuration::where('item_id', $id)->delete();
            $item->delete();
            $image_path = 'img/items/' . $item->image;  // Value is not URL but directory file path
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
        } catch (\Exception $ex) {
            return $ex;
        }
        return redirect()->back()->withSuccess('Delete Successfuly');
    }
}

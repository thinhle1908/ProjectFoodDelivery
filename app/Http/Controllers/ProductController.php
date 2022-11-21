<?php

namespace App\Http\Controllers;

use App\Models\Product;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prodcuts = Product::all();
        return view('viewProduct')->with('products', $prodcuts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createProduct');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'image' => 'required|image',
            'name' => 'required',
            'description' => 'required|string'
        ]);
        //Move Image to forder and get name image
        $nameimg = $request->file('image')->hashName();
        request()->image->move(public_path('img/products'), $nameimg);

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $nameimg
        ]);
        return redirect(route('products.get'))->withSuccess('Create Product Success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        
        $image_path = 'img/products/'.$product->image;  // Value is not URL but directory file path
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
       
        $product->delete();
        return redirect(route('products.get'))->withSuccess('Delete Product Success');
    }
}

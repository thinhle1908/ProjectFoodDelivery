<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('home')->with('products',$products);
    }
    public function productDetails($id)
    {
        $product = Product::find($id);
        $items = Item::where('product_id',$id)->get();
        if(!isset($items[0])){
            return redirect('/');
        }
        return view('productDetails')->with('items',$items)->with('product',$product);
    }
    public function itemDetails($id)
    {
        $item = Item::find($id);
        if(!$item){
            return abort(404);
        }
        return view('itemDetails')->with('item',$item);
    }
    public function products()
    {
        $products = Product::all();
        return view('allProduct')->with('products',$products);
    }
    public function searchProduct(Request $request)
    {
        $products = Product::all();
        if($request->keyword){
            $products = Product::where('name','like',$request->keyword.'%')->get();
        }
        return view('searchProduct')->with('products',$products);
    }
}

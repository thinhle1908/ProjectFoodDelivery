<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $items = Item::all();
        return view('home')->with('items',$items);
    }

    public function itemDetails($id)
    {
        $item = Item::find($id);
        if(!$item){
            return abort(404);
        }
        return view('itemDetails')->with('item',$item);
    }

    public function cart()
    {
        
    }
}

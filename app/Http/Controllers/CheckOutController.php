<?php

namespace App\Http\Controllers;

use App\Models\Shopping_Cart;
use App\Models\Shopping_CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckOutController extends Controller
{
    public function index()
    {
        $user_cart = Shopping_Cart::where('user_id', Auth::id())->first();
        if(!$user_cart)
        {
            return redirect(route('home'));
        }
        $cartItem = Shopping_CartItem::where('cart_id', $user_cart->id)->get();
        if(!$cartItem)
        {
            return redirect(route('home'));
        }
        $totalPrice=0;
        foreach($cartItem as $caritem){
           $totalPrice+= number_format($caritem->item[0]->price * $caritem->qty);
        }
        return view('checkout')->with('cartItem', $cartItem)->with('totalPrice',$totalPrice);
    }
}

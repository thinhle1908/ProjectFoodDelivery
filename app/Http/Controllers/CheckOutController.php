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
        
        
    }
}

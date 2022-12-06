<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Shopping_Cart;
use App\Models\Shopping_CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function cart()
    {
        $cart_id = (Auth::user()->cart->id);
        $cartitem = Shopping_CartItem::where('cart_id', $cart_id)->get();
        return view('cart')->with('cartItem', $cartitem);
    }
    public function addCart(Request $request)
    {
        $item_id = $request->input('product_id');
        $item_qty = $request->input('product_qty');

        //Check Login
        if (Auth::check()) {
            $item = Item::where('id', $item_id)->first();
            if ($item) {
                $user_cart = Shopping_Cart::where('user_id', Auth::id())->first();
                if (!$user_cart) {
                    $user_cart = Shopping_Cart::create([
                        'user_id' => Auth::id()
                    ]);
                }
                $shopping_caritem = Shopping_CartItem::where('cart_id', $user_cart->id)->where('item_id', $item_id)->first();
                if (!$shopping_caritem) {
                    $shopping_caritem = new Shopping_CartItem();
                    $shopping_caritem->cart_id = $user_cart->id;
                    $shopping_caritem->item_id = $item_id;
                    $shopping_caritem->qty = $item_qty;
                    $shopping_caritem->save();
                } else {
                    $old_qty = $shopping_caritem->qty;
                    $shopping_caritem->update([
                        'qty' => $old_qty + $item_qty
                    ]);
                }
                return response()->json(['status' => $item->sku . " add to cart"]);
            } else {
                return response()->json(['status' => "Item doesn't have exit"]);
            }
        } else {
            return response()->json(['status' => "Login to Continue"]);
        }
    }
    public function updateCart(Request $request)
    {
        $user_cart = Shopping_Cart::where('user_id', Auth::id())->first();

        $cartItem = Shopping_CartItem::where('cart_id', $user_cart->id)->where('item_id', $request->id)->first();
        if ($request->quantity == 0) {
            $cartItem->delete();
        } else {
            $cartItem->update([
                'qty' => $request->quantity
            ]);
        }
        return response()->json(['status' => "edit successfully "]);
    }
    public function deleteCart(Request $request)
    {
        $user_cart = Shopping_Cart::where('user_id', Auth::id())->first();

        $cartItem = Shopping_CartItem::where('cart_id', $user_cart->id)->where('item_id', $request->id)->first();
        if($cartItem){
            $cartItem->delete();
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Order_Item;
use App\Models\Shopping_Cart;
use App\Models\Shopping_CartItem;
use App\Models\Transaction;
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
        $cartItem = Shopping_CartItem::where('cart_id', $user_cart->id)->first();
        if(!$cartItem)
        {
            return redirect(route('home'));
        }
        $cartItem = Shopping_CartItem::where('cart_id', $user_cart->id)->get();
        $totalPrice=0;
        foreach($cartItem as $caritem){
           $totalPrice+= number_format($caritem->item[0]->price) * $caritem->qty;
        }
        return view('checkout')->with('cartItem', $cartItem)->with('totalPrice',$totalPrice);
    }
    public function checkOut(Request $request)
    {
        $validated = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'mobile' => 'required|min:10|numeric',
            'address' => 'required',
        ]);
        $user_cart = Shopping_Cart::where('user_id', Auth::id())->first();
        $cartItem = Shopping_CartItem::where('cart_id', $user_cart->id)->get();
        $totalPrice=0;
        $totalQty = 0;
        foreach($cartItem as $caritem){
            if(!($caritem->item[0]->quantity>=$caritem->qty)){
                return redirect()->back()->withErrors(['msg'=>'Insufficient quantity of goods']);
            }
            $totalPrice+= number_format($caritem->item[0]->price )* $caritem->qty;
            $totalQty += $caritem->qty;
            
         }
        $order = Order::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'address' => $request->address,
            'user_id'=>Auth::user()->id,
            'total'=>$totalPrice,
            'quantity'=>$totalQty,
            'status_id'=>1,
            'discount_id'=>1,
            
        ]);
        foreach($cartItem as $caritem)
        {
            Order_Item::create([
                'item_id'=>$caritem->item[0]->id,
                'quantity'=>$caritem->qty,
                'total'=>$caritem->item[0]->price * $caritem->qty,
                'order_id'=>$order->id,
            ]);
            $caritem->item[0]->update([
                'quantity'=>number_format( $caritem->item[0]->quantity) - number_format($caritem->qty),
                'sold'=>$caritem->item[0]->sold + $caritem->qty,
            ]);
        }
        Transaction::create([
            'order_id'=>$order->id,
            'status_id'=>1,
            'user_id'=>Auth::user()->id,
        ]);
        $cartItem = Shopping_CartItem::where('cart_id', $user_cart->id)->delete();
        
        return redirect(route('order'))->withSuccess('Order Successfully');
    }
}

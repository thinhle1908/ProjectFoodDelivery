<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order_Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderSalerController extends Controller
{
    public function index()
    {
        $salerOrders =Item::where('created_by',Auth::user()->id)->join('order_item','item.id','=','order_item.item_id')->join('order','order_item.order_id','=','order.id')->join('status','order.status_id','status.id')->groupBy('order_item.order_id')->get();
        return view('orderSaler')->with('salerOrders',$salerOrders);
    }
    public function showOrderDetails($id)
    {
        $order_item = Order_Item::where('order_id',$id)->get();
        return view('orderSalerDetails')->with('order_item',$order_item);
    }
}

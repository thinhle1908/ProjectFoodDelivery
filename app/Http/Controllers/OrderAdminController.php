<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Order_Item;
use App\Models\Status;
use Illuminate\Http\Request;

class OrderAdminController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('orderAdmin')->with('orders',$orders);
    }
    public function getEditStatus($id)
    {
        $order = Order::find($id);
        if(!$order)
        {
            return redirect()->back()->withErrors(['msg'=>'The order does not exist']);
        }
        $statuses = Status::all();
        return view('editOrderAdmin')->with('order',$order)->with('statuses',$statuses);
    }
    public function postEditStatus(Request $request,$id)
    {
        $validated = $request->validate([
            'status_id' => 'required',
        ]);
        $order = Order::find($id);
        if(!$order)
        {
            return redirect()->back()->withErrors(['msg'=>'The order does not exist']);
        }
        $status = Status::find($request->status_id);
        if(!$status)
        {
            return redirect()->back()->withErrors(['msg'=>'The status does not exist']);
        }
        $order->update([
            'status_id'=>$status->id
        ]);
        return redirect(route('order.admin'))->withSuccess('Create Product Success');
    }
    public function getOrderDetails($id)
    {
        $order_item = Order_Item::where('order_id',$id)->get();
        if(!isset($order_item[0])){
            return redirect()->back()->withErrors(['msg'=>'The order_details does not exist']);
        }
        return view('orderAdminDetails')->with('order_item',$order_item);
    }
}

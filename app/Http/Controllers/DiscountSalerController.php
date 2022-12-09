<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use App\Models\Item;
use App\Models\Order;
use Illuminate\Http\Request;

class DiscountSalerController extends Controller
{
    public function index()
    {
        $discounts = Discount::all();
        return view('discountSaler')->with('discounts', $discounts);
    }
    public function getCreateDiscount()
    {
        return view('createSalerDiscount');
    }
    public function postCreateDiscount(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'discount_percent' => 'required|numeric',
            'active' => 'boolean'
        ]);
        try {
            Discount::create([
                'name' => $request->name,
                'discount_percent' => $request->discount_percent,
                'active' => $request->active
            ]);
        } catch (\Exception $ex) {
            return $ex;
        }
        return redirect(route('discount.saler'))->withSuccess('Create Successfuly');
    }

    public function getEditDiscount($id)
    {
        $discount = Discount::find($id);
        if (!$discount) {
            return redirect()->back()->withErrors(['msg' => 'The status does not exist']);
        }
        return view('editSalerDiscount')->with('discount', $discount);
    }

    public function postEditDiscount(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'discount_percent' => 'required|numeric',
            'active' => 'boolean'
        ]);
        $discount = Discount::find($id);
        if (!$discount) {
            return redirect()->back()->withErrors(['msg' => 'The status does not exist']);
        }
        try {
            $discount->update([
                'name' => $request->name,
                'discount_percent' => $request->discount_percent,
                'active' => $request->active
            ]);
        } catch (\Exception $ex) {
            return $ex;
        }
        return redirect(route('discount.saler'))->withSuccess('Edit Successfuly');
    }


    public function deleteDiscount($id)
    {
        $discount = Discount::find($id);
        if (!$discount) {
            return redirect()->back()->withErrors(['msg' => 'The discount does not exist']);
        }
        $checkOrder = Order::where('discount_id', $id)->first();
        if ($checkOrder) {
            return redirect()->back()->withErrors(['msg' => 'Can not delete discount because discount has orders']);
        }

        $checkItem = Item::where('discount_id', $id)->first();

        if ($checkItem) {
            return redirect()->back()->withErrors(['msg' => 'Can not delete discount because discount has product']);
        }

        try {
            $discount->delete();
        } catch (\Exception $ex) {
            return $ex;
        }
        return redirect(route('discount.saler'))->withSuccess('Delete Successfuly');
    }
}

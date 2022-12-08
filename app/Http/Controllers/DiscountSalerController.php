<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use Illuminate\Http\Request;

class DiscountSalerController extends Controller
{
    public function index()
    {
        $discounts = Discount::all();
        return view('discountSaler')->with('discounts',$discounts);
    }
}

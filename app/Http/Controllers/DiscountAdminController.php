<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use Illuminate\Http\Request;

class DiscountAdminController extends Controller
{
    public function index()
    {
        $discounts = Discount::all();
        return view('discountAdmin')->with('discounts',$discounts);
    }
}

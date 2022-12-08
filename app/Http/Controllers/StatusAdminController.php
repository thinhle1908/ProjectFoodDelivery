<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use App\Models\Status;
use Illuminate\Http\Request;

class StatusAdminController extends Controller
{
    public function index()
    {
        $statuses = Status::all();
        return view('statusAdmin')->with('statuses',$statuses);
    }
}

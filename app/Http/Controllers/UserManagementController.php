<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserManagementController extends Controller
{
    public function index()
    {
        $users = User::join('user_role','user.id','=','user_role.user_id')->join('role','user_role.role_id','=','role.id')->where('role.name','user')->get();
        return view('userManagement')->with('users',$users);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\User_Role;
use Exception;
use Illuminate\Foundation\Console\AboutCommand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //View Authentication User
    //Get Register
    public function GetUserRegister()
    {

        $page_redirect = 'userRegister';
        //Check Login
        return $this->CheckLoginAndRedirectPage($page_redirect);
    }

    //Post Login
    public function PostUserRegister(Request $request)
    {
        $page_redirect = '/login';
        return $this->Register($request, $page_redirect);
    }

    //Get Login
    public function GetUserLogin()
    {
        $page_redirect = 'userLogin';
        //Check Login
        return $this->CheckLoginAndRedirectPage($page_redirect);
    }

    //View Authentication Saler
    //Get Register
    public function GetAdminRegister()
    {

        $page_redirect = 'adminRegister';
        //Check Login
        return $this->CheckLoginAndRedirectPage($page_redirect);
    }

    //Post Login
    public function PostAdminRegister(Request $request)
    {
        $page_redirect = '/login-admin';
        return $this->Register($request, $page_redirect);
    }

    //Get Login
    public function GetAdminLogin()
    {
        $page_redirect = 'adminLogin';
        //Check Login
        return $this->CheckLoginAndRedirectPage($page_redirect);
    }

    //View Authentication Saler
    //Get Register
    public function GetSalerRegister()
    {

        $page_redirect = 'salerRegister';
        //Check Login
        return $this->CheckLoginAndRedirectPage($page_redirect);
    }

    //Post Login
    public function PostSalerRegister(Request $request)
    {
        $page_redirect = '/login-saler';
        return $this->Register($request, $page_redirect);
    }

    //Get Login
    public function GetSalerLogin()
    {
        $page_redirect = 'salerLogin';
        //Check Login
        return $this->CheckLoginAndRedirectPage($page_redirect);
    }

    //Authentication
    //Login
    public function Login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    //Register
    public function Register($request, $page_redirect)
    {
        $validated = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:user',
            'password' => 'required|min:6|same:password_confirm',
            'password_confirm' => 'required|min:6',
        ]);
        $role = 0;
        if ($page_redirect == "/login-admin") {
            $role = 1;
        }
        else if($page_redirect == "/login-saler"){
            $role = 2;
        }
        else{
            $role = 3;
        }
        try {
            $user = User::create([
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            User_Role::create([
                'user_id'=>$user->id,
                'role_id'=>$role
            ]);
        } catch (Exception $ex) {
            return abort(500);
        }

        return redirect($page_redirect)->withSuccess('Sign Up Success');
    }

    //Get Logout
    public function Logout()
    {
        Auth::logout();
        return redirect(route('login.user.get'));
    }

    //Check loign if the user has entered, go back to the home page
    public function CheckLoginAndRedirectPage($page_redirect)
    {
        if (Auth::check()) {
            return redirect(route('home'));
        }
        return view($page_redirect);
    }
}

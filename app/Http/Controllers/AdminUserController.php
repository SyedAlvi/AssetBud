<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminUserController;

class AdminUserController extends Controller
{
    public function login()
    {
       return view('website.login');
    }


    public function doLogin(Request $request)
    {

        $userInfo=$request->except('_token');
//        $credentials['email']=$request->user_email;
//        $credentials['password']=$request->user_password;
//        dd($credentials);
//        $credentials=$request->only('user_email','user_password');


        if(Auth::attempt($userInfo)){
            return redirect()->route('home')->with('message','Login successful.');
        }
        return redirect()->back()->with('error','Invalid user credentials');

    }

    
    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login')->with('message','Logging out.');
    }
}

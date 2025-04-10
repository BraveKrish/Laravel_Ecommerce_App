<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
    // get form of method
    public function showLogin(){
        return view('auth.login');
    }

    // post form of method :- form submit ani database samma purauxa
    public function login(Request $request){

    }

    public function showForgetPassword(){
        return view('auth.forget-password');
    }
}

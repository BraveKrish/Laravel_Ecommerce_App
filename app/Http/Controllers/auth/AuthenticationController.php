<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
    // get form of method
    public function showLogin(){
        return view('auth.login');
    }

    // post form of method :- form submit ani database samma purauxa
    public function login(Request $request){
        // dd($request->all());
        try{
            $data = $request->validate([
                'email' => 'required|email',
                'password' => 'required|min:8'
            ]);

            if(Auth::attempt($data)){
                $request->session()->regenerate();
                return redirect()->intended('/admin')->with('success','Login successfully');
            }

            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])->onlyInput('email');

        }catch(\Exception $e){
            return redirect()->back()->with('error','Something went wrong');
        }
    }

    public function showForgetPassword(){
        return view('auth.forget-password');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login.page')->with('success','Logout successfully');
    }
}

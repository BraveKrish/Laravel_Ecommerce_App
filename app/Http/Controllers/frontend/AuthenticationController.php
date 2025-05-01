<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{
    public function register(Request $request){
        // dd('hello form register method');
        // dd($request->all());
        try{
            $data = $request->validate([
                'name' => 'required|string|max:30',
                'email' => 'required|string|max:255',
                'phone' => 'required|string|max:15',
                'password' => 'required|',
                'is_terms_conditon_active' => 'nullable|string'
            ]);

            // dd($data);

            if(isset($data['is_terms_conditon_active']) && $data['is_terms_conditon_active'] == 'on'){
                $data['is_terms_conditon_active'] = 1;
            }else{
                $data['is_terms_conditon_active'] = 0;
            }

            // dd($data);
            $data['password'] = Hash::make($request->password);
            // dd($data['password']);
            $user = User::create($data);

            // dd($user);

            // login user
            Auth::login($user);

            return redirect()->route('login.register')->with('success', 'User Registered and Loggedin Successfully!!!');

        }catch(\Exception $e){
            return redirect()->route('login.register')->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }

    public function login(Request $request){
        // dd($request->all());
        try{
            $data = $request->validate([
                'email' => 'required|email',
                'password' => 'required|min:8'
            ]);

            if(Auth::attempt($data)){
                $request->session()->regenerate();
                return redirect()->intended('/')->with('success','Login successfully');
            }

            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])->onlyInput('email');

        }catch(\Exception $e){
            return redirect()->back()->with('error','Something went wrong');
        }
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home')->with('success','Logout successfully');
    }
}

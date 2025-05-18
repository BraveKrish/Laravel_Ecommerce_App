<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function checkoutIndex(Request $request){
        // dd('hello form chekcout');
        // dd($request->all());
        $sc = $request->shipping_charge;
        $tax = $request->tax_amount;
        $totalAmount = $request->total_amount;
        $dAmount = $request->discount_amount;

        // dd($shipping_charge);
        $carts = Auth::user()->cart()->with('items.product.category')->first();
        // dd($carts->items->toArray());
        return view('frontend.checkout.checkout',compact('carts','sc','tax','totalAmount','dAmount'));
    }
}

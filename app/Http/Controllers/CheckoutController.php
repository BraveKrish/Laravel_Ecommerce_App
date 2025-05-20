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

    public function placeOrder(Request $request){
        // dd('hello from place order');
        // dd($request->all());
        if($request->paymentMethod == 'wallet' && $request->walletType == 'khalti'){
            // dd('hello from khalti');
            return redirect()->route('khalti.initiate',[
                'name' => Auth::user()->name,
                'order_id' => $request->order_id,
                'amount' => $request->total_amount,
            ]);
        }
    }


    public function initiateKhalti(Request $request){
        // dd('hello from khalti');  
        // dd($request->all());
        $name = $request->query('name');
        $order_id = $request->query('order_id');
        $amount = $request->query('amount');
        // dd($name,$order_id,$amount);

        // $name= $requ
        return view('frontend.checkout.khalti.khalti_pay', compact('name','order_id','amount')); 
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\PromoCode;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PromoCodeController extends Controller
{
    public function index(){
        $promoCodes = PromoCode::all();
        return view('dashboard.coupon.coupons',compact('promoCodes'));
    }
    public function generatePromoCode(Request $request){
        // dd($request->all());
        try{
            $data = $request->validate([
                'code' => 'required|string|unique:promo_codes,code',
                'value' => 'required|numeric',
                'banner_url' => 'nullable|string',
                'expires_at' => 'required|date',
                'usages_limit' => 'required|numeric',
                'used_count' => 'nullable|numeric',
            ]);

            $data['code'] = strtoupper($data['code'] . Str::random(4));
            // $data['expires_at'] = now()->addDays();

            PromoCode::create($data);
            return redirect()->back()->with('success', 'Promo code generated successfully');

        }catch(\Exception $e){

            // dd($e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong'. $e->getMessage());

        }
    }
}

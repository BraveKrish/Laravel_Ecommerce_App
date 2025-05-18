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

    public function applyPromoCode(Request $request){
        // dd($request->all());
        $promoCode = $request->promo_code;
        $totalAmount = $request->total_amount;
        try{
            $promo = PromoCode::where('code', $promoCode)
            ->where('expires_at','>',now())->first();
            // dd($promoCode->toArray());

            if(!$promo){
                return back()->withError('Invalid Offer code!!!');
            }

            if($promo->expires_at && $promo->expires_at < now()){
                return back()->withError('Offer code has been expired!!!');
            }

            if($promo->usages_limit && $promo->used_count > $promo->usages_limit){
                return back()->withError('Offer code usages limit reached!!!');
            }

            // total amount after discount or offer applied
            $am = ($totalAmount * $promo->value) / 100;
            $amount = round($am);
            // dd($amount);

            // actual discount amount
            $discountAmount = round($totalAmount - $amount);
            // dd($discountAmount);

            $promo->used_count += 1; // $promo->used_count = $promo->used_count + 1
            $promo->save();

            session([
                'offer_applied' =>[
                    'code' => $promo->code,
                    'amount' => $amount,
                    'discount' => $discountAmount
                ]
            ]);

            return back()->withSuccess('Offer applied successfully! Discount: Rs.'. number_format($discountAmount));

        }catch(\Exception $e){
            // dd($e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong'. $e->getMessage());
        }

    }
}

<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        // $products = Product::all();
        $featuredProducts = Product::orderBy('created_at','desc')->take(4)->where('is_featured',1)->with('category')->get();
        // dd($featuredProducts->toArray());
        foreach($featuredProducts as $product){
            if($product->price > 0 && $product->sale_price < $product->price){
                // case of discount
                $discountAmount = $product->price - $product->sale_price; // discount in amount
                // echo $discountAmount. '<br>';
                // discount percent
                $discountPercent = round(($discountAmount / $product->price) * 100);

                $product->discount_percent= $discountPercent;

            }else{
                // no discount
                $product->discount_percent = 0;
            }
        }

        $hotProduct = Product::take(4)->get();

        // dd($featuredProducts->toArray());
       
        // dd($discountAmount);
        return view('frontend.home.home',compact('featuredProducts', 'hotProduct'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class CartController extends Controller
{

    // show cart item page or view
    public function viewCart(){
        $carts = Auth::user()->cart()->with('items.product.category')->first();
        // dd($carts->items->toArray());

        $subTotal = 0;
        foreach($carts->items as $item) {
            $total = ($item->quantity * $item->product->sale_price);
            $subTotal += $total; // $subTotal = $subTotal + $total;
            // echo $item->quantity * $item->product->price; 
        }

        $user = Auth::user();
        $shippingCharge = $this->calculateShippingCharge($subTotal, $user);
        $taxRate = 0.10;
        $taxAmount = $subTotal * $taxRate;

        $totalAmount = $subTotal + $taxAmount + $shippingCharge;
        // dd($total);

        // dd($data->toArray());
        return view('frontend.cart.cart-item',compact('carts', 'subTotal','taxAmount','shippingCharge','totalAmount'));
    }

    // function or method to calculate shipping charge
    public function calculateShippingCharge($subtotal, $user){
        if($subtotal <= 500){
            return 0;
        }

        $charge = 0;
        if($user->city == 'Kathmandu'){
            $charge = 100;
            return $charge;
        }elseif ($user->city == 'Pokhara'){
            $charge = 150;
            return $charge;
        }
        elseif ($user->city == 'Dhangadi'){
            $charge = 250;
            return $charge;
        }
        elseif ($user->city == 'Itahari'){
            $charge = 175;
            return $charge;
        }else{
            // default
            $charge = 80;
            return $charge; 
       }
    }

 


    public function addToCart(Request $request){
        // dd($request->all());
        
        try{
            $user = Auth::user();
            $productId = $request->product_id;

            // ensure the user has a cart
            $cart = $user->cart()->firstOrCreate([]);

            // checking the item in cart_items table.
            $item = $cart->items()->where('product_id',$productId)->first();
            // dd($item);

            if($item){
                // increment the quantity of product as product is alread in items table
                $item->quantity += 1; // $item->quantity = $item->quantity + 1 
                $item->save();
            
            }else{
                $cart->items()->create([
                    'product_id' => $productId,
                    'quantity' => 1,
                ]);
            }

            return response()->json([
                'status' => 'success',
                'data' => $cart,
            ]);
        }catch(\Exception $e){
            return response()->json($e->getMessage());
        }
    }
}

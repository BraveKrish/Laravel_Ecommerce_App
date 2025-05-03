<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index(){
        $wishlists = Auth::user()->wishlist()->with('category')->get();
        // dd($wishlists->toArray());
        return view('frontend.wishlist.wishlist',compact('wishlists'));
    }

    public function wishlistToggle(Request $request){
        // return response()->json([
        //     'message' => 'Hello from wishlistToggle',
        //     'product_id' => $request->product_id
        // ]);

        $user = Auth::user();
        $productId = $request->product_id;

        // $wishlist = $user->wishlist()->where('product_id',$productId)->first();

        $wishlist = Wishlist::where('product_id',$productId)->first();
        // $wishlist = $user->wishlist()->first();
        // dd($wishlist);

        if($wishlist){
            // product is already exits in wishlist, please remove it
            $wishlist->delete();
            return response()->json(['status' => 'removed']);
        }else{
            // $user->wishlist()->create(['product_id' => $productId]);
            Wishlist::create([
                'user_id'=>$user->id,
                'product_id' => $productId
            ]);
            return response()->json(['status' => 'added']);
        }

        // return response()->json([
        //     'message' => 'Hello from wishlistToggle',
        //     'wishlist' => $wishlist
        // ]);


    }
}

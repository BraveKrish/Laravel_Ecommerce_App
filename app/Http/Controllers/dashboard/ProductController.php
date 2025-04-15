<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use Exception;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('dashboard.product.products');
    }

    public function create()
    {
        // database bata data lyayera , view lai dine
        // reading/fetching data from database 
        $categories = ProductCategory::all();
        // dd($categories->toArray());
        return view('dashboard.product.create-product',compact('categories'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        try {
            $data = $request->validate([
                'name' => 'required|string|max:255',
                'category_id' => 'required',
                'description' => 'nullable|string',
                'is_featured' => 'nullable|string',
                'price' => 'required',
                'sale_price' => 'nullable',
                'featured_image' => 'nullable|string',
                'qty' => 'required|numeric',
            ]);

            // dd($data['is_featured']);
            if($data['is_featured'] == 'on'){
                $data['is_featured'] = 1;
            }

            Product::create($data);

            return redirect()->route('create.product')->with('success', 'Product Created Successfully!!!');
        } catch (\Exception $e) {
            return redirect()->route('create.product')->with('error', 'something went wrong' . $e->getMessage());
        }
    }
}

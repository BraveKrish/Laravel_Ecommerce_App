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
        // $products = Product::all();
        // $products = Product::where('status',1)->get();
        // $products = Product::orderBy('created_at','desc')
        //     ->where('status',1)->get();
        // dd($products->toArray());

        $products = Product::with('category')->get();
        // dd($products->toArray());
        return view('dashboard.product.products',compact('products'));
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
                'description' => 'nullable',
                'is_featured' => 'nullable|string',
                'price' => 'required',
                'sale_price' => 'nullable',
                'featured_image' => 'nullable|string',
                'qty' => 'required|numeric',
            ]);

            // dd($data['is_featured']);
            if(isset($data['is_featured']) && $data['is_featured'] == 'on'){
                $data['is_featured'] = 1;
            }else{
                $data['is_featured'] = 0;
            }

            Product::create($data);

            return redirect()->route('admin.products')->with('success', 'Product Created Successfully!!!');
        } catch (\Exception $e) {
            return redirect()->route('create.product')->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }

    public function edit($id){
        // dd($id);
        $categories = ProductCategory::all();
        // select * from product_categories;
        $product = Product::with('category')->findOrFail($id);

        // dd($product->toArray());

        // select * from products where id = $id;
        // dd($categories->toArray());
        return view('dashboard.product.edit-product',compact('categories','product'));
    }

    public function update(Request $request){
        // dd($request->all());
        try {
            $data = $request->validate([
                'name' => 'required|string|max:255',
                'category_id' => 'required',
                'description' => 'nullable',
                'is_featured' => 'nullable|string',
                'price' => 'required',
                'sale_price' => 'nullable',
                'featured_image' => 'nullable|string',
                'qty' => 'required|numeric',
            ]);

            // dd($data['is_featured']);
            if(isset($data['is_featured']) && $data['is_featured'] == 'on'){
                $data['is_featured'] = 1;
            }else{
                $data['is_featured'] = 0;
            }

            Product::where('id',$request->product_id)->update($data);
            // Product::update($data);

            return redirect()->route('admin.products')->with('success', 'Product Updated Successfully!!!');
        } catch (\Exception $e) {
            return redirect()->route('product.edit',['id'=>$request->id])->with('error', 'Something went wrong: ' . $e->getMessage());
        }


    }

    public function delete($id){
        // dd($id);
        try{
            $product = Product::findOrFail($id);
            // dd($product->toArray());
            $product->delete();
            return redirect()->route('admin.products')->with('success', 'Product Deleted Successfully!!!');
        }catch(\Exception $e){
            return redirect()->route('admin.products')->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }
}

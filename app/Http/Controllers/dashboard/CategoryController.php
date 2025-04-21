<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        return view('dashboard.categories.product-categories');
    }

    public function store(Request $request){
        // dd($request->all());
        try{
            $data = $request->validate([
                'title' => 'required|string|max:255',
                'image' => 'nullable|string',
            ]);

            ProductCategory::create($data);
            // insert into product_categories(name,image) values('category name','image name');
            return redirect()->route('category.show')->with('success','Category Created Successfully!!!');
        }catch(\Exception $e){
            // dd($e->getMessage());
            return redirect()->back()->with('error','Something went wrong!!!'.$e->getMessage());
        }
    }
}

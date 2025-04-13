<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        return view('dashboard.product.products');
    }

    public function create(){
        return view('dashboard.product.create-product');
    }
}

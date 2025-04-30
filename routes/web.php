<?php

use App\Http\Controllers\auth\AuthenticationController;
use App\Http\Controllers\dashboard\CategoryController;
use App\Http\Controllers\dashboard\DashboardController;
use App\Http\Controllers\dashboard\ProductController;

use App\Http\Controllers\frontend\HomeController;


use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
//     // return '<h1>Hello this is my first laravel app</h1>';
// });

// 404 error resource not found.

// http://127.0.0.1:8000/  => / vanne route lai request garnu ho

// Route::get('/about', function(){
//     return '<h1>This is my about page</h1>';
// });


// auth route
Route::get('/login',[AuthenticationController::class,'showLogin'])->name('login.page');
Route::post('/login',[AuthenticationController::class,'login'])->name('login');





Route::get('/forget-password',[AuthenticationController::class,'showForgetPassword'])->name('forget.password');


// dashboard routes goes here
Route::middleware(['auth','is_admin'])->group(function (){
    Route::get('/admin',[DashboardController::class,'home'])->name('admin.home');

    Route::post('admin/logout',[AuthenticationController::class,'logout'])->name('admin.logout');

    // product routes
    Route::get('/admin/products', [ProductController::class,'index'])->name('admin.products');
    Route::get('/admin/create-product',[ProductController::class, 'create'])->name('create.product');
    Route::post('/product/store',[ProductController::class,'store'])->name('prodcut.store');
    Route::get('/products/{id}/edit',[ProductController::class,'edit'])->name('product.edit');
    Route::put('/products/{id}/update',[ProductController::class,'update'])->name('product.update');
    Route::delete('/products/{id}/delete',[ProductController::class, 'delete'])->name('product.delete');

    // product category routes
    Route::get('admin/product-categories',[CategoryController::class,'index'])->name('category.show');
    Route::post('category/store',[CategoryController::class,'store'])->name('category.store');
});







// web routes goes here



// frontend routes goes here
Route::get('/',[HomeController::class, 'index'])->name('site.home');


// Route::get('/', function(){
//     return view('frontend.home.home');
// });

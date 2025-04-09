<?php

use App\Http\Controllers\dashboard\DashboardController;
use App\Http\Controllers\site\AboutController;
use App\Http\Controllers\site\HomeController;
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




// dashboard routes goes here
Route::get('/admin',[DashboardController::class,'home'])->name('admin.home');

// product routes
Route::get('/admin/products', function(){
    return view('dashboard.product.products');
})->name('admin.products');


// web routes goes here
Route::get('/',[HomeController::class,'index']);
Route::get('/about',[AboutController::class,'index'])->name('about');

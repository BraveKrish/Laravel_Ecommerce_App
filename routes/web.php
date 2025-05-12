<?php

use App\Http\Controllers\auth\AuthenticationController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\dashboard\CategoryController;
use App\Http\Controllers\dashboard\DashboardController;
use App\Http\Controllers\dashboard\ProductController;
use App\Http\Controllers\frontend\AuthenticationController as SiteAuthenticationController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\WishlistController;
use App\Http\Controllers\PromoCodeController;
use App\Models\PromoCode;
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


// auth route (admin dashboard login)
Route::get('/admin/login',[AuthenticationController::class,'showLogin'])->name('login.page');
Route::post('/admin/login',[AuthenticationController::class,'login'])->name('admin.login');





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

    // coupon routes
    Route::get('coupons/',[PromoCodeController::class,'index'])->name('admin.coupon');
    Route::post('promocode/', [PromoCodeController::class, 'generatePromoCode'])->name('promocode.create');
});







// web routes goes here



// frontend routes goes here
Route::get('/',[HomeController::class, 'index'])->name('site.home');


// auth routes (site)
Route::get('/login',function(){
    return view('frontend.auth.login-register');
})->name('login.register');
Route::post('/register',[SiteAuthenticationController::class, 'register'])->name('user.register');
Route::post('/login',[SiteAuthenticationController::class, 'login'])->name('user.login');
Route::post('/logout',[SiteAuthenticationController::class,'logout'])->name('user.logout');


Route::get('/profile', function(){
    return 'profile page';
});

// Route::get('/', function(){
//     return view('frontend.home.home');
// });

// wishlist routes
Route::get('/wishlist',[WishlistController::class, 'index'])->name('wishlist.page');
Route::post('/wishlist/toggle',[WishlistController::class, 'wishlistToggle'])->name('wishlist.toggle');

// cart routes
Route::get('/cart-items',[CartController::class,'viewCart'])->name('show.cart.item');
Route::post('/cart/add',[CartController::class,'addToCart'])->name('add.to.cart');

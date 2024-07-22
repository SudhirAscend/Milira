<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\LoginController;


Route::prefix('admin')->group(function () {
    Route::get('product_categories', [ProductCategoryController::class, 'index'])->name('admin.product_categories.index');
    Route::get('product_categories/create', [ProductCategoryController::class, 'create'])->name('admin.product_categories.create');
    Route::post('product_categories', [ProductCategoryController::class, 'store'])->name('admin.product_categories.store');
    Route::delete('product_categories/{id}', [ProductCategoryController::class, 'destroy'])->name('admin.product_categories.destroy');

    Route::get('products', [ProductsController::class, 'index'])->name('products.index');
    Route::get('products/create', [ProductsController::class, 'create'])->name('products.create');
    Route::post('products', [ProductsController::class, 'store'])->name('products.store');
    Route::get('products/{id}/edit', [ProductsController::class, 'edit'])->name('products.edit');
    Route::put('products/{id}', [ProductsController::class, 'update'])->name('products.update');
    Route::delete('products/{id}', [ProductsController::class, 'destroy'])->name('products.destroy');
});

Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');
Route::post('/shop/filter', [ShopController::class, 'filterByCategory'])->name('shop.filterByCategory');
Route::get('/shop/{title}', [ProductsController::class, 'show'])->name('shop.product');

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/signup', [HomeController::class, 'showSignupForm']);
Route::post('/signup', [AuthController::class, 'signup']);
Route::post('/verify-otp', [AuthController::class, 'verifyOtp']);
Route::get('/verify-otp', function () {
    return view('verify');
})->name('verify-otp');

Route::get('/login', function () {
    return view('login');
})->name('login');
Route::post('/login', [AuthController::class, 'sendOtp']);
Route::post('/verify-login-otp', [AuthController::class, 'verifyLoginOtp']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
// web.php (routes file)
Route::get('/profile', [HomeController::class, 'profile'])->name('profile');

<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProductCategoryController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('{any}', [HomeController::class, 'root'])->where('any', '.*');

Route::get('/products/create', [ProductsController::class, 'create'])->name('products.create');
Route::post('/products', [ProductsController::class, 'store'])->name('products.store');

Route::prefix('admin')->group(function () {
    Route::get('product_categories', [ProductCategoryController::class, 'index'])->name('admin.product_categories.index');
    Route::get('product_categories/create', [ProductCategoryController::class, 'create'])->name('admin.product_categories.create');
    Route::post('product_categories', [ProductCategoryController::class, 'store'])->name('admin.product_categories.store');
});

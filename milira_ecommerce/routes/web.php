<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProductCategoryController;

//Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('{any}', [HomeController::class, 'root'])->where('any', '.*');


Route::get('/products/create', [ProductsController::class, 'create'])->name('products.create');
Route::post('/products', [ProductsController::class, 'store'])->name('products.store');
Route::get('admin/product_categories/index', [ProductCategoryController::class, 'index']);

Route::prefix('admin')->group(function () {
    Route::get('product-categories', [ProductCategoryController::class, 'index'])->name('admin.product_categories.index');
    Route::get('product-categories/create', [ProductCategoryController::class, 'create'])->name('admin.product_categories.create');
    Route::post('product-categories', [ProductCategoryController::class, 'store'])->name('admin.product_categories.store');
    Route::get('product_categories/index', [ProductCategoryController::class, 'index']);
});
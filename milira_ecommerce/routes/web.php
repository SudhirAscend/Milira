<?php

// routes/web.php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProductCategoryController;

Route::prefix('admin')->group(function () {
    Route::get('product_categories', [ProductCategoryController::class, 'index'])->name('admin.product_categories.index');
    Route::get('product_categories/create', [ProductCategoryController::class, 'create'])->name('admin.product_categories.create');
    Route::post('product_categories', [ProductCategoryController::class, 'store'])->name('admin.product_categories.store');

    Route::get('products', [ProductsController::class, 'index'])->name('products.index');
    Route::get('products/create', [ProductsController::class, 'create'])->name('products.create');
    Route::post('products', [ProductsController::class, 'store'])->name('products.store');
    Route::get('products/{id}/edit', [ProductsController::class, 'edit'])->name('products.edit');
    Route::put('products/{id}', [ProductsController::class, 'update'])->name('products.update');
    Route::delete('products/{id}', [ProductsController::class, 'destroy'])->name('products.destroy');
});


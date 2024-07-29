<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\AdminController;

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
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/profile', [ProfileController::class, 'showProfile'])->name('profile');
Route::post('/profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');
Route::post('/profile/verify-otp', [ProfileController::class, 'verifyOtp'])->name('profile.verifyOtp');

Route::middleware('auth')->group(function () {
    Route::get('/checkout', [CheckoutController::class, 'showCheckoutPage'])->name('checkout.show');
    Route::post('/checkout/store-order', [CheckoutController::class, 'storeOrder'])->name('checkout.storeOrder');
    Route::post('/checkout/store-address', [CheckoutController::class, 'storeAddress'])->name('checkout.storeAddress');
    Route::post('/payment-success', [CheckoutController::class, 'paymentSuccess'])->name('payment.success');
});
Route::get('/thank-you', function () {
    return view('thank-you');
})->name('thank-you');

Route::middleware('auth')->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('cart.add');
    Route::get('/clear-cart', [CartController::class, 'clearCart'])->name('cart.clear');
    Route::post('/cart/remove', [CartController::class, 'removeFromCart'])->name('cart.remove');
    Route::post('/cart/buy-now', [CartController::class, 'buyNow'])->name('cart.buyNow');
    Route::post('/cart/checkout', [CartController::class, 'buyNow'])->name('cart.checkout');
});

Route::get('/payment', [PaymentController::class, 'initiatePayment'])->name('payment.initiate');

Route::middleware('auth')->group(function () {
    Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
    Route::post('/wishlist/add', [WishlistController::class, 'addToWishlist'])->name('wishlist.add');
    Route::post('/wishlist/remove', [WishlistController::class, 'removeFromWishlist'])->name('wishlist.remove');
    Route::post('/wishlist/toggle/{productId}', [WishlistController::class, 'toggle'])->name('wishlist.toggle');
});

Route::get('/forget-password', [AuthController::class, 'showForgetPasswordForm'])->name('forget-password.form');

Route::middleware('auth')->group(function () {
    Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');
});

Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/admin/customers', [AdminController::class, 'customers'])->name('admin.customers');
Route::get('/admin/customer-details/{id}', [AdminController::class, 'customerDetails'])->name('admin.customer.details');
Route::get('/checkout', [CheckoutController::class, 'showCheckoutPage'])->name('checkout.index');
Route::post('/checkout', [CheckoutController::class, 'storeOrder'])->name('checkout.store');

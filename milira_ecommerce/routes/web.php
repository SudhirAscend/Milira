<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\Auth\FacebookController;
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
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\OrderController;
Auth::routes();
// Admin routes
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

// Shop routes
Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');
Route::post('/shop/filter', [ShopController::class, 'filterByCategory'])->name('shop.filterByCategory');
Route::get('/shop/{title}', [ProductsController::class, 'show'])->name('shop.product');

// Home routes
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/signup', [HomeController::class, 'showSignupForm']);
Route::post('/signup', [AuthController::class, 'signup']);

Route::get('/verify-otp', function () {
    return view('verify');
})->name('verify-otp');

// Auth routes
Route::get('/login', function () {
    return view('login');
})->name('login');
Route::post('/login', [AuthController::class, 'sendOtp']);
Route::post('/verify-login-otp', [AuthController::class, 'verifyLoginOtp']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'showProfile'])->name('profile');
    Route::post('/profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');
    
    
Route::post('profile/change-password', [ProfileController::class, 'changePassword'])->name('profile.changePassword');
Route::post('profile/verify-otp', [ProfileController::class, 'verifyOtp'])->name('profile.verifyOtp');
Route::post('/profile/add-address', [ProfileController::class, 'addAddress'])->name('profile.addAddress');
});

// Checkout routes
Route::middleware('auth')->group(function () {
    Route::get('/checkout', [CheckoutController::class, 'showCheckoutPage'])->name('checkout.show');
    Route::post('/checkout/store-order', [CheckoutController::class, 'storeOrder'])->name('checkout.storeOrder');
    Route::post('/checkout/store-address', [CheckoutController::class, 'storeAddress'])->name('checkout.storeAddress');
    Route::post('/payment-success', [CheckoutController::class, 'paymentSuccess'])->name('payment.success');
});


// Thank you route
Route::get('/thank-you', function () {
    return view('thank-you');
})->name('thank-you');

// Cart routes
Route::middleware('auth')->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('cart.add');
    Route::get('/clear-cart', [CartController::class, 'clearCart'])->name('cart.clear');
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/remove', [CartController::class, 'removeFromCart'])->name('cart.remove');
    Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
    Route::post('/cart/buy-now', [CartController::class, 'buyNow'])->name('cart.buyNow'); // New route for buy now
    Route::get('/checkout', [CheckoutController::class, 'showCheckoutPage'])->name('checkout.index');
});

// Payment routes
Route::get('/payment', [PaymentController::class, 'initiatePayment'])->name('payment.initiate');

// Wishlist routes
Route::middleware('auth')->group(function () {
    Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
    Route::post('/wishlist/add', [WishlistController::class, 'addToWishlist'])->name('wishlist.add');
    Route::post('/wishlist/remove', [WishlistController::class, 'removeFromWishlist'])->name('wishlist.remove');
    Route::post('/wishlist/toggle/{productId}', [WishlistController::class, 'toggle'])->name('wishlist.toggle');
    Route::post('/wishlist/add-to-cart', [WishlistController::class, 'addToCartFromWishlist'])->name('wishlist.addToCartFromWishlist');
});

// Forget password route
Route::get('/forget-password', [AuthController::class, 'showForgetPasswordForm'])->name('forget-password.form');

// Review routes
Route::middleware('auth')->group(function () {
    Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');
});

// Admin routes
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/admin/customers', [AdminController::class, 'customers'])->name('admin.customers');
Route::get('/admin/customer-details/{id}', [AdminController::class, 'customerDetails'])->name('admin.customer.details');
Route::get('/admin/orders', [AdminController::class, 'orders'])->name('admin.orders');
Route::get('/admin/order-details/{id}', [AdminController::class, 'orderDetails'])->name('admin.orderDetails');


// Request Product Form
Route::get('/request-product', [AuthController::class, 'requestProduct'])->name('request-product');

// contact Page
Route::get('/contact', [AuthController::class, 'contactDetails'])->name('contact');
Route::get('/shop/{title}', [ShopController::class, 'showProduct'])->name('shop.product');
Route::get('/product/{slug}', [ProductsController::class, 'show'])->name('product.show');
Route::resource('products', ProductsController::class);
Route::get('/shop-category-{category}', [ShopController::class, 'index'])->name('shop.category');
Route::get('/shop-collection-{collection}', [ShopController::class, 'filterByCollection'])->name('shop.collection');
Route::get('/search', [ProductsController::class, 'search'])->name('products.search');
Route::get('/admin/collections/create', [CollectionController::class, 'create'])->name('collections.create');
Route::post('/admin/collections/store', [CollectionController::class, 'store'])->name('collections.store');

Route::get('/admin/products/create', [ProductsController::class, 'create'])->name('products.create');
Route::post('/admin/products/store', [ProductsController::class, 'store'])->name('products.store');

Route::prefix('admin')->group(function () {
    Route::get('collections', [CollectionController::class, 'index'])->name('collections.index');
    Route::get('collections/create', [CollectionController::class, 'create'])->name('collections.create');
    Route::post('collections', [CollectionController::class, 'store'])->name('collections.store');
    Route::delete('collections/{id}', [CollectionController::class, 'destroy'])->name('collections.destroy');
});

Route::get('/order/{id}', [OrderController::class, 'view'])->name('order.view');
Route::get('login/{provider}', [AuthController::class, 'redirectToProvider'])->name('social.redirect');
Route::get('login/{provider}/callback', [AuthController::class, 'handleProviderCallback']);
Route::post('/signup', [AuthController::class, 'signup'])->name('signup');

Route::get('/signup', [HomeController::class, 'showSignupForm'])->name('register');
Route::get('/signup', [HomeController::class, 'showSignupForm'])->name('signup.form');

Route::get('/verify-otp', function () {
    return view('auth.verify-otp');
})->name('verify-otp');

Route::post('/verify-otp', [AuthController::class, 'verifyOtp']);
Route::post('/signup/email', [AuthController::class, 'emailSignup'])->name('signup.email.submit');

// Route for Phone sign up form submission
Route::post('/signup/phone', [AuthController::class, 'phoneSignup'])->name('signup.phone.submit');

Route::get('/signup', [HomeController::class, 'showSignupForm'])->name('signup.form');
Route::post('/signup', [AuthController::class, 'signup'])->name('signup.submit');
Route::get('/verify-otp', function () {
    return view('auth.verify-otp');
})->name('verify-otp');
Route::post('/verify-otp', [AuthController::class, 'verifyOtp'])->name('otp.verify');

Route::get('login/google', [AuthController::class, 'redirectToProvider'])->name('google.login');
Route::get('login/google/callback', [AuthController::class, 'handleProviderCallback']);

Route::get('/signup/phone', [SignupController::class, 'showPhoneSignupForm']);
Route::post('/signup/phone', [SignupController::class, 'signupPhone']);
Route::post('/verify-otp', [SignupController::class, 'verifyOtp']);

// In routes/web.php or routes/api.php
Route::post('/signup/phone', [AuthController::class, 'signupPhone'])->name('signup.phone.submit');
Route::post('/verify-phone', [SignupController::class, 'verifyPhone'])->name('signup.phone.submit');



// Route for displaying the phone signup form
Route::get('/signup/phone', [SignupController::class, 'showPhoneSignupForm'])->name('signup.phone');

// Route for handling phone signup
Route::post('/signup/phone', [SignupController::class, 'signupPhone'])->name('signup.phone.submit');

// Route for verifying OTP
Route::post('/verify/otp', [SignupController::class, 'verifyOtp'])->name('verify.otp');

// Route for displaying the email signup form
Route::get('/signup/email', [SignupController::class, 'showEmailSignupForm'])->name('signup.email');

// Route for handling email signup
Route::post('/signup/email', [SignupController::class, 'signupEmail'])->name('signup.email.submit');

Route::post('/signup-phone', [SignupController::class, 'saveUser']);
Route::post('/signup/email', [SignupController::class, 'signupEmail'])->name('signup.submit');
Route::get('/verify-otp', [AuthController::class, 'showOtpForm'])->name('verify-otp');
Route::post('/verify-otp', [AuthController::class, 'verifyOtp'])->name('verify-otp.submit');

Route::get('/otp/verify', [AuthController::class, 'showOtpForm'])->name('otp.verify');
Route::post('/otp/verify', [AuthController::class, 'verifyOtp']);

Route::get('auth/facebook', [FacebookController::class, 'redirectToFacebook'])->name('facebook.login');
Route::get('auth/facebook/callback', [FacebookController::class, 'handleFacebookCallback']);

Route::post('/email-login', [AuthController::class, 'emailLogin'])->name('email.login');
Route::post('/phone-login', [AuthController::class, 'phoneLogin'])->name('phone.login');
Route::get('/verify-otp', [AuthController::class, 'showOtpForm'])->name('verify-otp');
Route::post('/verify-otp', [AuthController::class, 'verifyOtp'])->name('verify-otp.submit');

Route::get('/auth/{provider}', [AuthController::class, 'redirectToProvider'])->name('social.login');
Route::get('/auth/{provider}/callback', [AuthController::class, 'handleProviderCallback']);



// In routes/web.php or routes/api.php
Route::post('/verify-phone', [AuthController::class, 'verifyPhone'])->name('verify.phone');
Route::get('/', [HomeController::class, 'index'])->name('home');

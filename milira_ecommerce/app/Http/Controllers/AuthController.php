<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\OTP;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Wishlist;
use Laravel\Socialite\Facades\Socialite;
use App\Models\Cart;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function emailSignup(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
        ]);
    
        // Generate an OTP
        $otp = rand(100000, 999999);
    
        // Create a new user
        $user = User::create([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'password' => Hash::make(Str::random(8)), // Random password for now
            'login_type' => 'email',
            'otp' => $otp,
            'otp_expires_at' => now()->addMinutes(10), // OTP valid for 10 minutes
        ]);
    
        // Send OTP via email
        Mail::raw("Your OTP code is: $otp", function ($message) use ($request) {
            $message->to($request->email)
                    ->subject('OTP Verification');
        });
    
        // Store user ID in session for OTP verification
        session(['user_id' => $user->id]);
    
        return redirect()->route('verify-otp')->with('message', 'OTP sent to your email.');
    }

    // Handle phone sign-up
    public function phoneSignup(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15|unique:users',
        ]);

        // Create a new user
        $user = User::create([
            'full_name' => $request->full_name,
            'phone_number' => $request->phone_number,
            'password' => Hash::make(Str::random(8)),
            'login_type' => 'phone', // Set the login_type
        ]);

        // Send OTP and redirect to OTP verification
        // Assuming you have a method to send OTP via SMS
        // $this->sendOtpToPhone($user->phone_number);

        return redirect()->route('verify-otp')->with('message', 'OTP sent to your phone.');
    }

   

    public function verifyOtp(Request $request)
{
    $request->validate([
        'otp' => 'required|string|max:6',
    ]);

    $user = User::where('id', session('user_id'))->first();

    if (!$user || $user->otp !== $request->input('otp') || $user->otp_expires_at->isPast()) {
        return redirect()->route('verify-otp')->withErrors(['otp' => 'Invalid or expired OTP']);
    }

    $user->update([
        'is_verified' => true,
        'otp' => null, // Clear the OTP after verification
        'otp_expires_at' => null,
    ]);

    Auth::login($user);

    return redirect()->route('home.index')->with('message', 'Your account has been verified and you are logged in.');
}

    public function sendOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:255',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json(['message' => 'Email not registered'], 400);
        }

        $otp = Str::random(6);

        $otpRecord = OTP::updateOrCreate(
            ['email' => $request->email],
            ['otp' => $otp]
        );

        Mail::raw("Your OTP code is: $otp", function ($message) use ($request) {
            $message->to($request->email)
                    ->subject('OTP Verification');
        });

        return response()->json(['message' => 'OTP sent to your email.'], 200);
    }

    public function verifyLoginOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:255',
            'otp' => 'required|string|max:6',
            'password' => 'required|string',
        ]);

        $otpRecord = OTP::where('email', $request->email)->where('otp', $request->otp)->first();

        if (!$otpRecord) {
            return response()->json(['message' => 'Invalid OTP'], 400);
        }

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Invalid email or password'], 400);
        }

        OTP::where('email', $request->email)->delete();

        Auth::login($user);

        return response()->json(['message' => 'Logged in successfully.'], 200);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
    public function showForgetPasswordForm()
    {
        return view('forget-password');
    }
    public function requestProduct()
    {
        $user_id = Auth::id();
        $wishlistProductIds = Wishlist::where('user_id', $user_id)->pluck('product_id')->toArray();
        $wishlistCount = Wishlist::where('user_id', $user_id)->count();

        $cartItems = Cart::where('user_id', $user_id)->with('product')->get();
        $cartCount = $cartItems->count();
        $subtotal = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        return view('request-product', compact('wishlistProductIds', 'wishlistCount', 'cartItems', 'cartCount', 'subtotal'));

    }
    public function contactDetails()
    {
        $user_id = Auth::id();
        $wishlistProductIds = Wishlist::where('user_id', $user_id)->pluck('product_id')->toArray();
        $wishlistCount = Wishlist::where('user_id', $user_id)->count();

        $cartItems = Cart::where('user_id', $user_id)->with('product')->get();
        $cartCount = $cartItems->count();
        $subtotal = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        return view('contact', compact('wishlistProductIds', 'wishlistCount', 'cartItems', 'cartCount', 'subtotal'));

    }

    public function redirectToProvider($provider)
{
    return Socialite::driver($provider)->redirect();
}

public function handleProviderCallback($provider)
{
    $user = Socialite::driver($provider)->stateless()->user();
    $authUser = $this->findOrCreateUser($user, $provider);
    Auth::login($authUser, true);
    return redirect()->intended('/dashboard');
}

public function findOrCreateUser($providerUser, $provider)
{
    $authUser = User::where('email', $providerUser->getEmail())->first();
    if ($authUser) {
        return $authUser;
    }
    
    return User::create([
        'full_name' => $providerUser->getName(),
        'email' => $providerUser->getEmail(),
        'provider_id' => $providerUser->getId(),
        'provider' => $provider,
    ]);
}

    
}

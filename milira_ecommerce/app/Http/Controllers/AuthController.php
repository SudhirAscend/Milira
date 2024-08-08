<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\OTP;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function emailSignup(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
        ]);
    
        $otp = rand(1000, 9999); // 4-digit OTP
    
        $user = User::create([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'password' => Hash::make(Str::random(8)),
            'login_type' => 'email',
            'otp' => $otp,
            'otp_expires_at' => now()->addMinutes(10),
        ]);
    
        Mail::raw("Your OTP code is: $otp", function ($message) use ($request) {
            $message->to($request->email)->subject('OTP Verification');
        });
    
        session(['user_id' => $user->id]);
    
        return redirect()->route('verify-otp')->with('message', 'OTP sent to your email.');
    }

    public function phoneSignup(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15|unique:users',
        ]);

        $otp = rand(1000, 9999); // 4-digit OTP
        
        $user = User::create([
            'full_name' => $request->full_name,
            'phone_number' => $request->phone_number,
            'password' => Hash::make(Str::random(8)),
            'login_type' => 'phone',
            'otp' => $otp,
            'otp_expires_at' => now()->addMinutes(10),
        ]);

        // Send OTP via SMS (implement this method)
        // $this->sendOtpToPhone($user->phone_number);

        return redirect()->route('verify-otp')->with('message', 'OTP sent to your phone.');
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|string|max:4',
        ]);

        $user = User::where('id', session('user_id'))->first();

        if (!$user || $user->otp !== $request->input('otp') || $user->otp_expires_at->isPast()) {
            return redirect()->route('verify-otp')->withErrors(['otp' => 'Invalid or expired OTP']);
        }

        $user->update([
            'is_verified' => true,
            'otp' => null,
            'otp_expires_at' => null,
        ]);

        Auth::login($user);

        return redirect('/');
    }

    public function emailLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:255',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return redirect()->back()->withErrors(['email' => 'Email not registered']);
        }

        $otp = rand(1000, 9999); // 4-digit OTP

        // Update OTP and expiration time in users table
        $user->update([
            'otp' => $otp,
            'otp_expires_at' => now()->addMinutes(10),
        ]);

        Mail::raw("Your OTP code is: $otp", function ($message) use ($request) {
            $message->to($request->email)->subject('OTP Verification');
        });

        session(['user_email' => $request->email]);

        return redirect()->route('verify-otp')->with('message', 'OTP sent to your email.');
    }

    public function phoneLogin(Request $request)
    {
        $request->validate([
            'phone_number' => 'required|string|max:15',
        ]);

        $user = User::where('phone_number', $request->phone_number)->first();

        if (!$user) {
            return redirect()->back()->withErrors(['phone_number' => 'Phone number not registered']);
        }

        $otp = rand(1000, 9999); // 4-digit OTP

        // Update OTP and expiration time in users table
        $user->update([
            'otp' => $otp,
            'otp_expires_at' => now()->addMinutes(10),
        ]);

        // Send OTP via SMS (implement this method)
        // $this->sendOtpToPhone($request->phone_number);

        return redirect()->route('verify-otp')->with('message', 'OTP sent to your phone.');
    }

    public function showOtpForm()
    {
        return view('auth.verify-otp');
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

        $otp = rand(1000, 9999); // 4-digit OTP

        OTP::updateOrCreate(
            ['email' => $request->email],
            ['otp' => $otp, 'expires_at' => now()->addMinutes(10)]
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
            'otp' => 'required|string|max:4',
            'password' => 'required|string',
        ]);

        $otpRecord = OTP::where('email', $request->email)
                        ->where('otp', $request->otp)
                        ->first();

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

    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();
            $authUser = $this->findOrCreateUser($googleUser);

            Auth::login($authUser, true);

            return redirect()->route('home.index');
        } catch (\Exception $e) {
            Log::error('Google login failed', ['error' => $e->getMessage()]);
            return redirect()->route('login')->withErrors(['login' => 'Login failed.']);
        }
    }

    private function findOrCreateUser($googleUser)
    {
        return User::firstOrCreate([
            'google_id' => $googleUser->id
        ], [
            'name' => $googleUser->name,
            'email' => $googleUser->email,
            'avatar' => $googleUser->avatar,
            'password' => bcrypt(Str::random(16)),
        ]);
    }
}

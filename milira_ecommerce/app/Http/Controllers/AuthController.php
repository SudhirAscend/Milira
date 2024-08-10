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
use App\Services\MSG91Service; // Add this if you're using MSG91 for SMS

class AuthController extends Controller
{
    protected $msg91Service;

    public function __construct(MSG91Service $msg91Service)
    {
        $this->msg91Service = $msg91Service;
    }

    // Email Login
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

    // Phone Login
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
        $this->msg91Service->sendOtp($request->phone_number, $otp);
    
        session(['user_phone' => $request->phone_number]);
    
        return redirect()->route('verify-otp')->with('message', 'OTP sent to your phone.');
    }

    // Verify OTP
   
    public function showOtpForm()
    {
        return view('auth.verify-otp');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|string|max:4',
        ]);
    
        $user = null;
    
        // Check if OTP is for phone login
        if ($request->session()->has('user_phone')) {
            $phone = $request->session()->get('user_phone');
            $user = User::where('phone_number', $phone)->first();
        }
        
        // Check if OTP is for email login
        if (!$user && $request->session()->has('user_email')) {
            $email = $request->session()->get('user_email');
            $user = User::where('email', $email)->first();
        }
    
        // Check if user exists and OTP matches
        if (!$user || $user->otp !== $request->input('otp') || $user->otp_expires_at->isPast()) {
            // If OTP is invalid or expired, redirect back with error message
            return redirect()->route('verify-otp')->withErrors(['otp' => 'Invalid or expired OTP']);
        }
    
        // Clear OTP and expiration time after successful verification
        $user->update([
            'is_verified' => true,
            'otp' => null,
            'otp_expires_at' => null,
        ]);
    
        // Log in the user
        Auth::login($user);
    
        // Clear session data
        $request->session()->forget(['user_phone', 'user_email']);
    
        // Redirect to the home page or a different location
        return redirect('/');
    }
    // Google Login
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
            Log::error('Error in Google Login: ' . $e->getMessage());
            return redirect('/');
        }
    }

    private function findOrCreateUser($googleUser)
    {
        $user = User::where('email', $googleUser->getEmail())->first();

        if ($user) {
            if (!$user->provider_id) {
                $user->update([
                    'provider_id' => $googleUser->getId(),
                    'provider' => 'google',
                ]);
            }
            return $user;
        }

        return User::create([
            'full_name' => $googleUser->getName(),
            'email' => $googleUser->getEmail(),
            'provider_id' => $googleUser->getId(),
            'provider' => 'google',
            'password' => Hash::make(Str::random(16)),
            'login_type' => 'google',
            'is_verified' => true,
        ]);
    }
}

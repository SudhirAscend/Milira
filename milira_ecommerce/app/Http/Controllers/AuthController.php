<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Services\MSG91Service;
use Carbon\Carbon;
use Laravel\Socialite\Facades\Socialite;


class AuthController extends Controller
{
    protected $msg91Service;

    public function __construct(MSG91Service $msg91Service)
    {
        $this->msg91Service = $msg91Service;
    }

    public function showLoginForm()
    {
        return view('auth.login');
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
        $this->msg91Service->sendOtp($request->phone_number, $otp);

        session(['user_phone' => $request->phone_number]);

        return redirect()->route('verify-otp')->with('message', 'OTP sent to your phone.');
    }

    public function registerByEmail(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
        ]);

        $otp = rand(1000, 9999); // 4-digit OTP

        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'otp' => $otp,
            'otp_expires_at' => now()->addMinutes(10),
            'password' => Hash::make(Str::random(16)), // Temporary password
        ]);

        // Send OTP via email
        Mail::raw("Your OTP code is: $otp", function ($message) use ($request) {
            $message->to($request->email)->subject('OTP Verification');
        });

        session(['user_email' => $request->email]);

        return redirect()->route('verify-otp')->with('message', 'OTP sent to your email.');
    }

    public function registerByPhone(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15|unique:users',
        ]);

        $otp = rand(1000, 9999); // 4-digit OTP

        $user = User::create([
            'username' => $request->username,
            'phone_number' => $request->phone_number,
            'otp' => $otp,
            'otp_expires_at' => now()->addMinutes(10),
            'password' => Hash::make(Str::random(16)), // Temporary password
        ]);

        // Send OTP via SMS using MSG91
        $this->msg91Service->sendOtp($request->phone_number, $otp);

        session(['user_phone' => $request->phone_number]);

        return redirect()->route('verify-otp')->with('message', 'OTP sent to your phone.');
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|string|max:4',
        ]);

        $user = null;

        // Check if OTP is for phone registration
        if ($request->session()->has('user_phone')) {
            $phone = $request->session()->get('user_phone');
            $user = User::where('phone_number', $phone)->first();
        }

        // Check if OTP is for email registration
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

        // Redirect to the intended page or home
        return redirect()->intended('/');
    }
    public function redirectToProvider()
{
    return Socialite::driver('google')->redirect();
}
public function handleProviderCallback()
{
    try {
        // Get user information from Google
        $googleUser = Socialite::driver('google')->stateless()->user();

        // Check if a user with this email already exists
        $existingUser = User::where('email', $googleUser->getEmail())->first();

        if ($existingUser) {
            // If the user already exists but doesn't have a Google ID, update it
            if (!$existingUser->google_id) {
                $existingUser->update([
                    'google_id' => $googleUser->getId(),
                    'is_verified' => true // Mark them verified if needed
                ]);
            }
            // Log in the user
            Auth::login($existingUser);
        } else {
            // Create a new user if they don't exist
            $newUser = User::create([
                'full_name' => $googleUser->getName(),
                'email' => $googleUser->getEmail(),
                'google_id' => $googleUser->getId(),
                'is_verified' => true, // Consider SSO users as verified
                'password' => Hash::make(Str::random(16)), // Assign a random password
            ]);

            // Log in the newly created user
            Auth::login($newUser);
        }

        // Redirect to the intended page or home after successful login
        return redirect()->intended('/');

    } catch (\Exception $e) {
        // Log the error for debugging purposes
        \Log::error('Google login error: ' . $e->getMessage());

        // Redirect to the login page with an error message
        return redirect('/login')->withErrors(['error' => 'Unable to login with Google.']);
    }
}



    public function showOtpForm()
    {
        return view('auth.verify-otp');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
    public function contactDetails() {
        return view('contact'); // Assuming you have a contact.blade.php in resources/views
    }
}

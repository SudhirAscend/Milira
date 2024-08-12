<?php

namespace App\Http\Controllers\Auth;

use App\Services\MSG91Service;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Carbon\Carbon;

class RegisterController extends Controller
{
    protected $msg91Service;

    public function __construct(MSG91Service $msg91Service)
    {
        $this->msg91Service = $msg91Service;
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function registerByEmail(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
        ]);

        $otp = rand(1000, 9999);

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

        session(['user_email' => $request->email]);

        Auth::login($user);

        return redirect()->route('verify-otp')->with('message', 'OTP sent to your email.');
    }

    public function registerByPhone(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'phone_number' => 'required|numeric|unique:users,phone_number',
            'otp' => 'required|digits:6',
        ]);

        $user = User::create([
            'full_name' => $request->input('full_name'),
            'phone_number' => $request->input('phone_number'),
            'otp' => $request->input('otp'),
            'otp_expires_at' => Carbon::now()->addMinutes(10),
            'login_type' => 'phone',
            'is_verified' => false,
        ]);

        Auth::login($user);

        return redirect()->route('verify.phone')->with('message', 'Please verify your phone number.');
    }

    public function signupPhone(Request $request)
{
    $request->validate([
        'phone_number' => 'required|numeric|unique:users,phone_number',
        'full_name' => 'required|string|max:255',
    ]);

    // Save user details in the database
    $user = User::create([
        'full_name' => $request->input('full_name'),
        'phone_number' => $request->input('phone_number'),
        'login_type' => 'phone',
        'is_verified' => false, // Assume OTP will verify this
    ]);

    // Respond with a success message
    return response()->json([
        'success' => true,
        'message' => 'User created successfully',
    ]);
}


public function verifyOtp(Request $request)
{
    $request->validate([
        'otp' => 'required|digits:4',
    ]);

    $userId = $request->session()->get('user_id');
    $user = User::find($userId);

    if (!$user || $user->otp !== $request->input('otp') || $user->otp_expires_at->isPast()) {
        return redirect()->back()->withErrors(['otp' => 'Invalid or expired OTP']);
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
    $request->session()->forget('user_id');

    // Redirect to the home page
    return redirect()->intended('/');
}

    // Signup with phone number
    public function signup(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'phone_number' => 'required|numeric|unique:users,phone_number',
            'otp' => 'required|digits:6',
        ]);

        $user = User::create([
            'full_name' => $request->input('full_name'),
            'phone_number' => $request->input('phone_number'),
            'otp' => $request->input('otp'),
            'otp_expires_at' => Carbon::now()->addMinutes(10),
            'login_type' => 'phone',
            'is_verified' => false,
        ]);

        // Automatically log in the user
        Auth::login($user);

        return redirect()->route('verify.phone')->with('message', 'Please verify your phone number.');
    }

    // Signup with email
    public function signupEmail(Request $request)
{
    $request->validate([
        'full_name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
    ]);

    $otp = rand(1000, 9999);

    $user = User::create([
        'full_name' => $request->full_name,
        'email' => $request->email,
        'password' => Hash::make(Str::random(8)),
        'login_type' => 'email',
        'otp' => $otp,
        'otp_expires_at' => now()->addMinutes(10),
    ]);

    Mail::raw("Your OTP code is: $otp", function ($message) use ($request) {
        $message->to($request->email)
                ->subject('OTP Verification');
    });

    // Store user ID in session for email verification
    session(['user_email' => $request->email]);

    // Automatically log in the user
    Auth::login($user);

    return redirect()->route('verify-otp')->with('message', 'OTP sent to your email.');
}

    public function showPhoneSignupForm()
    {
        return view('signup');
    }

    

    

   

}


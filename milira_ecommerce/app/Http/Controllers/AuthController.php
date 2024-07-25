<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\OTP;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function signup(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'phone_number' => 'required|string|max:15',
            'dob' => 'required|date',
            'gender' => 'required|string|max:10',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'pin_code' => 'required|string|max:10',
            'country' => 'required|string|max:255',
        ]);

        // Store user details in session for later use
        session([
            'full_name' => $request->full_name,
            'password' => $request->password,
            'phone_number' => $request->phone_number,
            'dob' => $request->dob,
            'gender' => $request->gender,
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'pin_code' => $request->pin_code,
            'country' => $request->country,
        ]);

        $otp = Str::random(6);

        OTP::create([
            'email' => $request->email,
            'otp' => $otp,
        ]);

        Mail::raw("Your OTP code is: $otp", function ($message) use ($request) {
            $message->to($request->email)
                    ->subject('OTP Verification');
        });

        return response()->json(['message' => 'OTP sent to your email.'], 200);
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:255',
            'otp' => 'required|string|max:6',
        ]);

        $otpRecord = OTP::where('email', $request->email)->where('otp', $request->otp)->first();

        if (!$otpRecord) {
            return response()->json(['message' => 'Invalid OTP'], 400);
        }

        User::create([
            'full_name' => session('full_name'),
            'email' => $request->email,
            'password' => Hash::make(session('password')),
            'phone_number' => session('phone_number'),
            'dob' => session('dob'),
            'gender' => session('gender'),
            'address' => session('address'),
            'city' => session('city'),
            'state' => session('state'),
            'pin_code' => session('pin_code'),
            'country' => session('country'),
            'is_verified' => true,
        ]);

        OTP::where('email', $request->email)->delete();

        return redirect('/login')->with('message', 'User registered successfully.');
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
}

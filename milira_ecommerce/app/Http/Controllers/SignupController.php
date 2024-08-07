<?php

namespace App\Http\Controllers;

use App\Services\MSG91Service;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;

class SignupController extends Controller
{
    protected $msg91Service;

    public function __construct(MSG91Service $msg91Service)
    {
        $this->msg91Service = $msg91Service;
    }

    public function signup(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'phone_number' => 'required|numeric|unique:users,phone_number',
            'otp' => 'required|digits:4', // Changed to 4 digits
        ]);

        $user = User::create([
            'full_name' => $request->input('full_name'),
            'phone_number' => $request->input('phone_number'),
            'otp' => $request->input('otp'),
            'otp_expires_at' => Carbon::now()->addMinutes(10),
            'login_type' => 'phone',
            'is_verified' => false,
        ]);

        return redirect()->route('verify.phone')->with('message', 'Please verify your phone number.');
    }

    public function showPhoneSignupForm()
    {
        return view('signup');
    }

    public function signupPhone(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'phone_number' => 'required|digits:10',
        ]);

        $response = $this->msg91Service->sendOtp($request->phone_number);

        if ($response['type'] === 'success') {
            return view('verify-otp', ['phone' => $request->phone_number]);
        } else {
            return redirect()->back()->withErrors($response['message']);
        }
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|digits:4', // Changed to 4 digits
            'phone_number' => 'required|digits:10',
        ]);

        $response = $this->msg91Service->verifyOtp($request->otp, $request->phone_number);

        if ($response['type'] === 'success') {
            $user = User::where('phone_number', $request->phone_number)
                        ->where('otp', $request->otp)
                        ->where('otp_expires_at', '>', Carbon::now())
                        ->first();

            if ($user) {
                $user->is_verified = true;
                $user->otp = null;
                $user->otp_expires_at = null;
                $user->save();

                return redirect()->route('login')->with('success', 'Your phone number has been verified. Please log in.');
            } else {
                return back()->withErrors(['otp' => 'Invalid OTP or OTP expired.']);
            }
        } else {
            return redirect()->back()->withErrors($response['message']);
        }
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'phone_number' => 'required|unique:users,phone_number',
            'full_name' => 'required|string|max:255',
        ]);

        // Create a new user record
        User::create([
            'phone_number' => $request->input('phone_number'),
            'full_name' => $request->input('full_name'),
           
        ]);

        return response()->json(['message' => 'User created successfully'], 201);
    }

    public function saveUser(Request $request)
    {
        // Validate the request data
        $request->validate([
            'phone_number' => 'required|unique:users,phone_number',
            'full_name' => 'required|string|max:255',
        ]);

        // Create a new user record
        User::create([
            'phone_number' => $request->input('phone_number'),
            'full_name' => $request->input('full_name'),
            
        ]);

        return response()->json(['success' => true], 200);
    }
}

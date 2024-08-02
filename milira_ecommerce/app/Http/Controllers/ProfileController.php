<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Models\Order;
use App\Mail\OtpMail;

class ProfileController extends Controller
{
    public function showProfile()
    {
        $user = Auth::user();
        $orderCount = Order::where('user_id', $user->id)->count();
        return view('profile', compact('user', 'orderCount'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'nullable|string|min:8|confirmed',
            'phone_number' => 'required|string|max:15',
            'dob' => 'required|date',
            'gender' => 'required|string',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'pin_code' => 'required|string|max:10',
            'country' => 'required|string|max:255',
        ]);

        if ($request->email !== $user->email) {
            // Generate and send OTP
            $otp = rand(100000, 999999);
            $user->otp = $otp;
            $user->save();

            Mail::to($request->email)->send(new OtpMail($otp));

            return back()->with('otp', 'We have sent an OTP to your new email address.');
        }

        $user->full_name = $request->full_name;
        $user->phone_number = $request->phone_number;
        $user->dob = $request->dob;
        $user->gender = $request->gender;
        $user->address = $request->address;
        $user->city = $request->city;
        $user->state = $request->state;
        $user->pin_code = $request->pin_code;
        $user->country = $request->country;

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return back()->with('success', 'Profile updated successfully.');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|string',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return response()->json(['errors' => ['current_password' => ['Current password is incorrect.']]], 422);
        }

        // Generate OTP and send it to the user's email
        $otp = rand(100000, 999999);
        $user->otp = $otp;
        $user->save();

        Mail::to($user->email)->send(new OtpMail($otp));

        session(['new_password' => Hash::make($request->new_password)]);

        return response()->json(['otp_sent' => true]);
    }

    public function verifyOtp(Request $request)
    {
        $request->validate(['otp' => 'required|integer']);

        $user = Auth::user();

        if ($user->otp == $request->otp) {
            $user->password = session('new_password');
            $user->otp = null;
            $user->save();

            session()->forget('new_password');

            return response()->json(['success' => true]);
        }

        return response()->json(['errors' => ['otp' => ['Invalid OTP.']]], 422);
    }
    
}
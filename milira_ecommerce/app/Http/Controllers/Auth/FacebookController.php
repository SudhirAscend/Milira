<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

class FacebookController extends Controller
{
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
        try {
            $facebookUser = Socialite::driver('facebook')->user();
        } catch (\Exception $e) {
            return redirect('/login')->withErrors('Failed to login with Facebook.');
        }

        // Check if the user already exists
        $user = User::where('facebook_id', $facebookUser->getId())->first();

        // If the user does not exist, create a new user
        if (!$user) {
            $user = User::create([
                'name' => $facebookUser->getName(),
                'email' => $facebookUser->getEmail(),
                'facebook_id' => $facebookUser->getId(),
                'avatar' => $facebookUser->getAvatar(),
                // Add any additional fields you need here
            ]);
        }

        // Log the user in
        Auth::login($user);

        return redirect('/login')->with('message', 'Successfully logged in with Facebook.');
    }
}

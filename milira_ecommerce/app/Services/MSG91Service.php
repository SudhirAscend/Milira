<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class MSG91Service
{
    protected $authKey;
    protected $accessToken;

    public function __construct()
    {
        $this->authKey = env('MSG91_AUTH_KEY');
        $this->accessToken = env('MSG91_ACCESS_TOKEN');
    }

    public function sendOtp($phoneNumber)
    {
        $response = Http::post('https://control.msg91.com/api/v5/otp/send', [
            'authkey' => $this->authKey,
           
            'mobile' => $phoneNumber,
            'otp' => rand(100000, 999999), // Generate a 6-digit OTP
            'otp_expiry' => 5, // OTP expiry time in minutes
        ]);

        return $response->json();
    }

    public function verifyOtp($otp, $requestId)
    {
        $response = Http::post('https://control.msg91.com/api/v5/otp/verify', [
            'authkey' => $this->authKey,
            'otp' => $otp,
            'request_id' => $requestId,
        ]);

        return $response->json();
    }
}

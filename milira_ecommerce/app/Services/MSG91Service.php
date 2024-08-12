<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class MSG91Service
{
    protected $apiKey;
    protected $otpUrl;
    protected $verifyUrl;

    public function __construct()
    {
        $this->apiKey = env('MSG91_API_KEY');
        $this->otpUrl = 'https://api.msg91.com/api/v5/otp/send';
        $this->verifyUrl = 'https://api.msg91.com/api/v5/otp/verify';
    }

    public function sendOtp($phoneNumber)
    {
        $response = Http::post($this->otpUrl, [
            'authkey' => $this->apiKey,
            'mobile' => $phoneNumber,
            'message' => 'Your OTP code is {{otp}}',
            'otp' => true,
           
        ]);

        return $response->json();
    }

    public function verifyOtp($otp, $phoneNumber)
    {
        $response = Http::post($this->verifyUrl, [
            'authkey' => $this->apiKey,
            'otp' => $otp,
            'mobile' => $phoneNumber,
        ]);

        return $response->json();
    }
}

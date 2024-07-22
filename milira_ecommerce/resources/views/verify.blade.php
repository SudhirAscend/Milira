<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Verify OTP</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-5.3.2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/account-create.css') }}">
</head>
<body>
    <section class="login account footer-padding">
        <div class="container">
            <div class="login-section account-section">
                <div class="review-form">
                    <h5 class="comment-title">Verify OTP</h5>
                    <form id="verifyForm" action="/verify-otp" method="POST">
                        @csrf
                        <input type="hidden" name="full_name" value="{{ session('full_name') }}">
                        <input type="hidden" name="email" value="{{ session('email') }}">
                        <input type="hidden" name="password" value="{{ session('password') }}">
                        <input type="hidden" name="phone_number" value="{{ session('phone_number') }}">
                        <input type="hidden" name="dob" value="{{ session('dob') }}">
                        <input type="hidden" name="gender" value="{{ session('gender') }}">
                        <input type="hidden" name="address" value="{{ session('address') }}">
                        <input type="hidden" name="city" value="{{ session('city') }}">
                        <input type="hidden" name="state" value="{{ session('state') }}">
                        <input type="hidden" name="pin_code" value="{{ session('pin_code') }}">
                        <input type="hidden" name="country" value="{{ session('country') }}">
                        <div class="review-form-name">
                            <label for="otp" class="form-label">OTP*</label>
                            <input type="text" id="otp" name="otp" class="form-control" placeholder="Enter OTP" required>
                        </div>
                        <div class="login-btn text-center">
                            <button type="submit" class="shop-btn">Verify OTP</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script src="{{ asset('assets/js/jquery_3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap_5.3.2.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/nouislider.min.js') }}"></script>
    <script src="{{ asset('assets/js/aos-3.0.0.js') }}"></script>
    <script src="{{ asset('assets/js/swiper10-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/shopus.js') }}"></script>
</body>
</html>

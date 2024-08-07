<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Verify OTP</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-5.3.2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/account-create.css') }}">
    <style>
        .is-invalid {
            border-color: red;
        }
    </style>
</head>
<body>

<!-- Header -->
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<section class="login account footer-padding">
    <div class="container">
        <div class="login-section account-section">
            <div class="review-form">
                <h5 class="comment-title">Verify OTP</h5>

                <!-- OTP Form -->
                <form id="otpVerificationForm" method="POST" action="{{ route('verify.otp') }}">
                    @csrf
                    <input type="hidden" name="phone_number" value="{{ $phone }}">
                    <div class="review-form-name mb-3">
                        <label for="otp" class="form-label">Enter OTP*</label>
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

@include('footer')
</body>
</html>

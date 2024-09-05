<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-5.3.2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/account-create.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        .is-invalid {
            border-color: red;
        }
        .form-content {
            display: none;
        }
        .form-content.active {
            display: block;
        }
        .tab-button {
            border: none;
            background: none;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
        }
        .tab-button.active {
            background-color: #e0e0e0;
            border-radius: 5px;
        }
    </style>
</head>
<body>
 <!--------------- header-section --------------->
 @include('header')
    <!--------------- header-section-end --------------->
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
                <h5 class="comment-title">Login</h5>

                <!-- Tab buttons with icons -->
                <div class="text-center mb-4">
                    <button type="button" id="emailTab" class="tab-button active" onclick="showEmailForm()">
                        <i class="fas fa-envelope"></i>
                    </button>
                    <button type="button" id="phoneTab" class="tab-button" onclick="showPhoneForm()">
                        <i class="fas fa-phone"></i>
                    </button>
                </div>

                <!-- Email Form -->
                <div id="emailForm" class="form-content active">
                    <form id="emailLoginForm" method="POST" action="{{ route('email.login') }}">
                        @csrf
                        <div class="review-form-name mb-3">
                            <label for="email" class="form-label">Email Address*</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="user@gmail.com" required>
                        </div>
                        <div class="login-btn text-center">
                            <button type="submit" class="shop-btn">Login</button>
                        </div>
                    </form>
                </div>

                <!-- Phone Form -->
                <div id="phoneForm" class="form-content">
    <form id="phoneSignupForm" method="POST" action="{{ route('signup.phone.submit') }}" onsubmit="return handlePhoneSignup(event)">
        @csrf
        <div class="review-form-name mb-3">
            <label for="phone_number" class="form-label">Phone Number*</label>
            <input type="tel" id="phone_number" name="phone_number" class="form-control" placeholder="919876543210" required pattern="91\d{10}" value="91">
        </div>
        <div class="login-btn text-center">
            <button type="submit" class="shop-btn">Login</button>
        </div>
    </form>
</div>

                <!-- Social Login Buttons with icons -->
                <div class="text-center mt-3">
                    <p>or sign up with</p>
                    <a href="{{ route('google.login') }}" class="btn btn-danger">
                        <i class="fab fa-google"></i>Google
                    </a>
                    <a href="{{ route('facebook.login') }}" class="btn btn-primary">
    <i class="fab fa-facebook-f"></i> Facebook
</a>
                </div>

                <!-- Don't have an account -->
                <div class="a-signup text-center mt-4">
                    <p>Don't have an account? <a href="/register">Sign Up</a></p>
                </div>
            </div>
        </div>
    </div>
</section>

@include('footer')

<script src="{{ asset('assets/js/jquery_3.7.1.min.js') }}"></script>
<!-- JavaScript to toggle forms -->
<script>
    function showEmailForm() {
        document.getElementById('emailForm').classList.add('active');
        document.getElementById('phoneForm').classList.remove('active');
        document.getElementById('emailTab').classList.add('active');
        document.getElementById('phoneTab').classList.remove('active');
    }

    function showPhoneForm() {
        document.getElementById('emailForm').classList.remove('active');
        document.getElementById('phoneForm').classList.add('active');
        document.getElementById('phoneTab').classList.add('active');
        document.getElementById('emailTab').classList.remove('active');
    }

    function handlePhoneSignup(event) {
    event.preventDefault();
    var phoneNumber = document.getElementById('phone_number').value;
    if (phoneNumber) {
        configuration.identifier = phoneNumber;
        initSendOTP(configuration);
    }
}

function initSendOTP(config) {
    if (typeof window.otpProvider !== 'undefined') {
        window.otpProvider.init(config);
    } else {
        console.error('OTP provider is not initialized.');
    }
}

document.addEventListener('DOMContentLoaded', function() {
    var configuration = {
        widgetId: "346866647844363530343839",
        tokenAuth: "427548TbyQKcDe8pd66b1a670P1",
        identifier: "phonenumber",
        success: (data) => {
            console.log('success response', data);
            // Redirect to the index page
            window.location.href = '/';
        },
        failure: (error) => {
            console.log('failure reason', error);
        },
    };

    document.getElementById('phoneSignupForm').onsubmit = function(event) {
        event.preventDefault();
        var phoneNumber = document.getElementById('phone_number').value;
        if (phoneNumber) {
            configuration.identifier = phoneNumber;
            initSendOTP(configuration);
        }
    };
});
</script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

<script type="text/javascript" src="https://control.msg91.com/app/assets/otp-provider/otp-provider.js"></script>
</body>
</html>

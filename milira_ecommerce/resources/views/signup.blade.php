<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-5.3.2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/account-create.css') }}">
    <style>
        .is-invalid {
            border-color: red;
        }

        /* Hide all forms by default */
        .form-content {
            display: none;
        }

        /* Show the active form */
        .form-content.active {
            display: block;
        }
        
        /* Button styling */
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
                <h5 class="comment-title">Sign Up</h5>

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
                <form id="emailSignupForm" method="POST" action="{{ route('signup.email.submit') }}">
                        @csrf
                        <div class="review-form-name mb-3">
                            <label for="full_name" class="form-label">Full Name*</label>
                            <input type="text" id="full_name" name="full_name" class="form-control" placeholder="Full Name" required>
                        </div>
                        <div class="review-form-name mb-3">
                            <label for="email" class="form-label">Email Address*</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="user@gmail.com" required>
                        </div>
                        <div class="login-btn text-center">
                            <button type="submit" class="shop-btn">Sign Up</button>
                        </div>
                    </form>
                </div>

                <!-- Phone Form -->
                <div id="phoneForm" class="form-content">
                <form id="phoneSignupForm" method="POST" action="{{ route('signup.phone.submit') }}">
                        @csrf
                        <div class="review-form-name mb-3">
                            <label for="full_name_phone" class="form-label">Full Name*</label>
                            <input type="text" id="full_name_phone" name="full_name" class="form-control" placeholder="Full Name" required>
                        </div>
                        <div class="review-form-name mb-3">
                            <label for="phone_number" class="form-label">Phone Number*</label>
                            <input type="tel" id="phone_number" name="phone_number" class="form-control" placeholder="1234567890" required maxlength="10" pattern="\d{10}">
                        </div>
                        <div class="login-btn text-center">
                            <button type="submit" class="shop-btn">Sign Up</button>
                        </div>
                    </form>
                </div>

                <!-- Social Login Buttons with icons -->
                <div class="text-center mt-3">
                    <p>or sign up with</p>
                    <a href="{{ route('google.login') }}" class="btn btn-danger">
    <i class="fab fa-google"></i>Google
</a>
                    <a href="{{ route('social.redirect', 'facebook') }}" class="btn btn-primary">
                        <i class="fab fa-facebook-f"></i> Facebook
                    </a>
                </div>

                <!-- Already have an account -->
                <div class="a-signup text-center mt-4">
                    <p>Already have an account? <a href="/login">Login</a></p>
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
</script>
<!-- Include Font Awesome for icons -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

</body>
</html>

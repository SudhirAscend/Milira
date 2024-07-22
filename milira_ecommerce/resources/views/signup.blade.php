<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Account</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-5.3.2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/account-create.css') }}">
</head>
<body>
    <section class="login account footer-padding">
        <div class="container">
            <div class="login-section account-section">
                <div class="review-form">
                    <h5 class="comment-title">Create Account</h5>
                    <form id="signupForm" method="POST">
                        @csrf
                        <div class="account-inner-form">
                            <div class="review-form-name">
                                <label for="full_name" class="form-label">Full Name*</label>
                                <input type="text" id="full_name" name="full_name" class="form-control" placeholder="Full Name">
                            </div>
                            <div class="review-form-name">
                                <label for="email" class="form-label">Email Address*</label>
                                <input type="email" id="email" name="email" class="form-control" placeholder="user@gmail.com">
                            </div>
                        </div>
                        <div class="account-inner-form">
                            <div class="review-form-name">
                                <label for="password" class="form-label">Password*</label>
                                <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                            </div>
                            <div class="review-form-name">
                                <label for="password_confirmation" class="form-label">Confirm Password*</label>
                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Confirm Password">
                            </div>
                        </div>
                        <div class="account-inner-form">
                            <div class="review-form-name">
                                <label for="phone_number" class="form-label">Phone Number*</label>
                                <input type="tel" id="phone_number" name="phone_number" class="form-control" placeholder="+91 1234567890">
                            </div>
                            <div class="review-form-name">
                                <label for="dob" class="form-label">Date of Birth*</label>
                                <input type="date" id="dob" name="dob" class="form-control">
                            </div>
                        </div>
                        <div class="review-form-name">
                            <label for="gender" class="form-label">Gender*</label>
                            <select id="gender" name="gender" class="form-select">
                                <option value="">Choose...</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="review-form-name address-form">
                            <label for="address" class="form-label">Address*</label>
                            <input type="text" id="address" name="address" class="form-control" placeholder="Enter your Address">
                        </div>
                        <div class="review-form-name address-form">
                            <label for="city" class="form-label">City*</label>
                            <input type="text" id="city" name="city" class="form-control" placeholder="City">
                        </div>
                        <div class="review-form-name address-form">
                            <label for="state" class="form-label">State*</label>
                            <input type="text" id="state" name="state" class="form-control" placeholder="State">
                        </div>
                        <div class="review-form-name address-form">
                            <label for="pin_code" class="form-label">Pin Code*</label>
                            <input type="text" id="pin_code" name="pin_code" class="form-control" placeholder="Pin Code">
                        </div>
                        <div class="review-form-name">
                            <label for="country" class="form-label">Country*</label>
                            <select id="country" name="country" class="form-select">
                                <option value="">Choose...</option>
                                <option value="Bangladesh">Bangladesh</option>
                                <option value="United States">United States</option>
                                <option value="United Kingdom">United Kingdom</option>
                                <option value="India" selected>India</option>
                            </select>
                        </div>
                        <div class="review-form-name checkbox">
                            <div class="checkbox-item">
                                <input type="checkbox" id="terms" name="terms">
                                <p class="remember">I agree to all terms and conditions in <span class="inner-text">ShopUs.</span></p>
                            </div>
                        </div>
                        <div class="login-btn text-center">
                            <button type="submit" class="shop-btn">Create an Account</button>
                            <span class="shop-account">Already have an account? <a href="login.html">Log In</a></span>
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

    <script>
        $(document).ready(function() {
            $('#signupForm').on('submit', function(e) {
                e.preventDefault();

                $.ajax({
                    url: '/signup',
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        alert(response.message);
                        window.location.href = '/verify-otp';
                    },
                    error: function(response) {
                        alert('Error: ' + response.responseJSON.message);
                    }
                });
            });
        });
    </script>
</body>
</html>

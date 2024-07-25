<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-5.3.2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/account-create.css') }}">
</head>
<body>
    <section class="login">
        <div class="container">
            <div class="login-section account-section">
                <div class="review-form">
                    <h5 class="comment-title">Login</h5>
                    <form id="loginForm" action="/login" method="POST">
                        @csrf
                        <div class="review-form-name">
                            <label for="email" class="form-label">Email*</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="user@gmail.com" required>
                        </div>
                        <div class="review-form-name">
                            <label for="password" class="form-label">Password*</label>
                            <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                        </div>
                        <div class="login-btn text-center">
                            <button type="submit" class="shop-btn">Send OTP</button>
                        </div>
                    </form>

                    <form id="verifyLoginOtpForm" action="/verify-login-otp" method="POST" style="display: none;">
                        @csrf
                        <div class="review-form-name">
                            <label for="otp" class="form-label">OTP*</label>
                            <input type="text" id="otp" name="otp" class="form-control" placeholder="Enter OTP" required>
                        </div>
                        <input type="hidden" id="verifyEmail" name="email">
                        <input type="hidden" id="verifyPassword" name="password">
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
    <script>
        $(document).ready(function() {
            $('#loginForm').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    url: $(this).attr('action'),
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        alert(response.message);
                        $('#loginForm').hide();
                        $('#verifyLoginOtpForm').show();
                        $('#verifyEmail').val($('#email').val());
                        $('#verifyPassword').val($('#password').val());
                    },
                    error: function(response) {
                        alert('Error: ' + response.responseJSON.message);
                    }
                });
            });

            $('#verifyLoginOtpForm').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    url: $(this).attr('action'),
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        alert(response.message);
                        window.location.href = '/'; // Redirect to home page after successful login
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

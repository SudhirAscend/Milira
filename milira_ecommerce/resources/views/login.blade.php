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
    <section class="login account footer-padding">
        <div class="container">
            <div class="login-section account-section">
                <div class="review-form">
                    <h5 class="comment-title">Login</h5>
                    <form action="/login" method="POST">
                        @csrf
                        <div class="review-form-name">
                            <label for="email" class="form-label">Email Address*</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="user@gmail.com" required>
                        </div>
                        <div class="review-form-name">
                            <label for="password" class="form-label">Password*</label>
                            <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                        </div>
                        <div class="login-btn text-center">
                            <button type="submit" class="shop-btn">Login</button>
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

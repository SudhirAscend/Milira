<!-- resources/views/auth/verify-otp.blade.php -->
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Verify OTP</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-5.3.2.min.css') }}">
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h3 class="text-center mt-5">Verify OTP</h3>
            <form method="POST" action="{{ route('otp.verify') }}">
                @csrf
                <div class="form-group mb-3">
                    <label for="otp">Enter OTP</label>
                    <input type="text" name="otp" id="otp" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Verify</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>

<!-- resources/views/payment.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Payment Page</title>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
</head>
<body>
    <form action="{{ route('payment.success') }}" method="POST">
        @csrf
        <script
            src="https://checkout.razorpay.com/v1/checkout.js"
            data-key="{{ config('services.razorpay.key') }}"
            data-amount="{{ $order['amount'] }}"
            data-currency="INR"
            data-order_id="{{ $order['id'] }}"
            data-buttontext="Pay with Razorpay"
            data-name="Milira"
            data-description="Order Description"
            data-image="https://your-logo-url"
            data-prefill.name="Customer Name"
            data-prefill.email="customer@example.com"
            data-theme.color="#F37254">
        </script>
    </form>
</body>
</html>

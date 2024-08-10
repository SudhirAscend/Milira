<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="keywords" content="ShopUS, bootstrap-5, bootstrap, sass, css, HTML Template, HTML,html, bootstrap template, free template, figma, web design, web development,front end, bootstrap datepicker, bootstrap timepicker, javascript, ecommerce template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('assets/images/homepage-one/icon.png') }}">
    <style>
        #billingDetails.d-none {
            display: none;
        }
    </style>
    <title>Checkout</title>
    <link rel="stylesheet" href="{{ asset('assets/css/swiper10-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-5.3.2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/nouislider.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/aos-3.0.0.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/checkout.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/header.css') }}">
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
</head>
<body>
    <!-- header -->
    <!-- Add your header code here -->
   
    <section class="checkout product footer-padding">
        <div class="container">
            <div class="checkout-section">
                <div class="row gy-5">
                    <div class="col-lg-6">
                        <div class="checkout-wrapper">
                            @auth
                                <div class="checkout-wrapper">
                                    <div class="account-section billing-section">
                                        <h5 class="wrapper-heading">Select a Billing Address</h5>
                                        <div class="row">
                                            @foreach($addresses as $address)
                                                <div class="col-md-6">
                                                    <div class="card mb-3">
                                                        <div class="card-body">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="billing_address" id="address{{ $address->id }}" value="{{ $address->id }}" {{ $address->is_default ? 'checked' : '' }}>
                                                                <label class="form-check-label" for="address{{ $address->id }}">
                                                                    <strong>{{ $address->first_name }} {{ $address->last_name }}</strong><br>
                                                                    {{ $address->address }}<br>
                                                                    {{ $address->city }}, {{ $address->postcode }}<br>
                                                                    {{ $address->country }}<br>
                                                                    <small>{{ $address->email }} | {{ $address->phone }}</small>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <button id="addAddressBtn" class="shop-btn">Add New Address</button>
                                    </div>
                                    <div id="billingDetails" class="d-none">
                                        <div class="account-section billing-section">
                                            <h5 class="wrapper-heading">Billing Details</h5>
                                            <div class="review-form">
                                                <form action="{{ route('checkout.storeAddress') }}" method="POST" id="checkoutForm">
                                                    @csrf
                                                    <div class="account-inner-form">
                                                        <div class="review-form-name">
                                                            <label for="fname" class="form-label">First Name*</label>
                                                            <input type="text" id="fname" name="first_name" class="form-control" placeholder="First Name" required>
                                                        </div>
                                                        <div class="review-form-name">
                                                            <label for="lname" class="form-label">Last Name*</label>
                                                            <input type="text" id="lname" name="last_name" class="form-control" placeholder="Last Name" required>
                                                        </div>
                                                    </div>
                                                    <div class="account-inner-form">
                                                        <div class="review-form-name">
                                                            <label for="email" class="form-label">Email*</label>
                                                            <input type="email" id="email" name="email" class="form-control" placeholder="user@gmail.com" required>
                                                        </div>
                                                        <div class="review-form-name">
                                                            <label for="phone" class="form-label">Phone*</label>
                                                            <input type="tel" id="phone" name="phone" class="form-control" placeholder="+880388**0899" required>
                                                        </div>
                                                    </div>
                                                    <div class="review-form-name">
                                                        <label for="country" class="form-label">Country*</label>
                                                        <select id="country" name="country" class="form-select" required>
                                                            <option value="">Choose...</option>
                                                            <option value="Bangladesh">Bangladesh</option>
                                                            <option value="United States">United States</option>
                                                            <option value="United Kingdom" selected>United Kingdom</option>
                                                        </select>
                                                    </div>
                                                    <div class="review-form-name address-form">
                                                        <label for="address" class="form-label">Address*</label>
                                                        <input type="text" id="address" name="address" class="form-control" placeholder="Enter your Address" required>
                                                    </div>
                                                    <div class="account-inner-form city-inner-form">
                                                        <div class="review-form-name">
                                                            <label for="city" class="form-label">Town / City*</label>
                                                            <input type="text" id="city" name="city" class="form-control" placeholder="City" required>
                                                        </div>
                                                        <div class="review-form-name">
                                                            <label for="postcode" class="form-label">Postcode / ZIP*</label>
                                                            <input type="text" id="postcode" name="postcode" class="form-control" placeholder="0000" required>
                                                        </div>
                                                    </div>
                                                    <div class="review-form-name checkbox">
                                                        <div class="checkbox-item">
                                                            <input type="checkbox" id="default" name="is_default" value="1">
                                                            <label for="default" class="form-label">Set as default address</label>
                                                        </div>
                                                    </div>
                                                    <div class="submit-btn">
                                                        <button type="submit" class="shop-btn">Save Address</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endauth
                        </div>
                    </div>
                    <div class="col-lg-6">
                    <div class="checkout-wrapper">
    <div class="account-section billing-section">
        <h5 class="wrapper-heading">Order Summary</h5>
        <div class="order-summery">
            <div class="subtotal product-total">
                <h5 class="wrapper-heading">PRODUCT</h5>
                <h5 class="wrapper-heading">TOTAL</h5>
            </div>
            <hr>
            <div id="product-list" class="subtotal product-total">
                <ul class="product-list">
                    @foreach($cartItemsa as $item)
                        <li id="product-{{ $item->product->id }}">
                            <div class="product-info">
                                <h5 class="wrapper-heading">{{ $item->product->title }}</h5>
                                <p class="paragraph">{{ $item->product->small_description }}, Quantity: {{ $item->quantity }}</p>
                            </div>
                            <div class="price">
                                <h5 class="wrapper-heading">₹{{ number_format($item->price * $item->quantity, 2) }}</h5>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
            <hr>
            <div class="subtotal product-total">
                <h5 class="wrapper-heading">SUBTOTAL</h5>
                <h5 class="wrapper-heading" id="subtotal-amount">₹{{ number_format($totalAmount, 2) }}</h5>
            </div>

            <form id="couponForm" action="{{ route('checkout.applyCoupon') }}" method="POST">
    @csrf
    <select name="code" required>
        <option value="">Select a coupon</option>
        @foreach($coupons as $coupon)
            <option value="{{ $coupon->code }}">{{ $coupon->code }} - {{ $coupon->type == 'percentage' ? $coupon->value . '%' : '₹' . $coupon->value }}</option>
        @endforeach
    </select>
    <button type="submit">Apply Coupon</button>
</form>

            <!-- Total Amount Section -->
            <div class="subtotal product-total">
                <h5 class="wrapper-heading">SUBTOTAL</h5>
                <h5 class="wrapper-heading" id="subtotal-amount">₹{{ number_format($totalAmount, 2) }}</h5>
            </div>
            <div class="subtotal product-total" id="discount-section" style="display: none;">
                <h5 class="wrapper-heading">DISCOUNT ({{ session('coupon')['code'] ?? '' }})</h5>
                <h5 class="wrapper-heading" id="discount-amount">- ₹0.00</h5>
            </div>
            <div class="subtotal product-total">
                <h5 class="wrapper-heading">TOTAL</h5>
                <h5 class="wrapper-heading" id="total-amount">₹{{ number_format($totalAmount, 2) }}</h5>
            </div>

            <button id="placeOrderBtn" class="btn btn-primary">Place Order</button>
        </div>
    </div>
</div>
                </div>
            </div>
        </div>
    </section>

    <!-- footer -->
    <!-- Add your footer code here -->

    <script src="{{ asset('assets/js/jquery_3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap_5.3.2.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/nouislider.min.js') }}"></script>
    <script src="{{ asset('assets/js/aos-3.0.0.js') }}"></script>
    <script src="{{ asset('assets/js/swiper10-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/shopus.js') }}"></script>
    <script>
    document.getElementById('addAddressBtn').addEventListener('click', function(e) {
        e.preventDefault();
        document.getElementById('billingDetails').classList.toggle('d-none');
    });
</script>

    <script>
document.getElementById('placeOrderBtn').addEventListener('click', function(e) {
    e.preventDefault();

    // Hide product details before processing the order
    document.getElementById('product-list').style.display = 'none';

    // Calculate discounted total
    var subtotal = parseFloat(document.getElementById('subtotal-amount').textContent.replace('₹', '').replace(',', ''));
    var discount = parseFloat(document.getElementById('discount-amount').textContent.replace('₹', '').replace(',', '')) || 0;
    var total = subtotal - discount;

    const formData = new FormData(document.getElementById('checkoutForm'));

    fetch("{{ route('checkout.storeOrder') }}", {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.razorpay_order_id) {
            var options = {
                "key": "{{ env('RAZORPAY_KEY') }}",
                "amount": total * 100, // Use the discounted total amount
                "currency": "INR",
                "name": "Milira Ecommerce",
                "description": "Test Transaction",
                "image": "{{ asset('assets/images/homepage-one/icon.png') }}",
                "order_id": data.razorpay_order_id,
                "handler": function (response){
                    fetch("{{ route('payment.success') }}", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({
                            razorpay_payment_id: response.razorpay_payment_id,
                            razorpay_order_id: response.razorpay_order_id,
                            razorpay_signature: response.razorpay_signature,
                            order_id: data.order_id
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        window.location.href = "{{ route('thank-you') }}";
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Payment success handling failed. Please contact support.');
                    });
                },
                "prefill": {
                    "name": "{{ Auth::user()->name }}",
                    "email": "{{ Auth::user()->email }}",
                    "contact": "{{ Auth::user()->phone }}"
                },
                "notes": {
                    "address": "Milira Ecommerce Corporate Office"
                },
                "theme": {
                    "color": "#3399cc"
                }
            };
            var rzp1 = new Razorpay(options);
            rzp1.on('payment.failed', function (response){
                alert(response.error.description);
            });
            rzp1.open();
        } else {
            alert('Order failed. Please try again.');
            document.getElementById('product-list').style.display = 'block'; // Show products again if the order fails
        }
    })
    .catch((error) => {
        console.error('Error:', error);
        alert('Order failed. Please try again.');
        document.getElementById('product-list').style.display = 'block'; // Show products again if the order fails
    });
});
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#couponForm').submit(function(e) {
        e.preventDefault();

        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                if (response.success) {
                    var subtotal = parseFloat($('#subtotal-amount').text().replace('₹', '').replace(',', ''));
                    var discount = parseFloat(response.discount);
                    var total = subtotal - discount;

                    $('#discount-section').show();
                    $('#discount-amount').text('- ₹' + discount.toFixed(2));
                    $('#total-amount').text('₹' + total.toFixed(2));
                } else {
                    alert(response.message);
                }
            }
        });
    });
});
</script>
</body>
</html>

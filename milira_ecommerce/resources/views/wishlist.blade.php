<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="keywords" content="ShopUS, bootstrap-5, bootstrap, sass, css, HTML Template, HTML,html, bootstrap template, free template, figma, web design, web development,front end, bootstrap datepicker, bootstrap timepicker, javascript, ecommerce template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="./assets/images/homepage-one/icon.png">
    <title>Milira - Wishlist</title>
    <link rel="stylesheet" href="{{ asset('assets/css/swiper10-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-5.3.2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/nouislider.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/aos-3.0.0.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/cart.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/header.css') }}">
</head>

<body>
    <!--------------- header-section --------------->
    @include('header')
    <!--------------- header-section-end --------------->

    <!--------------- wishlist-tittle-section---------------->
    <section class="wishlist about-wishlist">
        <div class="container">
            <div class="wishlist-bradcrum">
                <span><a href="index.html">Home</a></span>
                <span class="devider">/</span>
                <span><a href="#">Wishlist</a></span>
            </div>
            <div class="wishlist-heading about-heading">
                <h1 class="heading">Wishlist</h1>
            </div>
        </div>
    </section>
    <!--------------- wishlist-tittle-section-end---------------->

    <!--------------- wishlist-section---------------->
    <section class="product-wishlist product footer-padding">
        <div class="container">
            <div class="wishlist-section">
                <table>
                    <tbody>
                        <tr class="table-row table-top-row">
                            <td class="table-wrapper wrapper-product">
                                <h5 class="table-heading">PRODUCT</h5>
                            </td>
                            <td class="table-wrapper">
                                <div class="table-wrapper-center">
                                    <h5 class="table-heading">PRICE</h5>
                                </div>
                            </td>
                            <td class="table-wrapper">
                                <div class="table-wrapper-center">
                                    <h5 class="table-heading">ACTION</h5>
                                </div>
                            </td>
                        </tr>
                        @foreach ($wishlist as $item)
                            <tr class="table-row ticket-row">
                                <td class="table-wrapper wrapper-product">
                                    <div class="wrapper">
                                        <div class="wrapper-content">
                                            <h5 class="heading">{{ $item->product->title }}</h5>
                                        </div>
                                    </div>
                                </td>
                                <td class="table-wrapper">
                                    <div class="table-wrapper-center">
                                        <h5 class="heading">${{ $item->product->price }}</h5>
                                    </div>
                                </td>
                                <td class="table-wrapper">
                                    <div class="table-wrapper-center">
                                        <button class="add-to-cart-btn" data-id="{{ $item->product_id }}">
                                            <i class="bi bi-cart-check-fill"></i>
                                        </button>
                                        <button class="btn btn-danger remove-from-wishlist" data-id="{{ $item->product_id }}">Remove</button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <!--------------- wishlist-section-end---------------->

    <!--------------- footer-section--------------->
    @include('footer')
    <!--------------- footer-section-end--------------->
    
    <!--------------- jQuery ---------------->
    <script src="{{ asset('assets/js/jquery_3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap_5.3.2.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/nouislider.min.js') }}"></script>
    <script src="{{ asset('assets/js/aos-3.0.0.js') }}"></script>
    <script src="{{ asset('assets/js/swiper10-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/shopus.js') }}"></script>

    <script>
        $(document).ready(function () {
            $('.add-to-cart-btn').on('click', function () {
                var productId = $(this).data('id');
                $.ajax({
                    url: '{{ route("wishlist.addToCartFromWishlist") }}',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        product_id: productId
                    },
                    success: function (response) {
                        window.location.reload();
                    },
                    error: function (response) {
                        alert('Error adding item to cart');
                    }
                });
            });

            $('.remove-from-wishlist').on('click', function () {
                var productId = $(this).data('id');
                $.ajax({
                    url: '{{ route("wishlist.remove") }}',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        product_id: productId
                    },
                    success: function (response) {
                        window.location.reload();
                    },
                    error: function (response) {
                        alert('Error removing item from wishlist');
                    }
                });
            });
        });
    </script>
</body>

</html>

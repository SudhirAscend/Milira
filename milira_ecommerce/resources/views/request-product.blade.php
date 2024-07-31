<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="keywords"
        content="ShopUS, bootstrap-5, bootstrap, sass, css, HTML Template, HTML,html, bootstrap template, free template, figma, web design, web development,front end, bootstrap datepicker, bootstrap timepicker, javascript, ecommerce template">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="{{ asset('assets/images/logos/favicon.png') }}">
    


<!--title  -->
<title>Milira-Request Product Form</title>

<!--------------- swiper-css ---------------->
<link rel="stylesheet" href="{{ asset('assets/css/swiper10-bundle.min.css') }}">

<!--------------- bootstrap-css ---------------->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!---------------------- Range Slider ------------------->
<link rel="stylesheet" href="{{ asset('assets/css/nouislider.min.css') }}">

<!---------------------- Scroll ------------------->
<link rel="stylesheet" href="{{ asset('assets/css/aos-3.0.0.css') }}">

<!--------------- additional-css ---------------->
<link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/header.css') }}">
<link rel="stylesheet" href="{{asset('assets/css/request.css')}}">


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<style>
    .cart-icon {
        position: relative;
    }

    .wishlist-button i.wishlist-added {
    color: red;
}
.wishlist-button {
    font-size: 20px;
    color: #fff;
}

.wishlist-button i {
    color: #fff;
}

.wishlist-button.wishlisted i {
    color: red;
}
.cartcount{
    position: relative;
    left: 40px;
    top: -10px;
    background-color: red;
    color: white !important;
    border-radius: 50%;
    padding:1px 6px;
    font-size: 10px;  
}
.wishlist-count {
    position: relative;
    left: 40px;
    top: -10px;
    background-color: red;
    color: white !important;
    border-radius: 50%;
    padding:1px 6px;
    font-size: 10px;
}
    
.loginclr{
         color:#808080 !important;
        }
.header-user .dropdown {
    display: flex;
    align-items: center;
}

.header-user .dropdown span {
    display: flex;
    align-items: center;
    cursor: pointer;
}

.header-user .dropdown p {
    margin: 0;
    padding-left: 5px;
}

.header-user .dropdown-menu {
    left: auto;
    right: 0;
}

</style>
</head>

<body>


    <!--------------- header-section --------------->
   @include('header')
    <!--------------- header-section-end --------------->

    <!-- Request Product Form -->

<div class="container request-pdt">
    <div class="form-title text-center">
        <h1>Request Product Form</h1>
    </div>
        <form action="" class="request-form">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mt-5">
                    <label for="Fname">First Name <span class="mx-1">*</span></label>
                    <input type="text" class="f-name" name="Fname" id="Fname" placeholder="First Name" required>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mt-5">
                    <label for="Lname">Last Name <span class="mx-1">*</span></label>
                    <input type="text" class="l-name" name="Lname" id="Lname" placeholder="Last Name" required>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mt-5">
                    <label for="Rphone">Phone <span class="mx-1">*</span></label>
                    <input type="tel" class="f-name" name="Rphone" id="Rphone" placeholder="Phone No" required>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mt-5">
                    <label for="Remail">Email <span class="mx-1">*</span></label>
                    <input type="email" class="l-name" name="Remail" id="Remail" placeholder="Email" required>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mt-5">
                    <label for="Pimage">Product Image <span class="mx-1">*</span></label>
                    <input type="file" class="f-name" name="Pimage" id="Pimage" required>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mt-5 ">
                    <label for="Remail">Product Description</label>
                    <input type="email" class="l-name mt-3" name="Remail" id="Remail" placeholder="Description">
                </div>
            </div>
            <div class="r-btn text-center py-5 mt-5">
                <button type="submit">Submit</button>
            </div>
        </form>
    </div>

    

    <!-- End Request Product Form -->

    <!--------------- footer-section--------------->
    @include('footer')
    <!--------------- footer-section-end--------------->



    <!--------------- jQuery ---------------->
    
    <script src="{{ asset('assets/js/jquery_3.7.1.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/js/nouislider.min.js') }}"></script>
    <script src="{{ asset('assets/js/aos-3.0.0.js') }}"></script>
    <script src="{{ asset('assets/js/swiper10-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/shopus.js') }}"></script>

</body>

</html>
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
<link rel="stylesheet" href="{{ asset('assets/css/contact.css') }}">



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

    <!--------------- Contact Details------------------>

    <div class="container contact">
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mt-4">
                <div class="contact-box">
                    <div class="mail-icon text-center">
                        <i class="bi bi-envelope"></i>
                    </div>
                    <div class="mail-title text-center">
                        <h2>Email Address</h2>
                    </div>
                    <div class="e-content text-center">
                        <p>
                            <a href="mailto:adminsupport@gmail.com">adminsupport@gmail.com</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mt-4">
                <div class="contact-box">
                    <div class="mail-icon text-center">
                    <i class="bi bi-truck"></i>
                    </div>
                    <div class="mail-title text-center">
                        <h2>Availablity</h2>
                    </div>
                    <div class="e-content text-center">
                        <p>
                        Monday - Sunday : 8:00 AM to 8:00 PM
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mt-4">
                <div class="contact-box">
                    <div class="mail-icon text-center">
                    <i class="bi bi-globe-central-south-asia"></i>
                    </div>
                    <div class="mail-title text-center">
                        <h2>Social Links</h2>
                    </div>
                    <div class="social-share text-center">
                        <p>
                            <a href=""><i class="bi bi-facebook"></i></a>
                            <a href=""><i class="bi bi-whatsapp"></i></a>
                        </p>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <div class="container c-form">
        <h2 class="form-title">Get In Touch</h2>
        <form action="" class="contact-field mt-5">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mt-4">
                    <label class="contact-label" for="name">First Name <span class="mx-1">*</span></label>
                    <input type="text" class="name" id="name" name="name" placeholder="John Doe" required>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mt-4">
                    <label class="contact-label" for="name">Last Name</label>
                    <input type="text" class="name" id="name" name="name" placeholder="J.A.," >
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mt-4">
                    <label class="contact-label" for="name">Email <span class="mx-1">*</span></label>
                    <input type="text" class="name" id="name" name="name" placeholder="example@mail.com" required>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mt-4">
                    <label class="contact-label" for="name">Phone Number <span class="mx-1">*</span></label>
                    <input type="text" class="name" id="name" name="name" placeholder="9876543210" required>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mt-4">
                    <label class="contact-label" for="name">Reason <span class="mx-1">*</span></label>
                    <select class="select-form" id="select" name="select" required>
                        <option selected>Choose the Reason</option>
                        <option value="1">Support</option>
                        <option value="2">Query</option>
                        <option value="3">Shipment Issues</option>
                        <option value="4">Others</option>
                    </select>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mt-4">
                    <label class="contact-label" for="subject">Subject <span class="mx-1">*</span></label>
                    <input type="text" class="subject" id="subject" name="subject" placeholder="subject" required>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <label class="contact-label" for="message">Message</label>
                    <textarea class="contact-textbox" name="message" id="message" placeholder="I have a query about..."></textarea>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-12 d-flex">
                    <input class="check" type="checkbox" name="checkTerms" id="checkTerms">
                    <label for="checkTerms" class="check-label mx-2" >I accept all the terms & conditions</label>
                </div>
            </div>
            <div class="text-center mt-5">
                <button class="contact-btn" type="submit">Submit</button>
            </div>
        </form>
    </div>

    <!--------------- End of Contact Details------------------>

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


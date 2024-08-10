<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="keywords" content="ShopUS, bootstrap-5, bootstrap, sass, css, HTML Template, HTML,html, bootstrap template, free template, figma, web design, web development,front end, bootstrap datepicker, bootstrap timepicker, javascript, ecommerce template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="images/png" href="{{ asset('assets/images/logos/favicon.jpg') }}">
    <title>Milira</title>
    <link rel="stylesheet" href="{{ asset('assets/css/swiper10-bundle.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/nouislider.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/aos-3.0.0.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/header.css') }}">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css"/>
 
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
        .cartcount {
            position: relative;
            left: 40px;
            top: -10px;
            background-color: red;
            color: white !important;
            border-radius: 50%;
            padding: 1px 6px;
            font-size: 10px;
        }
        .wishlist-count {
            position: relative;
            left: 40px;
            top: -10px;
            background-color: red;
            color: white !important;
            border-radius: 50%;
            padding: 1px 6px;
            font-size: 10px;
        }
        .loginclr {
            color: #808080 !important;
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

<body >



      
    <!--------------- header-section --------------->
    @include('header')
    <!--------------- header-section-end --------------->

    <!--------------- Hero-Section-Start --------------->
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <img src="./assets/images/hero/Hero1.jpg" width="100px" height="100%" alt="">
            <div class="hero-slider-content">
                <div class="hero-title text-center">
                    <h2>MAKE EVERYDAY SPARKEL WITH SILVER ESSENTIAL</h2>
                </div>
                <div class="hero-sub-title py-5 text-center">
                    <button class="btn-hero">WEDDING JEWELLERY</button>
                </div>
            </div>
          </div>
          <div class="swiper-slide">
            <img src="./assets/images/hero/Hero2.jpg" width="100px" height="100%" alt="">
            <div class="hero-slider-content">
                <div class="hero-title text-center">
                    <h2>MAKE EVERYDAY SPARKEL WITH SILVER ESSENTIAL</h2>
                </div>
                <div class="hero-sub-title py-5 text-center">
                    <button class="btn-hero">WEDDING JEWELLERY</button>
                </div>
            </div>
          </div>
          <div class="swiper-slide">
            <img src="./assets/images/hero/Hero3.jpg" width="100px" height="100%" alt="">
            <div class="hero-slider-content">
                <div class="hero-title text-center">
                    <h2>MAKE EVERYDAY SPARKEL WITH SILVER ESSENTIAL</h2>
                </div>
                <div class="hero-sub-title py-5 text-center">
                    <button class="btn-hero">WEDDING JEWELLERY</button>
                </div>
            </div>
          </div>
          <div class="swiper-slide">
            <img src="./assets/images/hero/Hero4.jpg" width="100px" height="100%" alt="">
            <div class="hero-slider-content">
                <div class="hero-title text-center">
                    <h2>MAKE EVERYDAY SPARKEL WITH SILVER ESSENTIAL</h2>
                </div>
                <div class="hero-sub-title py-5 text-center">
                    <button class="btn-hero">WEDDING JEWELLERY</button>
                </div>
            </div>
          </div>
        </div>
        <div class="swiper-pagination"></div>
      </div>

      <!-- categories section -->
      <div class="container">
        <div class="cat-title mt-5">
            <h1>Brightning Silver</h1>
        </div>
        <div class="cat-sub-para mt-3">
            <p>Giving you a new silver</p>
        </div>
    </div>
    <div class="categories mt-5 mb-5">
        <div class="swiper catSlider">
            <div class="swiper-wrapper">
                @foreach ($categories as $category)
                    <div class="swiper-slide">
                        <div class="pendent-set">
                            @if($category->image)
                                <img class="cat-img" src="{{ asset('storage/uploads/categories/' . $category->image) }}" alt="{{ $category->name }}" loading="lazy">
                            @else
                                <img src="path/to/default-image.png" alt="{{ $category->name }}" loading="lazy">
                            @endif
                            <div class="cat-btn pt-4">
    <a href="{{ route('shop.category', ['category' => $category->name]) }}">
        <button class="cat-button">{{ $category->name }}</button>
    </a>
</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

     
      <!-- About Section -->

      <div class="container abt">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                <img src="./assets/images/About/abt-1.png" class="about-img" alt="Milira-About-Image" loading="lazy">
            </div>
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                <div class="about">
                    <div class="small-title">
                        <p>About Our Story</p>
                    </div>
                    <div class="abt-title py-4">
                        <h2>Crafting Timeless Elegance in Silver</h2>
                    </div>
                    <div class="abt-content py-3">
                        <p>At Milira, we believe that every piece of jewelry tells a story. Founded with a passion for craftsmanship and an eye for detail, Milira has been dedicated to creating exquisite silver jewelry that embodies timeless elegance and sophistication. Our journey began with a simple vision: to bring the beauty and charm of silver to the forefront of fashion, blending traditional artistry with contemporary designs.</p>
                    </div>
                    <div class="abt-btn py-3">
                        <button>About Us</button>
                    </div>
                </div>
            </div>
        </div>
      </div>

      <div class="container">
    <div class="cat-title mt-5">
        <h1>Collection</h1>
    </div>
    <div class="cat-sub-para mt-3">
        <p>Giving you a new silver</p>
    </div>
</div>
<div class="categories mt-5 mb-5">
    <div class="swiper catSlider">
        <div class="swiper-wrapper">
            @foreach ($collections as $collection)
                <div class="swiper-slide">
                    <div class="pendent-set">
                        @if ($collection->image)
                            <img class="cat-img" src="{{ asset('images/collections/' . $collection->image) }}" alt="{{ $collection->name }}" loading="lazy">
                        @else
                            <img src="{{ asset('path/to/default-image.png') }}" alt="{{ $collection->name }}" loading="lazy">
                        @endif
                        <div class="cat-btn pt-4">
                            <a href="{{ url('shop-collection-' . $collection->name) }}">
                                <button class="cat-button">{{ $collection->name }}</button>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
    <!-- End of about section -->

    <!-- Essential Section -->

   <div class="container essential">
        <div class="main-title pt-5">
            <h1>Essential</h1>
        </div>
        <div class="sub-para py-4">
            <p>At Milira, we believe that jewelry is not just an accessory, but a statement of individuality and elegance.</p>
        </div>
   </div>
   <div class="essential-images">
    <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
            <img class="esse-img" src="./assets/images/home/essential1.png" alt="Essential Images" loading="lazy">
            <div class="esse-btn">
                <a href="product-sidebar.html">
                    <button class="essential-shop">Shop Now</button>
                </a>
            </div>    
        </div>
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
            <img class="esse-img" src="./assets/images/home/essential2.png" alt="Essential Images" loading="lazy">
            <div class="esse-btn">
                <a href="product-sidebar.html">
                    <button class="essential-shop">Shop Now</button>
                </a>
            </div>
        </div>
    </div>
   </div>


    <!-- End of Essential Section -->

    <!-- product Categories -->

    

    <div class="container">
    <div class="main-title pt-5">
        <h1>Top Selling Products</h1>
    </div>
    <div class="sub-para py-3">
        <p>At Milira, we believe that jewelry is not just an accessory, but a statement of individuality and elegance.</p>
    </div>
    <div class="tab-nav-bar">
        <div class="tab-navigation">
            <div class="left-btn" name="chevron-back-outline">
                <i class="bi bi-chevron-left"></i>
            </div>
            <div class="right-btn" name="chevron-forward-outline">
                <i class="bi bi-chevron-right"></i>
            </div>

            <ul class="tab-menu">
                @foreach ($categories as $category)
                    <li class="tab-btn @if ($loop->first) active @endif" data-category="{{ Str::slug($category->name) }}">
                        {{ $category->name }}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="tab-content">
        @foreach ($categories as $category)
            @php
                $filteredProducts = $products->get($category->name);
            @endphp
            
            <div class="tab-pane fade @if ($loop->first) show active @endif" id="{{ Str::slug($category->name) }}" role="tabpanel" aria-labelledby="{{ Str::slug($category->name) }}-tab" tabindex="0">
                <div class="row">
                    @if($filteredProducts && $filteredProducts->isNotEmpty())
                        @foreach ($filteredProducts as $product)
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 mt-4">
                                <div class="card product">
                                    <div class="card-body">
                                        @if(!empty($product->images))
                                            <img src="{{ asset('storage/' . $product->images[0]) }}" alt="{{ $product->title }}" class="pdt-img">
                                        @endif
                                        <div class="card-hover">
                                            <div class="hover-icons text-center">
                                                <a href="#"><i class="bi bi-arrows-fullscreen"></i></a>
                                                <button class="wishlist-button {{ in_array($product->id, $wishlistProductIds) ? 'wishlisted' : '' }}" data-product-id="{{ $product->id }}">
    <i class="bi bi-heart{{ in_array($product->id, $wishlistProductIds) ? '-fill' : '' }}"></i>
</button>
                                                <a href="#"><i class="bi bi-arrow-repeat"></i></a>
                                            </div>
                                        </div>
                                        <div class="container">
                                            <div class="pdt-title">
                                                <h6>{{ $product->title }}</h6>
                                            </div>
                                            <div class="pdt-price">
                                                <h6>₹{{ number_format($product->price, 2) }}</h6>
                                            </div>
                                            <div class="pdt-rating mt-4">
                                                <p>
                                                    @for ($i = 0; $i < 5; $i++)
                                                        @if ($i < floor($product->averageRating()))
                                                            <i class="bi bi-star-fill"></i>
                                                        @elseif ($i < ceil($product->averageRating()))
                                                            <i class="bi bi-star-half"></i>
                                                        @else
                                                            <i class="bi bi-star"></i>
                                                        @endif
                                                    @endfor
                                                    <span>({{ $product->totalReviews() }} reviews)</span>
                                                </p>
                                            </div>
                                            <div class="pdt-shop text-center mt-5">
                                                <div class="row">
                                                <div class="col-9">
                                                            <button class="buy-now-btn" data-url="{{ url('shop/' . Str::slug($product->title, '-')) }}">View Product <i class="bi bi-bag-heart-fill"></i></button>
                                                        </div>
                                                    <div class="col-3">
    <button class="cart-btn add-to-cart-btn" data-id="{{ $product->id }}">
        <i class="bi bi-cart-check-fill"></i>
    </button>
</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        @endforeach
                    @else
                        <div class="col-12 text-center">
                            <p>No products found in this category.</p>
                        </div>
                    @endif
                </div>
                @if($filteredProducts && $filteredProducts->isNotEmpty())
                    <div class="shop-more text-center mt-5">
                        <a href="product-sidebar.html">
                            <button>Shop More</button>
                        </a>
                    </div>
                @endif
            </div>
        @endforeach
    </div>
</div>










<!-- End of product Categories -->

<!-- Custom jewellery -->

<div class="custom" style="background-image: url(./assets/images/hero/demo.jpg); background-position: center; object-fit: cover; background-repeat: no-repeat; height: 100%; margin-top: 100px;">
    <div class="container cust">
        <div class="main-title">
            <h1 class="text-white">CUSTOM YOUR JEWELRY NOW</h1>
        </div>
        <div class="sub-para mt-5">
            <p class="text-white">At Milira, we believe that jewelry is not just an accessory; it's an expression of your unique style and personality. That's why we offer our exclusive "Cousto Your Jewelry" service, designed to help you create one-of-a-kind silver pieces that reflect your individuality and tell your personal story.</p>
        </div>
    </div>
</div>
    <div class="container collections p-5">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 wo-men mt-5">
                <div class="women text-center">
                    <h1>women</h1>
                </div>
                <img src="./assets/images/home/women.png" height="90%" alt="" class="collection-img">
            </div>
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 wo-men mt-5">
                <div class="women text-center">
                    <h1>kids</h1>
                </div>
                <img src="./assets/images/home/kids.png" height="90%" alt="" class="collection-img">
            </div>
        </div>
    </div>

<!--End of Custom jewellery -->

<!-- Featured Products -->
<!-- Featured Products -->
<div class="container feature">
    <div class="main-title">
        <h1>Featured Products</h1>
    </div>
    <div class="sub-para py-4">
        <p>At Milira, we believe that jewelry is not just an accessory, but a statement of individuality and elegance.</p>
    </div>
    <div class="featureSlider">
        @foreach ($featuredProducts as $product)
            <div class="feature-img">
                <div class="card mx-3">
                    <div class="card-body">
                        @if($product->images && count($product->images) > 0)
                            <img src="{{ asset('storage/' . $product->images[0]) }}" alt="{{ $product->title }}" loading="lazy">
                        @else
                            <img src="path/to/default-product-image.png" alt="{{ $product->title }}" loading="lazy">
                        @endif
                        <div class="container">
                            <div class="f-title">
                                <h6>{{ $product->title }}</h6>
                            </div>
                            <div class="f-price">
                                <h6>₹{{ $product->price }}</h6>
                            </div>
                            <div class="f-button">
                                <button class="cart-btn add-to-cart-btn" data-id="{{ $product->id }}">Add to Cart <i class="bi bi-cart-check-fill"></i></button>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
<!-- End of Featured Products -->


 <div class="container testimonial">
    <div class="main-title">
        <h1>Testimonial</h1>
    </div>
    <div class="sub-para py-3">
        <p>Here is What Our Client Says</p>
    </div>
    <div class="row mt-5">
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
            <div class="testimonial-card">
                <div class="testimonial-content mt-3">
                    <p><i class="bi bi-quote"></i></p>
                    <p class="client-says py-3">At Milira, we believe that jewelry is not just an accessory, but a statement of individuality and elegance. At Milira, we believe that jewelry is not just an accessory, but a statement of individuality and elegance. At Milira, we believe that jewelry is not just an accessory, but a statement of individuality and elegance.</p>
                    <p class="client-name py-3">
                        Vignesh Thiruppathi
                    </p>
                    <p class="client-description">
                        Web Developer
                    </p>
                </div>
                <div class="testimonial-content mt-3">
                    <p><i class="bi bi-quote"></i></p>
                    <p class="client-says py-3">At Milira, we believe that jewelry is not just an accessory, but a statement of individuality and elegance. At Milira, we believe that jewelry is not just an accessory, but a statement of individuality and elegance. At Milira, we believe that jewelry is not just an accessory, but a statement of individuality and elegance.</p>
                    <p class="client-name py-3">
                        Karthikesan
                    </p>
                    <p class="client-description">
                        Multimedia Designer
                    </p>
                </div>
                <div class="testimonial-content mt-3">
                    <p><i class="bi bi-quote"></i></p>
                    <p class="client-says py-3">At Milira, we believe that jewelry is not just an accessory, but a statement of individuality and elegance. At Milira, we believe that jewelry is not just an accessory, but a statement of individuality and elegance. At Milira, we believe that jewelry is not just an accessory, but a statement of individuality and elegance.</p>
                    <p class="client-name py-3">
                        Sudhir M.G
                    </p>
                    <p class="client-description">
                        Founder & CEO
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                <div class="testi-img">
                    <img src="./assets/images/home/testimonial.png" alt="testimonial-images" width="100%">
                </div>

        </div>
    </div>
 </div>

<!---------------------- End of Testimonial ---------------------->

<!---------------------- Newsletter ---------------------->
<div class="container newsletter">
    <div class="news-content">
        <div class="row">
            <div class="col-xl-6 col-lg-8 col-md-12 col-sm-12">
                <div class="news-title">
                    <h1 class="text-white">Get in Signup With Our newsletter</h1>
                </div>
                <div class="news-para py-5">
                    <p class="text-white">Stay Tuned for more updates and more discounts with our Milira</p>
                </div>
                <div class="news-form">
                    <form action="">
                        <input class="news-mail" type="email" name="email" id="email" placeholder="Email Address">
                        <div class="sub-btn text-end">
                            <button type="submit"><i class="bi bi-send"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-xl-6 col-lg-4 col-md-12 col-sm-12">

            </div>
        </div>
    </div>
</div>

<!---------------------- End of Newsletter ---------------------->
<div class="container mt-5">
    <div class="coupon-popup" id="couponPopup">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                <img class="popup-img" src="./assets/images/hero/pop2.jpg" alt="">
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                <div class="popup-close text-end p-3">
                    <i class="bi bi-x-circle" onclick="closePopup()"></i>
                </div>
                <div class="c-content">
                    <div class="pop-title">
                        <h1>Milira</h1>
                    </div>
                    <div class="pop-content mt-2">
                        <p>Join the Squad</p>
                    </div>
                    <div class="p-content text-center mt-3">
                        <p>Copy the coupon code for the exclusive discounts</p>
                    </div>
                    <div class="coupon-form text-center mt-5">
                        <form action="javascript:void(0);">
                            <input type="text" id="cuponCode" name="cuponCode" class="cupon-input" value="DISCOUNT2024">
                            <button type="copy" onclick="copyCouponCode()">Copy</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-----------------------Footer --------------------------------->
@include('footer')

    <script src="{{ asset('assets/js/jquery_3.7.1.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/js/nouislider.min.js') }}"></script>
    <script src="{{ asset('assets/js/aos-3.0.0.js') }}"></script>
    <script src="{{ asset('assets/js/swiper10-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/shopus.js') }}"></script>
    <script>
        var swiper = new Swiper(".mySwiper", {
            centeredSlides: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>
    <script>
        var swiper = new Swiper(".catSlider", {
            centeredSlides: false,
            slidesPerView: 5,
            spaceBetween:5,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            breakpoints: {
                320: {
                    slidesPerView: 2,
                },
                550: {
                    slidesPerView: 2,
                },
                992: {
                    slidesPerView: 3,
                },
                1200: {
                    slidesPerView: 4,
                },
                1399: {
                    slidesPerView: 5,
                },
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/3.4.1/jquery-migrate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.featureSlider').slick({});
        });
    </script>
    <script>
        $('.featureSlider').slick({
            dots: true,
            infinite: true,
            autoplay: false,
            speed: 300,
            slidesToShow: 3,
            slidesToScroll: 1,
            responsive: [
                {
                    breakpoint: 1199,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    </script>
    <script>
        $('.testimonial-card').slick({
            dots: false,
            infinite: false,
            autoplay: true,
            speed: 300,
            slidesToShow: 1,
            slidesToScroll: 1,
            responsive: [
                {
                    breakpoint: 1199,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: false
                    }
                },
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: false
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    </script>
      <script>
    function toggleDropdown() {
        var dropdown = document.getElementById('userDropdown');
        if (dropdown.style.display === 'none' || dropdown.style.display === '') {
            dropdown.style.display = 'block';
        } else {
            dropdown.style.display = 'none';
        }
    }

    // Close the dropdown if the user clicks outside of it
    window.onclick = function(event) {
        if (!event.target.matches('svg')) {
            var dropdown = document.getElementById('userDropdown');
            if (dropdown.style.display === 'block') {
                dropdown.style.display = 'none';
            }
        }
    }
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Get all tab buttons and tab contents
        const tabButtons = document.querySelectorAll('.tab-btn');
        const tabPanes = document.querySelectorAll('.tab-pane');

        tabButtons.forEach(button => {
            button.addEventListener('click', function () {
                // Remove active class from all tab buttons and tab panes
                tabButtons.forEach(btn => btn.classList.remove('active'));
                tabPanes.forEach(pane => pane.classList.remove('show', 'active'));

                // Add active class to the clicked button and its corresponding tab pane
                const category = this.getAttribute('data-category');
                this.classList.add('active');
                document.getElementById(category).classList.add('show', 'active');
            });
        });
    });
</script>
<script>
    $(document).ready(function () {
        function rebindWishlistButtons() {
            $('.wishlist-button').off('click').on('click', function () {
                const productId = $(this).data('product-id');
                const button = $(this); // Cache this button

                fetch(`/wishlist/toggle/${productId}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({ productId })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        if (data.inWishlist) {
                            button.addClass('wishlisted');
                            button.find('i').removeClass('bi-heart').addClass('bi-heart-fill');
                        } else {
                            button.removeClass('wishlisted');
                            button.find('i').removeClass('bi-heart-fill').addClass('bi-heart');
                        }
                        $('#wishlist-item-count').text(data.wishlistCount);
                    }
                })
                .catch(error => console.error('Error:', error));
            });
        }

        // Initial binding for wishlist buttons
        rebindWishlistButtons();
    });
</script>
<script>
    $(document).ready(function () {
    function updateCart(cartCount, cart, subtotal) {
        $('#cart-item-count').text(cartCount);
        $('#cart-subtotal').text('₹' + subtotal);
        var cartHtml = '';
        for (const [productId, item] of Object.entries(cart)) {
            cartHtml += `
                <div class="wrapper" data-id="${productId}">
                    <div class="wrapper-item">
                        <div class="wrapper-img">
                            <img src="/storage/uploads/${item.name}_0.jpg" alt="img">
                        </div>
                        <div class="wrapper-content">
                            <h5 class="wrapper-title">${item.name}</h5>
                            <div class="price">
                                <p class="new-price">₹${item.price}</p>
                            </div>
                            <div class="quantity">
                                Qty: ${item.quantity}
                            </div>
                        </div>
                        
                        <span class="close-btn" data-id="${productId}">
                            <svg viewBox="0 0 10 10" fill="none" class="fill-current" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.7 0.3C9.3 -0.1 8.7 -0.1 8.3 0.3L5 3.6L1.7 0.3C1.3 -0.1 0.7 -0.1 0.3 0.3C-0.1 0.7 -0.1 1.3 0.3 1.7L3.6 5L0.3 8.3C-0.1 8.7 -0.1 9.3 0.3 9.7C0.7 10.1 1.3 10.1 1.7 9.7L5 6.4L8.3 9.7C8.7 10.1 9.3 10.1 9.7 9.7C10.1 9.3 10.1 8.7 9.7 8.3L6.4 5L9.7 1.7C10.1 1.3 10.1 0.7 9.7 0.3Z"></path>
                            </svg>
                        </span>
                    </div>
                </div>
            `;
        }
        $('#cart-wrapper-item').html(cartHtml);
        rebindCloseButtons();
    }

    $('.add-to-cart-btn').off('click').on('click', function () {
        var productId = $(this).data('id');
        var quantity = parseInt($('#productQuantity').val(), 10) || 1;

        $.ajax({
            url: '{{ route("cart.add") }}',
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                product_id: productId,
                quantity: quantity
            },
            success: function (response) {
                updateCart(response.cartCount, response.cart, response.subtotal);
            },
            error: function (response) {
                if (response.status === 401) {
                    window.location.href = '{{ route("login") }}';
                } 
            }
        });
    });

    $('.buy-now-btn').on('click', function () {
        var url = $(this).data('url');
        window.location.href = url;
    });

    function rebindCloseButtons() {
        $('.close-btn').off('click').on('click', function () {
            var productId = $(this).data('id');

            $.ajax({
                url: '{{ route("cart.remove") }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    product_id: productId
                },
                success: function (response) {
                    updateCart(response.cartCount, response.cart, response.subtotal);
                },
                error: function (response) {
                    if (response.status === 401) {
                        window.location.href = '{{ route("login") }}';
                    }
                }
            });
        });
    }

    function filterProducts() {
        let selectedCategories = [];
        $('.category-checkbox:checked').each(function () {
            selectedCategories.push($(this).val());
        });

        let selectedCollections = [];
        $('.collection-checkbox:checked').each(function () {
            selectedCollections.push($(this).val());
        });

        $.ajax({
            url: '{{ route('shop.filterByCategory') }}',
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                categories: selectedCategories,
                collections: selectedCollections // Send collections to the backend
            },
            success: function (response) {
                $('#product-list').empty();
                response.products.forEach(product => {
                    $('#product-list').append(`
                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 mt-4 product-card" data-category="${product.category}">
                            <div class="card product">
                                <div class="card-body">
                                    <img src="/storage/uploads/${product.title}_0.jpg" alt="" class="pdt-img">
                                    <div class="card-hover">
                                        <div class="hover-icons text-center">
                                            <a href="#"><i class="bi bi-arrows-fullscreen"></i></a>
                                            <button class="wishlist-button ${product.in_wishlist ? 'wishlisted' : ''}" data-product-id="${product.id}">
                                                <i class="bi bi-heart${product.in_wishlist ? '-fill' : ''}"></i>
                                            </button>
                                            <a href="#"><i class="bi bi-arrow-repeat"></i></a>
                                        </div>
                                    </div>
                                    <div class="container">
                                        <div class="pdt-title">
                                            <h6>${product.title}</h6>
                                        </div>
                                        <div class="pdt-price">
                                            <h6>${product.price}</h6>
                                        </div>
                                        <div class="pdt-rating mt-4">
                                            <p>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-half"></i>
                                                <span>(${product.reviews} reviews)</span>
                                            </p>
                                        </div>
                                        <div class="pdt-shop text-center mt-5">
                                            <div class="row">
                                                <div class="col-9">
                                                    <button class="buy-now-btn" data-url="/shop/${product.title.replace(/\s+/g, '-')}">Buy Now <i class="bi bi-bag-heart-fill"></i></button>
                                                </div>
                                                <div class="col-3">
                                                    <button class="add-to-cart-btn" data-id="${product.id}"><i class="bi bi-cart-check-fill"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `);
                });

                rebindEventHandlers();
            }
        });
    }

    function rebindEventHandlers() {
        $('.add-to-cart-btn').off('click').on('click', function () {
            var productId = $(this).data('id');
            var quantity = parseInt($('#productQuantity').val(), 10) || 1;

            $.ajax({
                url: '{{ route("cart.add") }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    product_id: productId,
                    quantity: quantity
                },
                success: function (response) {
                    updateCart(response.cartCount, response.cart, response.subtotal);
                },
                error: function (response) {
                    if (response.status === 401) {
                        window.location.href = '{{ route("login") }}';
                    } 
                }
            });
        });

        $('.wishlist-button').off('click').on('click', function () {
            const productId = $(this).data('product-id');
            const isWishlisted = $(this).hasClass('wishlisted');

            fetch(`/wishlist/toggle/${productId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ productId })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        if (isWishlisted) {
                            $(this).removeClass('wishlisted');
                            $(this).find('i').removeClass('bi-heart-fill').addClass('bi-heart');
                        } else {
                            $(this).addClass('wishlisted');
                            $(this).find('i').removeClass('bi-heart').addClass('bi-heart-fill');
                        }
                        $('#wishlist-item-count').text(data.wishlistCount);
                        $('#wishlist-circle').css('fill', data.wishlistCount > 0 ? 'red' : '#000');
                    }
                });
        });

        $('.close-btn').off('click').on('click', function () {
            var productId = $(this).data('id');

            $.ajax({
                url: '{{ route("cart.remove") }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    product_id: productId
                },
                success: function (response) {
                    updateCart(response.cartCount, response.cart, response.subtotal);
                },
                error: function (response) {
                    if (response.status === 401) {
                        window.location.href = '{{ route("login") }}';
                    }
                }
            });
        });
    }

    $('.category-checkbox').change(filterProducts);
    $('.collection-checkbox').change(filterProducts);
    
    rebindCloseButtons();
    rebindEventHandlers();
});

        </script>

<script>
  // Show the popup 2 seconds after the page loads
  window.onload = function() {
    setTimeout(function() {
      document.getElementById('couponPopup').style.display = 'block';
    }, 2000);
  };

  // Function to close the popup
  function closePopup() {
    document.getElementById('couponPopup').style.display = 'none';
  }

  // Function to copy the coupon code
  function copyCouponCode() {
    var couponCode = document.getElementById('cuponCode');
    couponCode.select();
    couponCode.setSelectionRange(0, 99999); /* For mobile devices */
    document.execCommand("copy");
    alert("Coupon code copied: " + couponCode.value);
  }
</script>
</body>

</html>
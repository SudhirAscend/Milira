 <!--------------- header-section --------------->
 <style>
    .header-search {
    position: relative; /* Make sure the search results are positioned relative to this container */
}

.search-results {
    display: none;
    margin-top: 250px;
    position: absolute;
    background: white;
    border: 1px solid #ccc;
    width: 100%; /* Make it the same width as the search input */
    max-height: 200px; /* Optional: Limit the height and add a scrollbar for long lists */
    overflow-y: auto;  /* Scrollbar if the list is too long */
    z-index: 1000;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); /* Optional: Add a subtle shadow */
}

.search-results ul {
    margin: 0;
    padding: 0;
    list-style: none;
}

.search-results li {
    padding: 10px;
    border-bottom: 1px solid #eee;
}

.search-results a {
    display: block;
    color: #333;
    text-decoration: none;
}

.search-results a:hover {
    background-color: #f1f1f1;
}

@media(max-width: 500px) {
    .sticky {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    z-index: 1000;
}

}


     
    
    .loginclr.active {
        background-color: #000; /* Darker blue */
        color: #fff !important;
    }
    .signup.active {
        background-color: #000; /* Darker gray */
        color: #fff;
    }



</style>
 <header id="header" class="header">
        <div class="header-top-section" id="headerTop">
            <div class="container">
                <div class="header-top">
                    <div class="header-profile">
                        <a href="user-profile.html"><span>Account</span></a>
                        <a href="order.html"><span>Track Order</span></a>
                        <a href="faq.html"><span>Support</span></a>
                    </div>
                    <div class="header-contact d-none d-lg-block">
                        <a href="#">
                            <span>Need help? Call us:</span>
                            <span class="contact-number">+ 00645 4568</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-center-section d-none d-lg-block">
            <div class="container">
                <div class="header-center">
                    <div class="logo">
                        <a href="/">
                            <img src="../assets/images/logos/Milira-Logo.png" width="50%" alt="logo">
                        </a>
                    </div>
                    <div class="header-cart-items">
                    <div class="header-search">
    <input type="search" name="search" id="search-input" class="input-search" placeholder="Search Here" autocomplete="off">
    <button class="search-btn" type="submit"><i class="bi bi-search"></i></button>
    <div id="search-results" class="search-results"></div>
</div>
                       <!--  <div class="header-compaire">
                            <a href="compaire.html" class="cart-item">
                                <span>
                                    <svg width="34" height="27" viewBox="0 0 34 27" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M22 16.0094C21.997 22.0881 17.0653 27.007 10.9802 27C4.90444 26.9931 -0.00941233 22.0569 1.3538e-05 15.9688C0.00943941 9.89602 4.95157 4.98663 11.0422 5.00003C17.0961 5.01342 22.003 9.94315 22 16.0094ZM6.16553 15.7812C6.40365 12.6236 8.72192 11.2861 10.5868 11.1993C12.3305 11.1179 14.4529 12.3353 14.7465 13.6143C14.2425 13.6143 13.7459 13.6143 13.2429 13.6143C13.2429 14.0241 13.2429 14.3986 13.2429 14.7975C14.308 14.7975 15.3374 14.8064 16.3668 14.793C16.7805 14.7876 17.0102 14.5291 17.0147 14.1005C17.0221 13.3414 17.0172 12.5824 17.0172 11.8234C17.0172 11.558 17.0172 11.2925 17.0172 11.0311C16.5836 11.0311 16.2165 11.0311 15.7908 11.0311C15.7908 11.6046 15.7908 12.1572 15.7908 12.7937C13.9379 10.0444 10.8447 9.4545 8.48578 10.4824C6.21811 11.4706 4.90792 13.847 5.04682 15.7817C5.40997 15.7812 5.77609 15.7812 6.16553 15.7812ZM15.8191 16.2178C15.7581 17.4576 15.3498 18.547 14.4742 19.4286C13.5976 20.3111 12.5265 20.772 11.2858 20.8008C9.57472 20.8405 7.568 19.6424 7.2495 18.3892C7.75403 18.3892 8.25013 18.3892 8.76012 18.3892C8.76012 17.9809 8.76012 17.6064 8.76012 17.2041C7.68458 17.2041 6.64178 17.1921 5.59997 17.21C5.19962 17.2169 5.00069 17.4839 4.99771 17.9442C4.99176 18.803 4.99573 19.6612 4.99573 20.52C4.99573 20.6698 4.99573 20.8196 4.99573 20.964C5.4318 20.964 5.79692 20.964 6.20224 20.964C6.20224 20.3895 6.20224 19.8418 6.20224 19.1686C7.07984 20.4912 8.16976 21.3465 9.58216 21.7617C11.0184 22.1839 12.4114 22.0494 13.7548 21.4035C15.8191 20.4113 17.0946 18.1466 16.9507 16.2178C16.5861 16.2178 16.2209 16.2178 15.8191 16.2178Z"
                                            fill="#6E6D79" />
                                        <path
                                            d="M6.16568 15.7814C5.77624 15.7814 5.41062 15.7814 5.04648 15.7814C4.90757 13.8471 6.21777 11.4703 8.48543 10.482C10.8444 9.45411 13.9376 10.044 15.7905 12.7934C15.7905 12.1569 15.7905 11.6042 15.7905 11.0307C16.2161 11.0307 16.5833 11.0307 17.0168 11.0307C17.0168 11.2917 17.0168 11.5571 17.0168 11.823C17.0168 12.582 17.0218 13.341 17.0144 14.1001C17.0104 14.5287 16.7802 14.7877 16.3665 14.7926C15.3371 14.8055 14.3076 14.7971 13.2425 14.7971C13.2425 14.3982 13.2425 14.0237 13.2425 13.6139C13.7451 13.6139 14.2417 13.6139 14.7462 13.6139C14.4525 12.3355 12.3302 11.118 10.5864 11.1989C8.72207 11.2862 6.4038 12.6237 6.16568 15.7814Z"
                                            fill="white" />
                                        <path
                                            d="M15.8191 16.2178C16.2209 16.2178 16.5865 16.2178 16.9502 16.2178C17.094 18.1466 15.8186 20.4108 13.7543 21.4035C12.4109 22.0494 11.0178 22.1834 9.58161 21.7617C8.16971 21.3469 7.07978 20.4912 6.20169 19.1686C6.20169 19.8418 6.20169 20.3895 6.20169 20.9639C5.79687 20.9639 5.43125 20.9639 4.99518 20.9639C4.99518 20.8201 4.99518 20.6703 4.99518 20.5199C4.99518 19.6612 4.99121 18.8029 4.99716 17.9442C5.00014 17.4838 5.19907 17.2169 5.59943 17.21C6.64173 17.1916 7.68403 17.204 8.75957 17.204C8.75957 17.6064 8.75957 17.9809 8.75957 18.3892C8.25008 18.3892 7.75348 18.3892 7.24895 18.3892C7.56794 19.6428 9.57466 20.8404 11.2852 20.8007C12.526 20.772 13.597 20.3111 14.4736 19.4285C15.3492 18.547 15.758 17.457 15.8191 16.2178Z"
                                            fill="white" />
                                        <circle cx="25.9322" cy="8" r="8" fill="#000" />
                                        <path
                                            d="M26.012 13.1392C25.3292 13.1392 24.7194 13.0215 24.1825 12.7862C23.6488 12.5509 23.2263 12.2244 22.9147 11.8068C22.6065 11.3859 22.4407 10.8987 22.4175 10.3452H23.9786C23.9985 10.6468 24.0996 10.9086 24.2819 11.1307C24.4675 11.3494 24.7094 11.5185 25.0077 11.6378C25.306 11.7571 25.6375 11.8168 26.0021 11.8168C26.4031 11.8168 26.7577 11.7472 27.066 11.608C27.3775 11.4687 27.6211 11.2749 27.7968 11.0263C27.9725 10.7744 28.0603 10.4844 28.0603 10.1562C28.0603 9.81487 27.9725 9.51491 27.7968 9.25639C27.6245 8.99455 27.3709 8.78906 27.0361 8.63991C26.7047 8.49077 26.3037 8.41619 25.833 8.41619H24.9729V7.16335H25.833C26.2109 7.16335 26.5423 7.09541 26.8273 6.95952C27.1157 6.82363 27.3411 6.63471 27.5035 6.39276C27.6659 6.14749 27.7471 5.8608 27.7471 5.53267C27.7471 5.2178 27.6758 4.94437 27.5333 4.71236C27.3941 4.47704 27.1952 4.29309 26.9367 4.16051C26.6815 4.02794 26.3799 3.96165 26.0319 3.96165C25.7004 3.96165 25.3906 4.02296 25.1022 4.1456C24.8172 4.26491 24.5852 4.43726 24.4062 4.66264C24.2272 4.88471 24.1311 5.15151 24.1178 5.46307H22.6313C22.6479 4.91288 22.8103 4.42898 23.1185 4.01136C23.4301 3.59375 23.8411 3.26728 24.3515 3.03196C24.8619 2.79664 25.4287 2.67898 26.0518 2.67898C26.7047 2.67898 27.2682 2.80658 27.7421 3.06179C28.2194 3.31368 28.5873 3.65009 28.8458 4.07102C29.1076 4.49195 29.2369 4.95265 29.2336 5.45312C29.2369 6.0232 29.0778 6.5071 28.7563 6.90483C28.4381 7.30256 28.0139 7.56937 27.4836 7.70526V7.7848C28.1597 7.88755 28.6834 8.15601 29.0546 8.5902C29.4291 9.02438 29.6147 9.56297 29.6114 10.206C29.6147 10.7661 29.459 11.2682 29.1441 11.7124C28.8326 12.1565 28.4067 12.5062 27.8664 12.7614C27.3262 13.0133 26.708 13.1392 26.012 13.1392Z"
                                            fill="#F9FFFB" />
                                    </svg>

                                </span>
                                <span class="cart-text ">
                                    Compaire
                                </span>
                            </a>
                        </div> -->
                        <div class="header-favourite">
                                <a href="wishlist.html" class="cart-item">
                                <span class="wishlist-count" id="wishlist-item-count">{{ $wishlistCount }}</span>
                                    <span>
                                    
                                        <svg width="35" height="27" viewBox="0 0 35 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11.4047 8.54989C11.6187 8.30247 11.8069 8.07783 12.0027 7.86001C15.0697 4.45162 20.3879 5.51717 22.1581 9.60443C23.4189 12.5161 22.8485 15.213 20.9965 17.6962C19.6524 19.498 17.95 20.9437 16.2722 22.4108C15.0307 23.4964 13.774 24.5642 12.5246 25.6408C11.6986 26.3523 11.1108 26.3607 10.2924 25.6397C8.05177 23.6657 5.79225 21.7125 3.59029 19.6964C2.35865 18.5686 1.33266 17.2553 0.638823 15.7086C-0.626904 12.8872 0.0324709 9.41204 2.22306 7.41034C4.84011 5.01855 8.81757 5.36918 11.1059 8.19281C11.1968 8.30475 11.2907 8.41404 11.4047 8.54989Z" fill="#6E6D79" />
                                            
                                    
                                            <path d="M26.846 13.1392C26.1632 13.1392 25.5534 13.0215 25.0164 12.7862C24.4828 12.5509 24.0602 12.2244 23.7487 11.8068C23.4404 11.3859 23.2747 10.8987 23.2515 10.3452H24.8126C24.8325 10.6468 24.9336 10.9086 25.1159 11.1307C25.3015 11.3494 25.5434 11.5185 25.8417 11.6378C26.14 11.7571 26.4715 11.8168 26.836 11.8168C27.2371 11.8168 27.5917 11.7472 27.9 11.608C28.2115 11.4687 28.4551 11.2749 28.6308 11.0263C28.8065 10.7744 28.8943 10.4844 28.8943 10.1562C28.8943 9.81487 28.8065 9.51491 28.6308 9.25639C28.4584 8.99455 28.2049 8.78906 27.8701 8.63991C27.5387 8.49077 27.1377 8.41619 26.667 8.41619H25.8069V7.16335H" fill="#F9FFFB" />
                                        </svg>
                                        </span>
                                    <span class="cart-text">Wishlist</span>
                                </a>
                    </div>
                    <div class="header-cart">
    <a href="{{ route('cart.index') }}" class="cart-item">
        <span class="cartcount" id="cart-item-count">{{ $cartCount }}</span>
        <span>
            <svg width="35" height="28" viewBox="0 0 35 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M16.4444 21.897C14.8444 21.897 13.2441 21.8999 11.6441 21.8963C9.79233 21.892 8.65086 21.0273 8.12595 19.2489C7.04294 15.5794 5.95756 11.9107 4.87166 8.24203C4.6362 7.4468 4.37783 7.25412 3.55241 7.25175C2.7786 7.24964 2.00507 7.25754 1.23127 7.24911C0.512247 7.24148 0.0157813 6.79109 0.000242059 6.15064C-0.0160873 5.48281 0.475637 5.01689 1.23232 5.00873C2.11121 4.99952 2.99089 4.99214 3.86951 5.01268C5.36154 5.04769 6.52014 5.93215 6.96393 7.35415C7.14171 7.92378 7.34055 8.49026 7.46382 9.07201C7.54968 9.47713 7.77881 9.49661 8.10566 9.49582C11.8335 9.48897 15.5611 9.49134 19.2889 9.49134C21.0825 9.49134 22.8761 9.48108 24.6694 9.49503C26.0848 9.50608 27.0907 10.4906 27.0156 11.7778C27.0006 12.0363 26.925 12.2958 26.8473 12.5457C26.1317 14.8411 25.4124 17.1351 24.6879 19.4279C24.1851 21.0186 23.0223 21.8826 21.3504 21.8944C19.7151 21.906 18.0797 21.897 16.4444 21.897Z" fill="#6E6D79"/>
                                    <path d="M12.4012 27.5161C11.167 27.5227 10.1488 26.524 10.1345 25.2928C10.1201 24.0419 11.1528 22.9982 12.3967 23.0066C13.6209 23.0151 14.6422 24.0404 14.6436 25.2623C14.6451 26.4855 13.6261 27.5095 12.4012 27.5161Z" fill="#6E6D79"/>
                                    <path d="M22.509 25.2393C22.5193 26.4842 21.5393 27.4971 20.3064 27.5155C19.048 27.5342 18.0272 26.525 18.0277 25.2622C18.0279 24.0208 19.0214 23.0161 20.2572 23.0074C21.4877 22.9984 22.4988 24.0006 22.509 25.2393Z" fill="#6E6D79"/>
            </svg>
        </span>
        <span class="cart-text">Cart</span>
    </a>
    <div class="cart-submenu">
        <div class="cart-wrapper-item" id="cart-wrapper-item">
            @foreach ($cartItems as $cartItem)
                <div class="wrapper" data-id="{{ $cartItem->product_id }}">
                    <div class="wrapper-item">
                        <div class="wrapper-img">
                            <img src="{{ asset('storage/uploads/' . $cartItem->product->title . '_0.jpg') }}" alt="img">
                        </div>
                        <div class="wrapper-content">
                            <h5 class="wrapper-title">{{ $cartItem->product->title }}</h5>
                            <div class="price">
                                <p class="new-price">₹{{ $cartItem->product->price }}</p>
                            </div>
                        </div>
                        <span class="close-btn" data-id="{{ $cartItem->product_id }}">
                            <svg viewBox="0 0 10 10" fill="none" class="fill-current" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.7 0.3C9.3 -0.1 8.7 -0.1 8.3 0.3L5 3.6L1.7 0.3C1.3 -0.1 0.7 -0.1 0.3 0.3C-0.1 0.7 -0.1 1.3 0.3 1.7L3.6 5L0.3 8.3C-0.1 8.7 -0.1 9.3 0.3 9.7C0.7 10.1 1.3 10.1 1.7 9.7L5 6.4L8.3 9.7C8.7 10.1 9.3 10.1 9.7 9.7C10.1 9.3 10.1 8.7 9.7 8.3L6.4 5L9.7 1.7C10.1 1.3 10.1 0.7 9.7 0.3Z"></path>
                            </svg>
                        </span>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="cart-wrapper-section">
            <div class="wrapper-line"></div>
            <div class="wrapper-subtotal">
                <h5 class="wrapper-title">Subtotal</h5>
                <h5 class="wrapper-title" id="cart-subtotal">₹{{ $subtotal }}</h5>
            </div>
            <div class="cart-btn">
                <a href="{{ route('cart.index') }}" class="shop-btn view-btn">View Cart</a>
                <form method="POST" action="{{ route('cart.checkout') }}">
                    @csrf
                    <button type="submit" class="shop-btn checkout-btn">Checkout Now</button>
                </form>
            </div>
        </div>
    </div>
</div>


                        <div class="header-user">
                        @guest
                           <span >
                           <button class="d-flex" id="auth-switch">
                                <a href="/login" class="loginclr active" onclick="changeBackground('login', event)">Login</a>
                                <a href="/signup" class="signup" onclick="changeBackground('signup', event)">Signup</a>
                            </button>
                           </span>
                        @endguest

                        @auth
                            <div class="dropdown">
                                <span style="display: flex; align-items: center;" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="fill-current" style="fill: black; margin-right: 5px;">
                                        <path fill="none" d="M0 0h24v24H0z"></path>
                                        <path d="M20 22H4v-2a5 5 0 0 1 5-5h6a5 5 0 0 1 5 5v2zm-8-9a6 6 0 1 1 0-12 6 6 0 0 1 0 12z"></path>
                                    </svg>
                                    <p style="margin: 0; width: 100px;">Hi, {{ Auth::user()->full_name }}</p>
                                </span>
                                <ul class="dropdown-menu" aria-labelledby="userDropdown">
                                    <li><a class="dropdown-item" href="{{ route('profile') }}">Profile</a></li>
                                    <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                                </ul>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <nav class="mobile-menu d-block d-lg-none">
            <div class="mobile-menu-header d-flex justify-content-between align-items-center">
                <button class="" type="button" data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop" aria-controls="staticBackdrop">
                    <span>
                        <svg width="14" height="9" viewBox="0 0 14 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="14" height="1" fill="#1D1D1D" />
                            <rect y="8" width="14" height="1" fill="#1D1D1D" />
                            <rect y="4" width="10" height="1" fill="#1D1D1D" />
                        </svg>
                    </span>
                </button>
                <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="static" tabindex="-1" id="staticBackdrop" aria-labelledby="staticBackdropLabel">
                    <div class="offcanvas-header">
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                    <div class="mob-logo text-center py-3">
                        <a href="/">
                            <img src="../assets/images/logos/Milira-Logo.png" width="70%" alt="logo">
                        </a>
                    </div>
                    <div class="mobile-navigation mt-4">
                        <ul class="mobile-navitems">
                            <li class="mob-litems"><a href="/">Home</a></li>
                            <li class="mob-litems"><a href="/">About</a></li>
                            <li class="mob-litems" data-bs-toggle="dropdown">
                                <a href="/">Shop By Collection <i class="bi bi-caret-down-fill"></i></a>
                                <div class="dropdown-menu">
                                    <div class="row">
                                        <h6>Women</h6>
                                        <ul>
                                        <li><a class="dropdown-item" href="#">All Collection</a></li>
                                        <li><a class="dropdown-item" href="#">Everyday Essential</a></li>
                                        <li><a class="dropdown-item" href="#">Pastel Beauty</a></li>
                                        <li><a class="dropdown-item" href="#">Butterfly Bream</a></li>
                                        <li><a class="dropdown-item" href="#">Heart of Hearts</a></li>
                                        <li><a class="dropdown-item" href="#">Geminaire</a></li>
                                        </ul>
                                    </div>
                                    <div class="row">
                                        <h6>Mens</h6>
                                        <ul>
                                        <li><a class="dropdown-item" href="#">All Collection</a></li>
                                        <li><a class="dropdown-item" href="#">Everyday Essential</a></li>
                                        <li><a class="dropdown-item" href="#">Pastel Beauty</a></li>
                                        <li><a class="dropdown-item" href="#">Butterfly Bream</a></li>
                                        <li><a class="dropdown-item" href="#">Heart of Hearts</a></li>
                                        <li><a class="dropdown-item" href="#">Geminaire</a></li>
                                        </ul>
                                    </div>
                                    <div class="row">
                                        <h6>Kids</h6>
                                        <ul>
                                        <li><a class="dropdown-item" href="#">All Collection</a></li>
                                        <li><a class="dropdown-item" href="#">Everyday Essential</a></li>
                                        <li><a class="dropdown-item" href="#">Pastel Beauty</a></li>
                                        <li><a class="dropdown-item" href="#">Butterfly Bream</a></li>
                                        <li><a class="dropdown-item" href="#">Heart of Hearts</a></li>
                                        <li><a class="dropdown-item" href="#">Geminaire</a></li>
                                        </ul>
                                    </div>
                                   
                                    
                                    
                                </div>
                            </li>
                            <li class="mob-litems">
                                <a href="/" data-bs-toggle="dropdown">All Categories <i class="bi bi-caret-down-fill"></i></a>
                                <div class="dropdown-menu">
                                    <div class="row">
                                        <ul>
                                            <li><a class="dropdown-item" href="#">Pendent Set</a></li>
                                            <li><a class="dropdown-item" href="#">Chain</a></li>
                                            <li><a class="dropdown-item" href="#">Stud</a></li>
                                            <li><a class="dropdown-item" href="#">Earrings</a></li>
                                            <li><a class="dropdown-item" href="#">Bracelet</a></li>
                                            <li><a class="dropdown-item" href="#">Necklace</a></li>
                                        </ul>
                                    </div>
                                </div>        
                            </li>
                            <li class="mob-litems"><a href="/">Contact</a></li>
                        </ul>
                    </div>
                  <div class="request">
                    <a href="/">
                        <button>Request Product</button>
                    </a>
                  </div>
                    </div>
                </div>
                <a href="index.html" class="mobile-header-logo text-center">
                    <img src="./assets/images/logos/milira-logo.svg" width="50%" alt="logo">
                </a>
                <a href="cart.html" class="header-cart cart-item">
                    <span>
                        <svg width="35" height="28" viewBox="0 0 35 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M16.4444 21.897C14.8444 21.897 13.2441 21.8999 11.6441 21.8963C9.79233 21.892 8.65086 21.0273 8.12595 19.2489C7.04294 15.5794 5.95756 11.9107 4.87166 8.24203C4.6362 7.4468 4.37783 7.25412 3.55241 7.25175C2.7786 7.24964 2.00507 7.25754 1.23127 7.24911C0.512247 7.24148 0.0157813 6.79109 0.000242059 6.15064C-0.0160873 5.48281 0.475637 5.01689 1.23232 5.00873C2.11121 4.99952 2.99089 4.99214 3.86951 5.01268C5.36154 5.04769 6.52014 5.93215 6.96393 7.35415C7.14171 7.92378 7.34055 8.49026 7.46382 9.07201C7.54968 9.47713 7.77881 9.49661 8.10566 9.49582C11.8335 9.48897 15.5611 9.49134 19.2889 9.49134C21.0825 9.49134 22.8761 9.48108 24.6694 9.49503C26.0848 9.50608 27.0907 10.4906 27.0156 11.7778C27.0006 12.0363 26.925 12.2958 26.8473 12.5457C26.1317 14.8411 25.4124 17.1351 24.6879 19.4279C24.1851 21.0186 23.0223 21.8826 21.3504 21.8944C19.7151 21.906 18.0797 21.897 16.4444 21.897Z"
                                fill="#6E6D79" />
                            <path
                                d="M12.4012 27.5161C11.167 27.5227 10.1488 26.524 10.1345 25.2928C10.1201 24.0419 11.1528 22.9982 12.3967 23.0066C13.6209 23.0151 14.6422 24.0404 14.6436 25.2623C14.6451 26.4855 13.6261 27.5095 12.4012 27.5161Z"
                                fill="#6E6D79" />
                            <path
                                d="M22.509 25.2393C22.5193 26.4842 21.5393 27.4971 20.3064 27.5155C19.048 27.5342 18.0272 26.525 18.0277 25.2622C18.0279 24.0208 19.0214 23.0161 20.2572 23.0074C21.4877 22.9984 22.4988 24.0006 22.509 25.2393Z"
                                fill="#6E6D79" />
                            <circle cx="26.9523" cy="8" r="8" fill="#000" />
                            <path
                                d="M23.7061 13V11.8864L27.1514 8.31676C27.5193 7.92898 27.8226 7.58925 28.0612 7.29759C28.3032 7.0026 28.4838 6.72254 28.6031 6.45739C28.7225 6.19223 28.7821 5.91051 28.7821 5.61222C28.7821 5.27415 28.7026 4.98248 28.5435 4.73722C28.3844 4.48864 28.1673 4.29806 27.8922 4.16548C27.6171 4.02959 27.3072 3.96165 26.9625 3.96165C26.5979 3.96165 26.2797 4.03622 26.008 4.18537C25.7362 4.33452 25.5274 4.54498 25.3815 4.81676C25.2357 5.08854 25.1628 5.40672 25.1628 5.77131H23.6962C23.6962 5.15151 23.8387 4.60961 24.1237 4.1456C24.4088 3.68158 24.7999 3.32197 25.297 3.06676C25.7942 2.80824 26.3593 2.67898 26.9923 2.67898C27.632 2.67898 28.1955 2.80658 28.6827 3.06179C29.1732 3.31368 29.556 3.65838 29.8311 4.09588C30.1062 4.53007 30.2438 5.0206 30.2438 5.56747C30.2438 5.94531 30.1725 6.31487 30.03 6.67614C29.8908 7.0374 29.6472 7.4401 29.2992 7.88423C28.9511 8.32505 28.4672 8.86032 27.8475 9.49006L25.824 11.608V11.6825H30.4078V13H23.7061Z"
                                fill="#F9FFFB" />
                        </svg>

                    </span>
                </a>
            </div> 
                
        </nav>

        <div class="header-bottom d-lg-block d-none">
            <div class="container">
                <div class="header-nav">
                <div class="nav-categories">
    <button class="cat-dropdown" onclick="shopCategories()">All Categories</button>
    <div id="shopCategories" class="dropdown-categories">
        @foreach ($categories as $category)
            <a class="drop-cat-items" href="{{ route('shop.category', ['category' => $category->name]) }}">{{ $category->name }}</a>
            
        
    </a>
        @endforeach
    </div>
</div>
                    <div class="header-nav-menu">
                        <ul class="menu-list">
                            <li>
                              <a href="/">
                                    <span class="list-text">Home</span>
                                </a>
                            </li>
                            <li class="mega-menu">
                                <a href="/shop">
                                    <span class="list-text">Shop</span>
                                </a>
                            </li>

                            <li class="shop-collection">
                                <a href="#">
                                    <span class="list-text">Shop By Collection <i class="bi bi-caret-down-fill"></i></span>
                                </a>
                                <div class="shop-collection-menu">
                                    <div class="shop-content">
                                        <div class="row">
                                            <h4 class="shop-collection-title">Women</h4>
                                            <ul class="sub-items">
                                                <li><a href="">All Collection</a></li>
                                                <li><a href="">Everyday Essential</a></li>
                                                <li><a href="">Pastel Beauty</a></li>
                                                <li><a href="">Butterfly Breams</a></li>
                                                <li><a href="">Heart of Hearts</a></li>
                                                <li><a href="">Geminaire</a></li>
                                                <li><a href="">Cocktail Wear</a></li>
                                            </ul>
                                        </div>
                                        <div class="row">
                                        <h4 class="shop-collection-title">Mens</h4>
                                            <ul class="sub-items">
                                                <li><a href="">All Collection</a></li>
                                                <li><a href="">Everyday Essential</a></li>
                                                <li><a href="">Pastel Beauty</a></li>
                                                <li><a href="">Butterfly Breams</a></li>
                                                <li><a href="">Heart of Hearts</a></li>
                                                <li><a href="">Geminaire</a></li>
                                                <li><a href="">Cocktail Wear</a></li>
                                            </ul>
                                        </div>
                                        <div class="row">
                                        <h4 class="shop-collection-title">Kids</h4>
                                            <ul class="sub-items">
                                                <li><a href="">All Collection</a></li>
                                                <li><a href="">Everyday Essential</a></li>
                                                <li><a href="">Pastel Beauty</a></li>
                                                <li><a href="">Butterfly Breams</a></li>
                                                <li><a href="">Heart of Hearts</a></li>
                                                <li><a href="">Geminaire</a></li>
                                                <li><a href="">Cocktail Wear</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="/contact">
                                    <span class="list-text">Contact</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="header-vendor-btn">
                        <a href="become-vendor.html" class="shop-btn">
                            <span class="list-text shop-text fw-bold">Request Product</span>
                            <span class="icon">
                                <svg width="24" height="16" viewBox="0 0 24 16" fill="#fff"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M20.257 7.07205C20.038 7.07205 19.8474 7.07205 19.6563 7.07205C17.4825 7.07205 15.3086 7.07205 13.1352 7.07205C10.1545 7.07205 7.17336 7.0725 4.19265 7.0725C3.30392 7.0725 2.41519 7.07024 1.52646 7.07295C1.12124 7.07431 0.809811 7.25265 0.625785 7.62651C0.43866 8.00623 0.488204 8.37556 0.737704 8.70426C0.932347 8.96027 1.20529 9.08173 1.52867 9.08037C2.20948 9.07766 2.8903 9.07902 3.57111 9.07902C5.95285 9.07902 8.33415 9.07902 10.7159 9.07902C13.782 9.07902 16.8485 9.07902 19.9146 9.07902C20.0274 9.07902 20.1398 9.07902 20.2822 9.07902C20.1871 9.18332 20.1141 9.26865 20.0358 9.34857C19.5656 9.82672 19.0922 10.3022 18.6229 10.7812C18.1363 11.2779 17.6541 11.7791 17.1675 12.2757C16.4942 12.9634 15.8116 13.6415 15.1476 14.3391C14.9096 14.5893 14.8455 14.9157 14.9406 15.2575C15.156 16.0305 16.0567 16.2499 16.6119 15.6769C17.4342 14.8286 18.2655 13.9892 19.0927 13.1458C19.6948 12.5317 20.2968 11.9172 20.8985 11.3023C21.5952 10.5902 22.2911 9.87729 22.9878 9.1648C23.1059 9.04425 23.2249 8.9246 23.3435 8.8045C23.6903 8.45367 23.7239 7.84278 23.3943 7.4766C22.998 7.03683 22.5852 6.61241 22.1756 6.18573C21.7965 5.79066 21.4134 5.39965 21.0303 5.00909C20.6733 4.64473 20.3132 4.28306 19.9553 3.91915C19.6147 3.57284 19.2754 3.22563 18.9356 2.87887C18.5154 2.44948 18.0951 2.01964 17.6744 1.5907C17.2511 1.15861 16.8198 0.734188 16.4057 0.29261C16.0363 -0.101559 15.3697 -0.0816927 15.0344 0.257392C14.6238 0.672782 14.5999 1.26381 14.995 1.68552C15.3378 2.0517 15.6957 2.40342 16.0465 2.76192C16.929 3.66449 17.8111 4.56797 18.6937 5.47054C19.1829 5.97081 19.6735 6.47018 20.1632 6.97046C20.1885 6.99574 20.2123 7.02329 20.257 7.07205Z" />
                                </svg>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="mobile-search d-flex px-3 py-3 d-block d-xl-none d-lg-none">
            <input type="search" class="mob-search" class="input-search" name="mobileSearch" id="mobileSearch" placeholder="Search Here">
            <button type="submit" class="mob-submit"><i class="bi bi-search"></i></button>
        </div>
    </header>
    <!--------------- header-section-end --------------->
    <script>
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.close-btn').forEach(function (button) {
        button.addEventListener('click', function () {
            const productId = this.getAttribute('data-id');

            fetch('{{ route("cart.remove") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ product_id: productId })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.querySelector(`[data-id="${productId}"]`).remove();
                    document.getElementById('cart-item-count').innerText = data.cartCount;
                    document.getElementById('cart-subtotal').innerText = '₹' + data.subtotal;
                }
            });
        });
    });
});
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function shopCategories() {
        document.getElementById("shopCategories").classList.toggle("show");
    }

    window.onclick = function(event) {
        if (!event.target.matches('.cat-dropdown')) {
            var dropdowns = document.getElementsByClassName("dropdown-categories");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
            }
        }
    }
</script>

<script>
$(document).ready(function() {
    $('#search-input').on('keyup', function() {
        let query = $(this).val();

        if (query.length > 0) {
            $.ajax({
                url: '{{ route("products.search") }}',
                type: 'GET',
                data: {query: query},
                success: function(data) {
                    $('#search-results').html(data).fadeIn();
                }
            });
        } else {
            $('#search-results').fadeOut();
        }
    });

    $(document).on('click', '#search-results a', function() {
        $('#search-input').val($(this).text());
        $('#search-results').fadeOut();
    });

    $(document).click(function(e) {
        if (!$(e.target).closest('.header-search').length) {
            $('#search-results').fadeOut();
        }
    });
});
</script>

<script>
    window.onscroll = function() {stickyHeader()};

    var header = document.getElementById("headerTop");
    var sticky = header.offsetTop;

    function stickyHeader() {
        if (window.pageYOffset > sticky) {
            header.classList.add("sticky");
        } else {
            header.classList.remove("sticky");
        }
    }
</script>
   
<script>
        function changeBackground(clicked) {
            // Remove 'active' class from both links
            document.querySelector('.loginclr').classList.remove('active');
            document.querySelector('.signup').classList.remove('active');

            // Add 'active' class to the clicked link
            if (clicked === 'login') {
                document.querySelector('.loginclr').classList.add('active');
            } else if (clicked === 'signup') {
                document.querySelector('.signup').classList.add('active');
            }
        }
    </script>
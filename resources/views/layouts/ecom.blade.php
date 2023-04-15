<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Young - Multipurpose eCommerce HTML Template</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('dashboard/app-assets/assetss/images/favicon.png') }}">

    <!-- All CSS is here
	============================================ -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('dashboard/app-assets/assetss/css/vendor/bootstrap.min.css') }}">
    <!-- Google font CSS -->
    <link rel="stylesheet" href="{{ asset('dashboard/app-assets/assetss/css/vendor/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/app-assets/assetss/css/vendor/linearicons.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/app-assets/assetss/css/vendor/themify-icons.css') }}">
    <!-- Others CSS -->
    <link rel="stylesheet" href="{{ asset('dashboard/app-assets/assetss/css/plugins/owl-carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/app-assets/assetss/css/plugins/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/app-assets/assetss/css/plugins/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/app-assets/assetss/css/plugins/jquery.mb.ytplayer.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/app-assets/assetss/css/assetss/css/plugins/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/app-assets/assetss/css/plugins/jarallax.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/app-assets/assetss/css/plugins/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/app-assets/assetss/css/plugins/easyzoom.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/app-assets/assetss/css/style.css') }}">
    @yield("custom-css")

</head>

<body>

    <div class="main-wrapper">
        <header class="header-area">
            <div class="header-large-device">
                <div class="header-middle section-padding-2">
                    <div class="container">
                        <div style="padding:30px 0px;">
                            <div class="row d-flex justify-content-between">
                                <div class="col-xl-4 col-lg-2">
                                    <div class="logo logo-res-lg">
                                        <a href="index.html">
                                            <img src="{{ asset('dashboard/app-assets/assetss/images/logo/logo.png') }}" alt="logo">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-5">
                                    <div class="header-right-wrap header-right-flex">
                                        <div class="search-wrap same-style search-width-1 same-style-mrg-dec">
                                            <form class="search-form" action="#">
                                                <input type="text" placeholder="Search products...">
                                                <button class="button-search"><i class="lnr lnr-magnifier"></i></button>
                                            </form>
                                        </div>
                                        <div class="same-style same-style-mrg-dec">
                                            <a href="wishlist.html"><i class="fa fa-heart-o"></i></a>
                                        </div>
                                        <div class="same-style same-style-mrg-dec">
                                            <a class="cart-active" href="cart.html"><i class="fa fa-cart-arrow-down"></i></a>
                                        </div>
                                        <div class="same-style same-style-mrg-dec">
                                            <a class="clickalbe-button-active" href="#"><i class="fa fa-bars"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-bottom">
                    <div class="container">
                        <div class="row no-gutters hb-negative-mrg">
                            <div class="col-lg-3">
                                <div class="category-menu-wrap bg-theme-color-yellow">
                                    <h3 class="showcat"><a href="#"><i class="lnr lnr-menu"></i> Categories</a></h3>
                                    <div class="category-menu hidecat">
                                        <nav>
                                            <ul>
                                                <li class="cr-dropdown"><a href="#">Computer <span class="fa fa-angle-right"></span></a>
                                                    <div class="category-menu-dropdown ct-menu-res-height-1">
                                                        <div class="single-category-menu ct-menu-mrg-bottom category-menu-border">
                                                            <h4>Laptop Accessories</h4>
                                                            <ul>
                                                                <li><a href="shop-fullwide.html">Laptop Keyboard</a></li>
                                                                <li><a href="shop-fullwide.html">Laptop Mouse</a></li>
                                                                <li><a href="shop-fullwide.html">Bluetooth Speaker</a></li>
                                                                <li><a href="shop-fullwide.html">LED Light</a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="single-category-menu ct-menu-mrg-bottom ct-menu-mrg-left">
                                                            <h4>Laptop Accessories</h4>
                                                            <ul>
                                                                <li><a href="shop-fullwide.html">Laptop Keyboard</a></li>
                                                                <li><a href="shop-fullwide.html">Laptop Mouse</a></li>
                                                                <li><a href="shop-fullwide.html">Bluetooth Speaker</a></li>
                                                                <li><a href="shop-fullwide.html">LED Light</a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="single-category-menu">
                                                            <h4>Laptop Accessories</h4>
                                                            <ul>
                                                                <li><a href="shop-fullwide.html">Laptop Keyboard</a></li>
                                                                <li><a href="shop-fullwide.html">Laptop Mouse</a></li>
                                                                <li><a href="shop-fullwide.html">Bluetooth Speaker</a></li>
                                                                <li><a href="shop-fullwide.html">LED Light</a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="single-category-menu">
                                                            <a href="#"><img src="{{ asset('dashboard/app-assets/assetss/images/banner/menu-banner.png') }}" alt=""></a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="cr-dropdown"><a href="#">Accessories <span class="fa fa-angle-right"></span></a>
                                                    <div class="category-menu-dropdown ct-menu-res-height-2">
                                                        <div class="single-category-menu">
                                                            <h4>Laptop Accessories</h4>
                                                            <ul>
                                                                <li><a href="shop-fullwide.html">Laptop Keyboard</a></li>
                                                                <li><a href="shop-fullwide.html">Laptop Mouse</a></li>
                                                                <li><a href="shop-fullwide.html">Bluetooth Speaker</a></li>
                                                                <li><a href="shop-fullwide.html">LED Light</a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="single-category-menu ct-menu-mrg-left">
                                                            <h4>Laptop Accessories</h4>
                                                            <ul>
                                                                <li><a href="shop-fullwide.html">Laptop Keyboard</a></li>
                                                                <li><a href="shop-fullwide.html">Laptop Mouse</a></li>
                                                                <li><a href="shop-fullwide.html">Bluetooth Speaker</a></li>
                                                                <li><a href="shop-fullwide.html">LED Light</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="cr-dropdown"><a href="shop-fullwide.html">Computer Kit</a></li>
                                                <li class="cr-dropdown"><a href="shop-fullwide.html">Laptop</a></li>
                                                <li class="cr-dropdown"><a href="shop-fullwide.html">Laptop Accessories </a></li>
                                                <li class="cr-dropdown"><a href="shop-fullwide.html">Smartwatch</a></li>
                                                <li class="cr-dropdown"><a href="shop-fullwide.html">Accessories</a></li>
                                                <li class="cr-dropdown"><a href="shop-fullwide.html">Cameras</a></li>
                                                <li class="cr-dropdown"><a href="shop-fullwide.html">Mobile Phone</a></li>
                                                <li class="cr-dropdown"><a href="shop-fullwide.html">Drone</a></li>
                                                <li class="cr-dropdown"><a href="shop-fullwide.html">Drone Cameras</a></li>
                                                <li class="cr-dropdown"><a href="shop-fullwide.html">Apple Products </a></li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <div class="main-menu menu-lh-1 main-menu-padding-1 bg-blue menu-text-white main-menu-padding1">
                                    <nav>
                                        <ul>
                                            <li><a class="active" href="index.html">HOME</a>
                                            </li>
                                            <li><a href="shop-fullwide.html">Products</a>
                                                <ul class="mega-menu-style-2 mega-menu-width2 menu-negative-mrg3">
                                                    <li class="mega-menu-sub-width20"><a class="menu-title" href="#">Shop Layout</a>
                                                        <ul>
                                                            <li><a href="shop-fullwide.html">Shop Fullwidth</a></li>
                                                            <li><a href="shop-sidebar.html">Shop Sidebar</a></li>
                                                            <li><a href="shop-3-col.html">Shop 03 Columns</a></li>
                                                            <li><a href="shop-2-col.html">Shop 02 Columns</a></li>
                                                            <li><a href="shop-list-style.html">Shop List Style</a></li>
                                                            <li><a href="shop-collection.html">Shop Collection</a></li>
                                                            <li><a href="shop-instagram.html">Shop Instagram</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="mega-menu-sub-width22"><a class="menu-title" href="#">Product Layout</a>
                                                        <ul>
                                                            <li><a href="product-details.html">Single 01</a></li>
                                                            <li><a href="product-details-2.html">Single 02</a></li>
                                                            <li><a href="product-details-group.html">Grouped</a></li>
                                                            <li><a href="product-details-sticky.html">Sticky Info</a></li>
                                                            <li><a href="product-details-configurable.html">Configurable</a></li>
                                                            <li><a href="product-details-thumbnail.html">Thumbnail</a></li>
                                                            <li><a href="product-details-video.html">Video</a></li>
                                                            <li><a href="product-details-affiliate.html">Affiliate</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li><a href="#">About Us</a>
                                            </li>
                                            <li><a href="shop-fullwide.html">Brands</a></li>
                                            <li><a href="contact.html">CONTACT</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-small-device">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <div class="mobile-logo mobile-logo-width">
                                <a href="index.html">
                                    <img alt="" src="{{ asset('dashboard/app-assets/assetss/images/logo/logo.png') }}">
                                </a>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="header-right-wrap header-right-flex">
                                <div class="same-style">
                                    <a href="wishlist.html"><i class="fa fa-heart-o"></i></a>
                                </div>
                                <div class="same-style">
                                    <a class="cart-active" href="cart.html"><i class="fa fa-cart-arrow-down"></i></a>
                                </div>
                                <div class="same-style">
                                    <a class="mobile-menu-button-active" href="#"><i class="fa fa-bars"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="category-menu-wrap bg-theme-color-yellow">
                                <h3><a class="showcat" href="#"><i class="lnr lnr-menu"></i> Categories</a></h3>
                                <div class="category-menu mobile-category-menu hidecat">
                                    <nav>
                                        <ul>
                                            <li class="cr-dropdown"><a href="#">Computer <span class="fa fa-angle-down"></span></a>
                                                <ul class="cr-menu-desktop-none">
                                                    <li class="cr-sub-dropdown sub-style"><a href="#">Laptop Accessories <i class="fa fa-angle-down"></i></a>
                                                        <ul>
                                                            <li><a href="shop-fullwide.html">Laptop Keyboard</a></li>
                                                            <li><a href="shop-fullwide.html">Laptop Mouse</a></li>
                                                            <li><a href="shop-fullwide.html">Bluetooth Speaker</a></li>
                                                            <li><a href="shop-fullwide.html">LED Light</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="cr-sub-dropdown sub-style"><a href="#">Laptop Accessories <i class="fa fa-angle-down"></i></a>
                                                        <ul>
                                                            <li><a href="shop-fullwide.html">Laptop Keyboard</a></li>
                                                            <li><a href="shop-fullwide.html">Laptop Mouse</a></li>
                                                            <li><a href="shop-fullwide.html">Bluetooth Speaker</a></li>
                                                            <li><a href="shop-fullwide.html">LED Light</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="cr-sub-dropdown sub-style"><a href="#">Laptop Accessories <i class="fa fa-angle-down"></i></a>
                                                        <ul>
                                                            <li><a href="shop-fullwide.html">Laptop Keyboard</a></li>
                                                            <li><a href="shop-fullwide.html">Laptop Mouse</a></li>
                                                            <li><a href="shop-fullwide.html">Bluetooth Speaker</a></li>
                                                            <li><a href="shop-fullwide.html">LED Light</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="cr-dropdown"><a href="#">Accessories <span class="fa fa-angle-down"></span></a>
                                                <ul class="cr-menu-desktop-none">
                                                    <li class="cr-sub-dropdown sub-style"><a href="#">Laptop Accessories <i class="fa fa-angle-down"></i></a>
                                                        <ul>
                                                            <li><a href="shop-fullwide.html">Laptop Keyboard</a></li>
                                                            <li><a href="shop-fullwide.html">Laptop Mouse</a></li>
                                                            <li><a href="shop-fullwide.html">Bluetooth Speaker</a></li>
                                                            <li><a href="shop-fullwide.html">LED Light</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="cr-sub-dropdown sub-style"><a href="#">Laptop Accessories <i class="fa fa-angle-down"></i></a>
                                                        <ul>
                                                            <li><a href="shop-fullwide.html">Laptop Keyboard</a></li>
                                                            <li><a href="shop-fullwide.html">Laptop Mouse</a></li>
                                                            <li><a href="shop-fullwide.html">Bluetooth Speaker</a></li>
                                                            <li><a href="shop-fullwide.html">LED Light</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="cr-dropdown"><a href="shop-fullwide.html">Computer Kit</a></li>
                                            <li class="cr-dropdown"><a href="shop-fullwide.html">Laptop</a></li>
                                            <li class="cr-dropdown"><a href="shop-fullwide.html">Laptop Accessories </a></li>
                                            <li class="cr-dropdown"><a href="shop-fullwide.html">Smartwatch</a></li>
                                            <li class="cr-dropdown"><a href="shop-fullwide.html">Accessories</a></li>
                                            <li class="cr-dropdown"><a href="shop-fullwide.html">Cameras</a></li>
                                            <li class="cr-dropdown"><a href="shop-fullwide.html">Mobile Phone</a></li>
                                            <li class="cr-dropdown"><a href="shop-fullwide.html">Drone</a></li>
                                            <li class="cr-dropdown"><a href="shop-fullwide.html">Drone Cameras</a></li>
                                            <li class="cr-dropdown"><a href="shop-fullwide.html">Apple Products </a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="clickalbe-sidebar-wrapper-active clickalbe-sidebar-wrapper-style-1">
            <div class="clickalbe-sidebar-wrap clickalbe-sidebar-padding-dec">
                <a class="sidebar-close"><i class=" ti-close "></i></a>
                <div class="header-aside-content sidebar-content-100-percent">
                    <div class="header-aside-menu">
                        <nav>
                            <ul>
                                <li><a href="#">About Young</a></li>
                                <li><a href="#">Help Center</a></li>
                                <li><a href="#">Collection</a></li>
                                <li><a href="#">Blog</a></li>
                                <li><a href="#">New Look</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="header-aside-payment">
                        <img src="{{ asset('dashboard/app-assets/assetss/images/icon-img/payment.png') }}" alt="payment">
                    </div>
                    <p>Pellentesque mollis nec orci id tincidunt. Sed mollis risus eu nisi aliquet, sit amet fermentum.</p>
                    <div class="aside-contact-info">
                        <ul>
                            <li><i class=" ti-alarm-clock "></i>Monday - Friday: 9:00 - 19:00</li>
                            <li><i class=" ti-email "></i>Info@example.com</li>
                            <li><i class=" ti-mobile "></i>(+55) 254. 254. 254</li>
                            <li><i class=" ti-home "></i>Helios Tower 75 Tam Trinh Hoang - Ha Noi - Viet Nam</li>
                        </ul>
                    </div>
                    <div class="social-icon-style-2 mb-25">
                        <a class="facebook" href="#"><i class="fa fa-facebook"></i></a>
                        <a class="twitter" href="#"><i class="fa fa-twitter"></i></a>
                        <a class="google-plus" href="#"><i class="fa fa-google-plus"></i></a>
                        <a class="behance" href="#"><i class="fa fa-behance"></i></a>
                    </div>
                    <div class="copyright copyright-gray-2">
                        <p>© 2020 <a target="_blank" href="https://hasthemes.com/">Young.</a> All rights reserved.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- mini cart start -->
        <div class="sidebar-cart-active">
            <div class="sidebar-cart-all">
                <a class="cart-close" href="#"><i class=" ti-close "></i></a>
                <div class="cart-content">
                    <h3>Shopping Cart</h3>
                    <ul>
                        <li class="single-product-cart">
                            <div class="cart-img">
                                <a href="#"><img src="{{ asset('dashboard/app-assets/assetss/images/cart/cart-1.jpg') }}" alt=""></a>
                            </div>
                            <div class="cart-title">
                                <h4><a href="#">Awesome Mobile</a></h4>
                                <span> 1 × $49.00	</span>
                            </div>
                            <div class="cart-delete">
                                <a href="#">×</a>
                            </div>
                        </li>
                        <li class="single-product-cart">
                            <div class="cart-img">
                                <a href="#"><img src="{{ asset('dashboard/app-assets/assetss/images/cart/cart-2.jpg') }}" alt=""></a>
                            </div>
                            <div class="cart-title">
                                <h4><a href="#">Nice Headphones</a></h4>
                                <span> 1 × $49.00	</span>
                            </div>
                            <div class="cart-delete">
                                <a href="#">×</a>
                            </div>
                        </li>
                    </ul>
                    <div class="cart-total">
                        <h4>Subtotal: <span>$170.00</span></h4>
                    </div>
                    <div class="cart-checkout-btn">
                        <a class="btn-hover cart-btn-style" href="cart.html">view cart</a>
                        <a class="no-mrg btn-hover cart-btn-style" href="checkout.html">checkout</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Mobile menu start -->
        <div class="mobile-menu-active clickalbe-sidebar-wrapper-style-1">
            <div class="clickalbe-sidebar-wrap">
                <a class="sidebar-close"><i class=" ti-close "></i></a>
                <div class="mobile-menu-content-area sidebar-content-100-percent">
                    <div class="mobile-search">
                        <form class="search-form" action="#">
                            <input type="text" placeholder="Search entire store…">
                            <button class="button-search"><i class=" ti-search "></i></button>
                        </form>
                    </div>
                    <div class="clickable-mainmenu-wrap clickable-mainmenu-style1">
                        <nav>
                            <ul>
                                <li class="has-sub-menu"><a href="#">Home</a>
                                    <ul class="sub-menu-2">
                                        <li class="has-sub-menu"><a href="#">Demo Group 01</a>
                                            <ul class="sub-menu-2">
                                                <li><a href="index.html">Home Electronic</a></li>
                                                <li><a href="index-book.html">Home Book</a></li>
                                                <li><a href="index-fashion.html">Home Fashion</a></li>
                                                <li><a href="index-flower.html">Home Flower</a></li>
                                                <li><a href="index-cake.html">Home Cake</a></li>
                                            </ul>
                                        </li>
                                        <li class="has-sub-menu"><a href="#">Demo Group 02</a>
                                            <ul class="sub-menu-2">
                                                <li><a href="index-furniture.html">Home Furniture</a></li>
                                                <li><a href="index-handmade.html">Home Handmade</a></li>
                                                <li><a href="index-kids.html">Home Kids</a></li>
                                                <li><a href="index-organic.html">Home Organic</a></li>
                                                <li><a href="index-pet.html">Home Pet</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="has-sub-menu"><a href="#">Pages</a>
                                    <ul class="sub-menu-2">
                                        <li><a href="about-us.html">About Us</a></li>
                                        <li><a href="contact.html">Contact Page</a></li>
                                        <li><a href="404.html">404 Page</a></li>
                                        <li><a href="faq.html">FAQ</a></li>
                                        <li><a href="coming-soon.html">Comming Soon</a></li>
                                        <li><a href="empty-cart.html">Empty Cart</a></li>
                                    </ul>
                                </li>
                                <li class="has-sub-menu"><a href="#">shop</a>
                                    <ul class="sub-menu-2">
                                        <li class="has-sub-menu"><a href="#">Shop Layout</a>
                                            <ul class="sub-menu-2">
                                                <li><a href="shop-fullwide.html">Shop Fullwidth</a></li>
                                                <li><a href="shop-sidebar.html">Shop Sidebar</a></li>
                                                <li><a href="shop-3-col.html">Shop 03 Columns</a></li>
                                                <li><a href="shop-2-col.html">Shop 02 Columns</a></li>
                                                <li><a href="shop-list-style.html">Shop List Style</a></li>
                                                <li><a href="shop-collection.html">Shop Collection</a></li>
                                                <li><a href="shop-instagram.html">Shop Instagram</a></li>
                                            </ul>
                                        </li>
                                        <li class="has-sub-menu"><a href="#">Product Layout</a>
                                            <ul class="sub-menu-2">
                                                <li><a href="product-details.html">Single 01</a></li>
                                                <li><a href="product-details-2.html">Single 02</a></li>
                                                <li><a href="product-details-group.html">Grouped</a></li>
                                                <li><a href="product-details-sticky.html">Sticky Info</a></li>
                                                <li><a href="product-details-configurable.html">Configurable</a></li>
                                                <li><a href="product-details-thumbnail.html">Thumbnail</a></li>
                                                <li><a href="product-details-video.html">Video</a></li>
                                                <li><a href="product-details-affiliate.html">Affiliate</a></li>
                                            </ul>
                                        </li>
                                        <li class="has-sub-menu"><a href="#">Shop Page</a>
                                            <ul class="sub-menu-2">
                                                <li><a href="my-account.html">My Account</a></li>
                                                <li><a href="checkout.html">Check Out</a></li>
                                                <li><a href="cart.html">Shopping Cart</a></li>
                                                <li><a href="wishlist.html">Wishlist</a></li>
                                                <li><a href="order-tracking.html">Order Tracking</a></li>
                                                <li><a href="compare.html">Compare</a></li>
                                                <li><a href="store.html">Store</a></li>
                                                <li><a href="login-register.html">login / register</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="shop-fullwide.html">Collections</a></li>
                                <li class="has-sub-menu"><a href="#">Blog</a>
                                    <ul class="sub-menu-2">
                                        <li><a href="blog.html">Blog Page</a></li>
                                        <li><a href="blog-no-sidebar.html">Blog No sidebar</a></li>
                                        <li><a href="blog-right-sidebar.html">Blog Right Sidebar</a></li>
                                        <li><a href="blog-details.html">Blog Details</a></li>
                                    </ul>
                                </li>
                                <li><a href="contact.html">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="mobile-curr-lang-wrap">
                        <div class="single-mobile-curr-lang">
                            <a class="mobile-language-active" href="#">Language <i class="fa fa-angle-down"></i></a>
                            <div class="lang-curr-dropdown lang-dropdown-active">
                                <ul>
                                    <li><a href="#">English (US)</a></li>
                                    <li><a href="#">English (UK)</a></li>
                                    <li><a href="#">Spanish</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="single-mobile-curr-lang">
                            <a class="mobile-currency-active" href="#">Currency <i class="fa fa-angle-down"></i></a>
                            <div class="lang-curr-dropdown curr-dropdown-active">
                                <ul>
                                    <li><a href="#">USD</a></li>
                                    <li><a href="#">EUR</a></li>
                                    <li><a href="#">Real</a></li>
                                    <li><a href="#">BDT</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="header-aside-content">
                        <div class="header-aside-payment">
                            <img src="{{ asset('dashboard/app-assets/assetss/images/icon-img/payment.png') }}" alt="payment">
                        </div>
                        <p>Pellentesque mollis nec orci id tincidunt. Sed mollis risus eu nisi aliquet, sit amet fermentum.</p>
                        <div class="aside-contact-info">
                            <ul>
                                <li><i class=" ti-alarm-clock "></i>Monday - Friday: 9:00 - 19:00</li>
                                <li><i class=" ti-email "></i>Info@example.com</li>
                                <li><i class=" ti-mobile "></i>(+55) 254. 254. 254</li>
                                <li><i class=" ti-home "></i>Helios Tower 75 Tam Trinh Hoang - Ha Noi - Viet Nam</li>
                            </ul>
                        </div>
                        <div class="social-icon-style-2 mb-25">
                            <a class="facebook" href="#"><i class="fa fa-facebook"></i></a>
                            <a class="twitter" href="#"><i class="fa fa-twitter"></i></a>
                            <a class="google-plus" href="#"><i class="fa fa-google-plus"></i></a>
                            <a class="behance" href="#"><i class="fa fa-behance"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="slider-area">
            <div class="container-fluid p-0">
                <div class="main-slider-active-1 owl-carousel slider-nav-position-2 slider-nav-style-2">
                    <div class="single-main-slider slider-animated-2 bg-img slider-height-2" style="background-image:url(https://img.freepik.com/free-photo/minimal-medicinal-pills-assortment_23-2148892342.jpg?t=st=1648712595~exp=1648713195~hmac=95014ee98e2b24b6b7a03fc692f42992211bc56018e01918c32fe2da3bdb7c32&w=1380);">
                        <div class="row no-gutters">
                            <div class="col-12">
                                <div class="main-slider-content-2 text-center">
                                    <h1 class="animated">Get Your medicines</h1>
                                    <p class="animated">Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae</p>
                                    <div class="btn-style-3 btn-hover-2">
                                        <a class="animated bs3-white-text bs3-yellow-bg bs3-ptb bs3-ptb bs3-border-radius ptb-2-white-hover" href="product-details.html">Shop now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single-main-slider slider-animated-2 bg-img slider-height-2" style="background-image:url(https://img.freepik.com/free-photo/shopping-cart-with-pill-foils-copy-space_23-2148533453.jpg?w=1060);">
                        <div class="row no-gutters">
                            <div class="col-12">
                                <div class="main-slider-content-2 text-center">
                                    <h1 class="animated">We are ready to deliver your product</h1>
                                    <p class="animated">Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae</p>
                                    <div class="btn-style-3 btn-hover-2">
                                        <a class="animated bs3-white-text bs3-yellow-bg bs3-ptb bs3-ptb bs3-border-radius ptb-2-white-hover" href="product-details.html">Shop now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="banner-area pt-50 pb-85">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="banner-wrap banner-zoom mb-30">
                            <div class="banner-img">
                                <a href="product-details.html"><img src="https://i.pinimg.com/originals/26/de/a4/26dea46b54ebc1dc601172c00c9fbb18.jpg" alt="banner"></a>
                            </div>
                            <div class="banner-content-1 banner-position-1">
                                <h5>Gaming Headset for PS4</h5>
                                <h2 class="yellow">Sale Off 30%</h2>
                                <span>only $138.00</span>
                                <div class="btn-style-3 btn-hover-2">
                                    <a class="animated bs3-white-text bs3-yellow-bg bs3-ptb-2 bs3-border-radius ptb-2-white-hover" href="product-details.html">Shop now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="banner-wrap banner-zoom mb-30">
                            <div class="banner-img">
                                <a href="product-details.html"><img src="https://mir-s3-cdn-cf.behance.net/project_modules/1400/5037a364573157.5ad6cecdc1461.jpg" alt="banner"></a>
                                <div class="banner-badge">
                                    <span>-25%</span>
                                </div>
                            </div>
                            <div class="banner-content-2 banner-position-2">
                                <h2><a href="#">New Orginal HtBook Air</a></h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="banner-wrap banner-zoom mb-30">
                            <div class="banner-img">
                                <a href="product-details.html"><img src="https://mir-s3-cdn-cf.behance.net/project_modules/2800_opt_1/7366d564573157.5ad6cecdc0b4a.jpg" alt="banner"></a>
                            </div>
                            <div class="banner-content-1 banner-position-1">
                                <h5>HT COOLPIX B500 Digital Camera</h5>
                                <h2 class="lightblue">Off 20%</h2>
                                <span>only $138.00</span>
                                <div class="btn-style-3 btn-hover-2">
                                    <a class="animated bs3-white-text bs3-yellow-bg bs3-ptb-2 bs3-border-radius ptb-2-white-hover" href="product-details.html">Shop now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @yield("content")
        <footer class="footer-area border-top-2" style=" background:#33bbc6">
            <div class="container">
                <div class="footer-top pt-100 pb-35">
                    <div class="row align-items-center">
                        <div class="col-lg-4 col-md-4">
                            <div class="footer-logo footer-logo-ngtv-mrg f-logo-small-left">
                                <a href="index.html">
                                    <img src="{{ asset('dashboard/app-assets/assetss/images/logo/logo-2.png') }}" alt="logo">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-8">
                            <div class="footer-ml-95">
                                <div class="row">
                                    <div class="col-lg-3 col-md-6 col-12 col-sm-6">
                                        <div class="footer-widget mb-55">
                                            <h3 class="footer-title">Company</h3>
                                            <div class="footer-info-list">
                                                <ul>
                                                    <li><a href="#">About Us</a></li>
                                                    <li><a href="#">Our Studio</a></li>
                                                    <li><a href="#">Contact Us</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-12 col-sm-6">
                                        <div class="footer-widget footer-mrg-1 mb-55">
                                            <h3 class="footer-title">Poular Categories</h3>
                                            <div class="footer-info-list">
                                                <ul>
                                                    <li><a href="#">Man</a></li>
                                                    <li><a href="#">Woman</a></li>
                                                    <li><a href="#">Kids</a></li>
                                                    <li><a href="#">Accessories</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-12 col-sm-6">
                                        <div class="footer-widget mb-55">
                                            <h3 class="footer-title">Userful</h3>
                                            <div class="footer-info-list">
                                                <ul>
                                                    <li><a href="#">Help Center</a></li>
                                                    <li><a href="#">Affiliate Program</a></li>
                                                    <li><a href="#">Services</a></li>
                                                    <li><a href="#">Terms & Conditions</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-bottom footer-bottom-pb">
                    <div class="row align-items-center">
                        <div class="col-md-6 col-12">
                            <div class="copyright">
                                <p>© 2022 Ayaan Tech Limited. <a target="_blank" href="https://ayaantec.com/">All rights reserved.</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class=" ti-close " aria-hidden="true"></span></button>
                    </div>
                    <div class="modal-body">
                        <div class="row no-gutters">
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                <div class="quickview-slider-active owl-carousel">
                                    <a class="img-popup" href="{{ asset('dashboard/app-assets/assetss/images/product/quickview-1.jpg') }}"><img src="{{ asset('dashboard/app-assets/assetss/images/product/quickview-elec-1.jpg') }}" alt=""></a>
                                    <a class="img-popup" href="{{ asset('dashboard/app-assets/assetss/images/product/quickview-2.jpg') }}"><img src="{{ asset('dashboard/app-assets/assetss/images/product/quickview-elec-2.jpg') }}" alt=""></a>
                                </div>
                                <!-- Thumbnail Large Image End -->
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                <div class="product-details-content quickview-content-padding">
                                    <h2 class="uppercase">JAW SHARK WOMEN T-SHIRT</h2>
                                    <h3>$19.99</h3>
                                    <div class="product-details-peragraph">
                                        <p>Sed ligula sapien, fermentum id est eget, viverra auctor sem. Vivamus maximus enim vitae urna porta, ut euismod nibh lacinia. Pellentesque at diam sed libero tincidunt feugiat.</p>
                                    </div>
                                    <div class="product-details-action-wrap">
                                        <div class="product-details-quality">
                                            <div class="cart-plus-minus">
                                                <input class="cart-plus-minus-box" type="text" name="qtybutton" value="2">
                                            </div>
                                        </div>
                                        <div class="product-details-cart">
                                            <a title="Add to cart" href="#">Add to cart</a>
                                        </div>
                                        <div class="product-details-wishlist">
                                            <a title="Add to wishlist" href="#"><i class="fa fa-heart-o"></i></a>
                                        </div>
                                        <div class="product-details-compare">
                                            <a title="Add to compare" href="#"><i class="fa fa-compress"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-details-meta">
                                        <span>SKU: N/A</span>
                                        <span>Categories: <a href="#">Woman</a>, <a href="#">Dress</a>, <a href="#">Style</a>, <a href="#">T-Shirt</a>, <a href="#">Mango</a></span>
                                        <span>Tag: <a href="#">Fashion</a>, <a href="#">Dress</a> </span>
                                        <span>Product ID: <a href="#">274</a></span>
                                    </div>
                                    <div class="product-details-info">
                                        <a href="#"><i class=" ti-location-pin "></i>Check Store availability</a>
                                        <a href="#"><i class=" ti-shopping-cart "></i>Delivery and Return</a>
                                        <a href="#"><i class="ti-pin"></i>Ask a Question</a>
                                    </div>
                                    <div class="product-details-social-wrap">
                                        <span>SHARE THIS PRODUCT</span>
                                        <div class="product-details-social">
                                            <a class="facebook" href="#"><i class="fa fa-facebook"></i></a>
                                            <a class="twitter" href="#"><i class="fa fa-twitter"></i></a>
                                            <a class="pinterest" href="#"><i class="fa fa-pinterest-p"></i></a>
                                            <a class="google-plus" href="#"><i class="fa fa-google-plus"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal end -->
    </div>

    <!-- All JS is here
============================================ -->

    <!-- Modernizer JS -->
    <script src="{{ asset('dashboard/app-assets/assetss/js/vendor/modernizr-3.6.0.min.js') }}"></script>
    <!-- jquery -->
    <script src="{{ asset('dashboard/app-assets/assetss/js/vendor/jquery-3.3.1.min.js') }}"></script>
    <!-- Popper JS -->
    <script src="{{ asset('dashboard/app-assets/assetss/css/vendor/bootstrap.min.css') }}assets/js/vendor/popper.js"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('dashboard/app-assets/assetss/js/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ asset('dashboard/app-assets/assetss/js/plugins/owl-carousel.js') }}"></script>
    <script src="{{ asset('dashboard/app-assets/assetss/js/plugins/slick.js') }}"></script>
    <script src="{{ asset('dashboard/app-assets/assetss/js/plugins/jquery.mb.ytplayer.min.js') }}"></script>
    <script src="{{ asset('dashboard/app-assets/assetss/js/plugins/magnific-popup.js') }}"></script>
    <script src="{{ asset('dashboard/app-assets/assetss/js/plugins/wow.js') }}"></script>
    <script src="{{ asset('dashboard/app-assets/assetss/js/plugins/instafeed.js') }}"></script>
    <script src="{{ asset('dashboard/app-assets/assetss/js/plugins/countdown.js') }}"></script>
    <script src="{{ asset('dashboard/app-assets/assetss/js/plugins/jarallax.min.js') }}"></script>
    <script src="{{ asset('dashboard/app-assets/assetss/js/plugins/images-loaded.js') }}"></script>
    <script src="{{ asset('dashboard/app-assets/assetss/js/plugins/isotope.js') }}"></script>
    <script src="{{ asset('dashboard/app-assets/assetss/js/plugins/tilt.js') }}"></script>
    <script src="{{ asset('dashboard/app-assets/assetss/js/plugins/jquery-ui-touch-punch.js') }}"></script>
    <script src="{{ asset('dashboard/app-assets/assetss/js/plugins/jquery-ui.js') }}"></script>
    <script src="{{ asset('dashboard/app-assets/assetss/js/plugins/easyzoom.js') }}"></script>
    <script src="{{ asset('dashboard/app-assets/assetss/js/plugins/resizesensor.js') }}"></script>
    <script src="{{ asset('dashboard/app-assets/assetss/js/plugins/sticky-sidebar.js') }}"></script>
    <script src="{{ asset('dashboard/app-assets/assetss/js/plugins/scrollup.js') }}"></script>
    <script src="{{ asset('dashboard/app-assets/assetss/js/plugins/ajax-mail.js') }}"></script>
    <!-- Main JS -->
    <script src="{{ asset('dashboard/app-assets/assetss/js/main.js') }}"></script>
    @yield("custom-js")

</body>

</html>

<!DOCTYPE html>
<html>
    <head> 
        <meta charset="utf-8"> 
        <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no"> 
        <title>@yield('title')</title> 
        <meta name="title" content="Pharmacy Software Solutions (ATL-Pharma)">
        <meta name="description" content="Pharmacy Software Solution is built to manage overall pharmacy business activities including medicine management purchase management supplier or manufacturers management stock management sales management daily or monthly accounts management. This software is easy to use and manage with easy medicine search easy invoice creation pharmacy faster daily operation and date wise details report. ">
        <meta name="keywords" content="Pharmacy,Pharmacy Software, Pharmacy Management, Doctor Prescriptions,Ayaan Tech Limited, ayaantec,pharma">
        <meta name="robots" content="index, follow">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="language" content="English">
        <meta name="revisit-after" content="1 days">
        <meta name="author" content="Ayaan Tech Limited">
        <!-- Primary Meta Tags -->
        <title>Pharmacy Software Solutions (ATL-Pharma)</title>
        <meta name="title" content="Pharmacy Software Solutions (ATL-Pharma)">
        <meta name="description" content="Pharmacy Software Solution is built to manage overall pharmacy business activities including medicine management purchase management supplier or manufacturers management stock management sales management daily or monthly accounts management. This software is easy to use and manage with easy medicine search easy invoice creation pharmacy faster daily operation and date wise details report. ">
        
        <!-- Open Graph / Facebook -->
        <meta property="og:type" content="website">
        <meta property="og:url" content="https://metatags.io/">
        <meta property="og:title" content="Pharmacy Software Solutions (ATL-Pharma)">
        <meta property="og:description" content="Pharmacy Software Solution is built to manage overall pharmacy business activities including medicine management purchase management supplier or manufacturers management stock management sales management daily or monthly accounts management. This software is easy to use and manage with easy medicine search easy invoice creation pharmacy faster daily operation and date wise details report. ">
        <meta property="og:image" content="https://metatags.io/assets/meta-tags-16a33a6a8531e519cc0936fbba0ad904e52d35f34a46c97a2c9f6f7dd7d336f2.png">
        
        <!-- Twitter -->
        <meta property="twitter:card" content="summary_large_image">
        <meta property="twitter:url" content="https://metatags.io/">
        <meta property="twitter:title" content="Pharmacy Software Solutions (ATL-Pharma)">
        <meta property="twitter:description" content="Pharmacy Software Solution is built to manage overall pharmacy business activities including medicine management purchase management supplier or manufacturers management stock management sales management daily or monthly accounts management. This software is easy to use and manage with easy medicine search easy invoice creation pharmacy faster daily operation and date wise details report. ">
        <meta property="twitter:image" content="https://metatags.io/assets/meta-tags-16a33a6a8531e519cc0936fbba0ad904e52d35f34a46c97a2c9f6f7dd7d336f2.png">

        <link rel="stylesheet" type="text/css" href="{{ asset('shop/style.css') }}" media="all">  
        <link rel="stylesheet" type="text/css" href="{{ asset('shop/assets/bootstrap-4.6.1/css/bootstrap.min.css') }}" media="all">
        <link rel="stylesheet" type="text/css" href="{{ asset('shop/assets/bootstrap-4.6.1/css/owl.carousel.min.css') }}" media="all">
        <link rel="stylesheet" type="text/css" href="{{ asset('shop/assets/bootstrap-4.6.1/css/owl.theme.default.min.css') }}" media="all">
        <link rel="stylesheet" type="text/css" href="{{ asset('shop/assets/fontawesome/css/all.min.css') }}" media="all">
        
        <link rel="stylesheet" type="text/css" href="{{ asset('shop/custom.css') }}" media="all">  
         @yield('custom-css')
          <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/app-assets/vendors/css/extensions/toastr.min.css') }}">
    </head>
    <body>
    
        <div class="top_bar">
            <div class="container">
                <div class="row align-items-center ">
                    <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                        <h6 class="top_title">{{$top_bar->title ?? ""}}</h6>
                    </div>
                    <div class="col-12 col-sm-12 col-md-8 col-lg-8">
                        <div class="site_info">
                            <div class="site_mobile d-flex align-items-center">
                                <i class="fas fa-phone top_icon"></i>
                               
                                <a href="tel:+88 {{$top_bar->phone ?? ""}}" class="text-white text-decoration-none">+88 {{$top_bar->phone ?? ""}}</a>
                            </div>
                            <div class="site_email d-flex align-items-center">
                                <i class="fas fa-envelope top_icon"></i>
                                
                                <a href="mailto:{{$top_bar->email ?? ""}}" class="text-white text-decoration-none">{{$top_bar->email ?? ""}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main">
            <header class="menu"> 
                <div class="container"> 
                    <div class="row">
                        <div class="col-sm-12 col-md-12 d-md-flex desktopmenu"> 
                            <div class="col-sm-12 col-md-4 col-lg-4 d-md-flex justify-content-md-start" id="menupart1">
                                <h3 class="logo"><a href="{{ route('shop.index', $shop->username) }}" class="logo"
                              >{{$shop->name}}</a></h3>
                            </div>
                            <div class="col-sm-12 col-md-8 col-lg-8 d-md-flex menupart2 align-items-center" id="menupart2">
                                <!--search section-->
                                <div class="container searchfield">
                                    <form method="GET" action="{{route('medicine.search', $shop->username)}}">
                                        <div class="input-group md-form form-sm form-2 pl-0 ">
                                            <input class="form-control my-0 py-1 red-border" type="text" value="{{isset($query) ? $query : ''}}" placeholder="Search Your Medicine" aria-label="Search" name="query" required>
                                            <div class="input-group-append header_search_icon">
                                                <button type="submit" class="input-group-text input-group-text1 red lighten-3 header_search_icon" id="basic-text1"><i class="fas fa-search text-grey" aria-hidden="true"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                @php
                                    $total_price = 0;
                                       $carts = \App\Models\Cart::where('user_id', session()->get('cartid'))->where('shop_id', $shop->id)->get();
                                       foreach($carts as $cart){
                                            $total_price += $cart->medicine->price*$cart->qty;
                                       }
                                @endphp
                                
                                <div class="col-sm-12 col-md-4 col-lg-4 justify-content-md-end btnm align-items-center">
                                    <div class="header_links">
                                        
                                        <!--<a href="#" class="account_user">-->
                                        <!--  <i class="fas fa-user-alt"></i>-->
                                        <!--</a>-->
                                        <a href="{{route('shop.cart', $shop->username) }}" id="btnb">
                                            <div class="cart_wrap">
                                                 <i class="fa fa-shopping-cart cart_icon"></i>
                                                 <span class="cart_count">@if($carts->sum('qty') > 0 ) {{$carts->sum('qty')}} @else 0 @endif</span>
                                            </div>
                                    
                                            <div class="top_cart_total">৳ {{ number_format($total_price,2)?? 0.00 }} </div>
                                        </a>
                                    </div>
                                </div>
                                
                                
                            </div>
                        </div>
                         
                        
                        <div class="mobilemenu"> 
                            <div class="menupart1">
                                <div class="logom"><a href="index.html">{{$shop->name}}</a></div>
                                <div class="btnmob"><button class="openbtn" onclick="openNav()">&#9776;</button></div>
                            </div>
                            <div id="mySidepanel" class="sidepanel menupart2">
                                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                                <div id="menupart21">
                                    <ul>
                                        <li><a href="{{ route('shop.index', $shop->username) }}">Home</a></li>
                                        <li><a href="{{route('about', $shop->username)}}">About Us</a></li>
                                        <li><a href="{{route('product.all', $shop->username)}}">Medicines</a></li>
                                        <li><a href="{{route('address', $shop->username)}}">Contact</a></li>
                                    </ul>
                                </div>
                                <div class="btnCart" >
                                    <a class"mobile_add_cart_btn" href="{{route('shop.cart', $shop->username) }}"><i class="fa fa-shopping-cart"></i> Cart</a>
                                   
                                </div>
                                 <div class="container searchfield">
                                     <form method="GET" action="{{route('medicine.search', $shop->username)}}">
                                        <div class="input-group md-form form-sm form-2 pl-0 ">
                                            <input class="form-control my-0 py-1 red-border" type="text" placeholder="Search Your Medicine" aria-label="Search" name="query" required>
                                            <div class="input-group-append header_search_icon">
                                                <button type="submit" class="input-group-text input-group-text1 red lighten-3 header_search_icon" id="basic-text1"><i class="fas fa-search text-grey" aria-hidden="true"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div id="mySidenavd" class="sidenav">
                              <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                              <a href="#">About</a>
                              <a href="#">Services</a>
                              <a href="#">Clients</a>
                              <a href="#">Contact</a>
                            </div>
                        </div>
                    </div>
                </div>
                
            </header>
            
            <div class="menu_wrap">
                 <div class="container">
                    <div class="col-md-9 d-md-flex menulist" id="menupart21">
                            <ul>
                                <li><a href="{{ route('shop.index', $shop->username) }}">Home</a></li>
                                <li><a href="{{route('about', $shop->username)}}">About Us</a></li>
                                <li><a href="{{route('product.all', $shop->username)}}">Medicines</a></li>
                                <li><a href="{{route('address', $shop->username)}}">Contact</a></li>
                            </ul>
                     </div>
                </div>
            </div>
            
           @yield('content')

            <footer>
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-6 col-xs-6 pb-2 pr-2">
                            <div class="footer-text pull-left">
                                <div class="d-flex">
                                    <img src="{{ asset('shop/img/Logo.png') }} " width="250px">
                                </div>
                                <p class="card-text"> ATL pharmacy is built to manage overall pharmacy business activities including medicine management, purchase management, supplier or manufacturers management.</p>
                                <!--<div class="social mt-2 mb-3"> -->
                                <!--    <i class="fa-brands fa-facebook fa-lg"></i> -->
                                <!--    <i class="fa-brands fa-instagram fa-lg"></i> -->
                                <!--    <i class="fa-brands fa-twitter fa-lg"></i> -->
                                <!--    <i class="fa-brands fa-linkedin fa-lg"></i> -->
                                <!--    <i class="fa-brands fa-facebook fa-lg"></i> -->
                                <!--</div>-->
                            </div>
                        </div>
                        
                        <div class="col-md-2 col-sm-6 col-xs-6 pb-2">
                            <h5 class="heading">Services</h5>
                            <ul>
                                <li><a href="https://pharma.ayaantec.com/login">Explore Demo</a></li>
                                <li><a href="#">Buy Now</a></li>
                                <li><a href="#">Support</a></li>
                                <li><a href="documentation.html">Documentation</a></li>
                            </ul>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-6 pb-2">
                            <h5 class="heading">Important Links</h5>
                            <ul class="card-text">
                                <li><a href="#">Customers</a></li>
                                <li><a href="#">Manufacturers</a></li>
                                <li><a href="#">Purchase</a></li>
                                <li><a href="#">Invoice</a></li>
                            </ul>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-6 pb-2 feature_link">
                            <h5 class="heading">Features</h5>
                            <ul class="card-text">
                                <li><a href="#">Medicine</a></li>
                                <li><a href="#">Report</a></li>
                                <li><a href="#">Payments</a></li>
                                <li><a href="#">Settings</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="divider mt-3 mb-3"> </div>
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <div class="">
                                <p><i class="fa fa-copyright"></i> 2022 All Rights Reserved <a href="https://ayaantec.com" target="blank" style="color:blue"> Ayaan Tech Limited</a></p>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <div class="mr-4 d-flex policy">
                                <div><a href='#'>Terms of Use</a></div>
                                <div><a href='#'>Privacy Policy</a></div>
                                <div><a href='#'>Cookie Policy</a></div>
                            </div>
                        </div>
                        <div class='col-md-4 col-sm-4 social_icon'>
                            <div class="social copy__right__icons mt-2 mb-3"> 
                                    <a href="https://www.facebook.com/ayaantechlimited" target="blank"><i class="fa-brands fa-facebook fa-lg"></i> </a>
                                    <a href="https://instagram.com/ayaan_tech_limited?igshid=YmMyMTA2M2Y=" target="blank"><i class="fa-brands fa-instagram fa-lg"></i> </a>
                                    <a href='#'> <i class="fa-brands fa-twitter fa-lg"></i></a>
                                    <a href="https://www.linkedin.com/company/ayaan-tech-limited/" target="blank"><i class="fa-brands fa-linkedin fa-lg"></i> </a>
                                
                                </div>
                        </div>
                    </div>
                </div>
            </footer>
            
           

        </div>
        
        <script>
            /* Set the width of the side navigation to 250px */
            function openNav() {
              document.getElementById("mySidenavd").style.width = "370px";
            }
            
            /* Set the width of the side navigation to 0 */
            function closeNav() {
              document.getElementById("mySidenavd").style.width = "0";
            }
        </script>

        <script>
            /* Set the width of the sidebar to 250px (show it) */
            function openNav() {
                document.getElementById("mySidepanel").style.width = "370px";
            }

            /* Set the width of the sidebar to 0 (hide it) */
            function closeNav() {
                document.getElementById("mySidepanel").style.width = "0";
            }
        </script>
        <script type="text/javascript" src="{{ asset('shop/assets/js/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('shop/assets/js/popper.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('shop/assets/bootstrap-4.6.1/js/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('shop/assets/fontawesome/js/all.js') }}"></script>
        <script type="text/javascript" src="{{ asset('shop/assets/bootstrap-4.6.1/js/owl.carousel.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('shop/custom.js') }}"></script>
        <script src="{{ asset('dashboard/app-assets/vendors/js/extensions/toastr.min.js') }}"></script>
           {!! Toastr::message() !!}
            @yield('custom-js')
    </body>
</html>
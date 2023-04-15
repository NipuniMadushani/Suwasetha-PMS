<!DOCTYPE html>
<html>
    <head> 
        <meta charset="utf-8"> 
        <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no"> 
        <title>@yield('title')</title> 
        <link rel="icon" type="image/x-icon" href="{{ asset('saas/img/iconpw.png') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('saas/style.css') }}" media="all">  
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
        <meta property="og:type" content="Pharmacy Software Solutions">
        <meta property="og:url" content="https://pharmacyss.com/">
        <meta property="og:title" content="Pharmacy Software Solutions (ATL-Pharma)">
        <meta property="og:description" content="Pharmacy Software Solution is built to manage overall pharmacy business activities including medicine management purchase management supplier or manufacturers management stock management sales management daily or monthly accounts management. This software is easy to use and manage with easy medicine search easy invoice creation pharmacy faster daily operation and date wise details report. ">
        <meta property="og:image" content="https://pharmacyss.com/storage/app/public/ATL%20Pharma%20Meta%20Tag%20Google.png">
        
        <!-- Twitter -->
        <meta property="twitter:card" content="ATL-Pharma">
        <meta property="twitter:url" content="https://pharmacyss.com/">
        <meta property="twitter:title" content="Pharmacy Software Solutions (ATL-Pharma)">
        <meta property="twitter:description" content="Pharmacy Software Solution is built to manage overall pharmacy business activities including medicine management purchase management supplier or manufacturers management stock management sales management daily or monthly accounts management. This software is easy to use and manage with easy medicine search easy invoice creation pharmacy faster daily operation and date wise details report. ">
        <meta property="twitter:image" content="https://pharmacyss.com/storage/app/public/ATL%20Pharma%20Meta%20Tag%20Google.png">

        
    <!--<script>-->
    <!--    dataLayer.push({ product: null });  -->
    <!--    dataLayer.push({-->
    <!--      'product': {-->
    <!--        'purchase': {                            -->
    <!--            'name': 'আস্থা',    -->
    <!--            'id': '5',-->
    <!--            'price': '1000',-->
    <!--            'setup_fee': 'Free',                          -->
    <!--           },-->
    <!--        'package': [{                            -->
    <!--            'name': 'আস্থা',    -->
    <!--            'id': '5',-->
    <!--            'price': '1000',-->
    <!--            'setup_fee': 'Free',                          -->
    <!--           },-->
    <!--           {-->
    <!--            'name': 'এককালীন',-->
    <!--            'id': '6',-->
    <!--            'price': '10,000',-->
    <!--            'setup_fee': 'Free',-->
    <!--           }]-->
    <!--      }-->
    <!--    });-->
    <!--    </script>-->
    <script>
    window.dataLayer = window.dataLayer || [];
    </script>
        <!-- Google Tag Manager -->
            <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
            })(window,document,'script','dataLayer','GTM-NPSQTWP');</script>
        <!-- End Google Tag Manager -->
            
<meta property="og:image" content="{{ asset('pharmacy-new.jpg') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('saas/assets/bootstrap-4.6.1/css/bootstrap.min.css') }}" media="all">
        <link rel="stylesheet" type="text/css" href="{{ asset('saas/assets/fontawesome/css/all.min.css') }}" media="all">
        <link rel="stylesheet" href="https://cdn.plyr.io/3.6.12/plyr.css" />
        <script type="text/javascript" src="{{ asset('saas/assets/bootstrap-4.6.1/js/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('saas/assets/fontawesome/js/all.js') }}"></script>
        <script type="text/javascript" src="{{ asset('saas/assets/js/jquery.min.js') }}"></script>
        <script src="https://cdn.plyr.io/3.6.12/plyr.polyfilled.js"></script>
         <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/app-assets/vendors/css/extensions/toastr.min.css') }}">
          @yield('custom-css')
    </head>
    <body>
            <section class="topbar">
                <div class="container"> 
                    <div class="row">
                         <div class="col-md-12 d-md-flex">
                            <div class="col-md-8 d-md-flex">
                                <ul>
                                    <li><i class="fa fa-phone"></i>
                                        <a href="tel:+8801973198574" class="text-white text-decoration-none">+8801973198574</a>
                                    </li>
                                    
                                    <li><i class="fa fa-envelope"></i>
                                    <a href="mailto:connect@ayaantech.com.bd" class="text-white text-decoration-none">connect@ayaantech.com.bd</a>
                                        
                                    </li>
                                </ul>
                            </div>
                            @php
                            $languages = \App\Models\Language::all();
                            @endphp
                            <div class="col-md-4 language" >
                                  <select id="lang" width:"60px" class="lan" >
                                      <option>Language</option>
                                      @foreach($languages as $lang)
                                       <option value="{{ route('language.change', $lang->iso) }}">{{$lang->name}}</option>
                                      @endforeach
                                  </select>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <header class="menu"> 
                <div class="container"> 
                    <div class="row">
                        <div class="col-md-12 desktopmenu"> 
                            <div class="col-md-4 d-md-flex justify-content-md-start" id="menupart1" style="float:left">
                                <a href="{{ route('home') }}"><img src="{{ asset('saas/img/Logo.png') }}" width="250px"></a>
                            </div>
                            <div class="col-md-8 d-md-flex justify-content-md-end menupart2" id="menupart2" style="float:left">
                                <div class="col-md-6 d-md-flex menulist"  id="menupart21">
                                    <ul>
                                        <li><a href="{{ route('home') }}">{{ translate('Home') }}</a></li>
                                        <li><a href="{{ route('home') }}#buy-now">{{ translate('Pricing') }}</a></li>
                                        <li><a href="{{ route('contacts') }}">{{ translate('Contact') }}</a></li>
                                    </ul>
                                </div>
                                <div class="col-md-6 justify-content-md-end btnm" >
                                    <a id="btnb" href="{{ route('home') }}#buy-now">{{ translate('Registration') }}</a>
                                    <a href="{{ route('login') }}">{{ translate('Log In') }}</a>
                                </div>
                            </div>
                        </div>


                        <div class="mobilemenu"> 
                            <div class="menupart1">
                                <div class="logom"><a href="{{ route('home') }}"><img src="{{ asset('saas/img/Logo.png') }}" width="200px"></a></div>
                                <div class="btnmob"><button class="openbtn" onclick="openNav()">&#9776;</button></div>
                            </div>
                            <div id="mySidepanel" class="sidepanel menupart2">
                                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                                @php
                                $languages = \App\Models\Language::all();
                                @endphp
                                    <div class="col-md-12" >
                                      <select id="lang" style="width:90%; margin-left:5%; padding: 10px 0px; text-align:center;" >
                                          <option>Language</option>
                                          @foreach($languages as $lang)
                                           <option value="{{ route('language.change', $lang->iso) }}">{{$lang->name}}</option>
                                          @endforeach
                                      </select>
                                </div>
                                <div id="menupart21">
                                    <ul>
                                        <li><a href="{{ route('home') }}">{{ translate('Home') }}</a></li>
                                        <li><a href="{{ route('home') }}#buy-now">{{ translate('Pricing') }}</a></li>
                                        <li><a href="{{ route('contacts') }}">Contact</a></li>
                                    </ul>
                                </div>
                                <div class="btnm" >
                                    <a id="btnb" href="{{ route('home') }}#buy-now">{{ translate('Get Started') }}</a>
                                    <a href="{{ route('login') }}">{{ translate('Log In') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </header>

           @yield('content')


            <footer>
                <div class="container">
                    <div class="row m-auto">
                        <div class="col-md-4">
                            <div class="footer-text pull-left">
                                <div class="d-flex">
                                    <img src="{{ asset('saas/img/Logo.png') }}" width="250px">
                                </div>
                                <p class="card-text">{{ translate('Pharmacy Software Solution is a product of ') }}<a href="https://ayaantec.com">{{ translate('Ayaan Tech Limited') }}</a>.{{ translate(' It is built to manage overall pharmacy business activities including medicine management,purchase management,supplier and manufacturers management.') }}</p>
                                <div class="social mt-2 mb-3"> 
                                   <a href="https://www.facebook.com/search/top?q=ayaan%20tech%20limited" target="__blank"> <i class="fa-brands fa-facebook fa-lg"></i> </a>
                                   <a href="https://www.linkedin.com/m/company/ayaan-tech-limited/" target="__blank">  <i class="fa-brands fa-instagram fa-lg"></i>  </a>
                                   <a href="https://www.youtube.com/channel/UCfHg6yMJ967P4ei_JxW--jw" target="__blank"> <i class="fa-brands fa-youtube fa-lg"></i> </a>
                                   <a href="https://www.linkedin.com/m/company/ayaan-tech-limited/" target="__blank"> <i class="fa-brands fa-linkedin fa-lg"></i> </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <h5 class="heading">{{ translate('Support') }}</h5>
                            <ul>
                                <li><a href="mailto:support@ayaantec.com">support@ayaantec.com</a></li>
                                <li><a href="tel:+8801973198574"> +88 01973198574</a></li>
                                <li><a href="https://pharma.ayaantec.com/login">Niketon, Gulshan 1, Dhaka 1219</a></li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <h5 class="heading">{{ translate(' Terms & Conditions') }}</h5>
                            <ul class="card-text">
                                <li><a href="{{url("/terms/#faq")}}">FAQ</a></li>
                                <li><a href="{{url("/terms")}}#terms">Terms &amp; conditions</a></li>
                                <li><a href="{{url("/terms/#privecy")}}">Privacy</a></li>
                                <li><a href="{{url("/terms")}}#cancellations">Refund Policies</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="divider mb-4"> </div>
                    <div class="row" style="font-size:10px;">
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <div class="pull-left">
                                <p><i class="fa fa-copyright"></i> 2022 all rights reserved. <a href="https://ayaantec.com">Ayaan Tech Limited</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            
            
            
        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NPSQTWP"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->
            
        <!--Start of Tawk.to Script-->
        <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/623326d61ffac05b1d7f102b/default';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
        })();
        </script>
        <!--End of Tawk.to Script-->
        <script>
            /* Set the width of the sidebar to 250px (show it) */
            function openNav() {
                document.getElementById("mySidepanel").style.width = "250px";
            }

            /* Set the width of the sidebar to 0 (hide it) */
            function closeNav() {
                document.getElementById("mySidepanel").style.width = "0";
            }
        </script>
        <script>
    $(function(){
      // bind change event to select
      $('#lang').on('change', function () {
          var url = $(this).val(); // get selected value
          if (url) { // require a URL
              window.location = url; // redirect
          }
          return false;
      });
    });
</script>
          @yield('custom-js')
          <script src="{{ asset('dashboard/app-assets/vendors/js/extensions/toastr.min.js') }}"></script>
           {!! Toastr::message() !!}
    </body>
</html>

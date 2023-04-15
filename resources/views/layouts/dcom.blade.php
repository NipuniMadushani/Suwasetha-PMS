<!DOCTYPE html>
<html class="loading @if(\App\Models\Shop::where('id', Auth::user()->shop_id)->first()->theme =='dark') dark-layout @endif" lang="{{ session()->get('locale') }}" data-layout="dark-layout" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="Manage My Pharmacy">
    <title>{{ Auth::user()->shop->name }} - @yield('title')</title>
    <link rel="apple-touch-icon" href="{{ asset('dashboard/app-assets/images/ico/apple-icon-120.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('dashboard/app-assets/fav.jpg') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/app-assets/vendors/css/vendors.min.css') }}?time={{time()}}">
    
<meta property="og:image" content="{{ asset('pharmacy-new.jpg') }}" />
    
    <link href="{{ asset('dashboard/app-assets/fontawesome/css/all.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/app-assets/vendors/css/extensions/nouislider.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/app-assets/vendors/css/extensions/toastr.min.css') }}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/app-assets/css/bootstrap.css') }}?time={{time()}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/app-assets/css/bootstrap-extended.css') }}?time={{time()}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/app-assets/css/colors.min.css') }}?time={{time()}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/app-assets/css/components.css') }}?time={{time()}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/app-assets/css/themes/dark-layout.css') }}?time={{time()}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/app-assets/css/themes/bordered-layout.css') }}?time={{time()}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/app-assets/css/themes/semi-dark-layout.css') }}?time={{time()}}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/app-assets/css/core/menu/menu-types/vertical-menu.css') }}?time={{time()}}">
     <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/app-assets/css/plugins/extensions/ext-component-sliders.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/app-assets/css/pages/app-ecommerce.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/app-assets/css/plugins/extensions/ext-component-toastr.css') }}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/assets/css/style.css') }}?time={{time()}}">
    <!-- END: Custom CSS-->
    @yield('custom-css')
  
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="">

    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light  container-xxl navBar">
        <div class="navbar-container d-flex content">
            <div class="bookmark-wrapper d-flex align-items-center">
                <ul class="nav navbar-nav d-xl-none">
                    <li class="nav-item"><a class="nav-link menu-toggle" href="#"><i class="ficon" data-feather="menu"></i></a></li>
                </ul>
            </div>
            @php
            $my_pack = \App\Models\Package::where('id', Auth::user()->shop->package_id)->first();
            @endphp
            
            @if(Auth::user()->shop->email != env('SUPERUSER'))
            <ul class="nav navbar-nav planbtn">
                <li><span>My Plan : {{$my_pack->name}}</span>
                </li>
                <li><span>Expired In : {{date('d F, Y', strtotime(Auth::user()->shop->next_pay))}}</span>
                </li>
                @if(Auth::user()->shop->package_id != 5)
                <li><a class="nav-link" target="_blank" rel="noopener noreferrer" href="https://{{ Auth::user()->shop->username }}.pharmacyss.com"><span>My Website</span></a>
                </li>
                @endif
            </ul>
            @endif
            <ul class="nav navbar-nav align-items-center ms-auto">
                <li class="nav-item dropdown dropdown-language">
                    
                    
                    @php
                    $langact = \App\Models\Language::where('iso', session()->get('locale'))->first();
                    
                    
                    $languages = \App\Models\Language::where('iso', '!=', session()->get('locale'))->get();
                    
                     $date = date('Y-m-d', time());
                    
                    $expire_medicine = \App\Models\Batch::where('shop_id', Auth::user()->shop_id)->where('expire', '<=', $date)->count();
  
                    $stockout_medicine = \App\Models\Medicine::where('shop_id', Auth::user()->shop_id)->whereHas('batch', function ($query) {
                    $query->where('qty', '<', 1);
                    })->count();
                    
                    
                    @endphp
                    
                    
                    @if($langact != null)
                    <a class="nav-link dropdown-toggle" id="dropdown-flag" href="{{ route('language.change', $langact->iso) }}" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="flag-icon flag-icon-{{$langact->iso}}"></i><span class="selected-language">{{$langact->name}}</span></a>
                    @endif
                
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-flag">
                        @foreach($languages as $lang)
                        <a class="dropdown-item" href="{{ route('language.change', $lang->iso) }}" data-language="en"><i class="flag-icon flag-icon-{{$lang->iso}}"></i> {{$lang->name}}</a>
                        @endforeach
                     </div>
                </li>
                @php
                $carts = \App\Models\Lol::where('user_id', Auth::user()->id)->get();
                @endphp
                <li class="nav-item dropdown dropdown-cart me-25"><a class="nav-link" href="{{ route('pos.index') }}">(POS) &nbsp;<i class="fas fa-print"></i></a>
                </li>
                <li class="nav-item dropdown dropdown-cart me-25"><a class="nav-link" href="#" data-bs-toggle="dropdown"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart ficon"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg> @if($carts->count() > 0)<span class="badge rounded-pill bg-primary badge-up cart-item-count">{{ $carts->count() }}</span> @endif</a>
            <ul class="dropdown-menu dropdown-menu-media dropdown-menu-end">
              <li class="dropdown-menu-header">
                <div class="dropdown-header d-flex">
                  <h4 class="notification-title mb-0 me-auto">My Cart</h4>
                  @if($carts->count() > 0) <div class="badge rounded-pill badge-light-primary">{{$carts->count()}} Items</div> @endif
                </div>
              </li>
              <li class="scrollable-container media-list ps">
                  @php
                  $t_price =  0;
                  @endphp
                  @foreach($carts as $bucket)
                    <div class="list-item align-items-center"><img class="d-block rounded me-1" src="{{ asset('storage/images/medicine/'.$bucket->medicine->image.'') }}" alt="donuts" width="62">
                      <div class="list-item-body flex-grow-1"><a href="{{ route('rcart', $bucket->id) }}"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x ficon cart-item-remove"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></a>
                        <div class="media-heading">
                          <h6 class="cart-item-title"><a class="text-body" href="#"> {{$bucket->medicine->name}}</a></h6>
                        </div>
                       
                        <h5 class="cart-item-price">{{$bucket->medicine->price}}</h5>
                      </div>
                    </div>
                    @php
                    $t_price += $bucket->medicine->price;
                    @endphp
                @endforeach
              <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></li>
              <li class="dropdown-menu-footer">
                <div class="d-flex justify-content-between mb-1">
                  <h6 class="fw-bolder mb-0">Total:</h6>
                  <h6 class="text-primary fw-bolder mb-0">{{$t_price}}</h6>
                </div><a class="btn btn-primary w-100 waves-effect waves-float waves-light" href="{{ route('continue.cart') }}">Checkout</a>
              </li>
            </ul>
          </li>
               @if($expire_medicine>0)
                <li class="nav-item dropdown dropdown-cart me-25"><a class="nav-link" href="{{ route('expired') }}"><i class="fas fa-exclamation-triangle"></i><span class="badge rounded-pill bg-danger badge-up cart-item-count">{{ $expire_medicine }}</span></a>
                </li>
                @endif
                
                
                 @if($stockout_medicine>0)
                <li class="nav-item dropdown dropdown-notification me-25"><a class="nav-link" href="{{ route('stockout') }}"><i class="ficon" data-feather="bell"></i><span class="badge rounded-pill bg-danger badge-up">{{$stockout_medicine}}</span></a>
                   
                </li>
                @endif
                <li class="nav-item dropdown dropdown-user"><a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="user-nav d-sm-flex d-none"><span class="user-name fw-bolder">{{ Auth::user()->name }}</span><span class="user-status">Admin</span></div><span class="avatar"><img class="round" src="{{asset('dashboard/app-assets/images/f2.jpg')}}" alt="avatar" height="40" width="40"><span class="avatar-status-online"></span></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropDown" aria-labelledby="dropdown-user">
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('profile.setting') }}"><i class="me-50" data-feather="settings"></i> {{ __('Change Password') }}</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('profile.info.setting') }}"><i class="me-50" data-feather="settings"></i> {{ __('Change Info') }}</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}"><i class="me-50" data-feather="power"></i> {{ __('Logout') }}</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header mb-4">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item me-auto">
                    <a class="navbar-brand" href="{{ route('dashboard') }}">
                        <span class="brand-logo">
                            <img height="40" src="{{asset('dashboard/app-assets/images/logo112.png')}}" alt="Logo" />
                        </span>
                        <h4 class="brand-text">{{ Str::limit(Auth::user()->shop->name,9) }}</h4>
                    </a>
                </li>
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i></a></li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class=" nav-item {{ active_if_full_match('dashboard') }}"><a class="d-flex align-items-center" href="{{route('dashboard') }}"><i data-feather="home"></i><span class="menu-title text-truncate" data-i18n="Dashboards">{{ __('pages.dashboard') }}</span></a>
                    
                </li>
               
                <li class=" nav-item {{ active_if_match('customer/*') }}"><a class="d-flex align-items-center" href="#"><i class="fas fa-users"></i><span class="menu-title text-truncate" data-i18n="Invoice">{{ __('pages.customer') }}</span></a>
                    <ul class="menu-content">
                        <li class="{{ active_if_full_match('customer/add') }}"><a class="d-flex align-items-center" href="{{ route('customer.add') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">{{ __('pages.customer_add') }}</span></a>
                        </li>
                        <li class="{{ active_if_full_match('customer/list*') }} {{ active_if_full_match('customer/edit/*') }} {{ active_if_full_match('customer/view/*') }}"><a class="d-flex align-items-center" href="{{ route('customer.list') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Preview">{{ __('pages.customer_list') }}</span></a>
                        </li>
                    </ul>
                </li>
                
                
                
                
                 <li class=" nav-item {{ active_if_match('supplier/*') }}"><a class="d-flex align-items-center" href="#"><i class="fa-solid fa-people-carry-box"></i><span class="menu-title text-truncate" data-i18n="Invoice">{{ __('pages.supplier') }}</span></a>
                    <ul class="menu-content">
                        <li class="{{ active_if_full_match('supplier/add') }}"><a class="d-flex align-items-center" href="{{ route('supplier.add') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">{{ __('pages.supplier_add') }}</span></a>
                        </li>
                        <li class="{{ active_if_full_match('supplier/list*') }} {{ active_if_full_match('supplier/edit/*') }} {{ active_if_full_match('supplier/view/*') }}"><a class="d-flex align-items-center" href="{{ route('supplier.list') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Preview">{{ __('pages.supplier_list') }}</span></a>
                        </li>
                    </ul>
                </li>
                
                
                 <li class=" nav-item {{ active_if_match('medicines/*') }}"><a class="d-flex align-items-center" href="#"><i class="fas fa-pills"></i><span class="menu-title text-truncate" data-i18n="Invoice">{{ __('pages.medicine') }}</span></a>
                    <ul class="menu-content">
                        <li class="{{ active_if_full_match('medicines/add') }}"><a class="d-flex align-items-center" href="{{ route('medicine.add') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">{{ __('pages.medicine_add') }}</span></a>
                        </li>
                        <li class="{{ active_if_full_match('medicines/list*') }} {{ active_if_match('medicines/edit/*') }}"><a class="d-flex align-items-center" href="{{ route('medicine.list') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Preview">{{ __('pages.medicine_list') }}</span></a>
                        </li>
                        
                         <li class="{{ active_if_full_match('medicines/categories*') }}"><a class="d-flex align-items-center" href="{{ route('category') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Add">{{ __('pages.categories') }}</span></a>
                        </li>
                         <li class="{{ active_if_full_match('medicines/unit*') }}"><a class="d-flex align-items-center" href="{{ route('units') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Add">{{ __('pages.units') }}</span></a>
                        </li>
                         <li class="{{ active_if_full_match('medicines/leaf*') }}"><a class="d-flex align-items-center" href="{{ route('leaf') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Add">{{ __('pages.leaf') }}</span></a>
                        </li>
                        <li class="{{ active_if_full_match('medicines/type*') }}"><a class="d-flex align-items-center" href="{{ route('types') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Add">{{ __('pages.types') }}</span></a>
                        </li>
                    </ul>
                </li>
                
                
                <li class=" nav-item {{ active_if_match('purchase/*') }}"><a class="d-flex align-items-center" href="#"><i class="fas fa-cart-shopping"></i><span class="menu-title text-truncate" data-i18n="Invoice">{{ __('pages.purchase') }}</span></a>
                    <ul class="menu-content">
                        <li class="{{ active_if_full_match('purchase/new*') }}"><a class="d-flex align-items-center" href="{{ route('sell.index') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">{{ __('pages.new_purchase') }}</span></a>
                        </li>
                        <li class="active_if_full_match('purchase/*') }}"><a class="d-flex align-items-center" href="{{ route('purchase.reports') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Preview">{{ __('pages.purchase_history') }}</span></a>
                        </li>
                        
                    </ul>
                </li>





                <li class=" nav-item {{ active_if_match('invoice/*') }}"><a class="d-flex align-items-center" href="#"><i class="fa-solid fa-file-invoice"></i><span class="menu-title text-truncate" data-i18n="Invoice">{{translate('Invoice')}}</span></a>
                    <ul class="menu-content">
                        <li class="{{ active_if_full_match('invoice/new*') }}"><a class="d-flex align-items-center" href="{{ route('pos.index') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">{{translate('New Invoice')}}</span></a>
                        </li>
                        <li class="active_if_full_match('invoice/*') }}"><a class="d-flex align-items-center" href="{{ route('invoice.reports') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Preview">{{translate('Invoice History')}}</span></a>
                        </li>
                        
                    </ul>
                </li>
                <li class=" nav-item {{ active_if_match('report/*') }}"><a class="d-flex align-items-center" href="#"><i class="fa-solid fa-chart-line"></i><span class="menu-title text-truncate" data-i18n="Invoice">{{translate('Reports')}}</span></a>
                    <ul class="menu-content">
                        <li class="{{ active_if_full_match('invoice/new*') }}"><a class="d-flex align-items-center" href="{{ route('customer.due') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">{{ __('pages.customer_due') }}{{ __('pages.customer_due') }}</span></a>
                        </li>
                         <li class="{{ active_if_full_match('supplier/due*') }}"><a class="d-flex align-items-center" href="{{ route('supplier.due') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Add">{{ translate('Payable Manufacturer') }}</span></a>
                        </li>
                        <li class="active_if_full_match('invoice/*') }}"><a class="d-flex align-items-center" href="{{route('reports') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Preview">{{translate('Sells & Purchase Reports')}}</span></a>
                        </li>
                        <li class="active_if_full_match('invoice/*') }}"><a class="d-flex align-items-center" href="{{route('profit') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Preview">{{translate('Profit & Loss')}}</span></a>
                        </li>
                        
                    </ul>
                </li>
                
                @if(Auth::user()->shop->package_id != 5)
                <li class=" nav-item {{ active_if_full_match('prescrive.list') }}"><a class="d-flex align-items-center" href="{{route('prescrive.list') }}"><i class="fas fa-diagnoses"></i><span class="menu-title text-truncate" data-i18n="Dashboards">{{ translate('Prescription') }}</span></a>
                    
                </li>
                
                
                 <li class=" nav-item {{ active_if_full_match('test.list') }}"><a class="d-flex align-items-center" href="{{route('test.list') }}"><i class="fas fa-diagnoses"></i><span class="menu-title text-truncate" data-i18n="Dashboards">{{ translate('Diagnosis & Tests') }}</span></a>
                    
                </li>
                  <li class=" nav-item {{ active_if_match('doctor/*') }}"><a class="d-flex align-items-center" href="#"><i class="fas fa-users"></i><span class="menu-title text-truncate" data-i18n="Invoice">{{ translate('Doctor') }}</span></a>
                    <ul class="menu-content">
                        <li class="{{ active_if_full_match('doctor/add') }}"><a class="d-flex align-items-center" href="{{ route('doctor.add') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">{{ __('Add Doctor') }}</span></a>
                        </li>
                        <li class="{{ active_if_full_match('doctor/list*') }} {{ active_if_full_match('doctor/edit/*') }} {{ active_if_full_match('doctor/view/*') }}"><a class="d-flex align-items-center" href="{{ route('doctor.list') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Preview">{{ __('Doctor List') }}</span></a>
                        </li>
                    </ul>
                </li>
                @endif
                 <li class=" nav-item {{ active_if_match('plan/*') }}"><a class="d-flex align-items-center" href="#"><i class="fa-solid fa-chart-line"></i><span class="menu-title text-truncate" data-i18n="Invoice">{{translate('My Subscription')}}</span></a>
                    <ul class="menu-content">
                        <li class="{{ active_if_full_match('plan*') }}"><a class="d-flex align-items-center" href="{{ route('plan') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">{{translate('My Plan')}}</span></a>
                        </li>
                         <li class="{{ active_if_full_match('plan/renew*') }}"><a class="d-flex align-items-center" href="{{ route('renew.plan') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Add">{{ translate('Renew Subscription') }}</span></a>
                        </li>
                        
                        
                    </ul>
                </li>
                
                
                 <li class=" nav-item {{ active_if_full_match('payment_methdod/*') }}"><a class="d-flex align-items-center" href="{{route('payment.method') }}"><i class="fa-solid fa-money-bill-wave"></i><span class="menu-title text-truncate" data-i18n="Dashboards">{{ __('pages.payment_method') }}</span></a>
                    
                </li>
                
                 <li class=" nav-item {{ active_if_full_match('settings/*') }}"><a class="d-flex align-items-center" href="{{route('settings') }}"><i class="fa-solid fa-cog"></i><span class="menu-title text-truncate" data-i18n="Dashboards">{{ __('pages.site_setting') }}</span></a>
                    
                </li>
               
               @if(Auth::user()->shop->email == env('SUPERUSER'))
               <li class=" nav-item {{ active_if_match('saas/*') }}"><a class="d-flex align-items-center" href="#"><i class="fa-solid fa-file-invoice"></i><span class="menu-title text-truncate" data-i18n="Invoice">{{translate('Saas Management')}}</span></a>
                    <ul class="menu-content">
                        <li class="{{ active_if_full_match('saas/saas_management*') }}"><a class="d-flex align-items-center" href="{{ route('saas.management') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">{{translate('Manage Shop')}}</span></a>
                        </li>
                        <li class="active_if_full_match('saas/package_management*') }}"><a class="d-flex align-items-center" href="{{ route('saas.package') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Preview">{{translate('Manage Package')}}</span></a>
                        </li>
                        <li class="active_if_full_match('saas/invoice_management*') }}"><a class="d-flex align-items-center" href="{{ route('saas.invoice') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Preview">{{translate('Invoices')}}</span></a>
                        </li>
                        
                    </ul>
                </li>
                @endif
                 <li class=" nav-item {{ active_if_full_match('ecommerce/*') }}"><a class="d-flex align-items-center" href="{{route('ecommerce') }}"><i class="fa-solid fa-shopping-cart"></i><span class="menu-title text-truncate" data-i18n="Ecommerce">{{ __('Ecommerce') }}</span></a></li>
            </ul>
        </div>
    </div>
    <!-- END: Main Menu-->
    
  
@yield('content')
    
          
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light">
        <p class="clearfix mb-0"><span class="float-md-start d-block d-md-inline-block mt-25">&copy; All Rights Reseved <a href="https://ayaantec.com">Ayaan Tech Limited</a></span></p>
    </footer>
    <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ asset('dashboard/app-assets/vendors/js/vendors.min.js') }}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
  <script src="{{ asset('dashboard/app-assets/vendors/js/extensions/wNumb.min.js') }}"></script>
    <script src="{{ asset('dashboard/app-assets/vendors/js/extensions/nouislider.min.js') }}"></script>
    <script src="{{ asset('dashboard/app-assets/vendors/js/extensions/toastr.min.js') }}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('dashboard/app-assets/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('dashboard/app-assets/js/core/app.js') }}"></script>
    <!-- END: Theme JS-->

   
    <!-- END: Page JS-->
<script src="{{ asset('dashboard/app-assets/js/scripts/pages/app-ecommerce.min.js') }}"></script>
    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>
    <script>
      
jQuery(function(){
        // Add edit Attribute
        var maxField = 15; //Input fields increment limitation
        var addButton = $('.add_button'); //Add button selector
        var wrapper = $('.field_wrapper'); //Input field wrapper
        var fieldHTML = '<div class="field_wrapper"><div class="col-md-6"><div class="form-group"><label class="form-label" for="first-name-column">{{ translate('Feature Name') }}</label><input type="text" class="form-control"  name="features[]"></div></div><a href="javascript:void(0);" class="remove_button btn btn-danger my-3" title="Delete Field">Delete</a></div>'; //New input field html
        var x = 1; //Initial field counter is 1

        //Once add button is clicked
        $(addButton).click(function(){
            //Check maximum number of input fields
            if(x < maxField){
                x++; //Increment field counter
                $(wrapper).append(fieldHTML); //Add field html
            }
        });

        //Once remove button is clicked
        $(wrapper).on('click', '.remove_button', function(e){
            e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
            x--; //Decrement field counter
        });
});


    </script>
    {!! Toastr::message() !!}
    @yield('custom-js')
</body>
<!-- END: Body-->

</html>

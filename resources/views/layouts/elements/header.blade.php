<!-- BEGIN: Header-->
    <nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light  container-xxl navBar" id="desktopmenu">
        <div class="navbar-container d-flex content">
            <div class="bookmark-wrapper d-flex align-items-center">
                <ul class="nav navbar-nav d-xl-none">
                    <li class="nav-item"><a class="nav-link menu-toggle" href="#"><i class="ficon" data-feather="menu"></i></a></li>
                </ul>
            </div>
           
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
                
                <li class="nav-item dropdown dropdown-cart me-25"><a class="nav-link" href="{{ route('pos.index') }}">(POS) &nbsp;<i class="fas fa-print"></i></a>
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
                        <div class="user-nav d-sm-flex d-none"><span class="user-name fw-bolder">{{ Auth::user()->name }}</span><span class="user-status">{{ Auth::user()->role ? Auth::user()->role->name: 'Admin' }}</span></div><span class="avatar"><img class="round" @if(!empty(Auth::user()->image)) src="{{asset('storage/images/profile/'.Auth::user()->image.'')}}" @else src="{{asset('dashboard/app-assets/images/f2.jpg')}}" @endif alt="avatar" height="40" width="40"><span class="avatar-status-online"></span></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropDown shadow-lg border-0" aria-labelledby="dropdown-user">
                       
                         <a class="dropdown-item" href="{{ route('profile.setting') }}"><i class="me-50 fas fa-th" ></i> {{ __('Dashboard') }}</a>
                         <a class="dropdown-item py-1" href="{{ route('profile.setting') }}"><i class="me-50" data-feather="lock"></i> {{ __('Change Password') }}</a>
                       
                        <a class="dropdown-item py-1" href="{{ route('profile.info.setting') }}"><i class="me-50" data-feather="eye"></i> {{ __('Change Info') }}</a>
                        <a class="dropdown-item py-1" href="{{ route('settings') }}"><i class="me-50" data-feather="settings"></i> {{ __('Settings') }}</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item py-1" href="{{ route('logout') }}"><i class="me-50" data-feather="power"></i> {{ __('Logout') }}</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    
    <!-- END: Header-->
    
    
    
    <!--Mobile Menu-->
    <nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light  container-xxl navBar" id="mobilemenu" style="bottom:0">
        <div class="navbar-container d-flex content">
            <div class="bookmark-wrapper d-flex align-items-center">
                <ul class="nav navbar-nav d-xl-none">
                    <li id="mm" class="nav-item"><a class="nav-link menu-toggle" href="#"><i class="fa fa-bars"></i></a></li>
                </ul>
            </div>
            @php
            $my_pack = \App\Models\Package::where('id', Auth::user()->shop->package_id)->first();
            @endphp
            
            <!------------------
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
            --------------------->
            
            <ul id="mul" class="nav navbar-nav align-items-center">
                
                <li id="mm" class="nav-item dropdown dropdown-cart me-25"><a class="nav-link" href="{{route('profit') }}"><i class="fas fa-file-text"></i></a></li>
                
                <li id="mm" class="nav-item dropdown dropdown-cart me-25"><a class="nav-link" href="{{ route('pos.index') }}"><i class="fas fa-print"></i></a></li>
                
                <li id="mm" class="nav-item dropdown dropdown-cart me-25"><a class="nav-link" href="{{ route('profile.info.setting') }}"><i class="fas fa-cog"></i></a></li>
                
                <li id="mm" class="nav-item dropdown dropdown-cart me-25"><a class="nav-link" href="{{ route('logout') }}"><i class="fa fa-power-off"></i></a></li>
                
                <!--<li class="nav-item dropdown dropdown-user"><a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                </li> -->
            </ul>
        </div>
    </nav>
    
    <!-- END: Header-->
    

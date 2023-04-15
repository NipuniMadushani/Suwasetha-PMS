<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title -->
    <title>Create Invoice</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="">
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&amp;display=swap" rel="stylesheet">
    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="{{ asset('pos/css/vendor.min.css') }}">
    <link rel="stylesheet" href="{{ asset('pos/vendor/icon-set/style.css') }}">
    <!-- CSS Front Template -->
    <meta name="_token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('pos/css/theme.css') }}?time={{time()}}">
    @stack('css_or_js')

    <link rel="stylesheet" href="{{ asset('pos/css/style.css') }}?time={{time()}}">

    <script src="{{ asset('pos/vendor/hs-navbar-vertical-aside/hs-navbar-vertical-aside-mini-cache.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('pos/css/toastr.css') }}">
</head>

<body class="footer-offset">
{{--loader--}}
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div id="loading" class="d-none">
                <div class="pvl1">
                    <img width="200" src="{{asset('pos/img/loader.gif')}}">
                </div>
            </div>
        </div>
    </div>
</div>
{{--loader--}}
<!-- JS Preview mode only -->
    <header id="header"
            class="col-12 navbar navbar-expand navbar-fixed  navbar-container mb-4" style="background-color:#10163A;">
        <div class="navbar-nav-wrap">
            <div class="navbar-brand-wrapper">
                <!-- Logo Div-->
                <a class="navbar-brand" href="{{ route('dashboard') }}" aria-label="Front" class="pvl2">
                    <img class="pvl4"
                         src="{{asset('storage/images/admin/site_logo/'. Auth::user()->shop->site_logo)}}"
                         alt="Logo">
                </a>         
            </div>
            <!-- Secondary Content -->
            <div class="navbar-nav-wrap-content-right">
                <!-- Navbar -->
                <ul class="navbar-nav align-items-center flex-row">
                    <li class="nav-item d-none d-sm-inline-block">
                        <!-- Notification -->
                        <div class="hs-unfold">
                            <a class="btn" style="background-color:#7367f0; color:#fff;"
                               href="{{ route('dashboard') }}">
                                Back to dashboard
                            </a>
                        </div>
                        <!-- End Notification -->
                    </li>
                    <li class="nav-item d-sm-inline-block">
                        <!-- short cut key -->
                        <div class="hs-unfold">
                            <a id="short-cut" class="js-hs-unfold-invoker btn btn-icon btn-ghost-secondary rounded-circle"
                              data-toggle="modal" data-target="#short-cut-keys" title="{{translate('short_cut_keys')}}">
                                <i class="tio-keyboard"></i>
    
                            </a>
                        </div>
                        <!-- End short cut key -->
                    </li>
                    <!----
                    <li class="nav-item d-sm-inline-block">
                        
                        <div class="hs-unfold">
                            <a id="calculator" class="js-hs-unfold-invoker btn btn-icon btn-ghost-secondary rounded-circle"
                              data-toggle="modal" data-target="#calculator" title="{{translate('calculator')}}">
                                <i class="tio-calculator"></i>
    
                            </a>
                        </div>
                       
                    </li>
                    -->
                    
                    <li class="nav-item d-none d-sm-inline-block">
                        <!-- Notification -->
                        <div class="hs-unfold">
                            <a class="js-hs-unfold-invoker btn btn-icon btn-ghost-secondary rounded-circle"
                               href="">
                                <i class="tio-shopping-cart-outlined"></i>
                                {{--<span class="btn-status btn-sm-status btn-status-danger"></span>--}}
                            </a>
                        </div>
                        <!-- End Notification -->
                    </li>

                    <li class="nav-item">
                        <!-- Account -->
                        <div class="hs-unfold">
                            <a class="js-hs-unfold-invoker navbar-dropdown-account-wrapper" href="javascript:;"
                               data-hs-unfold-options='{
                                     "target": "#accountNavbarDropdown",
                                     "type": "css-animation"
                                   }'>
                                <div class="avatar avatar-sm avatar-circle">
                                    <img class="avatar-img"
                                        onerror="this.src='{{asset('pos/img/160x160/img1.jpg')}}'"
                                        src="https://fgcucdn.fgcu.edu/_resources/images/faculty-staff-male-avatar-200x200.jpg"
                                        alt="Image">
                                    <span class="avatar-status avatar-sm-status avatar-status-success"></span>
                                </div>
                            </a>

                            <div id="accountNavbarDropdown"
                                 class="hs-unfold-content dropdown-unfold dropdown-menu dropdown-menu-right navbar-dropdown-menu navbar-dropdown-account pvl3">
                                <div class="dropdown-item-text">
                                    <div class="media align-items-center text-break">
                                        <div class="avatar avatar-sm avatar-circle mr-2">
                                            <img class="avatar-img"
                                                 onerror="this.src='{{asset('pos/img/160x160/img1.jpg')}}'"
                                                 src="https://fgcucdn.fgcu.edu/_resources/images/faculty-staff-male-avatar-200x200.jpg"
                                                 alt="Owner image">
                                        </div>
                                        <div class="media-body">
                                            <span class="card-title h5">{{ auth()->user()->name }}</span>
                                            <span class="card-text">{{ auth()->user()->email }}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="dropdown-divider"></div>

                                <a class="dropdown-item" href="javascript:" onclick="Swal.fire({
                                    title: 'Do you want to logout?',
                                    showDenyButton: true,
                                    showCancelButton: true,
                                    confirmButtonColor: '#FC6A57',
                                    cancelButtonColor: '#363636',
                                    confirmButtonText: `Yes`,
                                    denyButtonText: `Don't Logout`,
                                    }).then((result) => {
                                    if (result.value) {
                                    location.href='{{route('logout')}}';
                                    } else{
                                    Swal.fire('Canceled', '', 'info')
                                    }
                                    })">
                                    <span class="text-truncate pr-2" title="Sign out">{{translate('sign_out')}}</span>
                                </a>
                            </div>
                        </div>
                        <!-- End Account -->
                    </li>
                </ul>
                <!-- End Navbar -->
            </div>
            <!-- End Secondary Content -->
        </div>
    </header>
<!-- END ONLY DEV -->
<main id="content" role="main" class="main pointer-event">
<!-- Content -->
	<!-- ========================= SECTION CONTENT ========================= -->
	<section class="section-content padding-y-sm bg-default mt-4">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-8 card padding-y-sm ">
                    <div class="card-header">
                        <div class="row w-100 d-flex justify-content-between">
                            
                            
                             <div class="col-12 col-sm-6 col-md-12 col-lg-5">
                                <div class="input-group float-right" >
                                    <select name="category" id="category" class="form-control js-select2-custom mx-1" title="select category" onchange="set_category_filter(this.value)">
                                        <option value="">{{translate('Select Supplier')}}</option>
                                        @foreach ($categories as $item)
                                        <option value="{{$item->id}}" {{$category==$item->id?'selected':''}}>{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            
                            <div class="col-sm-6 col-md-12 col-lg-5 mb-2" id="possearchdiv">
                                <form  class="col-sm-12 col-md-12 col-lg-12" id="possearch">
                                    <!-- Search -->
                                    <div class="input-group-overlay input-group-merge input-group-flush">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="tio-search"></i>
                                            </div>
                                        </div>
                                        <input id="search" autocomplete="off" type="text" value="{{$keyword?$keyword:''}}" 
                                                name="search" class="form-control search-bar-input" placeholder="Search here" 
                                                aria-label="Search here">
                                        <diV class="card search-card w-4 pvl5" style="font-weight:600">
                                            <div id="search-box" class="card-body search-result-box d-none"></div>
                                        </diV>
                                    </div>
                                    <!-- End Search -->
                                </form>
                            </div>
                           
                        </div>

                    </div>
                    @if(!empty($products))
					<div class="card-body pvl6" id="items">
                        <div class="flex-wrap mt-2 mb-3 pvl10">
                            @foreach($products as $product)
                                <div class="item-box">
                                    @include('sell._single_product',['product'=>$product])
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-12 pvl7">
                                {!!$products->links()!!}
                            </div>
                        </div>
                    </div>
                    @else
                        <h3>Your Medicine stock is empty please add!</h3>
                    @endif
                
				</div>
				<div class="col-md-4 padding-y-sm mt-2">
                    <div class="card pr-1 pl-1">
                        
                            <div class="row mt-2">
                                <div class="form-group mt-1 col-12 w-i6 d-none">
                                <select onchange="customer_change(this.value);" id='customer' name="customer_id" data-placeholder="Walk In Customer" class="js-data-example-ajax form-control">
                                    <option value="0">{{translate('walking_customer')}}</option>
                                </select>
                                <!-- <button class="btn btn-sm btn-white btn-outline-primary ml-1" type="button" title="Add Customer">
                                    <i class="tio-add-circle text-dark"></i>
                                </button> -->
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group mt-1 col-12 col-lg-6 mb-0 d-none">
                                    <button class="w-100 d-inline-block btn rounded" style="background-color:#10163A; color:#fff;" id="add_new_customer" type="button" data-toggle="modal" data-target="#add-customer" title="Add Customer">
                                       <i class="tio-add-circle-outlined"></i> {{ translate('customer')}}
                                    </button>
                                </div>
                                <div class="form-group mt-1 col-12 col-lg-6 mb-0 d-none">
                                    <a class="w-100 d-inline-block btn rounded" style="background-color:#10163A; color:#fff;"onclick="new_order()">
                                        {{ translate('new_order')}}
                                    </a>
                                </div>
                            </div>
                            <div class="row mt-2 d-none">
                                <div class="form-group col-12 mb-0">
                                    <label class="input-label text-capitalize border p-1" >{{translate('current_customer')}} : <span class="style-i4 mb-0 p-1" id="current_customer"></span></label>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="form-group mt-1 col-12 col-lg-6 mt-2 mb-0">
                                    <select id='cart_id' name="cart_id"
                                            class=" form-control js-select2-custom" onchange="cart_change(this.value);">
                                    </select>
                                </div>
    
                                <div class="form-group mt-1 col-12 col-lg-6 mt-2 mb-0">
                                    <a class="w-100 d-inline-block btn rounded" style="background-color:#7367f0; color:#fff;" onclick="clear_cart()">
                                        {{ translate('clear_cart')}}
                                    </a>
                                </div>
                            </div>
                        
                        <div class='w-100' id="cart">
                            @include('sell._cart',['cart_id'=>$cart_id])
                        </div>
                    </div>
				</div>
			</div>
		</div><!-- container //  -->
	</section>

    <!-- End Content -->
    <div class="modal fade" id="quick-view" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content" id="quick-view-modal">

            </div>
        </div>
    </div>
    <div class="modal fade" id="calculator" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{\App\CPU\translate('calculator')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <span>{{\App\CPU\translate('to_click_order')}} : alt + O</span><br>
                    <span>{{\App\CPU\translate('to_click_payment_submit')}} : alt + S</span><br>
                    <span>{{\App\CPU\translate('to_close_payment_submit')}} : alt + Z</span><br>
                    <span>{{\App\CPU\translate('to_click_cancel_cart_item_all')}} : alt + C</span><br>
                    <span>{{\App\CPU\translate('to_click_add_new_customer')}} : alt + A</span> <br>
                    <span>{{\App\CPU\translate('to_submit_add_new_customer_form')}} : alt + N</span><br>
                    <span>{{\App\CPU\translate('to_click_short_cut_keys')}} : alt + K</span><br>
                    <span>{{\App\CPU\translate('to_print_invoice')}} : alt + P</span> <br>
                    <span>{{\App\CPU\translate('to_cancel_invoice')}} : alt + B</span> <br>
                    <span>{{\App\CPU\translate('to_focus_search_input')}} : alt + Q</span> <br>
                    <span>{{\App\CPU\translate('to_click_extra_discount')}} : alt + E</span> <br>
                    <span>{{\App\CPU\translate('to_click_coupon_discount')}} : alt + D</span> <br>
                    <span>{{\App\CPU\translate('to_click_clear_cart')}} : alt + X</span> <br>
                    <span>{{\App\CPU\translate('to_click_new_order')}} : alt + R</span> <br>

                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="add-customer" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{translate('add_new_customer')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('sell.customer-store')}}" method="post" id="product_form"
                          >
                        @csrf
                            <div class="row pl-2" >
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label class="input-label" >{{translate('name')}} <span
                                                class="input-label-secondary text-danger">*</span></label>
                                        <input type="text" name="name" class="form-control" value="{{ old('name') }}"  placeholder="{{translate('name')}}" required>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label class="input-label" >{{translate('phone')}} <span
                                                class="input-label-secondary text-danger">*</span></label>
                                        <input type="tel" name="phone" class="form-control" value="{{ old('phone') }}"  placeholder="{{translate('phone')}}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row pl-2" >
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label class="input-label" >{{translate('due')}}</label>
                                        <input type="number" step="0.01" name="due" class="form-control" value="{{ old('due') }}"  placeholder="{{translate('Due')}}">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label class="input-label" >{{translate('address')}}<span
                                            class="input-label-secondary text-danger">*</span></label>
                                        <input type="text" name="address" class="form-control" value="{{ old('address') }}"  placeholder="{{translate('address')}}" required>
                                    </div>
                                </div>
                            </div>
                            
                        
                        <hr>
                        <button type="submit" id="submit_new_customer" class="btn btn-primary">{{translate('submit')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</main>
<!-- ========== END MAIN CONTENT ========== -->
<!-- JS Implementing Plugins -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<!-- JS Front -->
<script src="{{asset('pos/js/vendor.min.js') }}"></script>
<script src="{{asset('pos/js/theme.min.js') }}"></script>
<script src="{{asset('pos/js/sweet_alert.js') }}"></script>
<script src="{{asset('pos/js/toastr.js') }}"></script>
{!! Toastr::message() !!}

@if ($errors->any())
    <script>
        @foreach($errors->all() as $error)
        toastr.error('{{$error}}', Error, {
            CloseButton: true,
            ProgressBar: true
        });
        @endforeach
    </script>
@endif

<script>

        function delay(callback, ms) {
        var timer = 0;
        return function() {
            var context = this, args = arguments;
            clearTimeout(timer);
            timer = setTimeout(function () {
            callback.apply(context, args);
            }, ms || 0);
        };
        }

    $(document).on('ready', function () {
        // INITIALIZATION OF UNFOLD
        // =======================================================
        $('.js-hs-unfold-invoker').each(function () {
            var unfold = new HSUnfold($(this)).init();
        });
        $.ajax({
            url: '{{route('sell.get-cart-ids')}}',
            type: 'GET',

            dataType: 'json', // added data type
            beforeSend: function () {
                $('#loading').removeClass('d-none');
                //console.log("loding");
            },
            success: function (data) {
                //console.log(data.cus);
                var output = '';
                    for(var i=0; i<data.cart_nam.length; i++) {
                        output += `<option value="${data.cart_nam[i]}" ${data.current_user==data.cart_nam[i]?'selected':''}>${data.cart_nam[i]}</option>`;
                    }
                    $('#cart_id').html(output);
                    $('#current_customer').text(data.current_customer);
                    $('#cart').empty().html(data.view);
                    
            },
            complete: function () {
                $('#loading').addClass('d-none');
            },
        });
    });
</script>
<script>
    document.addEventListener("keydown", function(event) {
    "use strict";
    if (event.altKey && event.code === "KeyO")
    {
        $('#submit_order').click();
        event.preventDefault();
    }
    if (event.altKey && event.code === "KeyZ")
    {
        $('#payment_close').click();
        event.preventDefault();
    }
    if (event.altKey && event.code === "KeyS")
    {
        $('#order_complete').click();
        event.preventDefault();
    }
    if (event.altKey && event.code === "KeyC")
    {
        emptyCart();
        event.preventDefault();
    }
    if (event.altKey && event.code === "KeyA")
    {
        $('#add_new_customer').click();
        event.preventDefault();
    }
    if (event.altKey && event.code === "KeyN")
    {
        $('#submit_new_customer').click();
        event.preventDefault();
    }
    if (event.altKey && event.code === "KeyK")
    {
        $('#short-cut').click();
        event.preventDefault();
    }
    if (event.altKey && event.code === "KeyP")
    {
        $('#print_invoice').click();
        event.preventDefault();
    }
    if (event.altKey && event.code === "KeyQ")
    {
        $('#search').focus();
        $("#search-box").css("display", "none");
        event.preventDefault();
    }
    if (event.altKey && event.code === "KeyE")
    {
        $("#search-box").css("display", "none");
        $('#extra_discount').click();
        event.preventDefault();
    }
    if (event.altKey && event.code === "KeyD")
    {
        $("#search-box").css("display", "none");
        $('#coupon_discount').click();
        event.preventDefault();
    }
    if (event.altKey && event.code === "KeyB")
    {
        $('#invoice_close').click();
        event.preventDefault();
    }
    if (event.altKey && event.code === "KeyX")
    {
        // clear_cart();
        event.preventDefault();
    }
    if (event.altKey && event.code === "KeyR")
    {
        new_order();
        event.preventDefault();
    }
    
});
</script>
<!-- JS Plugins Init. -->
<script>
    jQuery(".search-bar-input").on('keyup',function () {
        //$('#search-box').removeClass('d-none');
        $(".search-card").removeClass('d-none').show();
        let name = $(".search-bar-input").val();
        //console.log(name);
        if (name.length >0) {
            $('#search-box').removeClass('d-none').show();
            $.get({
                url: '{{route('sell.search-products')}}',
                dataType: 'json',
                data: {
                    name: name
                },
                beforeSend: function () {
                    $('#loading').removeClass('d-none');
                },
                success: function (data) {
                    //console.log(data.count);

                    $('.search-result-box').empty().html(data.result);
                    if(data.count==1)
                    {
                        $('.search-result-box').empty().hide();
                        $('#search').val('');
                        quickView(data.id);
                    }

                },
                complete: function () {
                    $('#loading').addClass('d-none');
                },
            });
        } else {
            $('.search-result-box').empty();
        }
    });
</script>
<script>
    "use strict";
    function customer_change(val) {
        //let  cart_id = $('#cart_id').val();
        $.post({
                url: '{{route('sell.remove-discount')}}',
                data: {
                    _token: '{{csrf_token()}}',
                    //cart_id:cart_id,
                    user_id:val
                },
                beforeSend: function () {
                    $('#loading').removeClass('d-none');
                },
                success: function (data) {
                    console.log(data);

                    var output = '';
                    for(var i=0; i<data.cart_nam.length; i++) {
                        output += `<option value="${data.cart_nam[i]}" ${data.current_user==data.cart_nam[i]?'selected':''}>${data.cart_nam[i]}</option>`;
                    }
                    $('#cart_id').html(output);
                    $('#current_customer').text(data.current_customer);
                    $('#cart').empty().html(data.view);
                },
                complete: function () {
                    $('#loading').addClass('d-none');
                }
            });
    }
</script>
<script>
    "use strict";
    function clear_cart()
    {
        let url = "{{route('sell.clear-cart-ids')}}";
        document.location.href=url;
    }
</script>
<script>
    "use strict";
    function new_order()
    {
        let url = "{{route('sell.new-cart-id')}}";
        document.location.href=url;
    }
</script>
<script>
    "use strict";
    function cart_change(val)
    {
        let  cart_id = val;
        let url = "{{route('sell.change-cart')}}"+'/?cart_id='+val;
        document.location.href=url;
    }
</script>
<script>
    "use strict";
    function extra_discount()
    {
        //let  user_id = $('#customer').val();
        let discount = $('#dis_amount').val();
        let type = $('#type_ext_dis').val();
        //let  cart_id = $('#cart_id').val();
        if(discount > 0)
        {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $.post({
                url: '{{route('sell.discount')}}',
                data: {
                    _token: '{{csrf_token()}}',
                    discount:discount,
                    type:type,
                    //cart_id:cart_id
                },
                beforeSend: function () {
                    $('#loading').removeClass('d-none');
                },
                success: function (data) {
                   // console.log(data);
                    if(data.extra_discount==='success')
                    {
                        toastr.success('{{ translate('extra_discount_added_successfully') }}', {
                            CloseButton: true,
                            ProgressBar: true
                        });
                    }else if(data.extra_discount==='empty')
                    {
                        toastr.warning('{{ translate('your_cart_is_empty') }}', {
                            CloseButton: true,
                            ProgressBar: true
                        });

                    }else{
                        toastr.warning('{{ translate('this_discount_is_not_applied_for_this_amount') }}', {
                            CloseButton: true,
                            ProgressBar: true
                        });
                    }

                    $('.modal-backdrop').addClass('d-none');
                    $('#cart').empty().html(data.view);
                    
                    $('#search').focus();
                },
                complete: function () {
                    $('.modal-backdrop').addClass('d-none');
                    $(".footer-offset").removeClass("modal-open");
                    $('#loading').addClass('d-none');
                }
            });
        }else{
            toastr.warning('{{ translate('amount_can_not_be_negative_or_zero!') }}', {
                CloseButton: true,
                ProgressBar: true
            });
        }
    }
</script>
<script>

    "use strict";
    
    
    
    function evaluateTotal() {
    
  var total = $("#pvltotal").val();

var pvlpaid = $("#pvlpaid").val();

  

var duetotal = (total-pvlpaid); 
var due = duetotal.toFixed(2);
$('#pvldue').val(due);

}
    
    function coupon_discount()
    {
    
        let  coupon_code = $('#coupon_code').val();

        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $.post({
                url: '{{route('sell.coupon-discount')}}',
                data: {
                    _token: '{{csrf_token()}}',
                    coupon_code:coupon_code,
                },
                beforeSend: function () {
                    $('#loading').removeClass('d-none');
                },
                success: function (data) {
                    console.log(data);
                    if(data.coupon === 'success')
                    {
                        toastr.success('{{ translate('coupon_added_successfully') }}', {
                            CloseButton: true,
                            ProgressBar: true
                        });
                    }else if(data.coupon === 'amount_low')
                    {
                        toastr.warning('{{ translate('this_discount_is_not_applied_for_this_amount') }}', {
                            CloseButton: true,
                            ProgressBar: true
                        });
                    }else if(data.coupon === 'cart_empty')
                    {
                        toastr.warning('{{ translate('your_cart_is_empty') }}', {
                            CloseButton: true,
                            ProgressBar: true
                        });
                    }
                    else {
                        toastr.warning('{{ translate('coupon_is_invalid') }}', {
                            CloseButton: true,
                            ProgressBar: true
                        });
                    }

                    $('#cart').empty().html(data.view);
                    
                    $('#search').focus();
                },
                complete: function () {
                    $('.modal-backdrop').addClass('d-none');
                    $(".footer-offset").removeClass("modal-open");
                    $('#loading').addClass('d-none');
                }
            });

    }
</script>
<script>
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
        location.reload();
    }

    function set_category_filter(id) {
        $.post('{{ route('sell.emptyCart') }}', {_token: '{{ csrf_token() }}'}, function (data) {
            var nurl = new URL('{!!url()->full()!!}');
            nurl.searchParams.set('category_id', id);
            location.href = nurl;
        });
                
                
        
    }


    $('#search-form').on('submit', function (e) {
        e.preventDefault();
        var keyword= $('#datatableSearch').val();
        var nurl = new URL('{!!url()->full()!!}');
        nurl.searchParams.set('keyword', keyword);
        location.href = nurl;
    });

    function store_key(key, value) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{csrf_token()}}"
            }
        });
        $.post({
            url: '{{route('sell.store-keys')}}',
            data: {
                key:key,
                value:value,
            },
            success: function (data) {
                toastr.success(key+' '+'{{translate('selected')}}!', {
                    CloseButton: true,
                    ProgressBar: true
                });
            },
        });
    }

    function addon_quantity_input_toggle(e)
    {
        var cb = $(e.target);
        if(cb.is(":checked"))
        {
            cb.siblings('.addon-quantity-input').css({'visibility':'visible'});
        }
        else
        {
            cb.siblings('.addon-quantity-input').css({'visibility':'hidden'});
        }
    }
    function quickView(product_id) {
        $.ajax({
            url: '{{route('sell.quick-view')}}',
            type: 'GET',
            data: {
                product_id: product_id
            },
            dataType: 'json', // added data type
            beforeSend: function () {
                $('#loading').show();
            },
            success: function (data) {
                console.log("success...");
                console.log(data);

                // $("#quick-view").removeClass('fade');
                // $("#quick-view").addClass('show');

                $('#quick-view').modal('show');
                $('#quick-view-modal').empty().html(data.view);
            },
            complete: function () {
                $('#loading').hide();
            },
        });

       
    }

    function checkAddToCartValidity() {
        var names = {};
        $('#add-to-cart-form input:radio').each(function () { // find unique names
            names[$(this).attr('name')] = true;
        });
        var count = 0;
        $.each(names, function () { // then count them
            count++;
        });
        if ($('input:radio:checked').length == count) {
            return true;
        }
        return false;
    }

    function cartQuantityInitialize() {
        $('.btn-number').click(function (e) {
            e.preventDefault();

            var fieldName = $(this).attr('data-field');
            var type = $(this).attr('data-type');
            var input = $("input[name='" + fieldName + "']");
            var currentVal = parseInt(input.val());

            if (!isNaN(currentVal)) {
                if (type == 'minus') {

                    if (currentVal > input.attr('min')) {
                        input.val(currentVal - 1).change();
                    }
                    if (parseInt(input.val()) == input.attr('min')) {
                        $(this).attr('disabled', true);
                    }

                } else if (type == 'plus') {

                    if (currentVal < input.attr('max')) {
                        input.val(currentVal + 1).change();
                    }
                    if (parseInt(input.val()) == input.attr('max')) {
                        $(this).attr('disabled', true);
                    }

                }
            } else {
                input.val(0);
            }
        });

        $('.input-number').focusin(function () {
            $(this).data('oldValue', $(this).val());
        });

        $('.input-number').change(function () {

            minValue = parseInt($(this).attr('min'));
            maxValue = parseInt($(this).attr('max'));
            valueCurrent = parseInt($(this).val());

            var name = $(this).attr('name');
            if (valueCurrent >= minValue) {
                $(".btn-number[data-type='minus'][data-field='" + name + "']").removeAttr('disabled')
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Cart',
                    text: 'Sorry, the minimum value was reached'
                });
                $(this).val($(this).data('oldValue'));
            }
            if (valueCurrent <= maxValue) {
                $(".btn-number[data-type='plus'][data-field='" + name + "']").removeAttr('disabled')
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Cart',
                    text: 'Sorry, stock limit exceeded.'
                });
                $(this).val($(this).data('oldValue'));
            }
        });
        $(".input-number").keydown(function (e) {
            // Allow: backspace, delete, tab, escape, enter and .
            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
                // Allow: Ctrl+A
                (e.keyCode == 65 && e.ctrlKey === true) ||
                // Allow: home, end, left, right
                (e.keyCode >= 35 && e.keyCode <= 39)) {
                // let it happen, don't do anything
                return;
            }
            // Ensure that it is a number and stop the keypress
            if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                e.preventDefault();
            }
        });
    }

    function getVariantPrice() {
        if ($('#add-to-cart-form input[name=quantity]').val() > 0 && checkAddToCartValidity()) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: '{{ route('sell.variant_price') }}',
                data: $('#add-to-cart-form').serializeArray(),
                success: function (data) {
                    
                    $('#add-to-cart-form #chosen_price_div').removeClass('d-none');
                    $('#add-to-cart-form #chosen_price_div #chosen_price').html(data.price);
                    $('#set-discount-amount').html(data.discount);
                }
            });
        }
    }

    function addToCart(form_id = 'add-to-cart-form') {
        if (checkAddToCartValidity()) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $.post({
                url: `{{ route('sell.add-to-cart') }}`,
                data: $('#' + form_id).serializeArray(),
                beforeSend: function () {
                    $('#loading').show();
                },
                success: function (data) {
                    console.log(data);
                    if (data.data == 1) {
                        Swal.fire({
                            icon: 'info',
                            title: 'Cart',
                            text: "Product already added in cart"
                        });
                        return false;
                    } else if (data.data == 0) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Cart',
                            text: 'Sorry, product is out of stock.'
                        });
                        return false;
                    }
                    $('.call-when-done').click();

                    toastr.success('Item has been added in your cart!', {
                        CloseButton: true,
                        ProgressBar: true
                    });
                    $('#cart').empty().html(data.view);
                    //updateCart();
                    $('.search-result-box').empty().hide();
                    $('#search').val('');
                },
                complete: function () {
                    $('#loading').hide();
                }
            });
        } else {
            Swal.fire({
                type: 'info',
                title: 'Cart',
                text: 'Please choose all the options'
            });
        }
    }

    function removeFromCart(key) {
        //console.log(key);
        $.post('{{ route('sell.remove-from-cart') }}', {_token: '{{ csrf_token() }}', key: key}, function (data) {
            
            $('#cart').empty().html(data.view);
            if (data.errors) {
                for (var i = 0; i < data.errors.length; i++) {
                    toastr.error(data.errors[i].message, {
                        CloseButton: true,
                        ProgressBar: true
                    });
                }
            } else {
                //updateCart();
                
                toastr.info('Item has been removed from cart', {
                    CloseButton: true,
                    ProgressBar: true
                });
            }
            

        });
    }

    function emptyCart() {
        Swal.fire({
            title: '{{translate('Are_you_sure?')}}',
            text: '{{translate('You_want_to_remove_all_items_from_cart!!')}}',
            type: 'warning',
            showCancelButton: true,
            cancelButtonColor: 'default',
            confirmButtonColor: '#161853',
            cancelButtonText: 'No',
            confirmButtonText: 'Yes',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                $.post('{{ route('sell.emptyCart') }}', {_token: '{{ csrf_token() }}'}, function (data) {
                    $('#cart').empty().html(data.view);
                    toastr.info('Item has been removed from cart', {
                        CloseButton: true,
                        ProgressBar: true
                    });
                });
            }
        })
    }

    function updateCart() {
        $.post('<?php echo e(route('sell.cart_items')); ?>', {_token: '<?php echo e(csrf_token()); ?>'}, function (data) {
            $('#cart').empty().html(data);
        });
    }

   $(function(){
        $(document).on('click','input[type=number]',function(){ this.select(); });
    });


    function updateQuantity(key,batch,qty,e){
        
        if(qty!==""){
            var element = $( e.target );
            var minValue = parseInt(element.attr('min'));
            // maxValue = parseInt(element.attr('max'));
            var valueCurrent = parseInt(element.val());

            //var key = element.data('key');
        
            $.post('{{ route('sell.updateQuantity') }}', {_token: '{{ csrf_token() }}', key: key, batch: batch, quantity:qty}, function (data) {
                
                if(data.qty<0)
                {
                    toastr.warning('{{translate('product_quantity_is_not_enough!')}}', {
                        CloseButton: true,
                        ProgressBar: true
                    });
                }
                if(data.upQty==='zeroNegative')
                {
                    toastr.warning('{{translate('Product_quantity_can_not_be_zero_or_less_than_zero_in_cart!')}}', {
                        CloseButton: true,
                        ProgressBar: true
                    });
                }
                if(data.qty_update==1){
                    toastr.success('{{translate('Product_quantity_updated!')}}', {
                        CloseButton: true,
                        ProgressBar: true
                    });
                }
                $('#cart').empty().html(data.view);
            });
        }else{
            var element = $( e.target );
            var minValue = parseInt(element.attr('min'));
            var valueCurrent = parseInt(element.val());
        
            $.post('{{ route('sell.updateQuantity') }}', {_token: '{{ csrf_token() }}', key: key, quantity:minValue}, function (data) {
                
                if(data.qty<0)
                {
                    toastr.warning('{{translate('product_quantity_is_not_enough!')}}', {
                        CloseButton: true,
                        ProgressBar: true
                    });
                }
                if(data.upQty==='zeroNegative')
                {
                    toastr.warning('{{translate('Product_quantity_can_not_be_zero_or_less_than_zero_in_cart!')}}', {
                        CloseButton: true,
                        ProgressBar: true
                    });
                }
                if(data.qty_update==1){
                    toastr.success('{{translate('Product_quantity_updated!')}}', {
                        CloseButton: true,
                        ProgressBar: true
                    });
                }
                $('#cart').empty().html(data.view);
            });
        }
        
        // Allow: backspace, delete, tab, escape, enter and .
        if(e.type == 'keydown')
        {
            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
                // Allow: Ctrl+A
                (e.keyCode == 65 && e.ctrlKey === true) ||
                // Allow: home, end, left, right
                (e.keyCode >= 35 && e.keyCode <= 39)) {
                // let it happen, don't do anything
                return;
            }
            // Ensure that it is a number and stop the keypress
            if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                e.preventDefault();
            }
        }

    };

    // INITIALIZATION OF SELECT2
    // =======================================================
    $('.js-select2-custom').each(function () {
        var select2 = $.HSCore.components.HSSelect2.init($(this));
    });

    $('.js-data-example-ajax').select2({
        ajax: {
            url: '{{route('sell.customers')}}',
            data: function (params) {
                return {
                    q: params.term, // search term
                    page: params.page
                };
            },
            processResults: function (data) {
                return {
                results: data
                };
            },
            __port: function (params, success, failure) {
                var $request = $.ajax(params);

                $request.then(success);
                $request.fail(failure);

                return $request;
            }
        }
    });

    $('#order_place').submit(function(eventObj) {
        if($('#customer').val())
        {
            $(this).append('<input type="hidden" name="user_id" value="'+$('#customer').val()+'" /> ');
        }
        return true;
    });

</script>
<!-- IE Support -->
<script>
    if (/MSIE \d|Trident.*rv:/.test(navigator.userAgent)) document.write('<script src="{{asset('pos')}}/vendor/babel-polyfill/polyfill.min.js"><\/script>');
</script>
</body>
</html>
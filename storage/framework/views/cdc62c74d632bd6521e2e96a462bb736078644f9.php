<!DOCTYPE html>
<html class="loading <?php if(\App\Models\Shop::where('id', Auth::user()->shop_id)->first()->theme == 'dark'): ?> dark-layout <?php endif; ?>"
      lang="<?php echo e(session()->get('locale')); ?>"
      data-layout="dark-layout" data-textdirection="ltr">

<head>
    <meta name="title" content="Pharmacy Software Solutions (ATL-Pharma)">
    <meta name="description"
          content="Pharmacy Software Solution is built to manage overall pharmacy business activities including medicine management purchase management supplier or manufacturers management stock management sales management daily or monthly accounts management. This software is easy to use and manage with easy medicine search easy invoice creation pharmacy faster daily operation and date wise details report. ">
    <meta name="keywords"
          content="Pharmacy,Pharmacy Software, Pharmacy Management, Doctor Prescriptions,Ayaan Tech Limited, ayaantec,pharma">
    <meta name="robots" content="index, follow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="English">
    <meta name="revisit-after" content="1 days">
    <meta name="author" content="Ayaan Tech Limited">
    <!-- Primary Meta Tags -->
    <title>Pharmacy Software Solutions (ATL-Pharma)</title>
    <meta name="title" content="Pharmacy Software Solutions (ATL-Pharma)">
    <meta name="description"
          content="Pharmacy Software Solution is built to manage overall pharmacy business activities including medicine management purchase management supplier or manufacturers management stock management sales management daily or monthly accounts management. This software is easy to use and manage with easy medicine search easy invoice creation pharmacy faster daily operation and date wise details report. ">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://metatags.io/">
    <meta property="og:title" content="Pharmacy Software Solutions (ATL-Pharma)">
    <meta property="og:description"
          content="Pharmacy Software Solution is built to manage overall pharmacy business activities including medicine management purchase management supplier or manufacturers management stock management sales management daily or monthly accounts management. This software is easy to use and manage with easy medicine search easy invoice creation pharmacy faster daily operation and date wise details report. ">
    <meta property="og:image" content='<?php echo e(asset('storage/app/public/ATL Pharma Meta Tag Google.png')); ?>'>

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://metatags.io/">
    <meta property="twitter:title" content="Pharmacy Software Solutions (ATL-Pharma)">
    <meta property="twitter:description"
          content="Pharmacy Software Solution is built to manage overall pharmacy business activities including medicine management purchase management supplier or manufacturers management stock management sales management daily or monthly accounts management. This software is easy to use and manage with easy medicine search easy invoice creation pharmacy faster daily operation and date wise details report. ">
    <meta property="twitter:image"
          content="https://metatags.io/assets/meta-tags-16a33a6a8531e519cc0936fbba0ad904e52d35f34a46c97a2c9f6f7dd7d336f2.png">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <title><?php echo e(Auth::user()->shop->name); ?> - <?php echo $__env->yieldContent('title'); ?></title>
    <link rel="apple-touch-icon" href="<?php echo e(asset('dashboard/app-assets/images/ico/apple-icon-120.png')); ?>">
    
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset('storage/images/admin/favicon/'.Auth::user()->shop->favicon)); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600"
          rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css"
          href="<?php echo e(asset('dashboard/app-assets/vendors/css/vendors.min.css')); ?>?time=<?php echo e(time()); ?>">

    <meta property="og:image" content="<?php echo e(asset('pharmacy-new.jpg')); ?>"/>

    <link href="<?php echo e(asset('dashboard/app-assets/fontawesome/css/all.css')); ?>" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('dashboard/app-assets/vendors/css/charts/apexcharts.css')); ?>">
    <link rel="stylesheet" type="text/css"
          href="<?php echo e(asset('dashboard/app-assets/vendors/css/extensions/toastr.min.css')); ?>">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css"
          href="<?php echo e(asset('dashboard/app-assets/css/bootstrap.css')); ?>?time=<?php echo e(time()); ?>">
    <link rel="stylesheet" type="text/css"
          href="<?php echo e(asset('dashboard/app-assets/css/bootstrap-extended.css')); ?>?time=<?php echo e(time()); ?>">
    <link rel="stylesheet" type="text/css"
          href="<?php echo e(asset('dashboard/app-assets/css/colors.min.css')); ?>?time=<?php echo e(time()); ?>">
    <link rel="stylesheet" type="text/css"
          href="<?php echo e(asset('dashboard/app-assets/css/components.css')); ?>?time=<?php echo e(time()); ?>">
    <link rel="stylesheet" type="text/css"
          href="<?php echo e(asset('dashboard/app-assets/css/themes/dark-layout.css')); ?>?time=<?php echo e(time()); ?>">
    <link rel="stylesheet" type="text/css"
          href="<?php echo e(asset('dashboard/app-assets/css/themes/bordered-layout.css')); ?>?time=<?php echo e(time()); ?>">
    <link rel="stylesheet" type="text/css"
          href="<?php echo e(asset('dashboard/app-assets/css/themes/semi-dark-layout.css')); ?>?time=<?php echo e(time()); ?>">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css"
          href="<?php echo e(asset('dashboard/app-assets/css/core/menu/menu-types/vertical-menu.css')); ?>?time=<?php echo e(time()); ?>">
    <link rel="stylesheet" type="text/css"
          href="<?php echo e(asset('dashboard/app-assets/css/pages/dashboard-ecommerce.css')); ?>?time=<?php echo e(time()); ?>">
    <link rel="stylesheet" type="text/css"
          href="<?php echo e(asset('dashboard/app-assets/css/plugins/charts/chart-apex.css')); ?>?time=<?php echo e(time()); ?>">
    <link rel="stylesheet" type="text/css"
          href="<?php echo e(asset('dashboard/app-assets/css/plugins/extensions/ext-component-toastr.css')); ?>">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css"
          href="<?php echo e(asset('dashboard/assets/css/style.css')); ?>?time=<?php echo e(time()); ?>">
    <!-- END: Custom CSS-->
    <?php echo $__env->yieldContent('custom-css'); ?>
    <style>
        .main-menu.menu-dark .navigation > li ul .open > a,
        .main-menu.menu-dark .navigation > li ul .sidebar-group-active > a {
            background: linear-gradient(118deg, #7367f0, rgba(115, 103, 240, 0.7)) !important;
            box-shadow: 0 0 10px 1px rgb(115 103 240 / 70%) !important;
            color: #fff !important;
            font-weight: 400;
            border-radius: 4px;
        }
        .py-1{
            padding-top: 1rem !important;
            padding-bottom: 1rem !important;
        }
        .dropdown-item{
            padding: 1rem 1rem!important;
        }
    </style>

</head>

<body class="vertical-layout vertical-menu-modern navbar-floating footer-static" data-open="click"
      data-menu="vertical-menu-modern" data-col="">
    
    <?php 
     $setting = Auth::user()->shop;
    ?>
<!-- Header -->
<?php echo $__env->make('layouts.elements.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!--End Header -->
<?php


?>
<!-- Sidebar -->
<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header mb-4">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item me-auto">
                <a class="navbar-brand" href="<?php echo e(route('dashboard')); ?>">
                        <span class="brand-logo">
                            <img height="40" src="<?php echo e(asset('storage/images/admin/site_logo/'.$setting->site_logo)); ?>"
                                 alt="Logo"/>
                             
                        </span>
                    <h4 class="brand-text"><?php echo e(Str::limit($setting->name, 9)); ?></h4>
                </a>
            </li>
            <li class="nav-item nav-toggle">
                <a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse">
                    <i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i>
                    <i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary"
                       data-feather="disc" data-ticon="disc"></i>
                </a>
            </li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <?php if(Auth::user()->role_id == 1 && empty(\App\Models\User::get_permissions())): ?>
            <?php echo $__env->make('layouts.menus.shop_admin_route', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php elseif(Auth::user()->role_id != null && !empty(\App\Models\User::get_permissions())): ?>
            <?php echo $__env->make('layouts.menus.shop_user_route', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
    </div>
</div>
<!-- End Sidebar -->


<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <?php echo $__env->yieldContent('content'); ?>

        </div>
    </div>
</div>
<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<!-- BEGIN: Footer-->
<button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
<!-- END: Footer-->


<!-- BEGIN: Vendor JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="<?php echo e(asset('dashboard/app-assets/vendors/js/vendors.min.js')); ?>"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->

<script src="<?php echo e(asset('dashboard/app-assets/vendors/js/extensions/toastr.min.js')); ?>"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="<?php echo e(asset('dashboard/app-assets/js/core/app-menu.js')); ?>"></script>
<script src="<?php echo e(asset('dashboard/app-assets/js/core/app.js')); ?>"></script>
<!-- END: Theme JS-->


<!-- END: Page JS-->

<script>
    $(window).on('load', function () {
        if (feather) {
            feather.replace({
                width: 14,
                height: 14
            });
        }
    })
</script>
<script>
    jQuery(function () {
        // Add edit Attribute
        var maxField = 15; //Input fields increment limitation
        var addButton = $('.add_button'); //Add button selector
        var wrapper = $('.field_wrapper'); //Input field wrapper
        var fieldHTML =
            '<div class="field_wrapper"><div class="col-md-6"><div class="form-group"><label class="form-label" for="first-name-column"><?php echo e(translate('Feature Name')); ?></label><input type="text" class="form-control"  name="features[]"></div></div><a href="javascript:void(0);" class="remove_button btn btn-danger my-3" title="Delete Field">Delete</a></div>'; //New input field html
        var x = 1; //Initial field counter is 1

        //Once add button is clicked
        $(addButton).click(function () {
            //Check maximum number of input fields
            if (x < maxField) {
                x++; //Increment field counter
                $(wrapper).append(fieldHTML); //Add field html
            }
        });

        //Once remove button is clicked
        $(wrapper).on('click', '.remove_button', function (e) {
            e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
            x--; //Decrement field counter
        });
    });

    document.onkeydown = (keyDownEvent) => {

        isKeyPressed[keyDownEvent.key] = true;
        if (isKeyPressed[18] && isKeyPressed[80]) {
            window.location = "urltest.html";
        }
    };
</script>
<?php echo Toastr::message(); ?>

<?php echo $__env->yieldContent('custom-js'); ?>
</body>
<!-- END: Body-->

</html>
<?php /**PATH C:\xampp\htdocs\pharmacyapp\resources\views/layouts/app.blade.php ENDPATH**/ ?>
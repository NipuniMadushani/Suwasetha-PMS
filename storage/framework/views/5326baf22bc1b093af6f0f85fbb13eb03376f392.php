<html>
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
    <link rel="stylesheet" href="<?php echo e(asset('pos/css/vendor.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('pos/vendor/icon-set/style.css')); ?>">
    <!-- CSS Front Template -->
    <meta name="_token" content="<?php echo e(csrf_token()); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('pos/css/theme.css')); ?>?time=<?php echo e(time()); ?>">
    <?php echo $__env->yieldPushContent('css_or_js'); ?>

    <link rel="stylesheet" href="<?php echo e(asset('pos/css/style.css')); ?>?time=<?php echo e(time()); ?>">

    <script src="<?php echo e(asset('pos/vendor/hs-navbar-vertical-aside/hs-navbar-vertical-aside-mini-cache.js')); ?>"></script>
    <link rel="stylesheet" href="<?php echo e(asset('pos/css/toastr.css')); ?>">
    <style media="all">
        * {
            margin: 0;
            padding: 0;
            line-height: 1.3;
            font-family: sans-serif;
            color: #333542;
            -webkit-print-color-adjust: exact;
        }


        /* IE 6 */
        * html .footer {
            position: absolute;
            top: expression((0-(footer.offsetHeight)+(document.documentElement.clientHeight ? document.documentElement.clientHeight : document.body.clientHeight)+(ignoreMe = document.documentElement.scrollTop ? document.documentElement.scrollTop : document.body.scrollTop))+'px');
        }

        body {
            font-size: .875rem;
        }

        .gry-color *,
        .gry-color {
            color: #333542;
        }

        table {
            width: 100%;
        }

        table th {
            font-weight: normal;
        }

        table.padding th {
            padding: .5rem .7rem;
        }

        table.padding td {
            padding: .7rem;
        }

        table.sm-padding td {
            padding: .2rem .7rem;
        }

        .border-bottom td,
        .border-bottom th {
            border-bottom: 0px solid #3b71de;
        }

        .col-12 {
            width: 100%;
        }

        [class*='col-'] {
            float: left;
            /*border: 1px solid #F3F3F3;*/
        }

        .row:after {
            content: ' ';
            clear: both;
            display: block;
        }

        .wrapper {
            width: 100%;
            height: auto;
            margin: 0 auto;
        }

        .header-height {
            height: 15px;
            border: 1px #3b71de;
            background: #3b71de;
        }

        .content-height {
            display: flex;
        }

        .customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        table.customers {
            background-color: #FFFFFF;
        }

        table.customers > tr {
            background-color: #FFFFFF;
        }

        table.customers tr > td {
            border-bottom: 1px solid #000;
        }

        .header {
            border: 1px solid #ecebeb;
        }

        .customers th {
            border: 1px solid #000;
            padding: 8px;
        }

        .customers td {
            border: 1px solid #000;
            padding: 6px;
        }

        .customers th {
            color: white;
            padding-top: 6px;
            padding-bottom: 6px;
            text-align: left;
        }

        .bg-primary {

            font-size: 0.95rem !important;
            text-align: left;
            color: white;
            background-color: #3b71de;
        }

        .bg-secondary {
            /*font-weight: bold !important;*/
            font-size: 0.95rem !important;
            text-align: left;
            color: #333542 !important;
            background-color: #E6E6E6;
        }

        .big-footer-height {
            height: 250px;
            display: block;
        }

        .table-total {
            font-family: Arial, Helvetica, sans-serif;
        }

        .table-total th, td {
            text-align: left;
            padding: 10px;
        }

        .footer-height {
            height: 75px;
        }

        .for-th {
            color: white;
        



        }

        .for-th-font-bold {
            /*font-weight: bold !important;*/
            font-size: 0.95rem !important;
            text-align: left !important;
            color: #333542 !important;
            background-color: #E6E6E6;
        }

        .for-tb {
            margin: 10px;
        }

        .for-tb td {
            /*margin: 10px;*/
            border-style: hidden;
        }


        .text-left {
            text-align: left;
        }

        .text-right {
            text-align: right;
        }

        .small {
            font-size: .85rem;
        }

        .currency {

        }

        .strong {
            font-size: 0.95rem;
        }

        .bold {
            font-weight: bold;
        }

        .for-footer {
            position: relative;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: rgb(214, 214, 214);
            height: auto;
            margin: auto;
            text-align: center;
        }

        .flex-start {
            display: flex;
            justify-content: flex-start;
        }

        .flex-end {
            display: flex;
            justify-content: flex-end;
        }

        .flex-between {
            display: flex;
            justify-content: space-between;
        }

        .inline {
            display: inline;
        }

        .content-position {
            padding: 15px 40px;
        }

        .content-position-y {
            padding: 0px 15px;
        }

        .triangle {
            width: 0;
            height: 0;

            border: 22px solid #3b71de;

            border-top-color: transparent;
            border-bottom-color: transparent;
            border-right-color: transparent;
        }

        .triangle2 {
            width: 0;
            height: 0;
            border: 22px solid white;
            border-top-color: white;
            border-bottom-color: white;
            border-right-color: white;
            border-left-color: transparent;
        }

        .h1 {
            font-size: 12px;
            margin-block-start: 0.67em;
            margin-block-end: 0.67em;
            margin-inline-start: 0px;
            margin-inline-end: 0px;
            font-weight: bold;
        }

        .h2 {
            font-size: 1.5em;
            margin-block-start: 0.83em;
            margin-block-end: 0.83em;
            margin-inline-start: 0px;
            margin-inline-end: 0px;
            font-weight: bold;
        }

        .h4 {
            font-weight: bold;
        }

        .montserrat-normal-600 {
            font-family: Montserrat;
            font-style: normal;
            font-weight: 600;
            font-size: 18px;
            line-height: 6px;
            /* or 150% */


            color: #363B45;
        }

        .montserrat-bold-700 {
            font-family: Montserrat;
            font-style: normal;
            font-weight: 700;
            font-size: 18px;
            line-height: 6px;
            /* or 150% */


            color: #363B45;
        }

        .text-white {
            color: white !important;
        }

        .bs-0 {
            border-spacing: 0;
        }

        p, li, h2, h3, h4, td, th {
            font-size: 12px;
        }

        .table thead th {
            border: 1px solid #fff;
            color: #fff;

        }

        .table thead th {
            background-color: #2A3547;

        }

        .table thead th:first-child {
            background-color: #8AB937;
        }

        .table thead th:first {
            background-color: #8AB937;
        }

        .table tbody tr td {
            border: 1px solid black;
        }

        .tb-dotted {
            border-top: 1px dotted black;
            padding: 20px;
            border-bottom: 1px dotted black;
        }

        .bg-secondary {
            background-color: #71869d !important;
            -webkit-print-color-adjust: exact;
        }

        @media  screen, print {

            .bg-secondary {
                background-color: #71869d !important;
            }
        }

        .first {
            position: relative;
            z-index: 1;
        }

        .first::after {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            width: 50%;
            height: 100%;
            background-color: #101010;
            z-index: -1;
            clip-path: polygon(0 0, 100% 0, 74% 100%, 0% 100%);
        }

        .first::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            width: 51%;
            height: 80%;
            background-color: #8AB937;
            z-index: -1;
            clip-path: polygon(0 0, 100% 0, 80% 100%, 0% 100%);
            box-shadow: 10px 10px 120px rgba(0, 0, 0, 1);
        }

    </style>
</head>
<body style="width:50%;margin:50px auto;border: 1px solid #dfdfdf;;padding:10px; box-shadow: 0 0 15px rgb(0 0 0 / 15%);">
<?php
    $id = $order_id ??  session()->get('last_order');
    $order=\App\Models\Purchase::find($id)
?>
<?php if($order): ?>
    <button id="print_invoice" type="button" class="btn btn-primary non-printable"
            style="position:absolute; right: 25%; top: 1%;background-color: #8AB937; border: 1px solid #8AB937; cursor: pointer; font-size: 12px"
            onclick="printDiv('printableArea')"
    >Print Now
    </button>
    <a href="<?php echo e(route('sell.index')); ?>" id="print_invoice" type="button" class="btn btn-primary non-printable"
            style="position: absolute;
    left: 25%;
    top: 1%;
    background-color: #2a3547;
    border: 1px solid #000000;
    cursor: pointer;
    font-size: 12px;"

    >Back to List
    </a>
    <div class="" id="printableArea">
        <div class="first" style="display: block; height:auto !important;>
        <table class=">
            <?php
                $logo = App\Models\Logo::where('user_id',Auth::id())->first();
                $setting = Auth::user()->shop;
            ?>
            <tr>
                <th style="text-align: left">
                    <?php if( $logo): ?>
                        <img height="70" width="200"
                             src="<?php echo e(asset('storage/images/admin/site_logo/'.$setting->site_logo)); ?>" alt="">
                    <?php endif; ?>
                    <?php if( !$logo): ?>
                        <img height="70" width="200" class="logo"
                             src="<?php echo e(asset('storage/images/admin/site_logo/'.$setting->site_logo)); ?>" alt=""
                             style="margin-top: 15px; margin-left: 9px">
                    <?php endif; ?>
                </th>
                <th>
                    <div class="text-right" style="padding: 0 0 10px 0; float:right">
                        <h2 class=""
                            style="font-size: 25px; margin-bottom: 0; color: #8AB937"><?php echo e(Auth::user()->shop->name); ?></h2>
                        <h5 class="" style="font-size: 0.5rem; margin-bottom: 0">
                            <?php echo e(Auth::user()->shop->address); ?>

                            <h5 class="" style="font-size: 0.5rem; margin-bottom: 0">
                                <?php echo e(\App\CPU\translate('Phone')); ?>

                                : <?php echo e(Auth::user()->shop->phone); ?>

                            </h5>
                    </div>
                </th>
            </tr>
            </table>

            <table class="bs-0">
                <tr>
                    <th class="content-position-y"
                        style="padding-right: 0; height: 44px; text-align: left;background:#8AB937">
                        <div>
                            <span class="inline text-white text-uppercase" style="font-size: 18px"><?php echo e(translate('Purchase Invoice')); ?> # </span>
                            <span class="inline">
                            <span class="h4 text-white" style="display: inline"><?php echo e($order->id); ?></span>
                        </span>
                        </div>
                    </th>
                    <th class="content-position-y"
                        style="text-align: right; height: 44px;background-color: #2A3547;color: #fff">
                        <span class="h4 inline" style="color: #fff;padding-right: 15px; font-size: 17px"><?php echo e(translate('date')); ?> :  <?php echo e(date('d/M/Y h:i a',strtotime($order['created_at']))); ?> </span>

                    </th>
                </tr>
            </table>
        </div>
        <div class="row mt-3">
            <div class="col-6">
                <h5><?php echo e(\App\CPU\translate('Order ID')); ?> : <?php echo e($order['id']); ?></h5>
            </div>

            <?php if($order->customer): ?>
                <div class="col-12">
                    <h5><?php echo e(\App\CPU\translate('Supplier Name')); ?> : <?php echo e($order->supplier->name); ?>dddddd</h5>
                    <?php if($order->customer->id !=0): ?>
                        <h5><?php echo e(\App\CPU\translate('Phone')); ?> : <?php echo e($order->supplier->phone); ?></h5>
                    <?php endif; ?>

                </div>
            <?php endif; ?>
        </div>
        <h5 class="text-uppercase"></h5>
        <table class="table table-bordered mt-2">
            <thead>
            <tr>
                <th class="" style="width: 40%; font-size:12px"><?php echo e(\App\CPU\translate('Product Name')); ?></th>
                <th class="pvl36" style="width: 15%; font-size:12px"><?php echo e(\App\CPU\translate('Quantity')); ?></th>
                <th class="pvl36" style="width: 15%;font-size:12px"><?php echo e(\App\CPU\translate('Vat')); ?></th>
                <th class="pvl36" style="width: 15%; font-size:12px"><?php echo e(\App\CPU\translate('Price')); ?></th>
                <th class="pvl36" style="width: 15%; font-size:12px"><?php echo e(\App\CPU\translate('Total')); ?></th>
            </tr>
            </thead>
            <tbody>
            <?php
                $total = 0;
                $paid = \App\Models\PurchasePay::where('invoice_id', $order->id)->sum('amount');
                $medicine = \App\Models\Batch::where('purchase_id', $order->id)->get();
                $total_vat = 0;

            ?>
            <?php $__currentLoopData = $medicine; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $batch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <?php


                    $total += ($batch->buy_price*$batch->qty);
                    $total_vat += ($batch->medicine->vat *$batch->qty);
                ?>
                <tr>
                    <td class="">
                        <span class="" style="font-weight: 600; color: #2A3547"> <?php echo e(Str::limit($batch->medicine->name, 150)); ?> (<?php echo e(Str::limit($batch->medicine->strength, 50)); ?>)</span>
                    </td>
                    <td class="" style="font-weight: 600; color: #2A3547">
                        <?php echo e($batch->qty); ?>

                    </td>
                    <td class="" style="font-weight: 600; color: #2A3547">
                        <?php echo e($batch->medicine->vat); ?>

                    </td>

                    <td class="" style="font-weight: 600; color: #2A3547">
                        <?php echo e((number_format($batch->buy_price, 2))); ?>

                    </td>
                    <td class="" style="font-weight: 600; color: #2A3547">
                        <?php echo e(number_format(($batch->buy_price+$batch->medicine->vat)*$batch->qty, 2)); ?>

                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <div class="row justify-content-md-end pr-5 mb-3">
            <div class="col-md-8 col-lg-8">
                <dl class="row text-right pvl39 border">
                    <dt class="col-9 border-bottom py-1" style="font-size:17px"><?php echo e(\App\CPU\translate('Subtotal')); ?>:</dt>
                    <dd class="col-3 border-bottom mb-0"><?php echo e(\App\CPU\Helpers::currency_converter(round($total,2))); ?></dd>

                    <dt class="col-9 border-bottom py-1" style="font-size:17px"><?php echo e(\App\CPU\translate('extra_discount')); ?>

                        :
                    </dt>
                    <dd class="col-3 border-bottom mb-0"><?php echo e(\App\CPU\Helpers::currency_converter(round($order->discount,2))); ?></dd>

                    <dt class="col-9 border-bottom py-1" style="font-size:17px"><?php echo e(\App\CPU\translate('paid')); ?>:</dt>
                    <dd class="col-3 border-bottom mb-0"><?php echo e(\App\CPU\Helpers::currency_converter(round($paid,2))); ?></dd>

                    <dt class="col-9 border-bottom py-1" style="font-size:17px"><?php echo e(\App\CPU\translate('due')); ?>:</dt>
                    <dd class="col-3 border-bottom mb-0"><?php echo e(\App\CPU\Helpers::currency_converter(round($order->due_price,2))); ?></dd>

                    <dt class="col-9 border-bottom py-1" style="font-size:17px"><?php echo e(\App\CPU\translate('Vat+')); ?>:</dt>
                    <dd class="col-3 border-bottom mb-0"><?php echo e(\App\CPU\Helpers::currency_converter(round($total_vat,2))); ?></dd>

                    <dt class="col-9 pvl40 py-1"
                        style="font-size:18px; background-color: #8AB937; color: #fff"><?php echo e(\App\CPU\translate('Total')); ?>:
                    </dt>
                    <dd class="col-3 mb-0 pvl40 pt-1"
                        style="background-color: #8AB937; color: #fff"><?php echo e(\App\CPU\Helpers::currency_converter(round($order->total_price+$total_vat,2))); ?></dd>
                </dl>
            </div>
        </div>
        <div class="d-flex flex-row justify-content-between border-top">
            <span><?php echo e(\App\CPU\translate('Paid_by')); ?>: <?php echo e($order->method->name); ?></span>
        </div>
        <h5 class="text-center pt-3 tb-dotted">
            ~~<?php echo e(\App\CPU\translate('THANK YOU')); ?>~~
        </h5>
        <div class="">
            <section class='' style="background-color: #8AB937;">
                <table style="width: 100%">
                    <tr>
                        <th class="content-position-y" style="padding-top:10px; padding-bottom:10px;text-align: left; width: 100%; display:flex;    align-items: center;
    justify-content: space-between;">
                            <div class="text-white" style="padding-top:5px; padding-bottom:2px;"><i
                                        class="fa fa-phone text-white"></i> <?php echo e(translate('phone')); ?>

                                : <?php echo e(Auth::user()->shop->phone); ?></div>
                            <div class="text-white" style="padding-top:5px; padding-bottom:2px;"><i
                                        class="fa fa-globe text-white" aria-hidden="true"></i> <?php echo e(translate('website')); ?>

                                : <?php echo e(url('/')); ?></div>
                            <div class="text-white" style="padding-top:5px; padding-bottom:2px;"><i
                                        class="fa fa-envelope text-white" aria-hidden="true"></i> <?php echo e(translate('email')); ?>

                                : <?php echo e(Auth::user()->shop->email); ?></div>
                        </th>
                        <th class="content-position-y" style="text-align: right; ">

                        </th>
                    </tr>
                </table>
            </section>
        </div>
    </div>
<?php endif; ?>
<script>
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
        location.reload();
    }
</script>
</body>
</html><?php /**PATH C:\xampp\htdocs\pharmacyapp\resources\views/sell/order/invoice.blade.php ENDPATH**/ ?>
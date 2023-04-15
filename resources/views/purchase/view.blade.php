@extends('layouts.app')
@section('title', $customer->name)
@section('custom-css')
<link rel="stylesheet" type="text/css" href="{{ asset('dashboard/app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('dashboard/app-assets/css/plugins/forms/pickers/form-flat-pickr.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('dashboard/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('dashboard/app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('dashboard/app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('dashboard/app-assets/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css') }}">
<style media="all">
        
        /* IE 6 */
        * html .footer {
            position: absolute;
            top: expression((0-(footer.offsetHeight)+(document.documentElement.clientHeight ? document.documentElement.clientHeight : document.body.clientHeight)+(ignoreMe = document.documentElement.scrollTop ? document.documentElement.scrollTop : document.body.scrollTop))+'px');
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
            /*font-weight: bold !important;*/
            font-size: 0.95rem !important;
            text-align: left;
            color: white;
            {{--background-color:  {{$web_config['primary_color']}};--}}
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
        {{--border: 1px solid  {{$web_config['primary_color']}};--}}



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

        @media screen, print {

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
        .purchase-return-invoice {
            margin: 20px 120px;
            border: 1px solid #c2c2c2;
            padding: 10px;
        }

    </style>
@endsection
@section('content')
<button id="print_invoice" type="button" class="btn non-printable"
            style="    position: relative;
    left: 77%;
    top: 15%;
    background-color: #8AB937;
    border: 1px solid #8AB937;
    cursor: pointer;
    font-size: 15px;"
            onclick="printDiv('printableArea')"
    >Print Now
    </button>
<div class="purchase-return-invoice">
    
    <div class="" id="printableArea">
        <div class="first" style="display: block; height:auto !important;">
            <table class=" content-position">
                <img height="70" width="200" class="logo" src="https://pharmacyss.com/public/saas/img/Logo.png" alt=""
                     style="margin-top: 15px; margin-left: 9px">
           
                <div class="text-right" style="padding: 0 0 10px 0; float:right">
                    <h2 class="" style="font-size: 25px; margin-bottom: 0; color: #8AB937">ATL Demo Pharma</h2>
                    <h5 class="" style="font-size: 0.5rem; margin-bottom: 0">
                        H-24, Road-14, Niketan, Dhaka-1212
                    </h5><h5 class="" style="font-size: 0.5rem; margin-bottom: 0">
                        Phone
                        : 01973198574
                    </h5>
                </div>
                <table class="bs-0">
                    <tbody>
                    <tr>
                        <th class="content-position-y"
                            style="padding-right: 0; height: 44px; text-align: left;background:#8AB937">
                            <div>
                                <span class="inline text-white text-uppercase" style="font-size: 18px">Purchase Invoice # </span>
                                <span class="inline">
                            <span class="h4 text-white" style="display: inline">585</span>
                        </span>
                            </div>
                        </th>
                        <th class="content-position-y"
                            style="text-align: right; height: 44px;background-color: #2A3547;color: #fff">
                            <span class="h4 inline" style="color: #fff;padding-right: 15px; font-size: 17px">Date :  12/Dec/2022 02:59 pm </span>

                        </th>
                    </tr>
                    </tbody>
                </table>
            </table>
        </div>
        <div class="row mt-3">
            <div class="col-6">
                <h5>Order ID : 585</h5>
            </div>
            <div class="col-6">
                <h5 class="pvl34">
                    12/Dec/2022 02:59 pm
                </h5>
            </div>
        </div>
        <h5 class="text-uppercase"></h5>
        <table class="table table-bordered mt-3">
            <thead>
            <tr>
                <th class="" style="width: 40%">Product Name</th>
                <th class="pvl36" style="width: 15%">Quantity</th>
                <th class="pvl36" style="width: 15%">Vat</th>
                <th class="pvl36" style="width: 15%">Price</th>
                <th class="pvl36" style="width: 15%">Total Price</th>
            </tr>
            </thead>

            <tbody>


            <tr>
                <td class="">
                    <span class="" style="font-weight: 600; color: #2A3547"> Petorolac (10 mg)</span>
                </td>
                <td class="" style="font-weight: 600; color: #2A3547">
                    1
                </td>
                <td class="" style="font-weight: 600; color: #2A3547">
                    0.00
                </td>

                <td class="" style="font-weight: 600; color: #2A3547">
                    4.00
                </td>
                <td class="" style="font-weight: 600; color: #2A3547">
                    4.00
                </td>
            </tr>


            </tbody>
        </table>
        
        <div class="row justify-content-md-end pr-5 mb-3">
            <div class="col-md-8 col-lg-8">
                <dl class="row text-right pvl39 border">
                    <dt class="col-9 border-bottom py-1" style="font-size:17px">Subtotal:</dt>
                    <dd class="col-3 border-bottom mb-0">4</dd>

                    <dt class="col-9 border-bottom py-1" style="font-size:17px">Extra discount:</dt>
                    <dd class="col-3 border-bottom mb-0">0</dd>

                    <dt class="col-9 border-bottom py-1" style="font-size:17px">Paid:</dt>
                    <dd class="col-3 border-bottom mb-0">4</dd>

                    <dt class="col-9 border-bottom py-1" style="font-size:17px">Due:</dt>
                    <dd class="col-3 border-bottom mb-0">0</dd>

                    <dt class="col-9 border-bottom py-1" style="font-size:17px">Vat+:</dt>
                    <dd class="col-3 border-bottom mb-0">0</dd>

                    <dt class="col-9 pvl40 py-1" style="font-size:18px; background-color: #8AB937; color: #fff">Total:
                    </dt>
                    <dd class="col-3 mb-0 pvl40 pt-1" style="background-color: #8AB937; color: #fff">4</dd>
                </dl>
            </div>
        </div>
        <div class="d-flex flex-row justify-content-between border-top">
            <span>Paid by: Bkash</span>
        </div>

        <h5 class="text-center pt-3 tb-dotted">
            ~~THANK YOU~~
        </h5>


        <div class="">
            <section class="" style="background-color: #8AB937;">
                <table style="width: 100%">
                    <tbody>
                    <tr>
                        <th class="content-position-y" style="padding-top:10px; padding-bottom:10px;text-align: left; width: 100%; display:flex;    align-items: center;
    justify-content: space-between;">
                            <div class="text-white" style="padding-top:5px; padding-bottom:2px;"><i
                                        class="fa fa-phone text-white"></i> Phone
                                : 01973198574
                            </div>
                            <div class="text-white" style="padding-top:5px; padding-bottom:2px;"><i
                                        class="fa fa-globe text-white" aria-hidden="true"></i> Website
                                : https://pharmacyss.com
                            </div>
                            <div class="text-white" style="padding-top:5px; padding-bottom:2px;"><i
                                        class="fa fa-envelope text-white" aria-hidden="true"></i> Email
                                : astha@ayaantec.com
                            </div>
                        </th>
                        <th class="content-position-y" style="text-align: right; ">

                        </th>
                    </tr>
                    </tbody>
                </table>
            </section>
        </div>
        
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
    </div>
</div>
@endsection

@section('custom-js')


 <!-- BEGIN: Page Vendor JS-->
 

    <script src="{{ asset('dashboard/app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ asset('dashboard/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('dashboard/app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js') }}"></script>
    
    <script src="{{ asset('dashboard/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js') }}"></script>
    <script src="{{ asset('dashboard/app-assets/vendors/js/tables/datatable/jszip.min.js') }}"></script>
    <script src="{{ asset('dashboard/app-assets/vendors/js/tables/datatable/pdfmake.min.js') }}"></script>
    <script src="{{ asset('dashboard/app-assets/vendors/js/tables/datatable/vfs_fonts.js') }}"></script>
    <script src="{{ asset('dashboard/app-assets/vendors/js/tables/datatable/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('dashboard/app-assets/vendors/js/tables/datatable/buttons.print.min.js') }}"></script>
    <script src="{{ asset('dashboard/app-assets/vendors/js/tables/datatable/dataTables.rowGroup.min.js') }}"></script>
   <script src="{{ asset('dashboard/app-assets/js/scripts/pages/app-invoice.min.js') }}"></script>
    <!-- END: Page Vendor JS-->
     <script>
         $(function () {
    
    var table = $('.datatable-project').DataTable({
        processing: true,
        serverSide: false,
        
    });
    
  });
     </script>
@endsection
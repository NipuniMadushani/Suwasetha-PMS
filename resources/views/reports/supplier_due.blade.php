@extends('layouts.app')
@section('title', __('pages.supplier_list'))
@section('custom-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/app-assets/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css') }}">
@endsection
@section('content')
    <section class="app-user-list">
        <div class="card">
        <div class="card-body border-bottom">
            <h4 class="card-title">{{ __('pages.supplier_list') }}</h4>
            <div class="row">
                <div class="col-md-4 user_role"></div>
                <div class="col-md-4 user_plan"></div>
                <div class="col-md-4 user_status"></div>
            </div>
        </div>
         @php 
                     $setting = Auth::user()->shop;
                    @endphp
        <div class="row justify-content-center">
            <div class="col-lg-4 mx-3 my-2">
                <div class="bg-success p-2 text-center" role="alert">
                  <h2 class="text-light">Total Previous Due <br> <span class="">{{$setting->currency ?? 'TK'}} {{ $total_previous_payable  }}</span></h2>
                </div>
            </div>
            <div class="col-lg-4 mx-3 my-2">
                <div class="bg-info p-2 text-center" role="alert">
                  <h2 class="text-light">Total Inovice Due <br> <span class="">{{$setting->currency ?? 'TK'}} {{ $total_invoice_payable }}</span></h2>
                </div>
            </div>
        </div>
        <div class="mx-2 card-datatable table-responsive pt-0">
            <table class="supplier_due_table table table-bordered border-dark">
                <thead class="table-light">
                    <tr>
                        <th>{{ __('pages.sn') }}</th>
                        <th>{{ __('pages.name') }}</th>
                        <th>{{ __('pages.phone') }}</th>
                        <th>Invoice Dues</th>
                       <th>Previous Dues</th>
                    </tr>
                </thead>
            </table>
        </div>
        </div>
        <div class="modal modal-slide-in new-user-modal fade" id="modals-slide-in"></div>
    </section>
@endsection

@section('custom-js')


 <!-- BEGIN: Page Vendor JS-->
 
    <script src="{{ asset('dashboard/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('dashboard/app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js') }}"></script>
    
    <script src="{{ asset('dashboard/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js') }}"></script>
    <script src="{{ asset('dashboard/app-assets/vendors/js/tables/datatable/jszip.min.js') }}"></script>
    <script src="{{ asset('dashboard/app-assets/vendors/js/tables/datatable/pdfmake.min.js') }}"></script>
    <script src="{{ asset('dashboard/app-assets/vendors/js/tables/datatable/vfs_fonts.js') }}"></script>
    <script src="{{ asset('dashboard/app-assets/vendors/js/tables/datatable/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('dashboard/app-assets/vendors/js/tables/datatable/buttons.print.min.js') }}"></script>
    <script src="{{ asset('dashboard/app-assets/vendors/js/tables/datatable/dataTables.rowGroup.min.js') }}"></script>
   
    <!-- END: Page Vendor JS-->
     <script>
         $(function () {
    
        var table = $('.supplier_due_table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('report.supplier_due') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'phone', name: 'phone'},
            {data: 'previous_due', name: 'due_price',searchable: false},
            {data: 'invoice_due', name: 'invoice_due',searchable: false},
        ]
    });
    
  });
     </script>
@endsection
@extends('layouts.app')
@section('title', __('pages.stock_out'))
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
            <h4 class="card-title">{{ translate('In Stock') }}</h4>  
            
            <div class="row">
                 @php 
                     $setting = Auth::user()->shop;
                    @endphp
                      
                         <div class="col-md-12 user_role">
                            <div class="row">
                                <div class="col-lg-4 col-12">
                                    <div class="small-box bg-info mb-1">
                                        <div class="smalll-box d-flex justify-content-between">
                                            <div class="inner">
                                                <h4>{{$setting->currency ?? 'TK'}} {{ number_format($stockes,2,".",",")}} </h4>
                                                <p>Total Stock</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-12">
                                    <div class="small-box bg-success mb-1">
                                        <div class="smalll-box d-flex justify-content-between">
                                            <div class="inner">
                                                <h4 id="totaldue">{{$setting->currency ?? 'TK'}} {{ number_format($expected,2,".",",")}}</h4>
                                                <p>Total Expected Sales</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-12">
                                    <div class="small-box bg-warning mb-1">
                                        <div class="smalll-box d-flex justify-content-between">
                                            <div class="inner">
                                                <h4>{{$setting->currency ?? 'TK'}} {{ number_format($profit,2,".",",")}}</h4>
                                                <p>Expected Profit</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        </div>
        <div class="mx-2 card-datatable table-responsive pt-0">
            <table class="user-list-table table table-bordered border-dark">
                <thead class="table-light">
                    <tr>
                        <th>{{ __('pages.sn') }}</th>
                        <th>{{ __('pages.name') }}</th>
                        <th>{{ __('pages.supplier') }}</th>
                        <th>{{ __('Quantity') }}</th>
                        <th>{{ __('Buy Price') }}</th>
                        <th>{{ __('MRP') }}</th>
                        <th>{{ __('COST') }}</th>
                        @if(Auth::user()->shop_id == 79)
                        <th>Update Price
                        @endif</th>
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
    
    var table = $('.user-list-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('instock') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
            {data: 'name', name: 'name'},
            {data: 'supplier', name: 'supplier'},
            {data: 'stock', name: 'stock'},
            {data: 'unit_price', name: 'unit_price'},
            {data: 'sell_price', name: 'sell_price'},
            {data: 'cost', name: 'cost'},
            @if(Auth::user()->shop_id == 79)
            {data: 'action', name: 'action'},
            @endif
        ],
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    });
    
  });
     </script>
@endsection
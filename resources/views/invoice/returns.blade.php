@extends('layouts.app')
@section('title', __('Return History'))
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
            <h4 class="card-title">{{ translate('Return History') }}</h4>
                
        </div>
        <div class="mx-2 card-datatable table-responsive pt-0">
                    <table class="user-list-table table table-bordered border-dark">
                        <thead class="table-light">
                            <tr>
                                <th>{{ __('pages.sn') }}</th>
                                <th>{{ __('pages.date') }}</th>
                                <th>{{ __('pages.amount') }}</th>
                                <th>{{ __('Invoice') }}</th>
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
        @if( request()->get('from') && request()->get('to'))
        ajax: {
          url: "{{ route('return.history') }}",
          data: function (d) {
                d.from = {{ request()->get('from') }},
                d.to = {{ request()->get('to') }}
            }
        },
        @else
        ajax: "{{ route('return.history') }}",
    @endif
        columns: [
            {data: 'id', name: 'id'},
            {data: 'date', name: 'date'},
            {data: 'amount', name: 'amount'},
            {data: 'view', name: 'view'}
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

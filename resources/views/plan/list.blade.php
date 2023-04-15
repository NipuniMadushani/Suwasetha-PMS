@extends('layouts.app')
@section('title', __('pages.leaf'))
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
            <h4 class="card-title">{{ translate('My Plan') }}</h4>
            
        </div>
        <div class="mx-2 card-datatable table-responsive pt-0">
            <table class="user-list-table table">
                <thead class="table-light">
                    <tr>
                        <th>{{ translate('SN') }}</th>
                        <th>{{ translate('Name') }}</th>
                        <th>{{ translate('Packages') }}</th>
                        <th>{{ translate('Last Renew') }}</th>
                        <th>{{ translate('Expired On') }}</th>
                       <th>{{ translate('pages.option') }}</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>#</th>
                        <th>{{ $plan->name }}</th>
                        <th>{{ $plan->package->name }}</th>
                        <th>{{ $plan->last_renew }}</th>
                        <th>{{ $plan->next_pay }}</th>
                       <th><a href="{{route('renew.history')}}" class="badge bg-info"><i class="fas fa-eye"></i></a> </th>
                    </tr>
                </tbody>
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
        serverSide: false,
        
    });
    
  });
     </script>
@endsection
@extends('layouts.app')
@section('title', $customer->name)
@section('custom-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/app-assets/css/plugins/forms/pickers/form-flat-pickr.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/app-assets/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css') }}">
@endsection
@section('content')
    <section class="app-user-view-account">
        <div class="row">
            <!-- User Sidebar -->
            <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
                <!-- User Card -->
                <div class="card">
                    <div class="card-body">
                        <div class="user-avatar-section">
                            <div class="d-flex align-items-center flex-column">
                                <img class="img-fluid rounded mt-3 mb-2" src="{{ asset('dashboard/app-assets/images/portrait/small/avatar-s-11.jpg') }}" height="110" width="110" alt="User avatar" />
                                <div class="user-info text-center">
                                    <h4>{{ $customer->name}} </h4>
                                    <span class="badge bg-light-secondary">{{ __('pages.customer') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-around my-2 pt-75">
                            <div class="d-flex align-items-start me-2">
                                <span class="badge bg-light-primary p-75 rounded">
                                    <i class="fas fa-exchange"></i>
                                </span>
                                <div class="ms-75">
                                    <h4 class="mb-0">{{ $invoice->sum('total_price') }} {{ Auth::user()->shop->currency }}</h4>
                                    <small>{{ __('pages.total_buy') }}</small>
                                </div>
                            </div>
                            <div class="d-flex align-items-start">
                                <span class="badge bg-light-danger p-75 rounded">
                                    <i class="fas fa-exclamation-triangle"></i>
                                </span>
                                <div class="ms-75">
                                    <h4 class="mb-0">{{ $customer->due }} {{ Auth::user()->shop->currency }}</h4>
                                    <small>{{ __('pages.total_due') }}</small>
                                </div>
                            </div>
                        </div>
                        <h4 class="fw-bolder border-bottom pb-50 mb-1">{{ __('pages.details') }}</h4>
                        <div class="info-container">
                            <ul class="list-unstyled">
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">{{ __('pages.name') }}:</span>
                                    <span>{{$customer->name}}</span>
                                </li>
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">{{ __('pages.phone') }}:</span>
                                    <span>{{$customer->phone}}</span>
                                </li>
                               
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">{{ __('pages.total_invoice') }}:</span>
                                    <span>{{$invoice->count()}}</span>
                                </li>
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">{{ __('pages.total_transaction') }}:</span>
                                    <span>{{$transaction->count() }}</span>
                                </li>
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">{{ __('pages.total_buy') }}:</span>
                                    <span>{{$invoice->sum('total_price') }} {{ Auth::user()->shop->currency }}</span>
                                </li>
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">{{ __('pages.total_paid') }}:</span>
                                    <span>{{$transaction->sum('amount') }} {{ Auth::user()->shop->currency }}</span>
                                </li>
                                 <li class="mb-75">
                                    <span class="fw-bolder me-25">{{translate('Address:')}}</span>
                                    <span>{{$customer->address}}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /User Card -->
            </div>
            <!--/ User Sidebar -->

            <!-- User Content -->
            <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">
                <!-- Project table -->
                <div class="card">
                    <div class="card-body border-bottom">
                    <h4 class="card-header">{{ __('pages.customer_invoice') }}</h4>
                     <div class="row">
                        <form method="get">
                            <div class="col-md-5 user_role">
                                <label class="form-label" for="UserRole">{{ __('pages.from_date') }}</label>
                                <input type="text" name="form" class="form-control invoice-edit-input date-picker flatpickr-input" readonly="readonly">
                            </div>
                            
                            <div class="col-md-5 user_plan">
                                <label class="form-label" for="UserPlan">{{ __('pages.to_date') }}</label>
                                <input name="to" type="text" class="form-control invoice-edit-input date-picker flatpickr-input" readonly="readonly">
                            </div>
                            <div class="col-md-2 user_status">
                                <button class="dt-button add-new btn btn-primary" tabindex="0" aria-controls="DataTables_Table_0" type="submit">
                                    <span>{{ __('pages.filter') }}</span>
                                </button>
                            </div>
                        </form>
                  </div>
                </div>
                    
                <div class="table-responsive">
                    <table class="table datatable-project">
                        <thead>
                            <tr>
                                <th>{{ __('pages.sn') }}</th>
                                <th>{{ __('pages.invoice_no') }}</th>
                                <th>{{ __('pages.total_price') }}</th>
                                <th>{{ __('pages.customer_invoice') }}</th>
                                <th>{{ __('pages.option') }}</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
                <!-- /Project table -->
            </div>
            <!--/ User Content -->
        </div>
    </section>
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
        serverSide: true,
                @if( request()->get('from') && request()->get('to'))
        ajax: {
          url: "{{ route('customer.view', $customer->id) }}",
          data: function (d) {
                d.from = {{ request()->get('from') }},
                d.to = {{ request()->get('to') }}
            }
        },
        @else
        ajax: "{{ route('customer.view', $customer->id) }}",
    
        @endif
        
        columns: [
            { data: 'id', name: 'id' , orderable: false, searchable: false},
            {data: 'inv_id', name: 'inv_id'},
            {data: 'total_price', name: 'total_price'},
            {data: 'due_price', name: 'due_price'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
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
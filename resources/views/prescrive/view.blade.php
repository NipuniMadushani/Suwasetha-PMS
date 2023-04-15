@extends('layouts.app')
@section('title', __('pages.invoice'))
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
            <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
                <div class="card">
                    <div class="card-body">
                        <div class="user-avatar-section">
                            <div class="d-flex align-items-center flex-column">
                             <div class="dt-buttons"><a class="dt-button btn btn-primary btn-add-record ms-2" tabindex="0" aria-controls="DataTables_Table_0" href="{{ route('prescrive.data', $pres->id) }}"><span>{{translate('Print Invoice')}}</span></a> </div>
                               
                                <div class="user-info text-center">
                                    <h4>{{ $pres->inv_no}} </h4>
                                    <span class="badge bg-light-secondary">{{ __('Print Prescrpton') }}</span>
                                </div>
                             </div>
                            </div>
                        <div class="d-flex justify-content-around my-2 pt-75">
                            <div class="d-flex align-items-start me-2">
                                <span class="badge bg-light-primary p-75 rounded">
                                    <i class="fas fa-exchange"></i>
                                </span>
                                <div class="ms-75">
                                    <h4 class="mb-0">{{ $pres->visiting_fee }} {{ Auth::user()->shop->currency }}</h4>
                                    <small>{{ __('Visiting Fee') }}</small>
                                </div>
                            </div>
                        </div>
                        <h4 class="fw-bolder border-bottom pb-50 mb-1">{{ __('pages.details') }}</h4>
                        <div class="info-container">
                            <ul class="list-unstyled">
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">{{ __('pages.name') }}:</span>
                                    <span>@if($pres->customer) {{$pres->customer->name}} @endif</span>
                                </li>
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">{{ __('pages.phone') }}:</span>
                                    <span>@if($pres->customer) {{$pres->customer->phone}} @endif</span>
                                </li>
                               
                               
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">{{ __('pages.total_transaction') }}:</span>
                                    <span>{{ $pres->visiting_fee }}</span>
                                </li>
                              
                                 <li class="mb-75">
                                    <span class="fw-bolder me-25">{{ __('pages.address') }}:</span>
                                    <span>@if($pres->customer) {{$pres->customer->address}} @endif</span>
                                </li>
                            </ul>
                            
                        </div>
                    </div>
                </div>
                <!-- /User Card -->
            </div>
            <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">
                
                
                  <div class="card">
                    <div class="card-body border-bottom">
                    <h4 class="card-header">{{ __('pages.medicine') }}</h4>
                    </div>
                    <div class="mx-2 table-responsive">
                        <table class="table datatable-project">
                            <thead>
                                <tr>
                                    <th>{{ __('pages.sn') }}</th>
                                    <th>{{ __('Medicine') }}</th>
                                    <th>{{ __('Schedule') }}</th>
                                    <th>{{ __('Duration') }}</th>
                                </tr>
                                  
                            </thead>
                            <tbody>
                                  @php
                                        $medicine = json_decode($pres->medicines, true);
                                        $i = 0;
                                  @endphp
                                  
                                  
                                  @if(!empty($medicine) && is_array($medicine))
                                    @foreach($medicine as $key => $item)
                                <tr>
                                    @php
                                     $i++;
                                    @endphp
                                    <th>{{$i}}</th>
                                    <th>{{$item['0']}}</th>
                                    <th>{{$item['1']}}</th>
                                    <th>{{$item['2']}}</th>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                
              <div class="card">
                                <div class="card-body border-bottom">
                                <h4 class="card-header">{{ __('Tests') }}</h4>
                                 
                                
                                <div class="table-responsive">
                                    <table class="table datatable-project">
                                        <thead>
                                            <tr>
                                                <th>{{ __('pages.sn') }}</th>
                                                 <th>  Diagnosis Description  </th>
                                                </tr>
                                                  </thead>
                                                    <tbody>
                                                @php
                                                
                                                    $test = json_decode($pres->tests, true);
                                                @endphp
                                                @if(!empty($test) && is_array($test))
                                                @foreach($test as $key => $item)
                                            <tr>
                                               
                                              <td>{{ ($key+1) }}</td>
                                                <td>{{$item}} </td>
                                
                                            </tr> 
                                            @endforeach
                                            @endif
                                              </tbody>
                                      
                                    </table>
                                </div>
                            </div>
                            <!-- /Project table -->

                          
                        </div>
            </div>
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
        serverSide: false,
       
    });
    
  });
     </script>
@endsection
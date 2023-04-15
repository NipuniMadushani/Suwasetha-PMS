@extends('layouts.app')
@section('title', __('pages.invoice_reports'))
@section('custom-css')

    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/app-assets/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
@endsection
@section('content')
        <section class="app-user-list">
            
            @if( request()->get('from') && request()->get('to'))
            @php
            $dto = request()->get('to');
            $dfrom = request()->get('from');
            @endphp
            @else 
        
            @php
            $dfrom = date('Y-m-d', strtotime("-7 day", time()));
            $dto = date('Y-m-d');
            @endphp
            @endif
            
            
            
             @php
             $datelist = list_days($dfrom,$dto);
          
             @endphp
              @php 
                     $setting = Auth::user()->shop;
                @endphp
                      
         
            <div class="card">
                <div class="card-body border-bottom">
                   <h4 class="card-title">{{Auth::user()->shop->name}}'s {{ translate('Sales & Purchase Reports') }}</h4>             
                   <div class="row">
                        <form method="get">
                            <div class="col-md-5 user_role">
                                <label class="form-label" for="UserRole">{{ __('pages.from_date') }}</label>
                                <input value="@php echo $dfrom @endphp  - @php echo $dto @endphp" type="text" name="date" id="reportrange" class="form-control invoice-edit-input date-picker flatpickr-input" readonly="readonly">
                            </div>
                             
                        </form>
                    </div>
                </div> 
                <div class="col-lg-12 px-2">
                    <div class="row justify-content-center">
                    <div class="col-lg-3  my-2">
                        <div class="bg-danger p-2 text-center" role="alert">
                          <h4 class="text-light">{{ $total_sale  }}</h4>
                          <h5 class="text-light"> Total Sale Invoice</h5>
                        </div>
                    </div>
                    <div class="col-lg-3  my-2">
                        <div class="bg-primary  p-2 text-center" role="alert">
                            <h4 class="text-light">{{$setting->currency ?? 'TK'}} {{ $total_sale_amount  }} </h4>
                          <h5 class="text-light">Total Sale Amount <br> <span class=""></span></h5>
                        </div>
                    </div>
                    <div class="col-lg-3  my-2">
                        <div class="bg-info p-2 text-center" role="alert">
                            <h4 class="text-light">{{ $total_purchase }} </h4>
                            <h5 class="text-light">Total Purchase Invoice<br> <span class=""></span></h5>
                        </div>
                    </div>
                     <div class="col-lg-3 my-2">
                        <div class="bg-success  p-2 text-center" role="alert">
                            <h4 class="text-light"> {{$setting->currency ?? 'TK'}} {{ $total_purchase_amount }}</h4>
                            <h5 class="text-light">Total Purchase Amount</h5>
                        </div>
                    </div>
                </div>
                </div>
                <div class="mx-2 card-datatable table-responsive pt-0">
                    <table class="user-list-table table table-bordered border-dark">
                        <thead class="table-light">
                            <tr>
                                <th>{{ __('pages.date') }}</th>
                                <th>Total Sales Inv.</th>
                                <th>{{ translate('Sales Price') }}</th>
                                <th>{{ translate('Total Amount') }}</th>
                                <th>{{ translate('Total Purchase Inv.') }}</th>
                                <th>{{ translate('Purchase Price') }}</th>
                                <th>{{ translate('Paid To Supplier') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                            @foreach($reports as $report)
                          
                            <tr>
                                <th width="15%">{{date('d M Y',strtotime($report['date']))}}</th>
                                <th>{{$report['total_sele']}}</th>  
                                <th>{{$setting->currency ?? 'TK'}} {{$report['total_sale_price']}}</th>  
                                <th>{{$setting->currency ?? 'TK'}} {{$report['total_sale_amount']}}</th> 
                                <th>{{$report['total_purchase']}}</th>  
                                <th>{{$setting->currency ?? 'TK'}} {{$report['total_purchase_price']}}</th>  
                                <th>{{$setting->currency ?? 'TK'}} {{$report['total_purchase_amount']}}</th> 
                                          
                            </tr>
                            @endforeach
                                            
                                   
                                            
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
     <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
   @php
   $date = date('Y-m-d', strtotime("-7 day", time()));
   @endphp
    <!-- END: Page Vendor JS-->
     
     
     
      <script type="text/javascript">
$(function() {


     
    var start = moment().subtract(29, 'days');
    var end = moment();

    var d = new Date();
 
    var up = function(start,end)
    {
       
        window.location.href = "?from="+start+"&to="+end;
    }

     $('input[name="date"]').daterangepicker({
        startDate: start,
        endDate: end,
         format: 'YYYY-MM-DD',
          timePicker: false,
        ranges: {
           'Today': [moment(), moment()],
           'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
           'Last 7 Days': [moment().subtract(6, 'days'), moment()],
           'Last 30 Days': [moment().subtract(29, 'days'), moment()],
           'This Month': [moment().startOf('month'), moment().endOf('month')],
           'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    }, function(start, end, label) {
        var start2 = start.format("YYYY-MM-DD");
        var end2 = end.format("YYYY-MM-DD");

		window.start = start2;
		window.end = end2;

        up(start2,end2);

      

    });
    
   
    var table = $('.user-list-table').DataTable({
        processing: true,
        serverSide: false,
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

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
            <div class="card">
                <div class="card-body border-bottom">
                   <h4 class="card-title">{{Auth::user()->shop->name}}'s {{ translate('Profit & Loss') }}</h4>  
                   <div class="row">
                       <div class="col-md-6">
                        <form method="get">
                            <div class="col-md-12 user_role">
                                <label class="form-label" for="UserRole">{{ __('pages.from_date') }}</label>
                                <input value="@php echo $from_date @endphp  - @php echo $to_date @endphp" type="text" name="date" id="reportrange" class="form-control invoice-edit-input date-picker flatpickr-input" readonly="readonly">
                            </div>
                        </form>
                        </div>
                        @php 
                     $setting = Auth::user()->shop;
                    @endphp
                         <div class="col-md-6 user_role">
                            <div class="row">
                                <div class="col-lg-4 col-6">
                                    <div class="small-box bg-info">
                                        <div class="smalll-box d-flex justify-content-between">
                                            <div class="inner">
                                                <h4>{{$setting->currency ?? 'TK'}} {{ number_format($total_sale_balance,2,".",",")}}</h4>
                                                <p>Total Sales</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-6">
                                    <div class="small-box bg-success">
                                        <div class="smalll-box d-flex justify-content-between">
                                            <div class="inner">
                                                <h4>{{$setting->currency ?? 'TK'}} {{ number_format($total_profit_balance,2,".",",")}}</h4>
                                                <p>Total Profit</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-6">
                                    <div class="small-box bg-warning">
                                        <div class="smalll-box d-flex justify-content-between">
                                            <div class="inner">
                                                <h4>{{$setting->currency ?? 'TK'}} {{ number_format(abs($total_loss_balance),2,".",",")}}</h4>
                                                <p>Total Loss</p>
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
                                <th>{{ __('pages.date') }}</th>
                                <th>{{ translate('Sales Invoice Qty') }}</th>
                                <th>{{ translate('Sales Amount') }}</th>
                                <th>{{ translate('Profit') }}</th>
                                <th>{{ translate('Loss') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reports as $report)
                            <tr>
                                <th>{{$report['date']}}</th>
                                <th>{{$report['quantity']}}</th>
                                <th>{{$report['amounts']}}</th>
                                <th>{{$report['profit']}}</th> 
                                <th>{{abs($report['loss'])}}</th> 
                           </tr>
                            @endforeach
                                            
                           <input type="hidden" id="total" value="{{$setting->currency ?? 'TK'}} {{ number_format($total_profit_balance,2,".",",")}}">              
                                            
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

    var pvlpaid = $("#total").val();
    console.log(pvlpaid)
     $('#totaldue').html(pvlpaid);
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

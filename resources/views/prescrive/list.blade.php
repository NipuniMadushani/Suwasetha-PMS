@extends('layouts.app')
@section('title', translate('Prescription'))
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
            <h4 class="card-title">{{ translate('Prescription') }}</h4>
           <div class="dt-action-buttons text-xl-end text-lg-start text-lg-end text-start "><div class="dt-buttons"><a class="dt-button btn btn-primary btn-add-record ms-2 waves-effect waves-float waves-light btn-new-prescription" href="{{ route('prescrive.pop') }}" >New Presciption</a> </div>
        </div>
        <div class="mx-2 card-datatable table-responsive pt-0">
            <table class="user-list-table table">
                <thead class="table-light">
                    <tr>
                        <th>{{ __('pages.sn') }}</th>
                        <th>{{ translate('Patient') }}</th>
                        <th>{{ translate('Date') }}</th>
                        <th>{{ translate('Doctor') }}</th>
                        <th>{{ translate('Visiting Fee') }}</th>
                        <th>{{ translate('Description') }}</th>
                        <th>{{ translate('Advice') }}</th>
                       <th>{{ __('pages.option') }}</th>
                    </tr>
                </thead>
            </table>
        </div>
                          
      </div>
       
     
    </section>
   <div id="myModal" class="modal hide fade">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> × </button>
        <h3 id="myModalLabel">Modal header</h3>
    </div>
    <div class="modal-body">
       <!-- remote content will be inserted here via jQuery load() -->
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    </div>
</div>
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
  
   <script>
     
     
     
     // Print Button 
$('.print').click(function() {
    $prescription_id = $(this).attr('prescription_id');
    $btn = $(this);
    $btn_body = $(this).html();
    $(this).html('<i class="fa fa-spin fa-spinner"></i>');


    $.get('/prescrive/data/' + $prescription_id).done(function(e) {
        $.fn.Modal({'body': e, 'backdrop': 'static', 'heading': 'Prescription:', 'borderRadius': '0px', 'size': 'large'});
        $btn.html($btn_body);
    });
});

     
     
         $(function () {
    
    var table = $('.user-list-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('prescrive.list') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'customer', name: 'customer'},
            {data: 'date', name: 'date'},
            {data: 'doctor', name: 'doctor'},
            {data: 'visiting_fee', name: 'visiting_fee'},
            {data: 'des', name: 'des'},
            {data: 'advice', name: 'advice'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
       
        
    });
    
  });
  
  
 $(document).ready(function(){
    $('#myModal').on('show.bs.modal', function () {
        var form = $('#myForm'); //Get Form
        $.ajax( {
            type: "GET",
            url: "{{route('prescrive.pop')}}", //Create this file to handle the form post data
            data: form.serialize(), //Post the form
            success: function(response) {
                $('.getdistance').html(response); //show the distance in modal
            }
        });
    });
});
     </script>
      
@endsection
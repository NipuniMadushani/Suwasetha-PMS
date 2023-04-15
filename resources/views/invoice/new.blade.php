@extends('layouts.app')
@section('title', __('pages.new_invoice'))

@section('custom-css')
 <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css') }}">
 <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/app-assets/vendors/css/forms/select/select2.min.css') }}">
 <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/app-assets/css/plugins/forms/pickers/form-flat-pickr.css') }}">
 <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/app-assets/css/pages/app-invoice.css') }}">
@endsection
@section('content')
    <section id="basic-horizontal-layouts">
        <section id="multiple-column-form">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">{{ __('pages.new_invoice') }}</h4>
                            </div>
                            <div class="card-body">
                                <form class="form" method="POST" id="formOne">
                                    @csrf
                                  <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="mb-1">
                                          <label class="form-label" for="first-name-column">{{ __('pages.name') }}</label>
                                          <select class="js-example-basic-single form-select" name="customer_id" id="filter_type">
                                              <option value="">{{ __('pages.choose_customer') }}</option>
                                                @foreach($supplier as $suppliers)
                                              <option value="{{$suppliers->id}}" @if($sup_id == $suppliers->id) selected @endif>{{$suppliers->name}}</option>
                                                @endforeach                                
                                          </select>  
                                        </div>
                                    </div>
                                      <div class="col-md-6 col-12">
                                        <div class="mb-1">
                                          <label class="form-label" for="last-name-column">{{ __('pages.date') }}</label>
                                          <input type="date" id="last-name-column" class="form-control invoice-edit-input date-picker" placeholder="{{ __('pages.date') }}" name="date" required>
                                        </div>
                                      </div>
                                  </div>
                            </div>
                        </div>
                  
                        <div class="invoice-repeater">
                        <div data-repeater-list="invoice">
                            <div data-repeater-item>
                              <div class="row d-flex align-items-end">
                                <div class="col-md-4 col-12">
                                  <div class="mb-1">
                                    <label class="form-label" for="itemname">{{ __('pages.medicine') }}</label>
                                      <select class="js-example-basic-single form-select" name="medicine_id" id="medicine_id" aria-describedby="medicine_id" required>
                                        <option value="">{{ __('pages.select_medicine') }}</option>    
                                        @foreach($medicine as $medicines)
                                            <option value="{{$medicines->medicine->id}}">{{$medicines->medicine->name}}</option>
                                        @endforeach
                                      </select> 
                                  </div>
                                </div>
                                <div class="col-md-2 col-12">
                                  <div class="mb-1">
                                    <label class="form-label" for="expiry_date">{{ __('pages.qty') }}</label>
                                    <input type="number" class="form-control" placeholder="{{ __('pages.box_qty') }}"  name="box_qty" id="box_qty" aria-describedby="box_qty" required>
                                  </div>
                                </div>
                                <div class="col-md-2 col-12">
                                    <div class="mb-1">
                                      <label class="form-label" for="expiry_date">{{ __('pages.price') }}</label>
                                        <input type="number" step="0.01" class="form-control" placeholder="{{ __('pages.price') }}"  name="bprice" data-name="bprice" id="buy_price" aria-describedby="bprice" required>
                                    </div>
                                </div>
                                <div class="col-md-2 col-12 mb-50">
                                    <div class="mb-1">
                                      <button class="btn btn-outline-danger text-nowrap px-1" data-repeater-delete type="button">
                                        <i data-feather="x" class="me-25"></i>
                                        <span>{{ __('pages.delete') }}</span>
                                      </button>
                                    </div>
                                </div>
                              </div>
                              <hr />
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-12">
                              <button class="btn btn-icon btn-primary" type="button" data-repeater-create>
                                <i data-feather="plus" class="me-25"></i>
                                <span>{{ __('pages.add_new') }}</span>
                              </button>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-12">
                            <div class="card">
                              <div class="card-body invoice-padding">
                                  <div class="row invoice-sales-total-wrapper">
                                    <div class="col-md-6 order-md-1 order-2 mt-md-0 mt-3">
                                      <div class="d-flex align-items-center mb-1">
                                        <label for="salesperson" class="form-label">{{ __('pages.payment_method') }}:</label>
                                        <select class="select2 form-select" id="show_medicine" name="method_id">
                                           @foreach($method as $leaves)
                                            <option value="{{$leaves->id}}">{{$leaves->name}} ({{$leaves->balance}})</option>
                                           @endforeach
                                        </select>
                                      </div>
                                    </div>
                                    <div class="col-md-6 d-flex order-md-2 order-1">
                                      <div class="invoice-total-wrapper">
                                      <label>{{ __('pages.total') }}</label>
                                      <input type="textbox" placeholder="Total Amount" name="total" class="form-control" id="totaldbt" value="0" readonly>
                                        <span class="error"></span>
                                        <div class="invoice-total-item">
                                          <div class="form-group">
                                              <label> {{ __('pages.total_paid') }}</label>
                                              <input type="number" placeholder="Paid Now" name="paid" class="form-control" value="0" id="pvlpaid">
                                              <span class="error"></span>
                                          </div>
                                        </div>
                                        <div class="invoice-total-item">
                                        </div>
                                        <hr class="my-50">
                                        <div class="invoice-total-item">
                                        <div class="form-group">
                                            <label>
                                                {{ __('pages.total_due') }}
                                            </label>
                                            <input type="number" placeholder="Due" name="due" class="form-control" value="0" id="totaldue" readonly>
                                            <span class="error"></span>
                                        </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-12">
                          <button type="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light">{{ __('pages.submit') }}</button>
                          <button type="reset" class="btn btn-outline-secondary waves-effect">{{ __('pages.reset') }}</button>
                          </div>
                        </form>
                      </div>
                    </div>
                </div>
              </div>
        </section>
    </section>
@endsection



@section('custom-js')
<!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('dashboard/app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
    <script src="{{ asset('dashboard/app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ asset('dashboard/app-assets/vendors/js/forms/repeater/jquery.repeater.min.js') }}"></script>
    <script src="{{ asset('dashboard/app-assets/js/scripts/forms/form-repeater.js') }}"></script>

    <script>
  
 
  
  function evaluateTotal() {
    
  var total = 0;
  $('[data-name="bprice"]').each(function(_i, e) {
    var val = parseFloat(e.value);
    if (!isNaN(val))
      total += val;
  });
  
$('#totaldbt').val(total);

var pvlpaid = $("#pvlpaid").val();

  

var duetotal = (total-pvlpaid); 
$('#totaldue').val(duetotal);

}

$('body').on('change', '[data-name="bprice"]', function() {
  evaluateTotal();
  
});


$('body').on('change', '#pvlpaid', function() {
  evaluateTotal();
  
});

 

        
    function get_medicine(id){
        var  url = '{{route("purchase.new", ":id")}}';
        url = url.replace(':id',id);
        location.href = url;
       
    }  	 

        
        
        
        
 




/* total */


  
   $(document).ready(function() {
    $('.js-example-basic-single').select2();
      
    });
</script>
@endsection

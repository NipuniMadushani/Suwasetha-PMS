@extends('layouts.app')
@section('title', translate('Shop Add'))
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
                  <h4 class="card-title">{{ translate('Shop Add') }}</h4>
                </div>
                <div class="card-body">
                  <form class="form" method="POST">
                      @csrf
                    <div class="row">
                      <div class="col-md-6 col-12">
                        <div class="mb-1">
                          <label class="form-label" for="first-name-column">{{ translate('Shop Name') }}</label>
                          <input type="text" id="first-name-column" class="form-control" placeholder="{{ __('pages.name') }}" name="name" required>
                        </div>
                      </div>
                      <div class="col-md-6 col-12">
                        <div class="mb-1">
                          <label class="form-label" for="first-name-column">{{ translate('Email') }}</label>
                          <input type="email" id="first-name-column" class="form-control" placeholder="{{ __('pages.email') }}" name="email" required>
                        </div>
                      </div>
                      <div class="col-md-6 col-12">
                        <div class="mb-1">
                          <label class="form-label" for="first-name-column">{{ translate('Password') }}</label>
                          <input type="password" id="first-name-column" class="form-control" placeholder="{{ __('pages.password') }}" name="password" required>
                        </div>
                      </div>
                      <div class="col-md-6 col-12">
                        <div class="mb-1">
                          <label class="form-label" for="first-name-column">{{ translate('Address') }}</label>
                          <input type="text" id="first-name-column" class="form-control" placeholder="{{ __('pages.address') }}" name="address" required>
                        </div>
                      </div>
                      <div class="col-md-6 col-12">
                        <div class="mb-1">
                          <label class="form-label" for="first-name-column">{{ translate('District') }}</label>
                          <select class="form-select js-example-basic-single" name="district_id" onchange="get_district(this.value)" required>
                              <option>Select District</option>
                              @foreach($district as $state)
                              <option value="{{$state->id}}">{{$state->name}}</option>
                              @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6 col-12">
                        <div class="mb-1">
                          <label class="form-label" for="first-name-column">{{ translate('Thana') }}</label>
                          <select class="form-select" name="thana_id" id="show_district"  required>
                              <option>Select Thana</option>
                          </select>
                        </div>
                      </div>
                      
                      <div class="col-md-6 col-12">
                        <div class="mb-1">
                          <label class="form-label" for="first-name-column">{{ translate('Package') }}</label>
                          <select class="form-select js-example-basic-single" name="package_id" id="package" onchange="get_pack(this.value)" required>
                              <option>Select Package</option>
                              @foreach($package as $pack)
                              <option value="{{$pack->id}}">{{$pack->name}}</option>
                              @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6 col-12">
                        <div class="mb-1">
                          <label class="form-label" for="first-name-column">{{ translate('Price Per Month') }}</label>
                          <input type="number" step="0.01" id="price" class="form-control" placeholder="{{ translate('Price Per Month') }}" name="price" readonly>
                        </div>
                      </div>
                      <div class="col-md-6 col-12">
                        <div class="mb-1">
                          <label class="form-label" for="first-name-column">{{ translate('Duration') }}</label>
                          <input type="number" id="duration" class="form-control" placeholder="{{ translate('Duration') }}" name="duration"  onkeyup="calc(this.value)"  onkeydown="calc(this.value)" required>
                        </div>
                      </div>
                      
                      <div class="col-md-6 col-12">
                        <div class="mb-1">
                          <label class="form-label" for="first-name-column">{{ translate('Amount') }}</label>
                          <input type="number" id="amont" class="form-control" placeholder="{{ translate('Amount') }}" name="amount" readonly required>
                        </div>
                      </div>
                      <div class="col-md-6 col-12">
                        <div class="mb-1">
                          <label class="form-label" for="first-name-column">{{ translate('Payment Method') }}</label>
                          <select class="form-select js-example-basic-single" name="method_id" id="package" required>
                              <option>Select Payment Method</option>
                              @foreach($method as $gateway)
                              <option value="{{$gateway->id}}">{{$gateway->name}}</option>
                              @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="col-12">
                        <button type="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light">{{ __('pages.submit') }}</button>
                        <button type="reset" class="btn btn-outline-secondary waves-effect">{{ __('pages.reset') }}</button>
                      </div>
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
<script>
  
$('body').on('change', '#pvlpaid', function() {
  evaluateTotal();
});


    function calc(id){
    var amt = $("#price").val();
    var duration = $("#duration").val();
    var duetotal = (amt*duration); 
    $('#amont').val(duetotal);
    }
    function get_district(id){
        var  url = '{{route("getDistrict", ":id")}}';
        url = url.replace(':id',id);
        $.ajax({
            url:url,
            method:"get",
            data:{offer_id:id},
            success:function(data){
                if(data.status){
                    $("#show_district").html(data.allcity);
                    $(".form-select").select2();

                }else{
                    $("#show_district").html('<option>Thana not found</option>');
                }
            }
        });
    }  	
    
    
    function get_pack(id){
        var  url = '{{route("getPack", ":id")}}';
        url = url.replace(':id',id);
        $.ajax({
            url:url,
            method:"get",
            data:{offer_id:id},
            success:function(data){
                if(data.status){
                    $("#price").val(data.price);
                    $("#duration").val('1');
                    $("#amont").val(data.price);
                }
            }
        });
    }  
    
    
    function get_upazilla(id){
        var  url = '{{route("getUpazilla", ":id")}}';
        url = url.replace(':id',id);
        $.ajax({
            url:url,
            method:"get",
            data:{offer_id:id},
            success:function(data){
                if(data.status){
                    $("#show_upazilla").html(data.allcity);
                    $(".form-select").select2();

                }else{
                    $("#show_upazilla").html('<option>Upazilla not found</option>');
                }
            }
        });
    }
    
    function get_union(id){
        var  url = '{{route("getUnion", ":id")}}';
        url = url.replace(':id',id);
        $.ajax({
            url:url,
            method:"get",
            data:{offer_id:id},
            success:function(data){
                if(data.status){
                    $("#show_union").html(data.allcity);
                    $(".form-select").select2();

                }else{
                    $("#show_union").html('<option>Union not found</option>');
                }
            }
        });
    }
 
/* total */
$(document).ready(function() {
$('.js-example-basic-single').select2();
});
</script>
@endsection
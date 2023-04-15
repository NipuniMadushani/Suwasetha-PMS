@extends('layouts.saas')
@section('title', 'Pharmacy Software Solution')
@section('custom-css')
<link rel="stylesheet" type="text/css" href="{{ asset('dashboard/app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('dashboard/app-assets/vendors/css/forms/select/select2.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('dashboard/app-assets/css/plugins/forms/pickers/form-flat-pickr.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('dashboard/app-assets/css/pages/app-invoice.css') }}">
<style>
    .tacbox {
  display:block;
  padding: 1em;
  margin: 2em;
  border: 3px solid #ddd;
  background-color: #eee;
  max-width: 800px;
}

input {
  height: 2em;
  width: 8em;
  vertical-align: middle;
}
/*
label {
  outline: 2px dotted #f00;
}

/*
label:after {
  content: attr(for);
}*/
</style>
@endsection
@section('content')
 <section id="registration" class="values loginfrm">
            <div class="container aos-init aos-animate" data-aos="fade-up">
                <div class="row">
                    <div class="col-md-12"> 
                         <div class="container22 leftbuy">
                            <div>
                                  <div class="title2">Software Bill</div>
                                  <table>
                                    <tbody>
                                   
                                      <tr>
                                          
                                        <td>Your Package / @if($package->trial == 1) D @else M @endif</td>
                                        <td align="right">TK {{$package->price}}</td>
                                      </tr>
                                      
                                       <tr>
                                        <td>Setup Fee</td>
                                        <td align="right">TK {{$package->setup_fee}}</td>
                                      </tr>
                                      @php
                                        
                                        $discount = ($package->discount / 100) * $package->setup_fee;
                                      @endphp
                                      <tr>
                                        <td>Discount {{$package->discount}}%</td>
                                        <td align="right">TK -{{$discount}}</td>
                                      </tr>
                                      @if($package->trial == 0)
                                      <tr>
                                        <td>Select Month</td>
                                        <td align="right">
                                            <select id="tv_taken">
                                                <option value="1" @if(app('request')->input('duration') == 1) selected @endif>1 Month</option>
                                                <option value="2" @if(app('request')->input('duration') == 2) selected @endif>2 Month</option>
                                                <option value="6" @if(app('request')->input('duration') == 6) selected @endif>6 Month</option>
                                                <option value="12" @if(app('request')->input('duration') == 12) selected @endif>1 Year</option>
                                            </select>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td>Coupon</td>
                                        <td align="right">
                                            <input type="number" id="discount" name="coupon" value="{{app('request')->input('coupon')}}">
                                        </td>
                                      </tr>
                                      <tr>
                                        <td>Coupon</td>
                                        <td align="right">
                                            <button id="coupon" class="btn-sm btn-success" onclick="coupon();">Validate</button>
                                        </td>
                                      </tr>
                                      @endif
                                    </tbody>
                                    
                                    @if($package->trial == 0)
                                    
                                    
                                    @php
                                    
                                    
                                    
                                    
                                    if(app('request')->filled('duration')){
                                    $duration = app('request')->input('duration');
                                    } else {
                                    $duration = 1;
                                    }
                                    $price = ($package->price*$duration);
                                    @endphp
                                    @else
                                    @php
                                    $duration = 7;
                                    $price = $package->price;
                                    @endphp
                                    @endif
                                    
                                    @php
                                    
                                    $coupon = \App\Models\Coupon::where('phone', app('request')->input('coupon'))->first();
                                    
                                    $subtotal = ($price+$package->setup_fee);
                                    $total = ($subtotal-$discount);
                                    if($coupon != null){
                                    $total -= $coupon->amount;
                                    echo '<tr>
                                        <td>Coupon Discount</td>
                                        <td align="right">TK -'.$coupon->amount.'</td>
                                      </tr>';
                                    }
                                    
                                    
                                    @endphp
                                    <tfoot>
                                      <tr>
                                        <td>Total</td>
                                        <td align="right">TK {{$total}}</td>
                                      </tr>
                                    </tfoot>
                                  </table>
                                </div>
                        </div>
                        <div class="container22 rightbuy">
                            <div class="title2">Registration.</div>
                            <div class="content">
                              <form action="{{ route('place.order') }}" method="POST">
                                  @csrf
                                  @if(!empty(app('request')->input('coupon')))
                                  @if($coupon != null)
                                    <input type="hidden" name="coupon" value="{{$coupon->amount}}">
                                    <input type="hidden" name="coupon_number" value="{{$coupon->phone}}">
                                    @else
                                      <input type="hidden" name="coupon" value="0">
                                @endif
                                @endif
                                <div class="user-details">
                                <div class="input-box">
                                    <span class="details">Pharmacy Name</span>
                                    <input type="text" placeholder="Pharmacy Name" name="shop_name" required>
                                  </div>
                                  <input type="hidden" name="package_id" value="{{$package->id}}">
                                  <input type="hidden" name="duration" value="{{$duration}}">
                                  <input type="hidden" name="price" value="{{$total}}">
                                  <div class="input-box">
                                    <span class="details">Address</span>
                                    <input type="text"  name="address" placeholder="Address" required>
                                  </div>
                                  <div class="input-box">
                                    <span class="details">District</span>
                                    <select class="form-select" name="district_id" onchange="get_district(this.value)" required>
                                          <option>Select District</option>
                                          @foreach($district as $state)
                                          <option value="{{$state->id}}">{{$state->name}}</option>
                                          @endforeach
                                    </select>
                                  </div>
                                  <div class="input-box">
                                    <span class="details">Thana</span>
                                    <select class="form-select" name="thana_id" id="show_district" required>
                                 <option>Select Thana</option>
                                 </select>
                                  </div>
                                 
                                  
                                  <div class="input-box">
                                    <span class="details">Full Name</span>
                                    <input type="text" placeholder="Enter your name" name="name" required>
                                  </div>
                                  <div class="input-box">
                                    <span class="details">Username</span>
                                    <input type="text" placeholder="Enter your username" name="username" required>
                                  </div>
                                   <div class="input-box">
                                    <span class="details">NID Card</span>
                                    <input type="file" name="image">
                                  </div>
                                  <div class="input-box">
                                    <span class="details">Email</span>
                                    <input type="text" placeholder="Enter your email" name="email" required>
                                  </div>
                                  <div class="input-box">
                                    <span class="details">Phone Number</span>
                                    <input type="text" name="phone" placeholder="Enter your number" required>
                                  </div>
                                  <div class="input-box">
                                    <span class="details">Password</span>
                                    <input type="password" placeholder="Enter your password" name="password" required>
                                  </div>
                                  <div class="tacbox">
                                  <input id="checkbox" type="checkbox" required/>
                                  <label for="checkbox"> I agree <a href="https://pharmacyss.com/terms#terms">Terms, Conditions and Refund Policies</a>.</label>
                                </div>
                                </div>
                                
                                <div class="button">
                                  <input type="submit" value="Proceed to Pay Registration Fee">
                                </div>
                              </form>
                              </div>
                        </div>
                    </div>
                </div>                
            </div>
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




    function coupon(){
      var amt = $("#discount").val();  
      var duration = $("#tv_taken").val();  
        window.location = "/buy/{{$package->id}}?duration=" + duration + "&coupon=" + amt;
    }
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
                    $("#show_district").html('<option>District not found</option>');
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
    
    
  
 
/* total */
$(document).ready(function() {
$('.form-select').select2();
});

$('#tv_taken').change(function() {
    window.location = "/buy/{{$package->id}}?duration=" + $(this).val();
});
</script>

@endsection
 

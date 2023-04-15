@extends('layouts.app')
@section('title', __('pages.medicine_add'))
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
                  <h4 class="card-title">{{ __('pages.medicine_add') }}</h4>
                </div>
                <div class="card-body">
                  <form class="form" method="POST" enctype="multipart/form-data">
                      @csrf
                     <div class="row">
                          <div class="col-md-4 col-12">
                              <div class="mb-1">
                                  <label class="form-label" for="first-name-column">{{ __('pages.qr_code') }}</label>
                                  <input type="text" id="first-name-column" class="form-control" placeholder="{{ __('pages.qr_code') }}" name="qr_code">
                              </div>
                          </div>
                          <div class="col-md-4 col-12">
                              <div class="mb-1">
                                  <label class="form-label" for="first-name-column">{{ __('pages.name') }} <font color="red">*</font></label>
                                  <input type="text" id="first-name-column" class="form-control" placeholder="{{ __('pages.name') }}" name="name" required>
                              </div>
                          </div>
                          <div class="col-md-4 col-12">
                              <div class="mb-1">
                                  <label class="form-label" for="first-name-column">{{ __('pages.strength') }}</label>
                                  <input type="text" id="first-name-column" class="form-control" placeholder="{{ __('pages.strength') }}" name="strength" >
                              </div>
                          </div>
                          <div class="col-md-4 col-12">
                              <div class="mb-1">
                                  <label class="form-label" for="first-name-column">{{ __('pages.generic_name') }}</label>
                                  <input type="text" id="first-name-column" class="form-control" placeholder="{{ __('pages.generic_name') }}" name="generic_name"  name="strength">
                              </div>
                          </div>
                          <div class="col-md-4 col-12">
                              <div class="mb-1">
                                  <label class="form-label" for="first-name-column">{{ __('pages.box_size') }} <font color="red">*</font></label>
                                  <select class="select2 form-select" id="select2-basic" data-select2-id="select2-basic" tabindex="-1" aria-hidden="true" name="leaf_id" required>
                                      <option value="">{{translate('Select Box Size')}}</option>
                                      @foreach($leaf as $leafs)
                                          <option value="{{$leafs->id}}">{{$leafs->name}} ({{$leafs->amount}}</option>
                                      @endforeach
                                  </select>
                              </div>
                          </div>
                          <div class="col-md-4 col-12">
                              <div class="mb-1">
                                  <label class="form-label" for="first-name-column">{{ __('pages.units') }} <font color="red">*</font></label>
                                  <select class="select2 form-select" id="select2-basic" data-select2-id="select2-basic" tabindex="-1" aria-hidden="true" name="unit_id" required>
                                      <option value="">{{translate('Select Unit')}}</option>
                                      @foreach($unit as $leafs)
                                          <option value="{{$leafs->id}}">{{$leafs->name}} </option>
                                      @endforeach
                                  </select>
                              </div>
                          </div>
                          <div class="col-md-4 col-12">
                              <div class="mb-1">
                                  <label class="form-label" for="first-name-column">{{ __('pages.shelf') }}</label>
                                  <input type="text" id="first-name-column" class="form-control" placeholder="{{ __('pages.shelf') }}" name="shelf">
                              </div>
                          </div>
                          <div class="col-md-4 col-12">
                              <div class="mb-1">
                                  <label class="form-label" for="first-name-column">{{ __('pages.desc') }}</label>
                                  <input type="text" id="first-name-column" class="form-control" placeholder="{{ __('pages.desc') }}" name="des">
                              </div>
                          </div>
                          <div class="col-md-4 col-12">
                              <div class="mb-1">
                                  <label class="form-label" for="first-name-column">{{ __('pages.category') }} <font color="red">*</font></label>
                                  <select class="select2 form-select" id="select2-basic" data-select2-id="select2-basic" tabindex="-1" aria-hidden="true" name="category_id" required>
                                      <option value="">{{translate('Select Category')}}</option>
                                      @foreach($category as $leafs)
                                          <option value="{{$leafs->id}}">{{$leafs->name}} </option>
                                      @endforeach
                                  </select>
                              </div>
                          </div>
                          <div class="col-md-4 col-12">
                              <div class="mb-1">
                                  <label class="form-label" for="first-name-column">{{ __('pages.types') }} <font color="red">*</font></label>
                                  <select class="select2 form-select" id="select2-basic" data-select2-id="select2-basic" tabindex="-1" aria-hidden="true" name="type_id" required>
                                      <option value="">Select Type</option>
                                      @foreach($type as $leafs)
                                          <option value="{{$leafs->id}}" >{{$leafs->name}} </option>
                                      @endforeach
                                  </select>
                              </div>
                          </div>
                          <div class="col-md-4 col-12">
                              <div class="mb-1">
                                  <label class="form-label" for="first-name-column">{{ __('pages.image') }}</label>
                                  <input class="form-control" type="file" name="image" id="formFile">
                              </div>
                          </div>
                          
                          <div class="col-md-4 col-12">
                              <div class="mb-1">
                                  <label class="form-label" for="first-name-column">{{ __('pages.price') }} <font color="red">*</font></label>
                                  <input type="number" step="0.01" id="first-name-column" class="form-control" placeholder="{{ __('pages.price') }}" name="price" required>
                              </div>
                          </div>
                          <div class="col-md-4 col-12">
                              <div class="mb-1">
                                  <label class="form-label" for="first-name-column">Vendor</label>

                                  <select class="select2 form-select" id="select2-basic" data-select2-id="select2-basic" tabindex="-1" aria-hidden="true" name="vendor_id">
                                      <option value="">Select Vendor</option>
                                      @foreach($vendors as $vendor)
                                          <option value="{{$vendor->id}}">{{$vendor->name}} </option>
                                      @endforeach
                                  </select>

                              </div>
                          </div>
                          <div class="col-md-4 col-12">
                              <div class="mb-1">
                                  <label class="form-label" for="first-name-column">{{ __('pages.supplier') }} <font color="red">*</font></label>
                                  <select class="select2 form-select" id="select2-basic" data-select2-id="select2-basic" tabindex="-1" aria-hidden="true" name="supplier_id" required>
                                      <option value="">Select Supplier</option>
                                      @foreach($supplier as $leafs)
                                          <option value="{{$leafs->id}}">{{$leafs->name}} </option>
                                      @endforeach
                                  </select>
                              </div>
                          </div>
                         
                          <div class="col-md-4 col-12">
                              <div class="mb-1">
                                  <label class="form-label" for="first-name-column">{{ __('pages.buy_price') }} <font color="red">*</font></label>
                                  <input type="number" step="0.01" id="first-name-column" class="form-control" placeholder="{{ __('pages.buy_price') }}" name="buy_price" required>
                              </div>
                          </div>
                          <div class="col-md-4 col-12">
                              <div class="mb-1">
                                  <label class="form-label" for="first-name-column">{{ __('pages.vat') }} </label>
                                  <div class="input-group form-password-toggle mb-2">
                                      <input type="number" step="0.01" class="form-control" placeholder="{{ __('pages.vat') }}" name="vat" aria-describedby="basic-default-password">
                                      <span class="input-group-text cursor-pointer">%</span>
                                  </div>
                              </div>
                          </div>
                          <div class="col-md-4 col-12">
                              <div class="mb-1">
                                  <label class="form-label" for="first-name-column">{{ __('pages.igta') }} </label>
                                  <div class="input-group form-password-toggle mb-2">
                                      <input type="number" step="0.01" class="form-control" placeholder="{{ __('pages.igta') }}" name="igta" aria-describedby="basic-default-password">
                                      <span class="input-group-text cursor-pointer">%</span>
                                  </div>
                              </div>
                          </div>
                          <div class="col-md-4 col-12">
                              <div class="mb-1">
                                  <label class="form-label" for="first-name-column">{{ __('pages.status') }} </label>
                                  <div class="demo-inline-spacing">
                                      <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="1" >
                                          <label class="form-check-label" for="inlineRadio1">{{translate('Active')}}</label>
                                      </div>
                                      <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="0">
                                          <label class="form-check-label" for="inlineRadio2">{{translate('Inactive')}}</label>
                                      </div>
                                  </div>
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
<script src="{{asset('dashboard/app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>

<script src="{{asset('dashboard/app-assets/js/scripts/forms/form-select2.min.js') }}"></script>
<script>
$(document).ready(function() {
$('.js-example-basic-single').select2({
  tags: true
});
});
</script>
@endsection
@extends('layouts.app')
@section('title', __('pages.medicine_edit'))
@section('custom-css')
<link rel="stylesheet" type="text/css" href="{{asset('dashboard/app-assets/vendors/css/forms/select/select2.min.css') }}">
@endsection
@section('content')
    <section id="basic-horizontal-layouts">
        <section id="multiple-column-form">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Request Changes</h4>
                </div>
                <div class="card-body">
                  <form class="form" method="POST" enctype="multipart/form-data" action="{{route('medicine.change', $medicine->id)}}">
                      @csrf
                    <div class="row">
                    
                     <div class="col-md-6 col-12">
                        <div class="mb-1">
                          <label class="form-label" for="first-name-column">{{ __('pages.name') }} <font color="red">*</font></label>
                          <input type="text" id="first-name-column" class="form-control" placeholder="{{ __('pages.name') }}"  value="{{$medicine->name}}" name="name" required>
                        </div>
                     </div>
                      
                       <div class="col-md-6 col-12">
                        <div class="mb-1">
                          <label class="form-label" for="first-name-column">{{ __('pages.category') }} <font color="red">*</font></label>
                          <select class="select2 form-select" id="select2-basic" data-select2-id="select2-basic" tabindex="-1" aria-hidden="true" name="category_id" required>
                            <option value="">{{translate('Select Category')}}</option>
                            @foreach($category as $leafs)
                            <option value="{{$leafs->id}}"  @if($medicine->category_id == $leafs->id) selected @endif>{{$leafs->name}} </option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                     
                     <div class="col-md-12 col-12">
                        <div class="mb-1">
                          <img src="{{ asset('storage/images/medicine/'.$medicine->image.'')}}" height="100" width="100">
                          <input class="form-control" type="file" name="image" id="formFile">
                         
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
@endsection
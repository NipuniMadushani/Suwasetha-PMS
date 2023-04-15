@extends('layouts.app')
@section('title', __('pages.change_pass'))
@section('content')
<section id="basic-horizontal-layouts">
<section id="multiple-column-form">
  <div class="row">
    <div class="col-md-6 col-sm-6">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">{{ __('Change Basic Information') }}</h4>
        </div>
        <div class="card-body">
          <form class="form" action="{{url('/profile_info_setting')}}"  method="post"  enctype="multipart/form-data">
              @csrf
            <div class="row">
              <div class="col-md-7 col-12 mr-100">
                <div class="mb-1">
                  <label class="form-label" for="last-name-column-1">{{ __('Email') }}</label>
                  <input type="email" id="last-name-column-1" class="form-control" name="email" value="{{Auth::user()->email}}" required>
                </div>
              </div>
              <div class="col-md-7 col-12 mr-100">
                <div class="mb-1">
                  <label class="form-label" for="city-column">{{ __('Name') }}</label>
                  <input type="text" id="city-column" class="form-control" name="name" value="{{Auth::user()->name}}"  required>
                </div>
              </div>
              <div class="col-md-7 col-12 mr-100">
                <div class="mb-1">
                  <label class="form-label" for="city-column">{{ __('Image') }}</label>
                  <input type="file" id="city-column" class="form-control" name="image"  required>
                </div>
              </div>
              <div class="col-12">
                <button type="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light">{{ __('pages.submit') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-sm-6">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">{{ __('pages.change_pass') }}</h4>
        </div>
        <div class="card-body">
          <form class="form" action="{{url('/profile_setting')}}"  method="post">
              @csrf
            <div class="row">
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="last-name-column">{{ __('Current Password') }}</label>
                  <input type="password" id="last-name-column" class="form-control" name="old" required>
                </div>
              </div>
              <div class="col-md-6 col-12 mr-100">
                <div class="mb-1">
                  <label class="form-label" for="last-name-column-1">{{ __('pages.new_pass') }}</label>
                  <input type="password" id="last-name-column-1" class="form-control" name="new" required>
                </div>
              </div>
              <div class="col-md-6 col-12 mr-100">
                <div class="mb-1">
                  <label class="form-label" for="city-column">{{ __('pages.confirm_pass') }}</label>
                  <input type="password" id="city-column" class="form-control" name="confirm" required>
                </div>
              </div>
              <div class="col-12">
                <button type="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light">{{ __('pages.submit') }}</button>
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
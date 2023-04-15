@extends('layouts.app')
@section('title', __('pages.change_pass'))
@section('content')
<section id="basic-horizontal-layouts">
<section id="multiple-column-form">
  <div class="row">
    <div class="col-12">
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
                  <label class="form-label" for="last-name-column">{{ __('Current password') }}</label>
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
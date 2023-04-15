@extends('layouts.app')
@section('title', translate('Packages Edit'))
@section('content')
    <section id="basic-horizontal-layouts">
        <section id="multiple-column-form">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">{{ translate('Packages Edit') }}</h4>
                </div>
                <div class="card-body">
                  <form class="form" method="POST" action="{{route('saas.package.edit', $package->id) }}">
                      @csrf
                    <div class="row">
                      <div class="col-md-6 col-12">
                        <div class="mb-1">
                          <label class="form-label" for="first-name-column">{{ translate('Package Name') }}</label>
                          <input type="text" id="first-name-column" class="form-control" placeholder="{{ __('pages.name') }}" name="name" value="{{$package->name}}" required>
                        </div>
                      </div>
                      <div class="col-md-6 col-12">
                        <div class="mb-1">
                          <label class="form-label" for="first-name-column">{{ translate('Price') }}</label>
                          <input type="number" step="0.01" id="first-name-column" class="form-control" placeholder="{{ translate('Price') }}"  value="{{$package->price}}" name="price" required>
                        </div>
                      </div>
                       <div class="field_wrapper">
                       @foreach (json_decode($package->features, true) as $key=>$pack)
                        <div class="col-md-6">
                          <div class="form-group">
                              <label class="form-label" for="first-name-column">{{ translate('Feature Name') }}</label>
                            <input type="text" class="form-control" value="{{$pack}}" name="features[]">
                          </div>
                          <a href="javascript:void(0);" class="remove_button btn btn-danger my-3" title="Delete Field">Delete</a>
                        </div>
                        @endforeach
                        <a href="javascript:void(0);" class="add_button btn btn-success my-3" title="Add column">Add</a>
                      </div>
                      <div class="col-md-6 col-12">
                        <div class="mb-1">
                          <label class="form-label" for="first-name-column">{{ translate('Duration') }}</label>
                          <input type="number" id="first-name-column" class="form-control" placeholder="{{ translate('Duration') }}" value="{{$package->duration}}" name="duration" required>
                        </div>
                      </div>
                      <div class="col-md-6 col-12">
                        <div class="mb-1">
                          <label class="form-label" for="first-name-column">{{ translate('Setup Fee') }}</label>
                          <input type="number" step="0.01" id="first-name-column" class="form-control" placeholder="{{ translate('Setup Fee') }}"  value="{{$package->setup_fee}}" name="setup_fee" required>
                        </div>
                      </div>
                      <div class="col-md-6 col-12">
                        <div class="mb-1">
                          <label class="form-label" for="first-name-column">{{ translate('Discount') }}</label>
                          <input type="number" step="0.01" id="first-name-column" class="form-control" placeholder="{{ translate('Discount') }}"  value="{{$package->discount}}" name="discount" required>
                        </div>
                      </div>
                      <div class="col-md-6 col-12">
                        <div class="mb-1">
                          <label class="form-label" for="first-name-column">{{ translate('Type') }}</label>
                          <select name="trial" class="form-select">
                              <option value="0" @if($package->trial == 0) selected @endif >Regular</option>
                              <option value="1" @if($package->trial == 1) selected @endif>Trial</option>
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
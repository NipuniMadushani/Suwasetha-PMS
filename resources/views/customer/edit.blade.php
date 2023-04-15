@extends('layouts.app')
@section('title', __('pages.edit_customer'))
@section('content')
    <section id="basic-horizontal-layouts">
        <section id="multiple-column-form">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">{{ __('pages.edit_customer') }}</h4>
                </div>
                <div class="card-body">
                  <form class="form" method="POST" action="{{route('customer.edit', $customer->id) }}">
                      @csrf
                    <div class="row">
                      <div class="col-md-6 col-12">
                        <div class="mb-1">
                          <label class="form-label" for="first-name-column">{{ __('pages.name') }}</label>
                          <input type="text" id="first-name-column" class="form-control" placeholder="{{ __('pages.name') }}" value="{{ $customer->name}}" name="name" required>
                        </div>
                      </div>
                      <div class="col-md-6 col-12">
                        <div class="mb-1">
                          <label class="form-label" for="last-name-column">{{ __('pages.address') }}</label>
                          <input type="text" id="last-name-column" class="form-control" placeholder="{{ __('pages.address') }}" value="{{ $customer->address}}" name="address" required>
                        </div>
                      </div>
                      <div class="col-md-6 col-12">
                        <div class="mb-1">
                          <label class="form-label" for="city-column">{{ __('pages.phone') }}</label>
                          <input type="text" id="city-column" class="form-control" placeholder="{{ __('pages.phone') }}" value="{{ $customer->phone}}" name="phone" required>
                        </div>
                      </div>
                      <div class="col-md-6 col-12">
                        <div class="mb-1">
                          <label class="form-label" for="country-floating">{{ __('pages.due') }}</label>
                          <input type="number" step="0.01" id="country-floating" class="form-control" name="due" placeholder="{{ __('pages.due') }}" value="{{ $customer->due}}">
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
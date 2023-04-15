@extends('layouts.app')
@section('title', __('pages.leaf_add'))
@section('content')
    <section id="basic-horizontal-layouts">
        <section id="multiple-column-form">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">{{ __('pages.leaf_add') }}</h4>
                </div>
                <div class="card-body">
                  <form class="form" method="POST">
                      @csrf
                    <div class="row">
                      <div class="col-md-6 col-12">
                        <div class="mb-1">
                          <label class="form-label" for="first-name-column">{{ __('pages.leaf_type') }}</label>
                          <input type="text" id="first-name-column" class="form-control" placeholder="{{ __('pages.leaf_type') }}" name="name" required>
                        </div>
                      </div>
                      <div class="col-md-6 col-12">
                        <div class="mb-1">
                          <label class="form-label" for="first-name-column">{{ __('pages.qty_box') }}</label>
                          <input type="text" id="first-name-column" class="form-control" placeholder="{{ __('pages.qty_box') }}" name="qty" required>
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
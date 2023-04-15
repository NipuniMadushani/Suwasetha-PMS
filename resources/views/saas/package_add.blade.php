@extends('layouts.app')
@section('title', translate('Packages Add'))
@section('content')
<section id="basic-horizontal-layouts">
    <section id="multiple-column-form">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">{{ translate('Packages Add') }}</h4>
            </div>
            <div class="card-body">
              <form class="form" method="POST">
                  @csrf
                <div class="row">
                  <div class="col-md-6 col-12">
                    <div class="mb-1">
                      <label class="form-label" for="first-name-column">{{ translate('Package Name') }}</label>
                      <input type="text" id="first-name-column" class="form-control" placeholder="{{ __('pages.name') }}" name="name" required>
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="mb-1">
                      <label class="form-label" for="first-name-column">{{ translate('Price') }}</label>
                      <input type="number" step="0.01" id="first-name-column" class="form-control" placeholder="{{ translate('Price') }}" name="price" required>
                    </div>
                  </div>
                  <div class="field_wrapper">
                    <div class="col-md-6">
                      <div class="form-group">
                          <label class="form-label" for="first-name-column">{{ translate('Feature Name') }}</label>
                        <input type="text" class="form-control"  name="features[]">
                      </div>
                      <a href="javascript:void(0);" class="add_button btn btn-success my-3" title="New Column">Add</a>
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
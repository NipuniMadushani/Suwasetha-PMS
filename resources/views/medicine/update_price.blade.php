@extends('layouts.app')
@section('title', __('pages.category_edit'))
@section('content')
    <section id="basic-horizontal-layouts">
        <section id="multiple-column-form">
            <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">{{ __('Update Price') }}</h4>
                </div>
                <div class="card-body">
                  <form class="form" method="POST" action="{{route('update.price', $batch->id) }}">
                      @csrf
                    <div class="row">
                      <div class="col-md-6 col-12">
                        <div class="mb-1">
                          <label class="form-label" for="first-name-column">{{ __('pages.price') }}</label>
                          <input type="number" step="0.01" id="first-name-column" class="form-control" placeholder="{{ __('pages.name') }}" value="{{ $batch->price}}" name="price" required>
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
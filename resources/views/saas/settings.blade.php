@extends('layouts.app')
@section('title', __('pages.edit_settings'))
@section('content')
    <section id="basic-horizontal-layouts">
        <section id="multiple-column-form">
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h4 class="card-title">{{ __('pages.edit_settings') }}</h4>
                    </div>
                    <div class="card-body">
                      <form class="form" method="POST" action="{{ route('saas.edit', $shop->id) }}">
                          @csrf
                        <div class="row">
                          <div class="col-md-6 col-12">
                            <div class="mb-1">
                              <label class="form-label" for="first-name-column">{{ __('pages.site_name') }}</label>
                              <input type="text" id="first-name-column" class="form-control" placeholder="{{ __('pages.name') }}" value="{{ $shop->name}}" name="name" required>
                            </div>
                          </div>
                          <div class="col-md-6 col-12">
                            <div class="mb-1">
                              <label class="form-label" for="last-name-column">{{ __('pages.address') }}</label>
                              <input type="text" id="last-name-column" class="form-control" placeholder="{{ __('pages.address') }}" value="{{ $shop->address}}" name="address" required>
                            </div>
                          </div>
                          <div class="col-md-6 col-12">
                            <div class="mb-1">
                              <label class="form-label" for="city-column">{{ __('pages.currency') }}</label>
                              <input type="text" id="city-column" class="form-control" placeholder="{{ __('pages.currency') }}" value="{{ $shop->currency}}" name="currency" required>
                            </div>
                          </div>
                          <div class="col-md-6 col-12">
                            <div class="mb-1">
                              <label class="form-label" for="country-floating">{{ __('pages.prefix') }}</label>
                              <input type="text"  id="country-floating" class="form-control" name="prefix" placeholder="{{ __('pages.prefix') }}" value="{{ $shop->prefix}}">
                            </div>
                          </div>
                          <div class="col-md-6 col-12">
                            <div class="mb-1">
                              <label class="form-label" for="country-floating">{{ __('pages.theme') }}</label>
                              <select class="form-control" name="theme">
                                  
                                  <option value="dark" @if($shop->theme == 'dark') selected @endif>{{ __('pages.dark') }}</option>
                                  <option value="light" @if($shop->theme == 'light') selected @endif >{{ __('pages.light') }}</option>
                              </select>
                            </div>
                          </div>
                           <div class="col-md-6 col-12">
                                <div class="mb-1">
                                  <label class="form-label" for="city-column">{{ __('pages.footer_text') }}</label>
                                  <input type="text" id="editor" class="form-control" placeholder="Copyright Text" value="{{ $shop->copyright_text}}" name="copyright_text" required>
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


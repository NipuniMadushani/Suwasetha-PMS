@extends('layouts.app')
@section('title', translate('Renew Subscripton'))
@section('content')
    <section id="basic-horizontal-layouts">
        <section id="multiple-column-form">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">{{ translate('Renew Subscripton') }}</h4>
                </div>
                <div class="card-body">
                  <form class="form" method="POST">
                      @csrf
                    <div class="row">
                        
                        
                        
                        
                      <div class="col-md-6 col-6">
                        <div class="mb-1">
                          <label class="form-label" for="first-name-column">{{ translate('Package') }}</label>
                         <select name="package_id" class="form-select" requred>
                             @foreach($plan as $pack)
                             <option value="{{$pack->id}}" @if(Auth::user()->shop->package_id == $pack->id) selected @endif>{{$pack->name}} ({{$pack->price}} TK)</option>
                             @endforeach
                         </select>
                        </div>
                      </div>
                      </div>
                      <div class="row">
                      <div class="col-md-6 col-12">
                        <div class="mb-1">
                          <label class="form-label" for="first-name-column">{{ translate('Duration') }}</label>
                          <select name="duration" class="form-select" requred>
                            <option value="1" >1 Month</option>
                                                <option value="2" >2 Month</option>
                                                <option value="6" >6 Month</option>
                                                <option value="12" >1 Year</option>
                         </select>
                        </div>
                      </div>
                      @php
                      $set_fee = \App\Models\Package::where('trial', 0)->first();
                      
                
                                        
                                        $discount = ($set_fee->discount / 100) * $set_fee->setup_fee;
                                      
                      @endphp
                      
                      @if(Auth::user()->shop->status == 0)
                      <div class="row">
                      <div class="col-md-6 col-6">
                        <div class="mb-1">
                          <label class="form-label" for="first-name-column">{{ translate('Setup Fee') }}</label>
                        <input class="form-control" name="setup_fee" value="{{($set_fee->setup_fee-$discount)}}" required readonly>
                        </div>
                      </div>
                      </div>
                      @endif
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
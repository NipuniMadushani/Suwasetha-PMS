@extends('layouts.app')
@section('title', translate('Returned Medicine'))
@section('content')


   
                                
                                
    <section id="basic-horizontal-layouts">
        <section id="multiple-column-form">
        <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
              <h4 class="card-title">{{ translate('Returned Medicine') }}</h4>
                </div>
                <div class="card-body">
                     <form class="form" method="POST" action="{{route('purchase.returned', $inv->id) }}">
                  @csrf
                <div class="row">
                  <div class="col-md-6 col-12">
                    <div class="mb-1">
                      <label class="form-label" for="first-name-column">{{ translate('Medicine Name') }}</label>
                      
                      <select name="medicine" class="form-select" required>
                      @foreach($medicine as $batch)
                        <option value="{{$batch->medicine_id}}">{{ $batch->medicine->name}} ({{$batch->qty}} PC) - {{$batch->buy_price*$batch->qty}} TK</option>
                      @endforeach
                       </select>
                    </div>
                  </div>
                </div>
                
                    <div class="row">
                     <div class="col-md-6 col-12">
                    <div class="mb-1">
                      <label class="form-label" for="first-name-column">{{ translate('Quantity') }}</label>
                     <input type="number" name="qty" class="form-control">
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
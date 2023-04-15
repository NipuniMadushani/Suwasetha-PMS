@extends('layouts.app')
@section('title', translate('Returned Medicine'))
@section('content')


    @php
         $i = 0;
        $medicines = json_decode($inv->medicines, true);
        $count = count($medicines);
    @endphp
                                
                                
    <section id="basic-horizontal-layouts">
        <section id="multiple-column-form">
        <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
              <h4 class="card-title">{{ translate('Returned Medicine') }}</h4>
                </div>
                <div class="card-body">
                     <form class="form" method="POST" action="{{route('returned', $inv->id) }}">
                  @csrf
                <div class="row">
                  <div class="col-md-6 col-12">
                    <div class="mb-1">
                      <label class="form-label" for="first-name-column">{{ translate('Medicine Name') }}</label>
                      
                      <select name="medicine" class="form-select">
                        @for ($i = 0; $i < $count; $i++)
                            @if(!empty($medicines[$i]['batch']) && isset($medicines[$i]['batch']))  
                                @php
                                    $detail = \App\Models\Medicine::find($medicines[$i]['id']);
                                    $batch = \App\Models\Batch::find($medicines[$i]['batch']);
                                    $amount = ($batch->price*$medicines[$i]['quantity']);
                                @endphp
                            <option value="{{$medicines[$i]['batch']}}_{{$medicines[$i]['quantity']}}_{{$amount}}">{{ $detail->name}} ({{$medicines[$i]['quantity']}} PC) - {{$amount}} TK</option>
                            @endif
                        @endfor  
                      </select>
                      
                    </div>
                  </div>
                </div>
                
                    <div class="row">
                     <div class="col-md-6 col-12">
                    <div class="mb-1">
                      <label class="form-label" for="first-name-column">{{ translate('Quantity') }}</label>
                     <input type="number" name="qty" class="form-control">
                     @error('qty')
                      <span class="text-danger">Quantity is required!</span>
                     @enderror
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
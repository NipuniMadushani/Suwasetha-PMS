@extends('layouts.shop')
@section('title', $shop->name)



@section('content')
 <section class="banner">
                <div class="container"> 
                    <div class="row"> 
                        <div class="col-md-6 d-md-flex justify-content-md-end"> 
                            <div class="allbrand">
                                <a href="#"><span><i class="fa fa-window-maximize" aria-hidden="true"></i> ALL Brand</span></a>
                            </div>
                        </div>
                        <div class="col-md-6 d-md-flex justify-content-md-end"> 
                            <div class="allcompany">
                                <a href="#"><span><i class="fas fa-building"></i> ALL Pharmaceutical</span></a>
                            </div>
                        </div>
                    </div>
                </div> 
            </section>

            <section id="values" class="values features">
                <div class="container aos-init aos-animate" data-aos="fade-up">
                    
                    @foreach($medicine as $medicines)
                    <div class="product-card fleft">
                        <div class="badge">Hot</div>
                        <div class="product-tumb">
                            <img width="100%" src="{{ asset('storage/images/medicine/'.$medicines->image.'') }}" alt="">
                        </div>
                        <div class="product-details">
                            <span class="product-catagory">{{$medicines->supplier->name}}</span>
                            <h4><a href="">{{$medicines->name}}</a></h4>
                            <div class="product-bottom-details">
                                <div class="product-price">৳ {{$medicines->price}}</div>
                                <div class="product-links">
                                    <a href="/addcart/{{$medicines->id}}"><i class="fa fa-shopping-cart"></i>Add To Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                     {{ $medicine->links('page') }}
                </div>
                
            </section>
@endsection
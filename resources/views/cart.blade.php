@extends('layouts.shop')
@section('title', $shop->name)



@section('content')

<section class="pt-4">
  <div class="container">
    <div class="row w-100">
        <div class="col-lg-12 col-md-12 col-12"><h3 class="display-5 mb-2 text-center">Shopping Cart</h3></div>
        </div>
    </div>
</section>
            
<section class="pt-2 pb-2">
  <div class="container">
    <div class="row w-100">
        <div class="col-lg-8 col-md-8">
            <p class="mb-5 text-center">
                <i class="text-info font-weight-bold">{{$medicine->count()}}</i> items in your cart</p>
            <table id="shoppingCart" class="table table-condensed table-responsive">
                <thead>
                    <tr>
                        <th style="width:60%">Product</th>
                        <th style="width:12%">Price</th>
                        <th style="width:10%">Quantity</th>
                        <th style="width:16%"></th>
                    </tr>
                </thead>
                @php
                $total = 0;
                @endphp
                <tbody>
                    @foreach($medicine as $carts)
                    <tr>
                        <td data-th="Product">
                            <div class="row">
                                <div class="col-md-3 text-left">
                                    <img src="{{ asset('storage/images/medicine/'.$carts->medicine->image.'') }}" alt="" class="img-fluid d-none d-md-block rounded mb-2 shadow ">
                                </div>
                                <div class="col-md-9 text-left mt-sm-2">
                                    <h4>{{$carts->medicine->name}}</h4>
                                    <p class="font-weight-light">{{$carts->medicine->supplier->name}}</p>
                                </div>
                            </div>
                        </td>
                        @php
                        $total += $carts->medicine->price;
                        @endphp
                        <td data-th="Price">{{$carts->medicine->price}}</td>
                        <td data-th="Quantity">
                            <input type="number" class="form-control form-control-lg text-center" value="{{$carts->qty}}">
                        </td>
                        <td class="actions" data-th="">
                            <div class="text-right">
                               
                                <a class="btn btn-white border-secondary bg-white btn-md mb-2" href="/delcart/{{$carts->id}}">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                   @endforeach
                </tbody>
            </table>
            <div class="float-right text-right">
                <h4>Subtotal:</h4>
                <h1>{{$total}}</h1>
            </div>
        </div>
        <div style="border:2px dashed #555555; padding:10px;" class="col-lg-4 col-md-4">
            <h3>Enter Your Details</h3>

            <form action="{{route('shop.order', $shop->username) }}" method="POST">
                @csrf
                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <label for="inputEmail4">Name</label>
                      <input type="text" name="name" class="form-control" id="inputEmail4" placeholder="Name">
                    </div>
                    <input type="hidden" name="amount" value="{{$total}}">
                    <div class="form-group col-md-12">
                      <label for="inputEmail4">Email</label>
                      <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="Email">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="inputPhone">Phone</label>
                        <input type="text" class="form-control"  name="phone" id="Phone" placeholder="Phone Number">
                     </div>
                  </div>
                  <div class="form-group">
                    <label for="inputAddress">Address</label>
                    <input type="text" class="form-control" name="address" id="inputAddress" placeholder="Dhaka, Bangladesh">
                  </div>
            
        </div>
    </div>
    <div class="row mt-4 d-flex align-items-center">
        <div class="col-sm-6 order-md-2 text-right">
            <button type="submit" class="btn btn-primary mb-4 btn-lg pl-5 pr-5">Checkout</button>
        </div>
        <div class="col-sm-6 mb-3 mb-m-1 order-md-1 text-md-left">
            <a href="{{ route('shop.index', $shop->username) }}">
                <i class="fas fa-arrow-left mr-2"></i> Continue Shopping</a>
        </div>
    </div>
    </form>
</div>
</section>
@endsection
@extends('layouts.shop')


@section('custom-css')

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<style>
      <style>
        @import url('https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900&display=swap');
    html,body {
        font-family: 'Raleway', sans-serif;  
    }
    .thankyou-page ._header {
        padding: 100px 30px;
        text-align: center;
        background: rgb(94,10,89);
        background: linear-gradient(90deg, rgba(94,10,89,1) 0%, rgba(0,0,0,1) 93%);
    }
    .thankyou-page ._header .logo {
        max-width: 200px;
        margin: 0 auto 50px;
    }
    .thankyou-page ._header .logo img {
        width: 100%;
    }
    .thankyou-page ._header h1 {
        font-size: 65px;
        font-weight: 800;
        color: white;
        margin: 0;
    }
    .thankyou-page ._body {
        text-align: center;
        margin: -70px 0 30px;
    }
    .thankyou-page ._body ._box {
        margin: auto;
        max-width: 80%;
        padding: 50px;
        background: white;
        border-radius: 3px;
        box-shadow: 0 0 35px rgba(10, 10, 10,0.12);
        -moz-box-shadow: 0 0 35px rgba(10, 10, 10,0.12);
        -webkit-box-shadow: 0 0 35px rgba(10, 10, 10,0.12);
    }
    .thankyou-page ._body ._box h2 {
        font-size: 32px;
        font-weight: 600;
        color: #4ab74a;
    }
    .thankyou-page ._footer {
        text-align: center;
        padding: 50px 30px;
    }
    
    .thankyou-page ._footer .btn {
        background: #4ab74a;
        color: white;
        border: 0;
        font-size: 14px;
        font-weight: 600;
        border-radius: 0;
        letter-spacing: 0.8px;
        padding: 20px 33px;
        text-transform: uppercase;
    }
    </style>
</style>
@endsection
@section('content')
 <div class="thankyou-page">
        <div class="_header">
            <div class="logo">
                <img src="https://codexcourier.com/images/banner-logo.png" alt="">
            </div>
            <h1>Thank You!</h1>
        </div>
        <div class="_body">
            <div class="_box">
                <h2>
                    <strongThank You For Order On {{$shop->username}}</strongThank>.
                </h2>
                <p>
                    Thanks a bunch for filling that out. It means a lot to us, just like you do! We really appreciate you giving us a moment of your time today. Thanks for being you.If You Face Any Issue Then Feel  Free To Contact Us @ {{$shop->phone}}
                </p>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <table class="table">
                        <thead class="thead-dark">
                          <tr>
                            
                            <th scope="col">Order ID</th>
                            <th scope="col">#{{$order->id}}</th>
                          </tr>
                           <tr>
                            
                            <th scope="col">Order Date</th>
                            <th scope="col">{{$order->date}}</th>
                          </tr>
                          
                          <tr>
                            
                            <th scope="col">Total Price</th>
                            <th scope="col">{{$order->total_price}}</th>
                          </tr>
                        </thead>
                        
                      </table>
                </div>
                
            @php
            $customer = \App\Models\Customer::where('id', $order->id)->first();
            @endphp
                <div class="col-md-6">
                    <table class="table">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">Name</th>
                            <th scope="col">{{$customer->name}}</th>
                            
                          </tr>
                          <tr>
                            <th scope="col">Phone</th>
                            <th scope="col">{{$customer->phone}}</th>
                            
                          </tr>
                          <tr>
                            <th scope="col">Deliver Address</th>
                            <th scope="col">{{$customer->address}}</th>
                            
                          </tr>
                        </thead>
                        
                      </table>
                </div>
            </div>
        </div>
        <div class="_footer">
            <a class="btn" href="/">Back to homepage</a>
        </div>
    </div>
@endsection
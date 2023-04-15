@extends('layouts.saas')
@section('title', 'Contact - Pharmacy Software Solution')
@section('content')
  <section class="pagetitle">
            <div class="container">
                <header class="headingtitle">
                    <div class="title5">
                        <h1 data-text= "Contact Us for More Info">Contact Us for More Info</h1>
                    </div>
                </header>
            </div> 
        </section>


        <section class="section contact-info pb-0">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="contact-block mb-4 mb-lg-0">
                            <i class="fa fa-phone-square fa-2x"></i>
                            <h5>Call Us</h5>
                            {{$shop->phone}}
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="contact-block mb-4 mb-lg-0">
                            <i class="fa fa-envelope fa-2x"></i>
                            <h5>Email Us</h5>
                            {{$shop->email}}
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="contact-block mb-4 mb-lg-0">
                            <i class="fa fa-location-pin fa-2x"></i>
                            <h5>Location</h5>
                            {{$shop->adress}} , {{$shop->thana->name}} , {{$shop->district->name}}
                        </div>
                    </div>
                </div>
            </div>
        </section>



        <section class="contact-form-wrap section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <form method="post" class="basicform_with_reset contact__form">
                           @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input name="name" id="name" required="" type="text" class="form-control" placeholder="Your Full Name">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input name="email" id="email" type="email" class="form-control" placeholder="Your Email Address" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group-2 mb-4">
                                <textarea name="message" id="message" class="form-control" rows="8" placeholder="Your Message" required=""></textarea>
                            </div>
                            <div class="button">
                                <input class="submitbtn" name="submit" type="submit" value="Send Messege">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>



@endsection

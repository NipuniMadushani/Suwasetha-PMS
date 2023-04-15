@extends('layouts.saas')
@section('title', 'Pharmacy Software Solution')
@section('content')
 <section class="banner">
    <div class="container"> 
        <div class="row">
            <div class="col-md-6"> 
                <h1><span class="text">{{ translate('Pharmacy Management') }}</span></h1><br>
                <h3>{{ translate('Get your complete pharmacy shop management') }}</h3>
                <a href="{{ route('home') }}#buy-now">{{ translate('Get Started') }}</a>
            </div>
            <div class="col-md-6 d-md-flex justify-content-md-end bnrmobile">
                <video id="player" autoplay width="100%" playsinline controls data-poster="">
                  <source src="{{ asset('saas/img/vedio.mp4') }}" type="video/mp4" />
                  <source src="{{ asset('saas/img/vedio.mp4') }}" type="video/webm" />
                </video>
            </div>
        </div>
    </div> 
</section>

<section id="values" class="values features">
    <div class="container aos-init aos-animate" data-aos="fade-up">
        <header class="headingtitle">
            <div class="box2">
                <!--   
                <div class="inner  title5">
                <span>Why ATL Pharmacy</span>
                </div>
                <div class="inner">
                <span>Why ATL Pharmacy</span>
                </div> -->
                <div class="title5">
                    <h1 data-text= "{{ translate('WHY PHARMACY SOFTWARE') }}">{{ translate('WHY PHARMACY SOFTWARE') }}</h1>
                </div>
            </div>
        </header>

        <div class="row">
            <div class="col-lg-3">
                <div class="box aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                    <img src="{{ asset('saas/img/mm.png') }}">
                    <h3>{{ translate('Medicine Management') }}</h3>
                    <p>
                        {{ translate('21000 medicine list including, Strength, Price, Manufacturer Price, Box Size, self, Units, Leafs, Types.') }}
                    </p>
                </div>
            </div>

            <div class="col-lg-3 mt-4 mt-lg-0">
                <div class="box aos-init aos-animate" data-aos="fade-up" data-aos-delay="400">
                    <img src="{{ asset('saas/img/cm.png') }}">
                    <h3>
                        {{ translate('Customer Management') }}
                    </h3>
                    <p> {{ translate('Record and add your Customer, customer list including name, Address, Phone & Customer Due Management.') }}</p>
                </div>
            </div>

            <div class="col-lg-3 mt-4 mt-lg-0 cmr">
                <div class="box aos-init aos-animate" data-aos="fade-up" data-aos-delay="600">
                    <img src="{{ asset('saas/img/sm2.png') }}">
                    <h3>{{ translate('Supplier Management') }}</h3>
                    <p>
                        {{ translate('150 Manufacturers Company list including name, Address, Phone & Manufacturers Due Management.') }}
                    </p>
                </div>
            </div>

            <div class="col-lg-3 mt-4 mt-lg-0 cmr">
                <div class="box aos-init aos-animate" data-aos="fade-up" data-aos-delay="600">
                    <img src="{{ asset('saas/img/im.png') }}">
                    <h3>{{ translate('Invoice Management') }}</h3>
                    <p>
                        {{ translate('Record your all customers invoice including medicine, quantity and payment Management.') }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>


<section id="values" class="values details">
    <div class="container aos-init aos-animate" data-aos="fade-up">
        <header class="headingtitle">
            <div class="box2">
                <div class="title5">
                    <h1 data-text= " {{ translate('Details About Pharmacy Software') }}">{{ translate('Details About Pharmacy Software') }}</h1>
                </div>
            </div>
        </header>

        <div class="row">
            <div class="col-lg-6">
                <div class="box5">
                    <img src="{{ asset('saas/img/banner1.jpg') }}" width="100%">
                </div>
            </div>

            <div class="col-lg-6 mt-4 mt-lg-0 featurelist">
                <div class="box5">
                    <h3 class="textsmall">
                        {{ translate('Essential Features') }}
                    </h3>
                    <ul>
                        <li><i class="fa fa-check-circle"></i> {{ translate('More than 21000 Medicine List') }}</li>
                        <li><i class="fa fa-check-circle"></i> {{ translate('More than 150 Pharmaceuticals Company List') }}</li>
                        <li><i class="fa fa-check-circle"></i> {{ translate('Integrated Pharmacy E-commerce Website') }}</li>
                        <li><i class="fa fa-check-circle"></i> {{ translate('Complete Managed Dashboard') }}</li>
                        <li><i class="fa fa-check-circle"></i> {{ translate('Customer List Customer Due Management') }}</li>
                        <li><i class="fa fa-check-circle"></i> {{ translate('Manufacturers, Manufacturers Due Management') }}</li>
                        <li><i class="fa fa-check-circle"></i> {{ translate('Medicine list, Category, Units, Leafs, Types') }}</li>
                        <li><i class="fa fa-check-circle"></i> {{ translate('Purchase and Purchase History Management') }}</li>
                        <li><i class="fa fa-check-circle"></i> {{ translate('Invoice, Invoice History Management') }}</li>
                        <li><i class="fa fa-check-circle"></i> {{ translate('Complete Daily, Monthly and Yearly Report') }}</li>
                        <li><i class="fa fa-check-circle"></i> {{ translate('Chat Option') }}</li>
                        <li><i class="fa fa-check-circle"></i> {{ translate('Payment Method and Multi Language settings') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="values" class="values details" style="background:#f4f5fa;">
    <div class="container aos-init aos-animate" data-aos="fade-up">
        <div class="row">
            <div class="col-lg-6 mt-4 mt-lg-0 featurelist">
                <div class="box5">
                    <h3 class="textsmall" style="line-height: 35px; margin-top:0px !important;">
                        {{ translate('A Faster Way of Pharmacy Management') }}
                    </h3>
                    <p style="margin-top:25px; text-align:justify;">
                        {{ translate('Pharmacy Software Solution is built to manage overall pharmacy business activities including medicine management, purchase management, supplier or manufacturers management, stock management, sales management, daily or monthly accounts management. Most importantly manage the low stock medicine, manage purchase from medicine manufacturers, manage the customers, and manufacturers payable payment. This software is easy to use and manage with easy medicine search, easy invoice creation, pharmacy faster daily operation and date wise details report.') }}
                    </p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="box5">
                    <img src="{{ asset('saas/img/sss01.png') }}" width="100%">
                </div>
            </div>
        </div>
    </div>
</section>
<section id="values" class="values details">
    <div class="container aos-init aos-animate" data-aos="fade-up">
        <header class="headingtitle">
            <div class="box2">
                <div class="title5">
                    <h1 data-text= "{{ translate('Packages and Pricing') }}">{{ translate('Packages and Pricing') }}</h1>
                </div>
            </div>
        </header>
        <a name="buy-now"></a>
        <div class="row">
            <div class="pricing-table">
                               <div class="ptable-item">
                    <div class="ptable-single">
                        <div class="ptable-header">
                            <div class="ptable-title">
                                <h2>যাচাই</h2>
                            </div>
                            <div class="ptable-price">
                                <h2>&#2547;0<span>/ 7  days </span></h2>
                            </div>
                        </div>
                        <div class="ptable-body">
                            <div class="ptable-description">
                                <ul>
                                    <li>21000 Medicine List</li>
                                    <li>150 Pharmaceuticals Company List</li>
                                    <li>Inventory Management</li>
                                    <li>POS System</li>
                                    <li>Customer List</li>
                                    <li>Customer Due Management</li>
                                    <li>Manufacturers Due Management</li>
                                    <li>Purchase Management</li>
                                    <li>Invoice Management</li>
                                    <li>All Report View</li>
                                    <li>Payment Method</li>
                                    <li>Doctor visit and Prescription</li>
                                    <li>Live Chat Option with Customers</li>
                                    <li>Multi Language</li>
                                    <li>Pharmacy E-commerce</li>
                                    <li>Technical Support</li>
                                    <li>Prescription Upload to  Pharmacy</li>
                                    <li>Setup Fee 0</li>
                                </ul>
                            </div>
                        </div>
                        <div class="ptable-footer">
                            <div class="ptable-action">
                                <a href="https://pharmacyss.com/buy/4">Buy Now</a>
                            </div>
                        </div>
                    </div>
                </div>

                            <div class="ptable-item">
                    <div class="ptable-single">
                        <div class="ptable-header">
                            <div class="ptable-title">
                                <h2>সুরক্ষা</h2>
                            </div>
                            <div class="ptable-price">
                                <h2>&#2547;1000<span>/ 1  month </span></h2>
                            </div>
                        </div>
                        <div class="ptable-body">
                            <div class="ptable-description">
                                <ul>
                                  <li>21000 Medicine List</li>
                                  <li>150 Pharmaceuticals Company List</li>
                                  <li>Inventory Management</li>
                                  <li>POS System</li>
                                  <li>Customer List</li>
                                  <li>Customer Due Management</li>
                                  <li>Manufacturers Due Management</li>
                                  <li>Purchase Management</li>
                                  <li>Invoice Management</li>
                                  <li>All Report</li>
                                  <li>Payment Method</li>
                                  <li>Multi Language</li>
                                  <li>Doctor visit and Prescription</li>
                                  <li> <del>Mobile app</del> </li>                  
                                  <li> <del>Pharmacy E-commerce</del></li>
                                  <li> <del>Live Chat Option with Customer</del> </li>
                                  <li> <del>Prescription Upload to  Pharmacy</del> </li>
                                  <li>Setup Fee : ৳15000</li>
                                </ul>
                            </div>
                        </div>
                        <div class="ptable-footer">
                            <div class="ptable-action">
                                <a href="https://pharmacyss.com/buy/5">Buy Now</a>
                            </div>
                        </div>
                    </div>
                </div>

                            <div class="ptable-item">
                    <div class="ptable-single">
                        <div class="ptable-header">
                            <div class="ptable-title">
                                <h2>আস্থা</h2>
                            </div>
                            <div class="ptable-price">
                                <h2>&#2547;2000<span>/1 month </span></h2>
                            </div>
                        </div>
                        <div class="ptable-body">
                            <div class="ptable-description">
                                <ul>
                                <li>21000 Medicine List</li>
                                <li>150 Pharmaceuticals Company List</li>
                              <li>Inventory Management</li>
                              <li>POS System</li>
                              <li>Customer List</li>
                              <li>Customer Due Management</li>
                              <li>Manufacturers Due Management</li>
                              <li>Purchase Management</li>
                              <li>Invoice Management</li>
                              <li>All Report</li>
                              <li>Payment Method</li>
                              <li>Multi Language</li>
                                                                   
                               <li>Doctor visit and Prescription</li>
                               <li>Mobile app </li>
                              <li>Pharmacy E-commerce</li>
                              <li>Live Chat Option with Customer</li>
                              <li>Prescription Upload to  Pharmacy</li>
                              <li>Setup Fee : ৳15000 </li>
                                </ul>
                            </div>
                        </div>
                        <div class="ptable-footer">
                            <div class="ptable-action">
                                <a href="https://pharmacyss.com/buy/6">Buy Now</a>
                            </div>
                        </div>
                    </div>
                </div>

            
            </div>
        </div>
    </div>
</section>



@endsection

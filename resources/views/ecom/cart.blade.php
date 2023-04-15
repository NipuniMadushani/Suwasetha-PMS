@extends('layouts.ecom')



@section('content')


        <div class="breadcrumb-area section-padding-1 bg-gray breadcrumb-ptb-1">
            <div class="container-fluid">
                <div class="breadcrumb-content text-center">
                    <div class="breadcrumb-title">
                        <h2>Shopping Cart</h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- cart start -->
        <div class="cart-main-area pt-110 pb-120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <form action="#">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="table-content table-responsive cart-table-content">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th></th>
                                                    <th>Product</th>
                                                    <th> Price</th>
                                                    <th>Quantity</th>
                                                    <th>total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="product-remove">
                                                        <a href="#"><i class=" ti-close "></i></a>
                                                    </td>
                                                    <td class="product-img">
                                                        <a href="#"><img src="assets/images/cart/cart-1.jpg" alt=""></a>
                                                    </td>
                                                    <td class="product-name"><a href="#">Heavy Duty [Military Grade] </a></td>
                                                    <td class="product-price"><span class="amount">$26.00</span></td>
                                                    <td class="cart-quality">
                                                        <div class="product-details-quality quality-width-cart">
                                                            <div class="cart-plus-minus">
                                                                <input class="cart-plus-minus-box" type="text" name="qtybutton" value="2">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="product-total"><span>$110.00</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="product-remove">
                                                        <a href="#"><i class=" ti-close "></i></a>
                                                    </td>
                                                    <td class="product-img">
                                                        <a href="#"><img src="assets/images/cart/cart-2.jpg" alt=""></a>
                                                    </td>
                                                    <td class="product-name"><a href="#">Noise Cancelling Headphones</a></td>
                                                    <td class="product-price"><span class="amount">$26.00</span></td>
                                                    <td class="cart-quality">
                                                        <div class="product-details-quality quality-width-cart">
                                                            <div class="cart-plus-minus">
                                                                <input class="cart-plus-minus-box" type="text" name="qtybutton" value="2">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="product-total"><span>$110.00</span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="cart-shiping-update-wrapper">
                                        <div class="discount-code">
                                            <input type="text" required="" name="name" placeholder="Enter your coupon code">
                                            <button class="coupon-btn" type="submit">Apply coupon</button>
                                        </div>
                                        <div class="cart-clear">
                                            <a href="#">Clear Cart</a>
                                            <a class="update-cart" href="#">Update cart</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="grand-total-wrap">
                                        <h4>Cart Totals</h4>
                                        <div class="grand-total-content">
                                            <ul>
                                                <li>Subtotal <span> $87.00</span></li>
                                                <li>Shipping
                                                    <ul>
                                                        <li><input type="radio" name="shipping" value="info" checked="checked">Flat rate: $10</li>
                                                        <li><input type="radio" name="shipping" value="info2">Free shipping</li>
                                                        <li><input type="radio" name="shipping" value="info3">Local pickup</li>
                                                    </ul>
                                                </li>
                                                <li>Total Price <span>$87.00</span> </li>
                                            </ul>
                                        </div>
                                        <div class="grand-btn">
                                            <a href="#">Proceed to checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- cart end -->
        <div class="subscribe-area bg-black pt-70 pb-80">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3">
                        <div class="subscribe-title">
                            <h3>Stay in touch</h3>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div id="mc_embed_signup" class="subscribe-form subscribe-mrg-1">
                            <form id="mc-embedded-subscribe-form" class="validate subscribe-form-style" novalidate="" target="_blank" name="mc-embedded-subscribe-form" method="post" action="http://devitems.us11.list-manage.com/subscribe/post?u=6bbb9b6f5827bd842d9640c82&amp;id=05d85f18ef">
                                <div id="mc_embed_signup_scroll" class="mc-form">
                                    <input class="email" type="email" required="" placeholder="Enter your email address..." name="EMAIL" value="">
                                    <div class="mc-news" aria-hidden="true">
                                        <input type="text" value="" tabindex="-1" name="b_6bbb9b6f5827bd842d9640c82_05d85f18ef">
                                    </div>
                                    <div class="clear">
                                        <input id="mc-embedded-subscribe" class="button" type="submit" name="subscribe" value="Subscribe">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     
@endsection
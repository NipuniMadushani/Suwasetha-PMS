
    <div class="d-flex flex-row pvl11">
        <table class="table table-bordered">
            <thead class="text-muted">
                <tr>
                    <th scope="col"><?php echo e(\App\CPU\translate('item')); ?></th>
                    <th scope="col" class="text-center"><?php echo e(\App\CPU\translate('qty')); ?></th>
                    <th scope="col"><?php echo e(\App\CPU\translate('price')); ?></th>
                    <th scope="col"><?php echo e(\App\CPU\translate('delete')); ?></th>
                </tr>
            </thead>
            <tbody>
            <?php
                $subtotal = 0;
                $addon_price = 0;
                $tax = 0;
                $discount = 0;
                $discount_type = 'amount';
                $discount_on_product = 0;
                $total_tax = 0;
                $ext_discount = 0;
                $ext_discount_type = 'amount';
                $coupon_discount =0;
                $product_subtotal = 0;
                $gateway = \App\Models\Method::where('shop_id', Auth::user()->shop_id)->get();
             
            ?>
            <?php if(session()->has($cart_id) && count( session()->get($cart_id)) > 0): ?>
                <?php
                    $cart = session()->get($cart_id);
                    if(isset($cart['tax']))
                    {
                        $tax = $cart['tax'];
                    }
                    if(isset($cart['discount']))
                    {
                        $discount = $cart['discount'];
                        $discount_type = $cart['discount_type'];
                    }
                    if (isset($cart['ext_discount'])) {
                        $ext_discount = $cart['ext_discount'];
                        $ext_discount_type = $cart['ext_discount_type'];
                    }
                    if(isset($cart['coupon_discount']))
                    {
                        $coupon_discount = $cart['coupon_discount'];
                    }
                ?>
            
                <?php $__currentLoopData = session()->get($cart_id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cartItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(is_array($cartItem)): ?>
                    <?php
                    
                    $product_subtotal = $cartItem['price'];
                    $discount_on_product += ($cartItem['discount']*$cartItem['quantity']);
                    $subtotal += $product_subtotal;

                    //tax calculation
                    $product = \App\Models\Medicine::find($cartItem['id']);
                    $total_tax += 0;
                    
                    ?>
                <tr>
                    <td class="media align-items-center">
                        <img class="avatar avatar-sm mr-1" src="<?php echo e(asset('storage/images/medicine/'.$cartItem['image'].'')); ?>"
                                onerror="this.src='<?php echo e(asset('pos/img/160x160/img2.jpg')); ?>'" alt="<?php echo e($cartItem['name']); ?> image">
                        <div class="media-body">
                            <h5 class="text-hover-primary mb-0"><?php echo e(Str::limit($cartItem['name'], 10)); ?></h5>
                            <small><?php echo e(trans('Batch')); ?>: <?php echo e(Str::limit($cartItem['batch_no'], 20)); ?></small>
                            
                        </div>
                    </td>
                    <td class="align-items-center text-center">
                        <input type="number" data-batch="<?php echo e($cartItem['batch_no']); ?>" data-key="<?php echo e($key); ?>" class="pvl12" value="<?php echo e($cartItem['quantity']); ?>" min="1" onkeyup="updateQuantity('<?php echo e($cartItem['id']); ?>','<?php echo e($cartItem['batch_no']); ?>',this.value,event)">
                    </td>
                    <td class="text-center px-0 py-1">
                        <div class="btn">
                            <?php echo e(Auth::user()->shop->currency); ?> <?php echo e($product_subtotal); ?>

                        </div> <!-- price-wrap .// -->
                    </td>
                    <td class="align-items-center text-center">
                        <a href="javascript:removeFromCart(<?php echo e($key); ?>)" class="btn btn-sm btn-outline-danger"> <i class="tio-delete-outlined"></i></a>
                    </td>
                </tr>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
            </tbody>
        </table>
    </div>

    <?php
        $total = $subtotal;
        $discount_amount = $discount_on_product;
        $total -= $discount_amount;

        $extra_discount = $ext_discount;
        $extra_discount_type = $ext_discount_type;
        if($extra_discount_type == 'percent' && $extra_discount > 0){
            $extra_discount =  (($subtotal)*$extra_discount) / 100;
        }
        if($extra_discount) {
            $total -= $extra_discount;
        }

        $total_tax_amount= $total_tax;
    ?>
    <div class="box p-3">
        <dl class="row text-sm-right">

            <dt  class="col-sm-6"><?php echo e(\App\CPU\translate('sub_total')); ?> : </dt>
            <dd class="col-sm-6 text-right"> <?php echo e(Auth::user()->shop->currency); ?> <?php echo e($subtotal); ?></dd>


           
            <dt  class="col-sm-6"><?php echo e(\App\CPU\translate('discount')); ?> :</dt>
            <dd class="col-sm-6 text-right">
                <button id="extra_discount" class="btn btn-sm" type="button" data-toggle="modal" data-target="#add-discount">
                    <i class="tio-edit"></i></button>
                <?php echo e(Auth::user()->shop->currency); ?> <?php echo e(round($extra_discount,2)); ?>

            </dd>
            
            <!--- <dt  class="col-sm-6"><?php echo e(\App\CPU\translate('tax')); ?> : </dt>
           <dd class="col-sm-6 text-right"> <button id="tax" class="btn btn-sm" type="button" data-toggle="modal" data-target="#add-tax">
                    <i class="tio-edit"></i></button> <?php echo e(Auth::user()->shop->currency); ?> <?php echo e(round($total_tax_amount,2)); ?></dd> --->


        
            <dt  class="col-sm-6"><?php echo e(\App\CPU\translate('total')); ?> : </dt>
            <dd class="col-sm-6 text-right h4 b"><?php echo e(Auth::user()->shop->currency); ?> <?php echo e(round($total,2)); ?></dd>
        </dl>
        <div class="row">
            <div class="col-md-6 mb-2">
                <a href="#" class="btn btn-lg btn-block" style="background-color:#10163A; color:#fff;" onclick="emptyCart()"><i
                        class="fa fa-times-circle "></i> <?php echo e(\App\CPU\translate('Cancel')); ?> </a>
            </div>
            <div class="col-md-6">
                <button id="submit_order" type="button" class="btn btn-lg btn-block" style="background-color:#10163A; color:#fff;" data-toggle="modal" data-target="#paymentModal"><i class="fa fa-shopping-bag"></i>
                    <?php echo e(\App\CPU\translate('Order')); ?> </button>
            </div>
        </div>
    </div>

    <div class="modal fade" id="add-discount" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo e(\App\CPU\translate('update_discount')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for=""><?php echo e(\App\CPU\translate('discount')); ?></label>
                            <input type="number" id="dis_amount" class="form-control" name="discount">
                        </div>
                        
                        <div class="form-group col-sm-6">
                            <label for=""><?php echo e(app('request')->input('category_id')); ?> <?php echo e(\App\CPU\translate('type')); ?></label>
                            <select name="type" id="type_ext_dis" class="form-control">
                                <option value="amount" <?php echo e($discount_type=='amount'?'selected':''); ?>><?php echo e(\App\CPU\translate('amount')); ?>()</option>
                                <option value="percent" <?php echo e($discount_type=='percent'?'selected':''); ?>><?php echo e(\App\CPU\translate('percent')); ?>(%)</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-12">
                            <button class="btn btn-primary" onclick="extra_discount();" type="submit"><?php echo e(\App\CPU\translate('submit')); ?></button>
                        </div>
                    </div>
                        
                    
                </div>
            </div>
        </div>
    </div>

 

    <div c   <div class="modal fade" id="add-coupon-discount" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo e(\App\CPU\translate('coupon_discount')); ?></h5>
                    <button id="coupon_close" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
    
                        <div class="form-group col-sm-12">
                            <label for=""><?php echo e(\App\CPU\translate('coupon_code')); ?></label>
                            <input type="text" id="coupon_code" class="form-control" name="coupon_code">
                            
                        </div>
    
                        <div class="form-group col-sm-12">
                            <button class="btn btn-primary" type="submit" onclick="coupon_discount();"><?php echo e(\App\CPU\translate('submit')); ?></button>
                        </div>
    
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="add-tax" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo e(\App\CPU\translate('update_tax')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo e(route('sell.tax')); ?>" method="POST" class="row">
                        <?php echo csrf_field(); ?>
                        <div class="form-group col-12">
                            <label for=""><?php echo e(\App\CPU\translate('tax')); ?> (%)</label>
                            <input type="number" class="form-control" name="tax" min="0">
                        </div>

                        <div class="form-group col-sm-12">
                            <button class="btn btn-primary" type="submit"><?php echo e(\App\CPU\translate('submit')); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="paymentModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content pvl14">
                <div class="modal-header">
                    <h3 class="modal-title"><?php echo e(\App\CPU\translate('payment')); ?></h3>
                    <button id="payment_close" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo e(route('sell.order')); ?>" id='order_place' method="post" class="pvl15">
                        <?php echo csrf_field(); ?>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label" for=""><?php echo e(\App\CPU\translate('amount')); ?>(<?php echo e(Auth::user()->shop->currency); ?>)</label>
                            <div class="col-sm-9">
                            <input type="number" id="pvltotal" class="form-control" name="amount" min="0" step="0.01" 
                                    value="<?php echo e(\App\CPU\BackEndHelper::usd_to_currency($total+$total_tax_amount-$coupon_discount)); ?>"
                                    readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class=" col-sm-3 col-form-label" for=""><?php echo e(\App\CPU\translate('Paid')); ?>(<?php echo e(Auth::user()->shop->currency); ?>)</label>
                            <div class="col-sm-9">
                                <input id="pvlpaid" type="number" class="form-control" name="paid" min="0" step="0.01" max="<?php echo e(\App\CPU\BackEndHelper::usd_to_currency($total+$total_tax_amount-$coupon_discount)); ?>"
                                    value="<?php echo e(\App\CPU\BackEndHelper::usd_to_currency($total+$total_tax_amount-$coupon_discount)); ?>" onkeyup="evaluateTotal()"  onkeydown="evaluateTotal()">
                            </div>
                            
                        </div>
                         <div class="form-group row">
                            <label class=" col-sm-3 col-form-label" for=""><?php echo e(\App\CPU\translate('Due')); ?>(<?php echo e(Auth::user()->shop->currency); ?>)</label>
                            <div class="col-sm-9">
                            <input id="pvldue" type="number" class="form-control" name="due" min="0" step="0.01" max="<?php echo e(($total+$total_tax_amount-$coupon_discount)); ?>"
                                    value="0" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label" for=""><?php echo e(\App\CPU\translate('type')); ?></label>
                            <div class="col-sm-9">
                            <select name="type" class="form-control">
                                <?php $__currentLoopData = $gateway; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $method): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($method->id); ?>"><?php echo e($method->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php if(count($gateway) < 1): ?>
                                <b class="text-danger">You don't have payment geteway, please add minimum one! <a href="<?php echo e(route('payment.method')); ?>"> <u>Add now</u> </a></b>
                            <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group col-12">
                            <?php if(count($gateway) > 0): ?>
                            <button class="btn pvl13" id="order_complete" type="submit"><?php echo e(\App\CPU\translate('submit')); ?></button>
                            <?php else: ?>
                            <button class="btn pvl13" disabled="disabled" id="order_complete" type="button"><?php echo e(\App\CPU\translate('submit')); ?></button>
                            <?php endif; ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div
    <div class="modal fade" id="short-cut-keys" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo e(\App\CPU\translate('short_cut_keys')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <span><?php echo e(\App\CPU\translate('to_click_order')); ?> : alt + O</span><br>
                    <span><?php echo e(\App\CPU\translate('to_click_payment_submit')); ?> : alt + S</span><br>
                    <span><?php echo e(\App\CPU\translate('to_close_payment_submit')); ?> : alt + Z</span><br>
                    <span><?php echo e(\App\CPU\translate('to_click_cancel_cart_item_all')); ?> : alt + C</span><br>
                    <span><?php echo e(\App\CPU\translate('to_click_add_new_customer')); ?> : alt + A</span> <br>
                    <span><?php echo e(\App\CPU\translate('to_submit_add_new_customer_form')); ?> : alt + N</span><br>
                    <span><?php echo e(\App\CPU\translate('to_click_short_cut_keys')); ?> : alt + K</span><br>
                    <span><?php echo e(\App\CPU\translate('to_print_invoice')); ?> : alt + P</span> <br>
                    <span><?php echo e(\App\CPU\translate('to_cancel_invoice')); ?> : alt + B</span> <br>
                    <span><?php echo e(\App\CPU\translate('to_focus_search_input')); ?> : alt + Q</span> <br>
                    <span><?php echo e(\App\CPU\translate('to_click_extra_discount')); ?> : alt + E</span> <br>
                    <span><?php echo e(\App\CPU\translate('to_click_coupon_discount')); ?> : alt + D</span> <br>
                    <span><?php echo e(\App\CPU\translate('to_click_clear_cart')); ?> : alt + X</span> <br>
                    <span><?php echo e(\App\CPU\translate('to_click_new_order')); ?> : alt + R</span> <br>

                </div>
            </div>
        </div>
    </div>

   <?php /**PATH C:\xampp\htdocs\pharmacyapp\resources\views/sell/_cart.blade.php ENDPATH**/ ?>
<?php
$total_product_discount = 0;
$total_product_price = 0;
$total_vat = 0;
$total_igta = 0;


$subtotal = 0;
$addon_price = 0;
$tax = 0;
$discount = 0;

$discount_type = 'amount';
$discount_on_product = 0;
$total_tax = 0;
$ext_discount = 0;
$ext_discount_type = 'amount';
$coupon_discount = 0;
$product_subtotal = 0;
?>

<div class="cart-calculation">
    <div class="table-responsive">
        <table class="table table-bordered" id="cart-table">
            <thead>
            <tr>
                <th>Medicine</th>
                <th>Batch</th>
                <th>Expiry Date</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Discount%</th>
                <th>Total</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php if(session()->has('cart_store') && count( session()->get('cart_store')) > 0): ?>
                <?php $__currentLoopData = session()->get('cart_store'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                    <span class="title" title="<?php echo e($product['name']); ?> (<?php echo e($product['strength']); ?>)">
                        <?php echo e($product['name']); ?> (<?php echo e($product['strength']); ?>)
                    </span>
                        </td>
                        <td>
                            <select name="cart[batch]" required
                                    onchange="setBatch(this.value,'<?php echo e($product['id']); ?>','<?php echo e(route('pos.set-batch')); ?>');"
                                    id="batch" class="custom-input batch">
                                <option value="">Select Batch</option>
                                <?php if($product['batch']): ?>
                                    <?php $__currentLoopData = $product['batch']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $batch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option
                                                value="<?php echo e($batch['id']); ?>"
                                                <?php if($batch['id'] == $product['batch_id']): ?> selected <?php endif; ?>
                                        >
                                            <?php if($batch['name']): ?>  <?php echo e($batch['name']); ?> <?php else: ?> <?php echo e($batch['id']); ?> <?php endif; ?>
                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </select>
                        </td>
                        <td>
                            <?php if(!empty($product['expire'])): ?>
                                <span id="expire_date">
                                   <?php echo e($product['expire']); ?>

                               </span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <div class="quantity">
                                <a class="decreament"
                                   onclick="quantityUpdate('<?php echo e($product['id']); ?>','<?php echo e(route('pos.quantity-decrement')); ?>')"
                                   href="javascript:"><i class="tio-remove"></i></a>
                                <input type="number" value="<?php echo e($product['quantity']); ?>" name="cart[q"
                                       class="custom-input">
                                <a class="increament"
                                   onclick="quantityUpdate(<?php echo e($product['id']); ?>,'<?php echo e(route('pos.quantity-increment')); ?>')"
                                   href="javascript:"><i class="tio-add"></i></a>
                            </div>
                        </td>
                        <td>
                            <span class="price"><?php echo e($product['price']); ?> </span>
                        </td>
                        <td>
                            <input
                                    onkeyup="setProductDiscount(
                                            this.value,'<?php echo e($product['id']); ?>',
                                            '<?php echo e(route('pos.set-product-discount')); ?>')"
                                    type="number"
                                    value="<?php echo e($product['discount']); ?>"
                                    placeholder="00.0"
                                    class="custom-input discount"
                            >
                        </td>
                        <td>
                            <span class="total-price"><?php echo e(number_format(($product['price'] * $product['quantity']), 2)); ?></span>
                        </td>
                        <td>
                            <a href="javascript:"
                               onclick="REMOVE_FROM_CART('<?php echo e($product['id']); ?>','<?php echo e(route("pos.remove-from-cart")); ?>')"
                               class="text-danger">
                                <i class="tio-clear"></i>
                            </a>
                        </td>
                    </tr>
                    <?php
                        $total_product_discount += ((int)$product['price'] * (int)$product['discount'] / 100);
                        $total_product_price += (int)$product['price'] * (int)$product['quantity'];
                        $total_vat += (int)$product['vat'];
                        $total_igta += (int)$product['igta'];
                    ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
    <div class="form-group mb-1">
        <div class="row justify-content-end align-items-center">
            <label for="invoice_discount" class="col-5 col-sm-6 col-lg-6 col-xl-7 text-right font-weight-bold mb-0">
                Sub Total:
            </label>
            <div class="col-5 col-sm-5 col-lg-5 col-xl-3">
                <input type="text" class="form-control form-control-sm text-right" id="subtotal"
                       data-subtotal="<?php echo e($total_product_price); ?>"
                       name="subtotal" value="<?php echo e(number_format($total_product_price,2)); ?>" placeholder="0.00"
                       readonly="readonly" aria-invalid="false">
            </div>
        </div>
    </div>
    <div class="form-group mb-1">
        <div class="row justify-content-end align-items-center">
            <label for="invoice_discount" class="col-5 col-sm-6 col-lg-6 col-xl-7 text-right font-weight-bold mb-0">
                Invoice Discount %:
            </label>
            <div class="col-5 col-sm-5 col-lg-5 col-xl-3">
                <input type="text" class="form-control form-control-sm text-right" id="invoice_discount"
                       name="invoice_discount" placeholder="0.00" onkeyup="setInvoiceDiscount(this.value)"
                       onchange="setInvoiceDiscount(this.value)">
                <input type="hidden" id="total_product_dis" value="0">
            </div>
        </div>
    </div>
    <div class="form-group mb-1">
        <div class="row justify-content-end align-items-center">
            <label for="total_discount_ammount"
                   class="col-5 col-sm-6 col-lg-6 col-xl-7 text-right font-weight-bold mb-0">Total Discount:</label>
            <div class="col-5 col-sm-5 col-lg-5 col-xl-3">
                <input
                        data-totalamount="<?php echo e($total_product_discount); ?>"
                        type="text"
                        id="total_discount_ammount"
                        class="form-control form-control-sm gui-foot text-right valid_number"
                        name="total_discount"
                        value="<?php echo e($total_product_discount); ?>"
                        readonly=""
                >
            </div>
        </div>
    </div>
    <div class="form-group mb-1">
        <div class="row justify-content-end align-items-center">
            <label for="vat" class="col-5 col-sm-6 col-lg-6 col-xl-7 text-right font-weight-bold mb-0">
                Vat :
            </label>
            <div class="col-5 col-sm-5 col-lg-5 col-xl-3">
                <input id="vat" tabindex="-1"
                       class="form-control gui-foot text-right valid totalTax valid_number" name="total_tax0"
                       value="0.00" readonly="readonly" aria-invalid="false" type="text">
            </div>
        </div>
    </div>
    <div class="form-group mb-1">
        <div class="row justify-content-end align-items-center">
            <label for="tax_amount" class="col-5 col-sm-6 col-lg-6 col-xl-7 text-right font-weight-bold mb-0">
                GST/ Tax Amount% :
            </label>
            <div class="col-5 col-sm-5 col-lg-5 col-xl-3">
                <input id="tax_amount" tabindex="-1" onkeyup="calculateGrandTotal()"
                       onchange="calculateGrandTotal()"
                       class="form-control gui-foot text-right valid totalTax valid_number" name="gst_tax_amount"
                       value="0.00" type="number">
            </div>
        </div>
    </div>
    <div class="form-group mb-1">
        <div class="row justify-content-end align-items-center">
            <label for="igta_amount" class="col-5 col-sm-6 col-lg-6 col-xl-7 text-right font-weight-bold mb-0">
                IGTA :
            </label>
            <div class="col-5 col-sm-5 col-lg-5 col-xl-3">
                <input id="igta_amount" tabindex="-1"
                       class="form-control gui-foot text-right valid totalTax valid_number" name="total_tax1"
                       value="0.00" readonly="readonly" aria-invalid="false" type="text">
            </div>
        </div>
    </div>

    <?php
        $grand_total = ($total_product_price - $total_product_discount) + ($total_vat +$total_igta);
    ?>
    <div class="form-group mb-1">
        <div class="row justify-content-end align-items-center">
            <label for="grandTotal" class="col-5 col-sm-6 col-lg-6 col-xl-7 text-right font-weight-bold mb-0">Grand
                Total:</label>
            <div class="col-5 col-sm-5 col-lg-5 col-xl-3">
                <input type="text" id="grandTotal" data-grandtotal="<?php echo e($grand_total); ?>"
                       class="form-control form-control-sm text-right valid_number"
                       name="grand_total_price" value="<?php echo e(number_format($grand_total,2)); ?>" placeholder="0.00"
                       readonly="">
            </div>
        </div>
    </div>
    <div class="form-group mb-1">
        <div class="row justify-content-end align-items-center">
            <label for="recieved_amount" class="col-5 col-sm-6 col-lg-6 col-xl-7 text-right font-weight-bold mb-0">
                Recieved Amount:
            </label>
            <div class="col-5 col-sm-5 col-lg-5 col-xl-3">
                <input type="text" id="recieved_amount"
                       class="form-control form-control-sm gui-foot text-right valid_number"
                       name="recieved_amount" value="0.00" readonly="">
            </div>
        </div>
    </div>
    <div class="form-group mb-1">
        <div class="row justify-content-end align-items-center">
            <label for="change"
                   class="col-5 col-sm-6 col-lg-6 col-xl-7 text-right font-weight-bold mb-0">Change:</label>
            <div class="col-5 col-sm-5 col-lg-5 col-xl-3">
                <input type="text" id="change" class="form-control form-control-sm gui-foot text-right valid_number"
                       name="change" value="0.00" readonly="">
            </div>
        </div>
    </div>
    </form>

</div>

<?php /**PATH C:\xampp\htdocs\pharmacyapp\resources\views/pos/_cart.blade.php ENDPATH**/ ?>
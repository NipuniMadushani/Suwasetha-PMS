<?php if(session('stock') == 'emergency-stock'): ?>
    <div class="product-card card shadow-sm pvl26" onclick="emrgQuickView('<?php echo e($product->id); ?>')">
        <div class="card-header inline_product clickable p-3 pvl27">
            <div class="d-flex align-items-center justify-content-center d-block">
                <img src="<?php echo e(asset('storage/images/medicine/'.$product['image'] ?? ''.'')); ?>"
                     onerror="this.src='<?php echo e(asset('pos/img/160x160/imag.png')); ?>'"
                     class="pvl28">
            </div>
        </div>
        <div class="card-body inline_product text-center p-1 py-2 clickable">
            <h5 class="product-title1 text-dark font-weight-bold pvl30">
                <?php echo e(Str::limit($product['name'], 13)); ?> (<?php echo e(Str::limit($product['strength'], 13)); ?>)
            </h5>
        </div>
    </div>
<?php else: ?>
    <div class="product-card card shadow-sm pvl26" onclick="ADD_TO_CART('<?php echo e($product->id); ?>','<?php echo e(route('pos.add-to-cart')); ?>')">
        <div class="card-header inline_product clickable p-3 pvl27">
            <div class="d-flex align-items-center justify-content-center d-block">
                <img src="<?php echo e(asset('storage/images/medicine/'.$product['image'] ?? ''.'')); ?>"
                     onerror="this.src='<?php echo e(asset('pos/img/160x160/imag.png')); ?>'"
                     class="pvl28">
            </div>
        </div>
        <div class="card-body inline_product text-center p-1 py-2 clickable">
            <h5 class="product-title1 text-dark font-weight-bold pvl30">
                <?php echo e(Str::limit($product['name'], 13)); ?> (<?php echo e(Str::limit($product['strength'], 13)); ?>)
            </h5>
        </div>
    </div>
<?php endif; ?>

<?php /**PATH C:\xampp\htdocs\pharmacyapp\resources\views/pos/_single_product.blade.php ENDPATH**/ ?>
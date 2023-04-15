<div class="product-card card pvl26" onclick="quickView('<?php echo e($product->id); ?>')" >
    <div class="card-header inline_product clickable p-0 pvl27">
        <div class="d-flex align-items-center justify-content-center d-block">
            <img src="<?php echo e(asset('storage/images/medicine/'.$product['image'].'')); ?>" class="pvl28">
        </div>
    </div>

    <div class="card-body inline_product text-center p-1 clickable pvl29">
        <div class="product-title1 text-dark font-weight-bold pvl30">
            <?php echo e(Str::limit($product['name'], 13)); ?> (<?php echo e(Str::limit($product['strength'], 13)); ?>)
        </div>
       
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\pharmacyapp\resources\views/sell/_single_product.blade.php ENDPATH**/ ?>
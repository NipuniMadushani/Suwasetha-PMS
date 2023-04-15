<?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <div class="col-lg-3 col-6 col-xl-3 px-2 mb-3">
        <?php echo $__env->make('pos._single_product',['product'=>$product], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <div class="col-lg-12">
        <div class="empty">
            <h1><i class="tio-dropbox"></i></h1>
            <h2 class="text-center">No Product Available!</h2>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\pharmacyapp\resources\views/pos/products.blade.php ENDPATH**/ ?>
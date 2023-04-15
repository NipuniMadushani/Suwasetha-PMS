<?php $__env->startSection('title', translate('Returned Medicine')); ?>
<?php $__env->startSection('content'); ?>


   
                                
                                
    <section id="basic-horizontal-layouts">
        <section id="multiple-column-form">
        <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
              <h4 class="card-title"><?php echo e(translate('Returned Medicine')); ?></h4>
                </div>
                <div class="card-body">
                     <form class="form" method="POST" action="<?php echo e(route('purchase.returned', $inv->id)); ?>">
                  <?php echo csrf_field(); ?>
                <div class="row">
                  <div class="col-md-6 col-12">
                    <div class="mb-1">
                      <label class="form-label" for="first-name-column"><?php echo e(translate('Medicine Name')); ?></label>
                      
                      <select name="medicine" class="form-select" required>
                      <?php $__currentLoopData = $medicine; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $batch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($batch->medicine_id); ?>"><?php echo e($batch->medicine->name); ?> (<?php echo e($batch->qty); ?> PC) - <?php echo e($batch->buy_price*$batch->qty); ?> TK</option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                       </select>
                    </div>
                  </div>
                </div>
                
                    <div class="row">
                     <div class="col-md-6 col-12">
                    <div class="mb-1">
                      <label class="form-label" for="first-name-column"><?php echo e(translate('Quantity')); ?></label>
                     <input type="number" name="qty" class="form-control">
                    </div>
                    </div>
                  
                  <div class="col-12">
                    <button type="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light"><?php echo e(__('pages.submit')); ?></button>
                    <button type="reset" class="btn btn-outline-secondary waves-effect"><?php echo e(__('pages.reset')); ?></button>
                  </div>
                </div>
                  </form>
                </div>
                 </div>
            </div>
        </div>
       </section> 
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pharmacyapp\resources\views/purchase/returned.blade.php ENDPATH**/ ?>
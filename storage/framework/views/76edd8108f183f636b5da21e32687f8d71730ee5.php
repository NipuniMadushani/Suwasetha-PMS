
<?php $__env->startSection('title', __('pages.edit_vendor')); ?>
<?php $__env->startSection('content'); ?>
<section id="basic-horizontal-layouts">
    <section id="multiple-column-form">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title"><?php echo e(__('pages.edit_supplier')); ?></h4>
                </div>
                <div class="card-body">
                  <form class="form" method="POST" action="<?php echo e(route('vendor.update', $vendor->id)); ?>">
                      <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="row">
                      <div class="col-md-6 col-12">
                        <div class="mb-1">
                          <label class="form-label" for="first-name-column"><?php echo e(__('pages.name')); ?></label>
                          <input type="text" id="first-name-column" class="form-control" placeholder="<?php echo e(__('pages.name')); ?>" value="<?php echo e($vendor->name); ?>" name="name" required>
                        </div>
                      </div>
                      <div class="col-md-6 col-12">
                        <div class="mb-1">
                          <label class="form-label" for="last-name-column"><?php echo e(__('pages.address')); ?></label>
                          <input type="text" id="last-name-column" class="form-control" placeholder="<?php echo e(__('pages.address')); ?>" value="<?php echo e($vendor->address); ?>" name="address" required>
                        </div>
                      </div>
                      <div class="col-md-6 col-12">
                        <div class="mb-1">
                          <label class="form-label" for="city-column"><?php echo e(__('pages.phone')); ?></label>
                          <input type="text" id="city-column" class="form-control" placeholder="<?php echo e(__('pages.phone')); ?>" value="<?php echo e($vendor->phone); ?>" name="phone" required>
                        </div>
                      </div>
                      <div class="col-md-3 col-12">
                        <div class="mb-1">
                          <label class="form-label" for="country-floating"><?php echo e(translate('Payable')); ?></label>
                          <input type="number" step="0.01" id="country-floating" class="form-control" name="payable" placeholder="<?php echo e(__('pages.payable')); ?>" value="<?php echo e($vendor->payable); ?>">
                        </div>
                      </div>

                      <div class="col-md-3 col-12">
                        <div class="mb-1">
                          <label class="form-label" for="country-floating"><?php echo e(translate('Due')); ?></label>
                          <input type="number" step="0.01" id="country-floating" class="form-control" name="due" placeholder="<?php echo e(__('pages.due')); ?>" value="<?php echo e($vendor->due); ?>">
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pharmacyapp\resources\views/vendor/edit.blade.php ENDPATH**/ ?>
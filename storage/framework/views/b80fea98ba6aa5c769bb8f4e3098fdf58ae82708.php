<?php $__env->startSection('title', __('pages.unit_edit')); ?>
<?php $__env->startSection('content'); ?>
<section id="basic-horizontal-layouts">
  <section id="multiple-column-form">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title"><?php echo e(__('pages.unit_edit')); ?></h4>
          </div>
          <div class="card-body">
            <form class="form" method="POST" action="<?php echo e(route('unit.edit', $customer->id)); ?>">
                <?php echo csrf_field(); ?>
              <div class="row">
                <div class="col-md-6 col-12">
                  <div class="mb-1">
                    <label class="form-label" for="first-name-column"><?php echo e(__('pages.name')); ?></label>
                    <input type="text" id="first-name-column" class="form-control" placeholder="<?php echo e(__('pages.name')); ?>" value="<?php echo e($customer->name); ?>" name="name" required>
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pharmacyapp\resources\views/unit/edit.blade.php ENDPATH**/ ?>
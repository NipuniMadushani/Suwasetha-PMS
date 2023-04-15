<?php $__env->startSection('title', __('pages.change_pass')); ?>
<?php $__env->startSection('content'); ?>
<section id="basic-horizontal-layouts">
<section id="multiple-column-form">
  <div class="row">
    <div class="col-md-6 col-sm-6">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"><?php echo e(__('Change Basic Information')); ?></h4>
        </div>
        <div class="card-body">
          <form class="form" action="<?php echo e(url('/profile_info_setting')); ?>"  method="post"  enctype="multipart/form-data">
              <?php echo csrf_field(); ?>
            <div class="row">
              <div class="col-md-7 col-12 mr-100">
                <div class="mb-1">
                  <label class="form-label" for="last-name-column-1"><?php echo e(__('Email')); ?></label>
                  <input type="email" id="last-name-column-1" class="form-control" name="email" value="<?php echo e(Auth::user()->email); ?>" required>
                </div>
              </div>
              <div class="col-md-7 col-12 mr-100">
                <div class="mb-1">
                  <label class="form-label" for="city-column"><?php echo e(__('Name')); ?></label>
                  <input type="text" id="city-column" class="form-control" name="name" value="<?php echo e(Auth::user()->name); ?>"  required>
                </div>
              </div>
              <div class="col-md-7 col-12 mr-100">
                <div class="mb-1">
                  <label class="form-label" for="city-column"><?php echo e(__('Image')); ?></label>
                  <input type="file" id="city-column" class="form-control" name="image"  required>
                </div>
              </div>
              <div class="col-12">
                <button type="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light"><?php echo e(__('pages.submit')); ?></button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-sm-6">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"><?php echo e(__('pages.change_pass')); ?></h4>
        </div>
        <div class="card-body">
          <form class="form" action="<?php echo e(url('/profile_setting')); ?>"  method="post">
              <?php echo csrf_field(); ?>
            <div class="row">
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="last-name-column"><?php echo e(__('Current Password')); ?></label>
                  <input type="password" id="last-name-column" class="form-control" name="old" required>
                </div>
              </div>
              <div class="col-md-6 col-12 mr-100">
                <div class="mb-1">
                  <label class="form-label" for="last-name-column-1"><?php echo e(__('pages.new_pass')); ?></label>
                  <input type="password" id="last-name-column-1" class="form-control" name="new" required>
                </div>
              </div>
              <div class="col-md-6 col-12 mr-100">
                <div class="mb-1">
                  <label class="form-label" for="city-column"><?php echo e(__('pages.confirm_pass')); ?></label>
                  <input type="password" id="city-column" class="form-control" name="confirm" required>
                </div>
              </div>
              <div class="col-12">
                <button type="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light"><?php echo e(__('pages.submit')); ?></button>
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pharmacyapp\resources\views/info_reset.blade.php ENDPATH**/ ?>
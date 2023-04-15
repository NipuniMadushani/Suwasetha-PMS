<?php $__env->startSection('title', translate('Add Doctor')); ?>
<?php $__env->startSection('content'); ?>
    <section id="basic-horizontal-layouts">
        <section id="multiple-column-form">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title"><?php echo e(translate('Add Doctor')); ?></h4>
                </div>
                <div class="card-body">
                  <form class="form" method="POST">
                      <?php echo csrf_field(); ?>
                    <div class="row">
                      <div class="col-md-6 col-12">
                        <div class="mb-1">
                          <label class="form-label" for="first-name-column"><?php echo e(__('pages.name')); ?></label>
                          <input type="text" id="last-name-column" class="form-control" placeholder="<?php echo e(__('pages.name')); ?>" name="name" required>
                                                        </div>
                      </div>
                      <div class="col-md-6 col-12">
                        <div class="mb-1">
                          <label class="form-label" for="first-name-column"><?php echo e(translate('Title')); ?></label>
                          <input type="text" id="last-name-column" class="form-control" placeholder="<?php echo e(translate('Title')); ?>" name="title" required>
                                                        </div>
                      </div>
                      <div class="col-md-6 col-12">
                        <div class="mb-1">
                          <label class="form-label" for="last-name-column"><?php echo e(__('pages.address')); ?></label>
                          <input type="text" id="last-name-column" class="form-control" placeholder="<?php echo e(__('pages.address')); ?>" name="address" required>
                        </div>
                      </div>
                      <div class="col-md-6 col-12">
                        <div class="mb-1">
                          <label class="form-label" for="city-column"><?php echo e(__('pages.phone')); ?></label>
                          <input type="text" id="city-column" class="form-control" placeholder="<?php echo e(__('pages.phone')); ?>" name="phone" required>
                        </div>
                      </div>
                      <div class="col-md-6 col-12">
                        <div class="mb-1">
                          <label class="form-label" for="country-floating"><?php echo e(translate('Hospital')); ?></label>
                          <input type="text" id="country-floating" class="form-control" name="hospital" placeholder="<?php echo e(translate('Hospital')); ?>" >
                        </div>
                      </div>
                        <div class="col-md-6 col-12">
                        <div class="mb-1">
                          <label class="form-label" for="country-floating"><?php echo e(translate('Speciality')); ?></label>
                          <input type="text" id="country-floating" class="form-control" name="speciality" placeholder="<?php echo e(translate('Speciality')); ?>" >
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pharmacyapp\resources\views/doctor/add.blade.php ENDPATH**/ ?>
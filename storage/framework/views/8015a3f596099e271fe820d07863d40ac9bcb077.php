<?php $__env->startSection('title', __('pages.edit_settings')); ?>
<?php $__env->startSection('content'); ?>
  <section id="basic-horizontal-layouts">
    <section id="multiple-column-form">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title"><?php echo e(__('pages.edit_settings')); ?></h4>
            </div>
            <div class="card-body">
              <form class="form" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="row">
                  <div class="col-md-6 col-12">
                    <div class="mb-1">
                      <label class="form-label" for="first-name-column"><?php echo e(__('pages.site_name')); ?></label>
                      <input type="text" id="first-name-column" class="form-control" placeholder="<?php echo e(__('pages.name')); ?>" value="<?php echo e($shop->name); ?>" name="name" >
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="mb-1">
                      <label class="form-label" for="first-name-column">Site title</label>
                      <input type="text" id="first-name-column" class="form-control" placeholder="Site title" value="<?php echo e($shop->site_title); ?>" name="site_title">
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="mb-1">
                      <label class="form-label" for="email">Email</label>
                      <input type="email" id="email" class="form-control" placeholder="Enter your email" value="<?php echo e($shop->email); ?>" name="email">
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="mb-1">
                      <label class="form-label" for="phone">Phone</label>
                      <input type="text" id="phone" class="form-control" placeholder="Enter your phone" value="<?php echo e($shop->phone); ?>" name="phone">
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="mb-1">
                      <label class="form-label" for="first-name-column">Site Logo</label>
                      <input type="file" id="first-name-column" class="form-control" name="site_logo">
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="mb-1">
                      <label class="form-label" for="first-name-column">Site Favicon</label>
                      <input type="file" id="first-name-column" class="form-control" name="favicon">
                    </div>
                  </div>

                  <div class="col-md-6 col-12">
                    <div class="mb-1">
                      <label class="form-label" for="last-name-column"><?php echo e(__('pages.address')); ?></label>
                      <input type="text" id="last-name-column" class="form-control" placeholder="<?php echo e(__('pages.address')); ?>" value="<?php echo e($shop->address); ?>" name="address" >
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="mb-1">
                      <label class="form-label" for="city-column"><?php echo e(__('pages.currency')); ?></label>
                      <input type="text" id="city-column" class="form-control" placeholder="<?php echo e(__('pages.currency')); ?>" value="<?php echo e($shop->currency); ?>" name="currency" >
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="mb-1">
                      <label class="form-label" for="country-floating"><?php echo e(__('pages.prefix')); ?></label>
                      <input type="text"  id="country-floating" class="form-control" name="prefix" placeholder="<?php echo e(__('pages.prefix')); ?>" value="<?php echo e($shop->prefix); ?>">
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="mb-1">
                      <label class="form-label" for="country-floating"><?php echo e(__('pages.theme')); ?></label>
                      <select class="form-select" name="theme">

                        <option value="dark" <?php if($shop->theme == 'dark'): ?> selected <?php endif; ?>><?php echo e(__('pages.dark')); ?></option>
                        <option value="light" <?php if($shop->theme == 'light'): ?> selected <?php endif; ?> ><?php echo e(__('pages.light')); ?></option>
                      </select>
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


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pharmacyapp\resources\views/settings.blade.php ENDPATH**/ ?>
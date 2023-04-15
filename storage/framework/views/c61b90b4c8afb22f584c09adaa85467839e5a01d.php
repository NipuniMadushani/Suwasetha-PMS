
<?php $__env->startSection('title', __('pages.medicine_edit')); ?>
<?php $__env->startSection('custom-css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('dashboard/app-assets/vendors/css/forms/select/select2.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section id="basic-horizontal-layouts">
        <section id="multiple-column-form">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title"><?php echo e(__('pages.medicine_edit')); ?></h4>
                </div>
                <div class="card-body">
                  <form class="form" method="POST" enctype="multipart/form-data" action="<?php echo e(route('medicine.edit', $medicine->id)); ?>">
                      <?php echo csrf_field(); ?>
                    <div class="row">
                      <div class="col-md-4 col-12">
                        <div class="mb-1">
                          <label class="form-label" for="first-name-column"><?php echo e(__('pages.qr_code')); ?></label>
                          <input type="text" id="first-name-column" class="form-control" placeholder="<?php echo e(__('pages.qr_code')); ?>" value="<?php echo e($medicine->qr_code); ?>" name="qr_code">
                        </div>
                      </div>
                     <div class="col-md-4 col-12">
                        <div class="mb-1">
                          <label class="form-label" for="first-name-column"><?php echo e(__('pages.name')); ?> <font color="red">*</font></label>
                          <input type="text" id="first-name-column" class="form-control" placeholder="<?php echo e(__('pages.name')); ?>"  value="<?php echo e($medicine->name); ?>" name="name" required>
                        </div>
                     </div>
                      <div class="col-md-4 col-12">
                        <div class="mb-1">
                          <label class="form-label" for="first-name-column"><?php echo e(__('pages.strength')); ?></label>
                          <input type="text" id="first-name-column" class="form-control" placeholder="<?php echo e(__('pages.strength')); ?>" name="strength"  value="<?php echo e($medicine->strength); ?>">
                        </div>
                      </div>
                      <div class="col-md-4 col-12">
                        <div class="mb-1">
                          <label class="form-label" for="first-name-column"><?php echo e(__('pages.generic_name')); ?></label>
                          <input type="text" id="first-name-column" class="form-control" placeholder="<?php echo e(__('pages.generic_name')); ?>" name="generic_name"  name="strength"  value="<?php echo e($medicine->generic_name); ?>">
                        </div>
                      </div>
                      <div class="col-md-4 col-12">
                        <div class="mb-1">
                          <label class="form-label" for="first-name-column"><?php echo e(__('pages.box_size')); ?> <font color="red">*</font></label>
                          <select class="select2 form-select" id="select2-basic" data-select2-id="select2-basic" tabindex="-1" aria-hidden="true" name="leaf_id" required>
                            <option value=""><?php echo e(translate('Select Box Size')); ?></option>
                            <?php $__currentLoopData = $leaf; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leafs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($leafs->id); ?>" <?php if($medicine->leaf_id == $leafs->id): ?> selected <?php endif; ?> ><?php echo e($leafs->name); ?> (<?php echo e($leafs->amount); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </select>
                        </div>
                      </div>
                        <div class="col-md-4 col-12">
                         <div class="mb-1">
                          <label class="form-label" for="first-name-column"><?php echo e(__('pages.units')); ?> <font color="red">*</font></label>
                          <select class="select2 form-select" id="select2-basic" data-select2-id="select2-basic" tabindex="-1" aria-hidden="true" name="unit_id" required>
                            <option value=""><?php echo e(translate('Select Unit')); ?></option>
                            <?php $__currentLoopData = $unit; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leafs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($leafs->id); ?>"  <?php if($medicine->unit_id == $leafs->id): ?> selected <?php endif; ?>><?php echo e($leafs->name); ?> </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </select>
                         </div>
                        </div>
                      <div class="col-md-4 col-12">
                        <div class="mb-1">
                          <label class="form-label" for="first-name-column"><?php echo e(__('pages.shelf')); ?></label>
                          <input type="text" id="first-name-column" class="form-control" placeholder="<?php echo e(__('pages.shelf')); ?>" name="shelf" value="<?php echo e($medicine->shelf); ?>">
                        </div>
                      </div>
                      <div class="col-md-4 col-12">
                        <div class="mb-1">
                          <label class="form-label" for="first-name-column"><?php echo e(__('pages.desc')); ?></label>
                          <input type="text" id="first-name-column" class="form-control" placeholder="<?php echo e(__('pages.desc')); ?>" name="des" value="<?php echo e($medicine->des); ?>">
                        </div>
                      </div>
                       <div class="col-md-4 col-12">
                        <div class="mb-1">
                          <label class="form-label" for="first-name-column"><?php echo e(__('pages.category')); ?> <font color="red">*</font></label>
                          <select class="select2 form-select" id="select2-basic" data-select2-id="select2-basic" tabindex="-1" aria-hidden="true" name="category_id" required>
                            <option value=""><?php echo e(translate('Select Category')); ?></option>
                            <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leafs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($leafs->id); ?>"  <?php if($medicine->category_id == $leafs->id): ?> selected <?php endif; ?>><?php echo e($leafs->name); ?> </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-4 col-12">
                        <div class="mb-1">
                          <label class="form-label" for="first-name-column"><?php echo e(__('pages.types')); ?> <font color="red">*</font></label>
                          <select class="select2 form-select" id="select2-basic" data-select2-id="select2-basic" tabindex="-1" aria-hidden="true" name="type_id" required>
                            <option value="">Select Type</option>
                            <?php $__currentLoopData = $type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leafs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($leafs->id); ?>"  <?php if($medicine->type_id == $leafs->id): ?> selected <?php endif; ?>><?php echo e($leafs->name); ?> </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-4 col-12">
                        <div class="mb-1">
                          <label class="form-label" for="first-name-column"><?php echo e(__('pages.image')); ?></label>
                          <input class="form-control" type="file" name="image" id="formFile">
                        </div>
                      </div>
                       <div class="col-md-4 col-12">
                        <div class="mb-1">
                          <label class="form-label" for="first-name-column"><?php echo e(__('pages.price')); ?> <font color="red">*</font></label>
                          <input type="number" step="0.01" id="first-name-column" class="form-control" placeholder="<?php echo e(__('pages.price')); ?>" name="price" value="<?php echo e($medicine->price); ?>" required>
                        </div>
                      </div>
                      <div class="col-md-4 col-12">
                              <div class="mb-1">
                                  <label class="form-label" for="first-name-column">Vendor</label>

                                  <select class="select2 form-select" id="select2-basic" data-select2-id="select2-basic" tabindex="-1" aria-hidden="true" name="vendor_id">
                                      <option value="">Select Vendor</option>
                                      <?php $__currentLoopData = $vendors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vendor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <option value="<?php echo e($vendor->id); ?>" <?php if($medicine->vendor_id == $vendor->id): ?> selected <?php endif; ?>><?php echo e($vendor->name); ?> </option>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  </select>

                              </div>
                          </div>
                      <div class="col-md-4 col-12">
                        <div class="mb-1">
                          <label class="form-label" for="first-name-column"><?php echo e(__('pages.supplier')); ?> <font color="red">*</font></label>
                          <select class="select2 form-select" id="select2-basic" data-select2-id="select2-basic" tabindex="-1" aria-hidden="true" name="supplier_id" required>
                              <option value="">Select Supplier</option>
                              <?php $__currentLoopData = $supplier; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leafs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <option value="<?php echo e($leafs->id); ?>"  <?php if($medicine->supplier_id == $leafs->id): ?> selected <?php endif; ?>><?php echo e($leafs->name); ?> </option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-4 col-12">
                        <div class="mb-1">
                          <label class="form-label" for="first-name-column"><?php echo e(__('pages.buy_price')); ?> <font color="red">*</font></label>
                          <input type="number" step="0.01" id="first-name-column" class="form-control" placeholder="<?php echo e(__('pages.buy_price')); ?>" name="buy_price" value="<?php echo e($medicine->buy_price); ?>" required>
                        </div>
                      </div>
                       <div class="col-md-4 col-12">
                        <div class="mb-1">
                          <label class="form-label" for="first-name-column"><?php echo e(__('pages.vat')); ?> </label>
                          <div class="input-group form-password-toggle mb-2">
                            <input type="number" step="0.01" class="form-control" placeholder="<?php echo e(__('pages.vat')); ?>" name="vat" aria-describedby="basic-default-password" value="<?php echo e($medicine->vat); ?>">
                            <span class="input-group-text cursor-pointer">%</span>
                          </div>
                        </div>
                      </div>
                       <div class="col-md-4 col-12">
                        <div class="mb-1">
                          <label class="form-label" for="first-name-column"><?php echo e(__('pages.igta')); ?> </label>
                          <div class="input-group form-password-toggle mb-2">
                            <input type="number" step="0.01" class="form-control" placeholder="<?php echo e(__('pages.igta')); ?>" name="igta" aria-describedby="basic-default-password" value="<?php echo e($medicine->igta); ?>">
                            <span class="input-group-text cursor-pointer">%</span>
                          </div>
                        </div>
                      </div>
                       <div class="col-md-4 col-12">
                        <div class="mb-1">
                          <label class="form-label" for="first-name-column"><?php echo e(__('pages.status')); ?> </label>
                          <div class="demo-inline-spacing">
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="1"  <?php if($medicine->status == 1): ?> checked="" <?php endif; ?>>
                              <label class="form-check-label" for="inlineRadio1"><?php echo e(translate('Active')); ?></label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="0" <?php if($medicine->status == 0): ?> checked="" <?php endif; ?>>
                              <label class="form-check-label" for="inlineRadio2"><?php echo e(translate('Inactive')); ?></label>
                            </div>
                          </div>
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

<?php $__env->startSection('custom-js'); ?>
<script src="<?php echo e(asset('dashboard/app-assets/vendors/js/forms/select/select2.full.min.js')); ?>"></script>

<script src="<?php echo e(asset('dashboard/app-assets/js/scripts/forms/form-select2.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pharmacyapp\resources\views/medicine/edit.blade.php ENDPATH**/ ?>
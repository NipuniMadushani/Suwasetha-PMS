<?php $__env->startSection('title', translate('Returned Medicine')); ?>
<?php $__env->startSection('content'); ?>


    <?php
         $i = 0;
        $medicines = json_decode($inv->medicines, true);
        $count = count($medicines);
    ?>
                                
                                
    <section id="basic-horizontal-layouts">
        <section id="multiple-column-form">
        <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
              <h4 class="card-title"><?php echo e(translate('Returned Medicine')); ?></h4>
                </div>
                <div class="card-body">
                     <form class="form" method="POST" action="<?php echo e(route('returned', $inv->id)); ?>">
                  <?php echo csrf_field(); ?>
                <div class="row">
                  <div class="col-md-6 col-12">
                    <div class="mb-1">
                      <label class="form-label" for="first-name-column"><?php echo e(translate('Medicine Name')); ?></label>
                      
                      <select name="medicine" class="form-select">
                        <?php for($i = 0; $i < $count; $i++): ?>
                            <?php if(!empty($medicines[$i]['batch']) && isset($medicines[$i]['batch'])): ?>  
                                <?php
                                    $detail = \App\Models\Medicine::find($medicines[$i]['id']);
                                    $batch = \App\Models\Batch::find($medicines[$i]['batch']);
                                    $amount = ($batch->price*$medicines[$i]['quantity']);
                                ?>
                            <option value="<?php echo e($medicines[$i]['batch']); ?>_<?php echo e($medicines[$i]['quantity']); ?>_<?php echo e($amount); ?>"><?php echo e($detail->name); ?> (<?php echo e($medicines[$i]['quantity']); ?> PC) - <?php echo e($amount); ?> TK</option>
                            <?php endif; ?>
                        <?php endfor; ?>  
                      </select>
                      
                    </div>
                  </div>
                </div>
                
                    <div class="row">
                     <div class="col-md-6 col-12">
                    <div class="mb-1">
                      <label class="form-label" for="first-name-column"><?php echo e(translate('Quantity')); ?></label>
                     <input type="number" name="qty" class="form-control">
                     <?php $__errorArgs = ['qty'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                      <span class="text-danger">Quantity is required!</span>
                     <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pharmacyapp\resources\views/invoice/returned.blade.php ENDPATH**/ ?>
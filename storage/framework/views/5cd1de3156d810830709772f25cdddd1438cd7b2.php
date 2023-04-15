
<?php $__env->startSection('title', "Dashboard || Add New Admin"); ?>
<?php $__env->startSection('content'); ?>
<section class="index">
    <div class="card border-0">
    <div class="card-header bg-transparent">
        <div class="">
            <h3><?php echo e(translate('Add New Role')); ?></h3>
            <p><a href="<?php echo e(url('dashboard')); ?>">Dashboard</a> / Role Create</p>
        </div>
        <a class="btn btn-primary" href="<?php echo e(route('role.index')); ?>"><i class="fa fa-arrow-left"></i> Back to list</a>
    </div>
    <div class="card-body">
        <form action="<?php echo e(route('role.update',$role->id)); ?>" method="post" class="row">
            <?php echo csrf_field(); ?>
            <?php echo method_field('put'); ?>
            <input type="hidden" name="id" value="<?php echo e($role->id); ?>"/>
            <div class="form-group col-lg-4"> 
                <label class="req">Name</label>
                <input type="text" name="name" placeholder="Enter role name" value="<?php echo e($role->name); ?>" class="form-control" />
                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="text-danger">Name field is required!</span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="form-group col-lg-4"> 
                <label class="req">Status</label>
                <div class="d-block mt-1">
                    <label class="req me-2" for="active">
                        <input type="radio" name="status"  <?php if($role->status == 'active'): ?> checked <?php endif; ?> value="active" id="active" />
                        Active
                    </label>
                    <label class="req" for="inactive">
                        <input type="radio" name="status"  <?php if($role->status == 'inactive'): ?> checked <?php endif; ?> value="inactive" id="inactive" />
                        Inactive
                    </label>
                </div>
                <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="text-danger">Status field is required!</span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="row my-2">
                <?php $__currentLoopData = $modules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $module): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-3 p-1">
                    <label for="<?php echo e($key); ?>" class="text-capitalize">
                        <input type="checkbox" value="1"  <?php echo e(array_key_exists($key, $permissions) ? 'checked' : ''); ?> name="permissions[<?php echo e($key); ?>]" id="<?php echo e($key); ?>" />
                        <?php echo e(str_replace('_',' ',$key)); ?>

                    </label>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            
            <div class="col-lg-4">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pharmacyapp\resources\views/systems/role/edit.blade.php ENDPATH**/ ?>
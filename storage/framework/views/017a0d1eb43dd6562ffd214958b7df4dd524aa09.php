
<?php $__env->startSection('title', "Dashboard || Add New Admin"); ?>
<?php $__env->startSection('content'); ?>
<section class="index">
    <div class="card border-0">
    <div class="card-header bg-transparent">
        <div class="">
            <h3 class="card-title"><?php echo e(translate('Add New User')); ?></h3>
            <p><a href="<?php echo e(url('dashboard')); ?>">Dashboard</a> / User Create</p>
        </div>
        <a class="btn btn-primary" href="<?php echo e(route('admin.index')); ?>"><i class="fa fa-arrow-left"></i> Back to list</a>
    </div>
    <div class="card-body">
        <form action="<?php echo e(route('admin.update',$admin->id)); ?>" method="post" class="row">
            <?php echo csrf_field(); ?>
            <?php echo method_field('put'); ?>
            <input type="hidden" value="<?php echo e(\Auth::user()->shop_id); ?>" name="shop_id" />
            <div class="form-group col-lg-4"> 
                <label class="req">Role</label>
                <select class="form-select" name="role_id">
                    <option selected value="" >Select Role</option>
                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($role->id); ?>" <?php if($admin->role_id == $role->id): ?> selected <?php endif; ?>><?php echo e($role->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php $__errorArgs = ['role_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                  <span class="text-danger">Role is required!</span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="form-group col-lg-4"> 
                <label class="req">Name</label>
                <input type="text" name="name" value="<?php echo e($admin->name); ?>" class="form-control" placeholder="Enter your name" />
                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                  <span class="text-danger">Name is required!</span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="form-group col-lg-4"> 
                <label class="req">Email</label>
                <input type="text" name="email" value="<?php echo e($admin->email); ?>" class="form-control" placeholder="Enter your email" />
                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                  <span class="text-danger">Email is required!</span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <?php if(Auth::user()->role_id == 1): ?>
            <div class="form-group mt-1 col-lg-4"> 
                <label class="req">Update Paassword</label>
                <input type="password" name="password" class="form-control" />
                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                  <span class="text-danger">Password is required!</span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <?php endif; ?>
            <div class="form-group mt-2 col-lg-12"> 
               <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pharmacyapp\resources\views/systems/admin/edit.blade.php ENDPATH**/ ?>
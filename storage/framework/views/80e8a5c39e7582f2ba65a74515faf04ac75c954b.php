
<?php $__env->startSection('title', "Admin"); ?>
<?php $__env->startSection('content'); ?>
<section class="index">
    <div class="card border-0">
    <div class="card-header bg-transparent">
        <div class="">
            <h3 class="card-title"><?php echo e(translate('Admin')); ?></h3>
            <p><a href="<?php echo e(url('dashboard')); ?>">Dashboard</a> / Admin</p>
        </div>
        <a class="btn btn-primary" href="<?php echo e(route('admin.create')); ?>"><i class="fa fa-plus"></i> Add New</a>
    </div>
    <div class="card-body">
        <div class="card-datatable table-responsive pt-0">
            <table class="user-list-table table table-bordered border-dark">
                <thead class="table-light">
                    <tr>
                        <th>Sl</th>
                        <th>Name</th>
                        <th>Role</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $admins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($loop->iteration); ?></td>
                        <td><?php echo e($admin->name); ?></td>
                        <td><?php echo e(!empty($admin->role) ? $admin->role->name : 'N/L'); ?></td>
                        <td><?php echo e($admin->email); ?></td>
                        <td class="d-flex">
                            <a class="btn btn-sm btn-info me-1" href="<?php echo e(route('admin.edit',$admin->id )); ?>">
                                <i class="fa fa-edit"></i>
                            </a>
                            <form  onclick="return confirm(\'Are you sure?\')" action="<?php echo e(route('admin.destroy', $admin->id)); ?>" method="POST">
                                <?php echo method_field('delete'); ?>
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>         
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pharmacyapp\resources\views/systems/admin/index.blade.php ENDPATH**/ ?>
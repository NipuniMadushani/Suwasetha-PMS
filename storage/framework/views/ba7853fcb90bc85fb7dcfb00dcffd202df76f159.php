
<?php $__env->startSection('title', "Admin"); ?>
<?php $__env->startSection('content'); ?>
<section class="index">
    <div class="card border-0">
    <div class="card-header bg-transparent">
        <div class="">
            <h3><?php echo e(translate('Role List')); ?></h3>
            <p style="color: #000"><a href="<?php echo e(url('dashboard')); ?>" >Dashboard</a> / Role</p>
        </div>
        <a class="btn btn-primary" href="<?php echo e(route('role.create')); ?>"><i class="fa fa-plus"></i> Add New</a>
    </div>
    <div class="card-body">
        <div class="card-datatable table-responsive pt-0">
            <table class="user-list-table table table-bordered border-dark">
                <thead class="table-light">
                    <tr>
                        <th>Sl</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($loop->iteration); ?></td>
                        <td><?php echo e($role->name); ?></td>
                        <td><?php echo e($role->status); ?></td>
                        <td>
                            <a class="btn btn-sm btn-info" href="<?php echo e(route('role.edit',$role->id )); ?>">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete')" href="<?php echo e(route('role.delete',$role->id )); ?>">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>         
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pharmacyapp\resources\views/systems/role/index.blade.php ENDPATH**/ ?>
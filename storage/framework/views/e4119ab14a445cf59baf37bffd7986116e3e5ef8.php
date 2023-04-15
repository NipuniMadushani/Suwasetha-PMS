<?php $__env->startComponent('mail::message'); ?>

# Thank you for registering with Suwasetha 

Dear <?php echo e($SendData->name); ?>,

 We are excited to have you join our community.!
These are the your Profile Details

<?php $__env->startComponent('mail::table'); ?>
| User Name              | Email              | Password                 |
| ----------------- | ----------------------- | --------------------------- |
| <?php echo e($SendData['name']); ?> | <?php echo e($SendData['email']); ?> | <?php echo e($SendData['password']); ?> |
<?php echo $__env->renderComponent(); ?>

To login to systm please use above mentioned details, please click on the following link:
<?php $__env->startComponent('mail::button', ['url' => 'http://localhost/pharmacyapp/login']); ?>
Blog
<?php echo $__env->renderComponent(); ?>

Thanks,<br>
<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?>
<?php /**PATH C:\xampp\htdocs\pharmacyapp\resources\views/emails/subscribers.blade.php ENDPATH**/ ?>
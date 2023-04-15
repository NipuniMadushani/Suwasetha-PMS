<?php $__env->startSection('title', __('pages.supplier_list')); ?>
<?php $__env->startSection('custom-css'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('dashboard/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('dashboard/app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('dashboard/app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('dashboard/app-assets/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<section class="app-user-list">
    <div class="card">
    <div class="card-body border-bottom">
        <h4 class="card-title"><?php echo e(translate('Payable Manufactarures')); ?></h4>
        <div class="row">
            <div class="col-md-4 user_role"></div>
            <div class="col-md-4 user_plan"></div>
            <div class="col-md-4 user_status"></div>
        </div>
    </div>
    <div class="mx-2 card-datatable table-responsive pt-0">
            <table class="user-list-table table">
                <thead class="table-light">
                    <tr>
                        <th><?php echo e(__('pages.sn')); ?></th>
                        <th><?php echo e(__('pages.name')); ?></th>
                        <th><?php echo e(__('pages.phone')); ?></th>
                        <th><?php echo e(__('pages.medicine')); ?></th>
                        <th>payable</th>
                        <th><?php echo e(__('pages.address')); ?></th>
                        <th><?php echo e(__('pages.option')); ?></th>
                    </tr>
                </thead>
            </table>
        </div>          
    </div>
    <div class="modal modal-slide-in new-user-modal fade" id="modals-slide-in"></div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom-js'); ?>
 <!-- BEGIN: Page Vendor JS-->
    <script src="<?php echo e(asset('dashboard/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/app-assets/vendors/js/tables/datatable/jszip.min.js')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/app-assets/vendors/js/tables/datatable/pdfmake.min.js')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/app-assets/vendors/js/tables/datatable/vfs_fonts.js')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/app-assets/vendors/js/tables/datatable/buttons.html5.min.js')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/app-assets/vendors/js/tables/datatable/buttons.print.min.js')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/app-assets/vendors/js/tables/datatable/dataTables.rowGroup.min.js')); ?>"></script>
    <!-- END: Page Vendor JS-->
     <script>
        $(function () {
        var table = $('.user-list-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "<?php echo e(route('supplier.list')); ?>",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'phone', name: 'phone'},
                {data: 'medicine', name: 'medicine'},
                {data: 'due', name: 'payable'},
                {data: 'address', name: 'address'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
    
  });
     </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pharmacyapp\resources\views/supplier/list.blade.php ENDPATH**/ ?>
<?php $__env->startSection('title', __('Return History')); ?>
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
            <h4 class="card-title"><?php echo e(translate('Return History')); ?></h4>
                
        </div>
        <div class="mx-2 card-datatable table-responsive pt-0">
                    <table class="user-list-table table table-bordered border-dark">
                        <thead class="table-light">
                            <tr>
                                <th><?php echo e(__('pages.sn')); ?></th>
                                <th><?php echo e(__('pages.date')); ?></th>
                                <th><?php echo e(__('pages.amount')); ?></th>
                                <th><?php echo e(__('Invoice')); ?></th>
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
        <?php if( request()->get('from') && request()->get('to')): ?>
        ajax: {
          url: "<?php echo e(route('return.history')); ?>",
          data: function (d) {
                d.from = <?php echo e(request()->get('from')); ?>,
                d.to = <?php echo e(request()->get('to')); ?>

            }
        },
        <?php else: ?>
        ajax: "<?php echo e(route('return.history')); ?>",
    <?php endif; ?>
        columns: [
            {data: 'id', name: 'id'},
            {data: 'date', name: 'date'},
            {data: 'amount', name: 'amount'},
            {data: 'view', name: 'view'}
        ],
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    });
    
  });
     </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pharmacyapp\resources\views/invoice/returns.blade.php ENDPATH**/ ?>
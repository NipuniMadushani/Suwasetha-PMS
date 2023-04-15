<?php $__env->startSection('title', 'Purchase Invoice History'); ?>
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
             <h4 class="card-title">Purchase Invoice History</h4>
            </div>
            <div class="mx-2 card-datatable table-responsive pt-0">
                <table class="user-list-table table">
                    <thead class="table-light">
                        <tr>
                            <th><?php echo e(__('pages.sn')); ?></th>
                            <th><?php echo e(__('Purchase ID')); ?></th>
                            <th><?php echo e(__('pages.date')); ?></th>
                            <th><?php echo e(__('pages.supplier')); ?></th>
                            <th><?php echo e(__('pages.total')); ?></th>
                            <th><?php echo e(__('pages.due')); ?></th>
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
        <?php if( request()->get('from') && request()->get('to')): ?>
        ajax: {
          url: "<?php echo e(route('purchase.reports')); ?>",
          data: function (d) {
                d.from = <?php echo e(request()->get('from')); ?>,
                d.to = <?php echo e(request()->get('to')); ?>

            }
        },
        <?php else: ?>
        ajax: "<?php echo e(route('purchase.reports')); ?>",
    <?php endif; ?>
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
            {data: 'inv_id', name: 'inv_id'},
            {data: 'date', name: 'date'},
 {data: 'supplier', name: 'supplier'},
 {data: 'total_price', name: 'total_price'},
 {data: 'due_price', name: 'due_price'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pharmacyapp\resources\views/purchase/reports.blade.php ENDPATH**/ ?>
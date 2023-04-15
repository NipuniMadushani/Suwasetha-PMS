<?php $__env->startSection('title', __('pages.customer_list')); ?>
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
            <h4 class="card-title"><?php echo e(translate('Due Customers')); ?></h4>
            <div class="row">
                <div class="col-md-4 user_role"></div>
                <div class="col-md-4 user_plan"></div>
                <div class="col-md-4 user_status"></div>
            </div>
        </div>
         <?php 
                     $setting = Auth::user()->shop;
                    ?>
        <div class="row justify-content-center">
            <div class="col-lg-4 mx-3 my-2">
                <div class="bg-primary p-2 text-center" role="alert">
                  <h2 class="text-light">Total Previous Due <br> <span class=""><?php echo e($setting->currency ?? 'TK'); ?> <?php echo e($total_previous_due); ?></span></h2>
                </div>
            </div>
            <div class="col-lg-4 mx-3 my-2">
                <div class="bg-warning p-2 text-center" role="alert">
                  <h2 class="text-light">Total Inovice Due <br> <span class=""><?php echo e($setting->currency ?? 'TK'); ?> <?php echo e($total_invoice_due); ?></span></h2>
                </div>
            </div>
        </div>
        <div class=" mx-2 card-datatable table-responsive pt-0">
            <table class="customer_due_table table table-bordered border-dark">
                <thead class="table-light">
                    <tr>
                        <th><?php echo e(__('pages.sn')); ?></th>
                        <th><?php echo e(__('pages.name')); ?></th>
                        <th><?php echo e(__('pages.phone')); ?></th>
                        <th>Previous Dues</th>
                        <th>Invoice Dues</th>
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
    
    var table = $('.customer_due_table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "<?php echo e(route('report.customer_due')); ?>",
        columns: [
            { data: 'id', name: 'id' , orderable: false, searchable: false},
            {data: 'name', name: 'name'},
            {data: 'phone', name: 'phone'},
            {data: 'due', name: 'due'},
            {data: 'invoice_due', name: 'invoice_due'},
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pharmacyapp\resources\views/reports/customer_due.blade.php ENDPATH**/ ?>
<?php $__env->startSection('title', __('pages.stock_out')); ?>
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
            <h4 class="card-title"><?php echo e(translate('In Stock')); ?></h4>  
            
            <div class="row">
                 <?php 
                     $setting = Auth::user()->shop;
                    ?>
                      
                         <div class="col-md-12 user_role">
                            <div class="row">
                                <div class="col-lg-4 col-12">
                                    <div class="small-box bg-info mb-1">
                                        <div class="smalll-box d-flex justify-content-between">
                                            <div class="inner">
                                                <h4><?php echo e($setting->currency ?? 'TK'); ?> <?php echo e(number_format($stockes,2,".",",")); ?> </h4>
                                                <p>Total Stock</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-12">
                                    <div class="small-box bg-success mb-1">
                                        <div class="smalll-box d-flex justify-content-between">
                                            <div class="inner">
                                                <h4 id="totaldue"><?php echo e($setting->currency ?? 'TK'); ?> <?php echo e(number_format($expected,2,".",",")); ?></h4>
                                                <p>Total Expected Sales</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-12">
                                    <div class="small-box bg-warning mb-1">
                                        <div class="smalll-box d-flex justify-content-between">
                                            <div class="inner">
                                                <h4><?php echo e($setting->currency ?? 'TK'); ?> <?php echo e(number_format($profit,2,".",",")); ?></h4>
                                                <p>Expected Profit</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        </div>
        <div class="mx-2 card-datatable table-responsive pt-0">
            <table class="user-list-table table table-bordered border-dark">
                <thead class="table-light">
                    <tr>
                        <th><?php echo e(__('pages.sn')); ?></th>
                        <th><?php echo e(__('pages.name')); ?></th>
                        <th><?php echo e(__('pages.supplier')); ?></th>
                        <th><?php echo e(__('Quantity')); ?></th>
                        <th><?php echo e(__('Buy Price')); ?></th>
                        <th><?php echo e(__('MRP')); ?></th>
                        <th><?php echo e(__('COST')); ?></th>
                        <?php if(Auth::user()->shop_id == 79): ?>
                        <th>Update Price
                        <?php endif; ?></th>
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
        ajax: "<?php echo e(route('instock')); ?>",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
            {data: 'name', name: 'name'},
            {data: 'supplier', name: 'supplier'},
            {data: 'stock', name: 'stock'},
            {data: 'unit_price', name: 'unit_price'},
            {data: 'sell_price', name: 'sell_price'},
            {data: 'cost', name: 'cost'},
            <?php if(Auth::user()->shop_id == 79): ?>
            {data: 'action', name: 'action'},
            <?php endif; ?>
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pharmacyapp\resources\views/medicine/instock.blade.php ENDPATH**/ ?>
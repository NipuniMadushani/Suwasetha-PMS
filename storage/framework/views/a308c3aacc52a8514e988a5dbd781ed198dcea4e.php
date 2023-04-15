<?php $__env->startSection('title', __('pages.invoice')); ?>
<?php $__env->startSection('custom-css'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('dashboard/app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('dashboard/app-assets/css/plugins/forms/pickers/form-flat-pickr.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('dashboard/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('dashboard/app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('dashboard/app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('dashboard/app-assets/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css')); ?>">
    <style>
        body {
    color: #303030 ;
}
.tb-dotted {
    display: block;
    border-top: 1px dotted black;
    margin: 5px 0px;
}
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="app-user-view-account">
        <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
                <div class="card">
                    <div class="card-body">
                        <div class="user-avatar-section">
                            <div class="d-flex align-items-center flex-column">
                             <div class="dt-buttons"><a class="dt-button btn btn-primary btn-add-record ms-2" tabindex="0" aria-controls="DataTables_Table_0" href="<?php echo e(route('invoice.print', $invoice->id)); ?>"><span><?php echo e(translate('Print Invoice')); ?></span></a> </div>
               <?php if($invoice->type='ecommerce' && $invoice->due_price > 0): ?>
                                 <div class="dt-buttons"><a class="dt-button btn btn-success btn-add-record ms-2" tabindex="0" aria-controls="DataTables_Table_0" href="<?php echo e(route('invoice.approve', $invoice->id)); ?>"><span><?php echo e(translate('Accept Order')); ?></span></a> </div>
                                 <?php endif; ?>
                                <div class="user-info text-center">
                                    <h4><?php echo e($invoice->inv_id); ?> </h4>
                                    <span class="badge bg-light-secondary"><?php echo e(__('pages.invoice')); ?></span>
                                </div>
                             </div>
                            </div>
                        <div class="d-flex justify-content-around my-2 pt-75">
                            <div class="d-flex align-items-start me-2">
                                <span class="badge bg-light-primary p-75 rounded">
                                    <i class="fas fa-exchange"></i>
                                </span>
                                <div class="ms-75">
                                    <h4 class="mb-0"><?php echo e($invoice->total_price); ?> <?php echo e(Auth::user()->shop->currency); ?></h4>
                                    <small><?php echo e(__('pages.total')); ?></small>
                                </div>
                            </div>
                            <div class="d-flex align-items-start">
                                <span class="badge bg-light-danger p-75 rounded">
                                    <i class="fas fa-exclamation-triangle"></i>
                                </span>
                                <div class="ms-75">
                                    <h4 class="mb-0"><?php echo e($invoice->due_price); ?> <?php echo e(Auth::user()->shop->currency); ?></h4>
                                    <small><?php echo e(__('pages.total_due')); ?></small>
                                </div>
                                
                                <?php if($invoice->due_price>0): ?>
                                 <div class="dt-buttons">
                                         <a class="dt-button btn btn-primary btn-add-record ms-2" tabindex="0" aria-controls="DataTables_Table_0" href="<?php echo e(route('invoice.trx', $invoice->id)); ?>"><span><?php echo e(translate('Pay Due')); ?></span>
                                         </a> 
                                     </div>
                                <?php endif; ?>
                                
                            </div>
                        </div>
                        <h4 class="fw-bolder border-bottom pb-50 mb-1"><?php echo e(__('pages.details')); ?></h4>
                        <div class="info-container">
                            <ul class="list-unstyled">
                                <li class="mb-75">
                                    <span class="fw-bolder me-25"><?php echo e(__('pages.name')); ?>:</span>
                                    <span><?php if($invoice->customer): ?> <?php echo e($invoice->customer->name); ?> <?php endif; ?></span>
                                </li>
                                <li class="mb-75">
                                    <span class="fw-bolder me-25"><?php echo e(__('pages.phone')); ?>:</span>
                                    <span><?php if($invoice->customer): ?> <?php echo e($invoice->customer->phone); ?> <?php endif; ?></span>
                                </li>
                               
                               
                                <li class="mb-75">
                                    <span class="fw-bolder me-25"><?php echo e(__('pages.total_transaction')); ?>:</span>
                                    <span><?php echo e($invoice->invoice_pay->sum('amount')); ?></span>
                                </li>
                              
                                 <li class="mb-75">
                                    <span class="fw-bolder me-25"><?php echo e(__('pages.address')); ?>:</span>
                                    <span><?php if($invoice->customer): ?> <?php echo e($invoice->customer->address); ?> <?php endif; ?></span>
                                </li>
                            </ul>
                            
                        </div>
                    </div>
                </div>
                <!-- /User Card -->
            </div>
            <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">
                
                
                  <div class="card">
                   
<div class="table-responsive">
    <div id="invoice" class="row">
        <div class="col-xs-12 col-md-12">
            <div style="text-align: center;margin: 33px 0px;">Print Preview
                </a>
            </div>
            
            <section  style="width: 70%; margin: 10px auto;background-color: #fff; padding:5px" id="invoiceArea">

                <header style="text-align: center; padding-bottom: 0px">

                    <h2 style="font-size: 24px; font-weight: 700; margin: 0; padding: 0;"><?php echo e(Auth::user()->shop->name); ?></h2>
                    <div style="margin-bottom: 5px; line-height: 1;">
                        <span style="font-size: 15px ;line-height: 30px;"><?php echo e(Auth::user()->shop->address); ?></span>
                        <div style="display: block;">
                            <span style="font-size: 15px ;line-height: 30px;">Mobile: <?php echo e(Auth::user()->shop->phone); ?></span>, <span
                                    style="font-size: 15px ;line-height: 30px;">Email: <?php echo e(Auth::user()->shop->email); ?></span>
                        </div>
                    </div>
                </header>
                <span class="tb-dotted"></span>
                <section style="font-size: 15px ;line-height: 30px;  line-height: 1.222;">
                    <table style="width: 100%;">
                        <tr style=" ">
                            <td class="w-30" style="font-size: 15px ;line-height: 30px"><span style="font-size: 15px ;line-height: 30px"><b>Date:</b></td>
                            <td style="font-size: 15px ;line-height: 30px;text-align:right ;font-weight:500"><?php echo e(date('d M, Y', strtotime($invoice->date))); ?></td>
                        </tr>
                        <tr style=" ">
                            <td class="w-30" style="font-size: 15px ;line-height: 30px"><span style="font-size: 15px ;line-height: 30px"><b>Invoice ID:</b></td>
                            <td style="font-size: 15px ;line-height: 30px;text-align:right"><?php echo e($invoice->id); ?></td>
                        </tr>
                        <?php if($invoice->customer_id != 0): ?>
                            <tr style=" ">
                                <td class="w-30" style="font-size: 15px ;line-height: 30px"><b>Customer Name:</b></td>
                                <td style="font-size: 15px ;line-height: 30px;text-align:right"><?php echo e($invoice->customer->name); ?></td>
                            </tr>
                            <tr style=" ">
                                <td class="w-30" style="font-size: 15px ;line-height: 30px" ><b>Phone:</b></td>
                                <td style="font-size: 15px ;line-height: 30px;text-align:right"><?php echo e($invoice->customer->phone); ?></td>
                            </tr>
                            <tr style=" ">
                                <td class="w-30" style="font-size: 15px ;line-height: 30px"><b>Address:</b></td>
                                <td style="font-size: 15px ;line-height: 30px;text-align:right"><?php echo e($invoice->customer->address); ?></td>
                            </tr>
                        <?php else: ?>

                            <tr style=" ">
                                <td class="w-30" style="font-size: 15px ;line-height: 30px"><b>Customer Name:</b></td>
                                <td style="font-size: 15px ;line-height: 30px;text-align:right">Walking Customer</td>
                            </tr>

                        <?php endif; ?>
                    </table>
                </section>

                <h4 style="font-size: 18px;
    font-weight: 700;
    text-align: center;
    margin: 50px 0px 20px 0px;
    padding: 0px 0;">INVOICE</h4>
               <span class="tb-dotted"></span>
                <?php
                    $total = 0;
                    $paid = \App\Models\InvoicePay::where('invoice_id', $invoice->id)->sum('amount');
                    $medicine = json_decode($invoice['medicines'], true);
                    $count = count($medicine);
                ?>
                <section style="line-height: 1.23;">
                    <table style="width: 100%">
                        <thead>
                        <tr style="  font-weight: 700;">
                            <th class="w-10 text-center" style="font-size: 15px ;line-height: 30px; text-align: center">Sl.</th>
                            <th class="w-40" style="font-size: 15px ;line-height: 30px;">Name</th>
                            <th class="w-15 text-center" style="font-size: 15px ;line-height: 30px; text-align: center">Qty</th>
                            <th class="w-15 text-right" style="font-size: 15px ;line-height: 30px; text-align: center">Price</th>
                            <th class="w-20 text-right" style="border-bottom: none; font-size: 15px ;line-height: 30px; text-align: center">Total </td>
                        </tr>
                        </thead>
                        <tbody>
                            
                        <?php for($i = 0; $i < $count; $i++): ?>
                            <?php
                                if(isset($medicine[$i]['batch'])){
                                $batch = \App\Models\Batch::find($medicine[$i]['batch']);
                               $detail = \App\Models\Medicine::find($medicine[$i]['id']);
                               $amount = ($batch->price*$medicine[$i]['quantity']);
                               $total += $amount;
                            ?>
                            <tr style=" ">
                                <td class="text-center" style="vertical-align: top; font-size: 15px ;line-height: 30px; text-align: center"><?php echo e(($i+1)); ?></td>
                                <td style="vertical-align: top; font-size: 15px ;line-height: 30px"><?php echo e(Str::limit($detail->name, 150)); ?>

                                    <?php if(!empty($detail->strength)): ?>
                                    <small>[<?php echo e(Str::limit($detail->strength, 50)); ?>]</small>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center" style="vertical-align: top; font-size: 15px ;line-height: 30px; text-align: center"><?php echo e($medicine[$i]['quantity']); ?> </td>
                                <td class="text-right" style="vertical-align: top; font-size: 15px ;line-height: 30px; text-align: center"><?php echo e(number_format($batch->price, 2)); ?></td>
                                <td class="text-right" style="border-bottom: none;vertical-align: top;font-size: 15px ;line-height: 30px;text-align: center "><?php echo e($amount); ?></td>
                            </tr>
                            <?php
                                }
                            ?>
                        <?php endfor; ?>

                        </tbody>
                    </table>
                </section>

                <section style="line-height: 1.23; font-size: 15px ;line-height: 30px; border-top: 2px solid #000;">
                    <table style="width: 100%">
                        <tr style="  ">
                            <td style="text-align: right; font-size: 15px ;line-height: 30px; width: 70%">Sub Total:</td>
                            <td style="text-align: right; font-size: 15px ;line-height: 30px; width: 70%"><?php echo e(number_format($total,2)); ?></td>
                        </tr>
                        <tr style="  ">
                            <td style="text-align: right; font-size: 15px ;line-height: 30px; width: 70%">Discount:</td>
                            <td style="text-align: right; font-size: 15px ;line-height: 30px; width: 70%"><?php echo e(number_format($invoice->discount,2)); ?></td>
                        </tr>


                        <tr style="  ">
                            <td style="text-align: right; font-size: 15px ;line-height: 30px; width: 70%">Amount Paid:</td>
                            <td style="text-align: right; font-size: 15px ;line-height: 30px; width: 70%"><?php echo e(number_format($paid,2)); ?></td>
                        </tr>

                        <tr style="  ">
                            <td style="text-align: right; font-size: 15px ;line-height: 30px; width: 70%">Due:</td>
                            <td style="text-align: right; font-size: 15px ;line-height: 30px; width: 70%"><?php echo e(number_format($invoice->due_price,2)); ?></td>
                        </tr>
                        
                        <tr style="  ">
                            <td style="text-align: right; font-size: 15px ;line-height: 30px; width: 70%">Gross Total:</td>
                            <td style="text-align: right; font-size: 15px ;line-height: 30px; width: 70%"><?php echo e(number_format($invoice->total_price,2)); ?></td>
                        </tr>
                    </table>
                </section>
                <?php
                    $f = new NumberFormatter( locale_get_default(), \NumberFormatter::SPELLOUT );

                $word = $f->format(round($invoice->total_price,2));
                ?>
                <span class="tb-dotted"></span>
                <section style="line-height: 1.222; font-size: 15px ;line-height: 30px; font-style: italic; padding: 0px 0">
                    <span style="line-height: 1.222; font-size: 15px ;line-height: 30px; font-style: italic;"><b>In Text:</b> <?php echo e(strtoupper($word)); ?> <?php echo e(Auth::user()->shop->currency); ?> ONLY</span><br>
                </section>
             <span class="tb-dotted"></span>

                <section style="line-height: 1.222;">
                    <div style=" position: relative;">
                        <h2 style="font-size: 15px ;line-height: 30px;  font-weight: 700;  margin: 0px 0 0px 0;">Payments</h2>
                    </div>
                    <table style="width: 100%">
                        <tr>
                            <td style="font-size: 15px ;line-height: 30px;">-<?php echo e($invoice->method->name ?? ""); ?></td>
                            <td style="font-size: 15px ;line-height: 30px;text-align: right;"><?php echo e(number_format($invoice->total_price,2)); ?></td>
                        </tr>
                        <tr>
                            <td style="font-size: 15px ;line-height: 30px;">-RECEIVED PAYMENT</td>
                            <td style="font-size: 15px ;line-height: 30px;text-align: right;"><?php echo e(number_format($invoice->paid_amount,2)); ?></td>
                        </tr>
                        <tr>
                            <td style="font-size: 15px ;line-height: 30px;">-RETURNED AMOUNT</td>
                            <td style="font-size: 15px ;line-height: 30px;text-align: right;"><?php echo e(number_format($invoice->returned_amount,2)); ?></td>
                        </tr>
                    </table>
                </section>
          <span class="tb-dotted"></span>

                <section style="font-size: 15px ;line-height: 30px; line-height: 1.222; text-align: center; padding-top: 0px">
                    <span style="display: block; font-weight: 700;">Thank you for choosing us!</span>
                    <span style="display: block;">Software Developed By Ayaantech Limited. www.ayaantec.com</span>
                </section>

            </section>
        </div>
    </div>
</div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom-js'); ?>


 <!-- BEGIN: Page Vendor JS-->
 

   <script src="<?php echo e(asset('dashboard/app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js')); ?>"></script>
    
    <script src="<?php echo e(asset('dashboard/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/app-assets/vendors/js/tables/datatable/jszip.min.js')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/app-assets/vendors/js/tables/datatable/pdfmake.min.js')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/app-assets/vendors/js/tables/datatable/vfs_fonts.js')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/app-assets/vendors/js/tables/datatable/buttons.html5.min.js')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/app-assets/vendors/js/tables/datatable/buttons.print.min.js')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/app-assets/vendors/js/tables/datatable/dataTables.rowGroup.min.js')); ?>"></script>
   <script src="<?php echo e(asset('dashboard/app-assets/js/scripts/pages/app-invoice.min.js')); ?>"></script>
    <!-- END: Page Vendor JS-->
    <script>
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
        // location.reload();
    }
</script>
     <script>
         $(function () {
    
    var table = $('.datatable-project').DataTable({
        processing: true,
        serverSide: false,
       
    });
    
  });
     </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pharmacyapp\resources\views/invoice/view.blade.php ENDPATH**/ ?>
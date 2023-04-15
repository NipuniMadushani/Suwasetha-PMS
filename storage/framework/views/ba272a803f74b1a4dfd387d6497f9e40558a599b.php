<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" href="">
    <!-- Font -->
    <title>Print Invoice</title>
    <style>
        body {
            background-color: #444;
        }
    </style>
</head>

<body>


<div class="table-responsive">
    <div id="invoice" class="row">
        <div class="col-xs-12 col-md-12">
            <div style="text-align: center;margin: 33px 0px;">
                <a href="<?php echo e(url()->previous()); ?>" class="btn btn-success" style="
                    background-color: #e91e63;
                    padding: 10px 16px;
                    color: #fff;
                    border: 1px solid #e91e63;
                    cursor: pointer;
                    font-size: 17px;
                    border-radius: 2px;
                    text-decoration: none;
                    margin: 0 5px;  ">
                    Back to list
                </a>
                <button type="button" onclick="printDiv('invoiceArea')" class="btn btn-success" style="
                        background-color: #607d8b;
                        padding: 10px 16px;
                        color: #fff;
                        border: 1px solid #607d8b;
                        cursor: pointer;
                        font-size: 17px;
                        border-radius: 2px;">
                    Print
                </button>
            </div>

            <section style="width: 302px; margin: 10px auto;background-color: #fff; padding:5px" id="invoiceArea">

                <header style="text-align: center; padding-bottom: 0px">

                    <h2 style="font-size: 24px; font-weight: 700; margin: 0; padding: 0;"><?php echo e(Auth::user()->shop->name); ?></h2>
                    <div style="margin-bottom: 5px; line-height: 1;">
                        <span style="font-size: 12px;"><?php echo e(Auth::user()->shop->address); ?></span>
                        <div style="display: block;">
                            <span style="font-size: 12px;">Mobile: <?php echo e(Auth::user()->shop->phone); ?></span>, <span
                                    style="font-size: 12px;">Email: <?php echo e(Auth::user()->shop->email); ?></span>
                        </div>
                    </div>
                </header>
                --------------------------------------------------------
                <section style="font-size: 12px;  line-height: 1.222;">
                    <table style="width: 100%;">
                        <tr style="border-top: 1px solid #000; border-bottom: 1px solid #000;">
                            <td class="w-30" style="font-size:12px"><span style="font-size:12px"><b>Date:</b></td>
                            <td style="font-size:12px"><?php echo e(date('d M, Y', strtotime($invoice->date))); ?></td>
                        </tr>
                        <tr style="border-top: 1px solid #000; border-bottom: 1px solid #000;">
                            <td class="w-30" style="font-size:12px"><span style="font-size:12px"><b>Invoice ID:</b></td>
                            <td style="font-size:12px"><?php echo e($invoice->id); ?></td>
                        </tr>
                        <?php if($invoice->customer_id != 0): ?>
                            <tr style="border-top: 1px solid #000; border-bottom: 1px solid #000;">
                                <td class="w-30" style="font-size:12px"><b>Customer Name:</b></td>
                                <td style="font-size:12px"><?php echo e($invoice->customer->name); ?></td>
                            </tr>
                            <tr style="border-top: 1px solid #000; border-bottom: 1px solid #000;">
                                <td class="w-30" style="font-size:12px"><b>Phone:</b></td>
                                <td style="font-size:12px"><?php echo e($invoice->customer->phone); ?></td>
                            </tr>
                            <tr style="border-top: 1px solid #000; border-bottom: 1px solid #000;">
                                <td class="w-30" style="font-size:12px"><b>Address:</b></td>
                                <td style="font-size:12px"><?php echo e($invoice->customer->address); ?></td>
                            </tr>
                        <?php else: ?>

                            <tr style="border-top: 1px solid #000; border-bottom: 1px solid #000;">
                                <td class="w-30" style="font-size:12px"><b>Customer Name:</b></td>
                                <td style="font-size:12px">Walking Customer</td>
                            </tr>

                        <?php endif; ?>
                    </table>
                </section>

                <h4 style="font-size: 18px;
    font-weight: 700;
    text-align: center;
    margin: 5px 0 0px 0;
    padding: 0px 0;">INVOICE</h4>
                --------------------------------------------------------
                <?php
                    $total = 0;
                    $paid = \App\Models\InvoicePay::where('invoice_id', $invoice->id)->sum('amount');
                    $medicine = json_decode($invoice['medicines'], true);
                    $count = count($medicine);
                ?>
                <section style="line-height: 1.23;">
                    <table style="width: 100%">
                        <thead>
                        <tr style="border-top: 1px solid #000; border-bottom: 1px solid #000; font-weight: 700;">
                            <th class="w-10 text-center" style="font-size: 12px; text-align: center">Sl.</th>
                            <th class="w-40" style="font-size: 12px;">Name</th>
                            <th class="w-15 text-center" style="font-size: 12px; text-align: center">Qty</th>
                            <th class="w-15 text-right" style="font-size: 12px; text-align: center">Price</th>
                            <th class="w-20 text-right"
                                style="border-bottom: none; font-size: 12px; text-align: center">Total
                            </td>
                        </tr>
                        </thead>
                        <tbody>

                        <?php for($i = 0; $i < $count; $i++): ?>
                            <?php
                                if(isset($medicine[$i]['batch_id'])){
                                $batch = \App\Models\Batch::find($medicine[$i]['batch_id']);
                               $detail = \App\Models\Medicine::find($medicine[$i]['id']);
                               $amount = ($batch->price*$medicine[$i]['quantity']);
                               $total += $amount;
                            ?>
                            <tr style="border-top: 1px solid #000; border-bottom: 1px solid #000;">
                                <td class="text-center"
                                    style="vertical-align: top; font-size: 12px; text-align: center"><?php echo e(($i+1)); ?></td>
                                <td style="vertical-align: top; font-size: 12px"><?php echo e(Str::limit($detail->name, 150)); ?>

                                    <?php if(!empty($detail->strength)): ?>
                                        <small>[<?php echo e(Str::limit($detail->strength, 50)); ?>]</small>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center"
                                    style="vertical-align: top; font-size: 12px; text-align: center"><?php echo e($medicine[$i]['quantity']); ?> </td>
                                <td class="text-right"
                                    style="vertical-align: top; font-size: 12px; text-align: center"><?php echo e(number_format($batch->price, 2)); ?></td>
                                <td class="text-right"
                                    style="border-bottom: none;vertical-align: top;font-size: 12px;text-align: center "><?php echo e($amount); ?></td>
                            </tr>
                            <?php
                                }
                            ?>
                        <?php endfor; ?>

                        </tbody>
                    </table>
                </section>

                <section style="line-height: 1.23; font-size: 12px; border-top: 2px solid #000;">
                    <table style="width: 100%">
                        <tr style=" border-top: 1px solid #000; border-bottom: 1px solid #000;">
                            <td style="text-align: right; font-size: 12px; width: 70%">Sub Total:</td>
                            <td style="text-align: right; font-size: 12px; width: 70%"><?php echo e(number_format($total,2)); ?></td>
                        </tr>
                        <tr style=" border-top: 1px solid #000; border-bottom: 1px solid #000;">
                            <td style="text-align: right; font-size: 12px; width: 70%">Discount:</td>
                            <td style="text-align: right; font-size: 12px; width: 70%"><?php echo e(number_format($invoice->discount,2)); ?></td>
                        </tr>


                        <tr style=" border-top: 1px solid #000; border-bottom: 1px solid #000;">
                            <td style="text-align: right; font-size: 12px; width: 70%">Amount Paid:</td>
                            <td style="text-align: right; font-size: 12px; width: 70%"><?php echo e(number_format($paid,2)); ?></td>
                        </tr>

                        <tr style=" border-top: 1px solid #000; border-bottom: 1px solid #000;">
                            <td style="text-align: right; font-size: 12px; width: 70%">Due:</td>
                            <td style="text-align: right; font-size: 12px; width: 70%"><?php echo e(number_format($invoice->due_price,2)); ?></td>
                        </tr>

                        <tr style=" border-top: 1px solid #000; border-bottom: 1px solid #000;">
                            <td style="text-align: right; font-size: 12px; width: 70%">Gross Total:</td>
                            <td style="text-align: right; font-size: 12px; width: 70%"><?php echo e(number_format($invoice->total_price,2)); ?></td>
                        </tr>
                    </table>
                </section>
                <?php
                    $f = new NumberFormatter( locale_get_default(), \NumberFormatter::SPELLOUT );

                $word = $f->format(round($invoice->total_price,2));
                ?>
                --------------------------------------------------------
                <section style="line-height: 1.222; font-size: 12px; font-style: italic; padding: 0px 0">
                    <span style="line-height: 1.222; font-size: 12px; font-style: italic;"><b>In Text:</b> <?php echo e(strtoupper($word)); ?> <?php echo e(Auth::user()->shop->currency); ?> ONLY</span><br>
                </section>
                --------------------------------------------------------

                <section style="line-height: 1.222;">
                    <div style=" position: relative;">
                        <h2 style="font-size: 12px;  font-weight: 700;  margin: 0px 0 0px 0;">Payments</h2>
                    </div>
                    <table style="width: 100%">
                        <tr>
                            <td style="font-size: 12px;">-<?php echo e($invoice->method->name ?? ""); ?></td>
                            <td style="font-size: 12px;text-align: right;"><?php echo e(number_format($invoice->total_price,2)); ?></td>
                        </tr>
                        <tr>
                            <td style="font-size: 12px;">-RECEIVED PAYMENT</td>
                            <td style="font-size: 12px;text-align: right;"><?php echo e(number_format($invoice->paid_amount,2)); ?></td>
                        </tr>
                        <tr>
                            <td style="font-size: 12px;">-RETURNED AMOUNT</td>
                            <td style="font-size: 12px;text-align: right;"><?php echo e(number_format($invoice->returned_amount,2)); ?></td>
                        </tr>
                    </table>
                </section>
                --------------------------------------------------------

                <section style="font-size: 12px; line-height: 1.222; text-align: center; padding-top: 0px">
                    <span style="display: block; font-weight: 700;">Thank you for choosing us!</span>
                    <span style="display: block;">Software Developed By Nipuni Chamika.nipunimadushani52@gmail.com</span>
                </section>

            </section>
        </div>
    </div>
</div>
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

<body>
</html><?php /**PATH C:\xampp\htdocs\pharmacyapp\resources\views/invoice/print.blade.php ENDPATH**/ ?>
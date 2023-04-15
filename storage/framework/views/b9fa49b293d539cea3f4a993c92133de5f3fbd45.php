

<link href="https://doctor.vinnorokom.com/public/admin/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.5.0/css/all.min.css" integrity="sha512-QfDd74mlg8afgSqm3Vq2Q65e9b3xMhJB4GZ9OcHDVy1hZ6pqBJPWWnMsKDXM7NINoKqJANNGBuVRIpIJ5dogfA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
    .table td{
        padding:3px!important;
    }
    .prescription_icon_color{
        color: #00ABBE !important;
    }
    .prescription_icon_big{
        position: absolute;
        bottom: 2%;
        right: 4%;
        font-size: 25px;
        color: #E3F5F5!important;
    }
   
</style>
<div id="print" style="font-size: 11px; position: relative">
    <div class="row">
        <div class="col-xs-6">
            <h2 style="color: #00ABBE!important; margin-bottom: 0 !imporatnt"><?php echo e(Auth::user()->shop->name); ?></h2>
            <!--<h5><?php echo e(Auth::user()->shop->phone); ?></h5>-->
            
        </div>
        <div class="col-xs-6 text-right">
            <h2 style="color: #00ABBE!important"><?php if($pres->doctor): ?> <?php echo e($pres->doctor->name); ?> <?php endif; ?></h2>
            <!--<h1><small> #<?php echo e($pres->id); ?></small></h1>-->
            <p><?php if($pres->doctor): ?> <?php echo e($pres->doctor->title); ?> <?php endif; ?>,<span style="padding-left: 5px"><?php if($pres->doctor): ?> <?php echo e($pres->doctor->hospital); ?> <?php endif; ?></span> </p>
            
        </div>
    </div>
    
    <div class="row" style="padding: 5px 0">
        <div class="col-xs-6">
            <div>
                <p style="border-bottom: 1px dotted #979191">Name:<?php if($pres->customer): ?> <?php echo e($pres->customer->name); ?> <?php else: ?> Customer <?php endif; ?></p>
            </div>
            <!--<div class="panel panel-default">-->
            <!--    <div class="panel-heading">-->
            <!--        <b> Patient : <?php if($pres->customer): ?> <?php echo e($pres->customer->name); ?> <?php else: ?> Customer <?php endif; ?> </b>-->
            <!--    </div>-->
            <!--    <div class="panel-body">-->
            <!--        <p>-->
            <!--            <b>Phone</b>: <?php if($pres->customer): ?>  <?php echo e($pres->customer->phone); ?> <?php endif; ?> <br>-->
            <!--            <b>Age</b>:  <?php if($pres->customer): ?>  <?php echo e($pres->customer->age); ?> <?php endif; ?> <br>-->
            <!--            <b>Date of Visit : </b>:  <?php echo e(date('d F, Y h:i:s', strtotime($pres->created_at))); ?>  <br>-->
            <!--            <br>-->
            <!--        </p>-->
            <!--    </div>-->
            <!--</div>-->
        </div>
        <div class="col-xs-6 text-right">
            <div style="display:flex; gap: 12px; float:right !important">
                <p style="border-bottom: 1px dotted #979191">Age: <?php if($pres->customer): ?>  <?php echo e($pres->customer->age); ?> <?php endif; ?></p>
                <p style="border-bottom: 1px dotted #979191">Gender: <?php if($pres->customer): ?>  <?php echo e($pres->customer->gender); ?> <?php endif; ?> </p>
                <p style="border-bottom: 1px dotted #979191">Date: <?php echo e(date('d F, Y', strtotime($pres->created_at))); ?> </p>
            </div>
            <!--<div class="panel panel-default">-->
            <!--    <div class="panel-heading">-->
            <!--        <b> Info : </b>-->
            <!--    </div>-->
            <!--    <div class="panel-body">-->
            <!--        <p>-->
            <!--            <b>Referred To</b> : <?php if($pres->doctor): ?> <?php echo e($pres->doctor->name); ?> <?php endif; ?><br>-->
            <!--            <?php if($pres->doctor): ?> <?php echo e($pres->doctor->title); ?> <?php endif; ?>,-->
            <!--            <small></small>-->
            <!--            <br>-->
            <!--            <b>Prescribed Date</b> : <?php echo e(date('d F, Y h:i', strtotime($pres->created_at))); ?> <br>  -->
            <!--        </p>-->
            <!--    </div>-->
            <!--</div>-->
        </div>
    </div>
    <div class="prescription_icon" style="color: #00ABBE!important; width: 100%">
        <img src="<?php echo e(asset('prescription/icons8-pharmacy-60.png')); ?>" />
        <span style="float: right; font-size: 22px; font-weight: bold;color: #00ABBE!important; verticle-align: meddle">Visiting Fee: <?php echo e($pres->visiting_fee ?? ""); ?></span>
    </div>
    <div style="padding: 5px 0">
        <h3>Prescription </h3> 
    <div style="border: 1px solid #ddd; padding: 0 7px">
        <h3>Drugs </h3> 
        <table class="table table-striped table-bordered input-sm">
            <thead>
                <tr>
                    <th class="text-center">SI</th>
                    <th class="text-center">Drugs Name</th>
                    <th class="text-center">Schedule</th>
                    <th class="text-center">Days</th>
                </tr>
            </thead>
            <tbody>
                
                <?php
                    $medicine = json_decode($pres->medicines, true);
                ?>
                 <?php if(!empty($medicine) && is_array($medicine)): ?>
                    <?php $__currentLoopData = $medicine; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="text-center"> <?php echo e(($key+1)); ?> </td>
                        <td class="text-center"> <?php echo e($item['0']); ?>  </td>
                        <td class="text-center">  <?php echo e($item['1']); ?>  </td>
                        <td class="text-center"> <?php echo e($item['2']); ?> </td>
                    </tr>
                    
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </tbody>
        </table>
        <!-- / end client details section -->
        <div class="row">
            <div class="col-xs-6">
                <h3> Diagnosis </h3> 
                <table class="table table-striped table-bordered input-sm">
                    <thead>
                        <tr>
                            <th>SI </th>
                            <th>Diagnosis Description</th>
            
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php
                            $test = json_decode($pres->tests, true);
                        ?>
                        <?php if(!empty($test) && is_array($test)): ?>
                        <?php $__currentLoopData = $test; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e(($key+1)); ?></td>
                            <td><?php echo e($item); ?> </td>
            
                        </tr> 
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                        </tbody>
                </table>
            </div>
            <div class="col-xs-6">
                <h3> Patients Problems Finding </h3> 
                <div>
                    <textarea rows="5" class="form-control" readonly><?php echo $pres->des; ?></textarea>
                </div>
            </div>
        </div>
         
    </div>
    </div>
    <div class="row">
         <div class="col-xs-12">
                <h3>Dostor's Advice</h3> 
                <div>
                    <textarea rows="3" class="form-control" readonly><?php echo $pres->advice; ?></textarea>
                </div>
            </div>
    </div>
    

        <div class="row"> &nbsp; </div>
    <div class="row">
        <div class="col-md-12">
            <b>Prescribed By (Signature)</b>: 
        </div>    
    </div> 

    <!--<div class="row">-->
    <!--    <div class="col-md-12">-->
    <!--        <a onclick="window.open('print-prescription?prescription_id=121&print=1', '_blank');" class="btn btn-sm btn-info hidden-print pull-right"><i class="fa fa-print"></i> Print </a>-->
    <!--    </div>    -->
    <!--</div> -->
</div>
 <div class="prescription_icon_big">
     <img src="<?php echo e(asset('prescription/icons8-pharmacy-100.png')); ?>" style="width: 250px" />
    </div>
<div style="width: 100%;position:absolute; bottom: 0; left: 50%; transform: translateX(-50%); text-align:center: font-size: 16px; border-bottom: 12px solid #00AABC">
    <p style="text-align:center; margin-bottom: 0!important">House:24, Road:14, Niketon Gulshan-1, Dhaka Bangladesh 1219.</p>
    <div style="display:flex; gap:5px; justify-content:center">
        <p style="margin-bottom: 0 !important">Phone: +88 01973198574. </p>
        <p>email: connect@ayaantec.com</p>
    </div>
</div>

<script>
    window.onload = function() {
        window.print();
        setTimeout(function() {
            window.close();
        }, 1);
    }
</script><?php /**PATH C:\xampp\htdocs\pharmacyapp\resources\views/prescrive/data.blade.php ENDPATH**/ ?>
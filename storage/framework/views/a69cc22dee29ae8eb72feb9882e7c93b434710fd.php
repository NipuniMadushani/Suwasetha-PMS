<?php $__env->startSection('title', __('Prescription Add')); ?>

<?php $__env->startSection('custom-css'); ?>
<style>
    .chosen-container {
        width:100% !important;
    }
    .chosen-container [selected="selected"]{
        width:100% !important;
    }
</style>
<script src="https://doctor.vinnorokom.com/public/admin/js/jquery.js"></script>
<link href="https://doctor.vinnorokom.com/public/plugin/choosen-js/chosen.css"  rel="stylesheet" type="text/css"> 
 
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script src="https://doctor.vinnorokom.com/public/js/jspdf.min.js"></script>

        <!-- Bootstrap type head --->
        <script src="https://doctor.vinnorokom.com/public/plugin/Bootstrap-3-Typeahead-master/bootstrap3-typeahead.min.js"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<section id="basic-horizontal-layouts">
        <section id="multiple-column-form">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title"><?php echo e(__('Prescription Add')); ?></h4>
                </div>
                <div class="card-body">
<form id="add_new_prescription" action="<?php echo e(route('prescrive.pop')); ?>" method="POST" action="">
    <?php echo csrf_field(); ?>
    <div class="row">
        <div class="col-md-6">
            <div class="well">
                <h4> Patient Info : </h4>
                <div class="row">
                    <div class="col-md-6"> 
                        <label class="" for="name"> Patient Type </label> <br>
                        <div class="form-group">   

                            <label class="radio-inline">
                                <input type="radio" name="patient_type" id="optionsRadiosInline1" value="new" checked=""> New
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="patient_type" id="optionsRadiosInline2" value="old"> Old
                            </label>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="pull-left control-label" for="name"> Mobile #</label>
                            <input maxlength="13" name="phone" type="text" placeholder="Mobile Number" class="form-control input-sm" required>

                        </div>
                    </div>
                </div>

                <div class="row find-patient-button" style="display: none">
                    <div class="col-md-8"> 
                        <input name="email" type="text" placeholder="Phone or Email" class="form-control input-sm">

                    </div>
                    <div class="col-md-4">
                        <button type="button" id="load_data" onclick="loadData($(this))" class="btn btn-info btn-sm btn-block"> Load Data </button>
                    </div>
                </div>
                <div class="clearfix"> </div>
                <div class="form-group">
                    <label class="pull-left control-label" for="name">Name *</label>
                    <div class="">
                        <input autocomplete="off" style="color:red;font-weight:bold" name="name" type="text" placeholder="Patient Name" class="text-capitalize form-control input-sm" required>
                    </div>

                     

                    <script>
                        $item = $('input[name=name]');
                        $item.typeahead({source: [{"id":18,"name":"little"},{"id":17,"name":"test"},{"id":15,"name":"rfrfr"},{"id":14,"name":"ggg"},{"id":13,"name":"htr"},{"id":11,"name":"Alan Ts"}],
                            autoSelect: true,
                        });

                        $item.change(function() {
                            var current = $item.typeahead("getActive");
                            if (current) {
                                // Some item from your model is active!
                                if (current.name == $item.val()) {
                                    //alert(current.name) ; 
                                    loadAppointmentData(current.id)
                                    // alert(current.id) ;
                                    // This means the exact match is found. Use toLowerCase() if you want case insensitive match.
                                } else {
                                    // This means it is only a partial match, you can either add a new item 
                                    // or take the active if you don't want new items
                                }
                            } else {
                                // Nothing is active so it is a new value (or maybe empty value)
                            }
                        });
                    </script>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="pull-left control-label" for="name">Gender *</label>
                            <select id="gender" name="gender" class="form-control input-sm" required>
                                <option value=""> Select Gender </option>
                                <option value="male">male</option>
                                <option value="female">female</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="pull-left control-label" for="name">Age *</label>
                            <input onkeypress="return isNumber(event)" name="age" type="text" placeholder="Patient Age" class="form-control input-sm" required>

                        </div>
                    </div>
                </div> 
               
            </div>
            <hr class="mt-3 mb-2">
            <div class="well mt-2">
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <h4 class="mb-1">Diagnosis Test</h4>
                        <div style="display: flex; gap: 3px">
                            <input type="text" class="form-control" placeholder="Enter Test Name" readonly />
                            <button type="button" class="btn border" onclick="addDiagnosisField()">+</button>
                        </div>
                        <div id="diagnosis">
                            
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <h4 class="mb-1">Drug / Medicine</h4>
                        <div style="display: flex; gap: 3px">
                            <input type="text" class="form-control" placeholder="Medicine Name" readonly/>
                            <button type="button" class="btn border" onclick="addDiagnosisDrug()">+</button>
                        </div>
                        <div id="drug" class="drug">

                        </div>
                    </div>
                </div>
                <!--<button onclick="addDiagnosisField()" type="button" class="btn btn-info btn-sm"><i class="fa fa-stethoscope" aria-hidden="true"></i> Diagnosis Test </button>-->
                <!--<button onclick="addDiagnosisDrug()" type="button" class="btn btn-info btn-sm pull-right"><i class="fa fa-medkit" aria-hidden="true"></i> Drug / Medicine </button>-->
            </div>

            


        </div>
        <div class="col-md-6">
                        <div class="well">
                <h4> Prescription Info  : </h4>
                <table class="table table-bordered input-sm"> 
                    <tr>
                        <th> ID #  </th>
                        <td> <?php echo e($inv_id); ?> <input name="prescription_number" type="hidden" value="<?php echo e($inv_id); ?>"></td>
                    </tr>
                    <tr>
                        <th> Date  </th>
                        <td> <?php echo e(date('d F, Y')); ?> </td>
                    </tr>
                    <tr>
                        <th> Visit No  </th>
                        <td> <?php echo e(($visit_no+1)); ?> <input name="visit_no" type="hidden" value=" <?php echo e(($visit_no+1)); ?>"> </td>
                    </tr>
                    <tr>
                        <th> Prescribed By  </th>
                        <td> Doctor </td>
                    </tr>
                    
                    <tr>
                        <th> Referred To  </th>
                        <td> 
                            <div class="row">
                                <div class="col-md-10">
                                    <select style="width:86%" name="referred_to" class="form-control input-sm chosen-select">
                                        <option value=""> Select doctor </option>
                                        <?php $__currentLoopData = $doctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                                  <option value="<?php echo e($doctor->id); ?>"> <?php echo e($doctor->name); ?> </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                            </select> 
                                </div>
                                <div class="col-md-2 "></div>
                                <button onclick="" type="button" class="btn btn-success btn-xs mt-2 d-block w-50"> <i class="fa fa-plus-circle"></i></button>
                            </div>
                        </td>
                    </tr>
                </table>
                <br>
                <div class="well">
                    <div class="form-group">
                        <label class="pull-left control-label" for="name"> Visiting Fee (BDT.): </label>
                        <div class="">
                            <input onkeypress="return isNumber(event)" name="visiting_fee" type="text" placeholder="Fees" class="text-capitalize form-control input-sm">
                        </div>
                    </div>
                </div>
                <label> Patients Problems / Symptoms  description :  </label>
                <textarea rows="4" name="des" class="form-control input-sm"></textarea>
                <br>
                 <br>
                <label> Advice :  </label>
                <textarea rows="4" name="advice" class="form-control input-sm"></textarea>
                <br>
                <div id="diagnosis">

                </div>
            </div>
        </div>
        <div class="clearfix"></div>


    </div>
    <div class="well">
        <div class="col-md-12">
            <button class="btn btn-md btn-success pull-right"> Submit </button>
        </div>
        <div class="clearfix"></div>
    </div>
    <input name="appointment_id" type="hidden" value="">
</form>

</form>
                </div>
              </div>
            </div>
          </div>
        </section>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
       
<script>
// Patient Type 
    $('input[name="patient_type"]').click(function() {
        $patient_type = $(this).val();

        if ($patient_type == 'old')
        {
            $('.find-patient-button').show('slow');
        } else {
            $('.find-patient-button').hide('slow');
        }
        //find-patient-button
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        var config = {
            '.chosen-select': {},
            '.chosen-select-deselect': {allow_single_deselect: true},
            '.chosen-select-no-single': {disable_search_threshold: 10},
            '.chosen-select-no-results': {no_results_text: 'Oops, nothing found!'},
            '.chosen-select-width': {width: "100%"}
        }
        for (var selector in config) {
            $(selector).chosen(config[selector]);
        }

        $(".chosen-select").chosen({width: "100%%"});
    });

    //$(".chosen-select").chosen({width: "100%%"}); 


    var drug = '[{"drug_id":15,"drug_name":"Hydromorphone ","generic_name":"","company_name":"","dosage_form":"Tablet ","strength":"8mg"},{"drug_id":13,"drug_name":"Monas","generic_name":"","company_name":"","dosage_form":"","strength":"200"},{"drug_id":12,"drug_name":"Napa","generic_name":"paracitamol","company_name":"Square Ph","dosage_form":"","strength":"500"},{"drug_id":16,"drug_name":"Oxycodone ","generic_name":"OxyContin MR-Tablet","company_name":"","dosage_form":"Tablet","strength":"80mg"},{"drug_id":14,"drug_name":"PARACETAMOL","generic_name":"PARACETAMOL","company_name":"PISA","dosage_form":"1+1+1","strength":"500Mg"},{"drug_id":11,"drug_name":"Paracitamol","generic_name":"paracitamol","company_name":"ACE","dosage_form":"","strength":"500mg"}]';
    var diagnosis = '[{"diagnosis_id":14,"center_name":"Lab Aid","location":"","test_name":"Covid Test","fee":199},{"diagnosis_id":11,"center_name":"Lab Aid","location":"","test_name":"ECG","fee":1000},{"diagnosis_id":13,"center_name":"Popular Diagnosys","location":"","test_name":"HBS","fee":2000},{"diagnosis_id":12,"center_name":"Lab Aid","location":"","test_name":"Ultra ","fee":2000}]';
</script>

<script type="text/javascript">
    $(document).ready(function() {

        $('#load-darat').click(function() {
            $.blockUI({message: $('#question'), css: {width: '275px'}});
        });

        $('#yes').click(function() {
            // update the block message 
            $.blockUI({message: "<h1>Remote call in progress...</h1>"});

            $.ajax({
                url: 'wait.php',
                cache: false,
                complete: function() {
                    // unblock when remote call returns 
                    $.unblockUI();
                }
            });
        });

        $('#no').click(function() {
            $.unblockUI();
            return false;
        });

    });
</script>  

<div id="question" style="display:none; cursor: default"> 
    <h1>Would you like to contine?.</h1> 
    <input type="button" id="yes" value="Yes" /> 
    <input type="button" id="no" value="No" /> 
</div> 
<?php $__env->stopSection(); ?>



<?php $__env->startSection('custom-js'); ?>
<script src="<?php echo e(asset('script.js')); ?>?time=<?php echo e(time()); ?>"></script>
 <script src="https://doctor.vinnorokom.com/public/js/wow.min.js"></script>
        <script src="https://doctor.vinnorokom.com/public/plugin/choosen-js/chosen.jquery.js"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pharmacyapp\resources\views/prescrive/pop.blade.php ENDPATH**/ ?>
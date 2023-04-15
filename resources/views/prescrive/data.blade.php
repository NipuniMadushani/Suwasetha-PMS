

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
            <h2 style="color: #00ABBE!important; margin-bottom: 0 !imporatnt">{{Auth::user()->shop->name}}</h2>
            <!--<h5>{{Auth::user()->shop->phone}}</h5>-->
            
        </div>
        <div class="col-xs-6 text-right">
            <h2 style="color: #00ABBE!important">@if($pres->doctor) {{ $pres->doctor->name }} @endif</h2>
            <!--<h1><small> #{{ $pres->id }}</small></h1>-->
            <p>@if($pres->doctor) {{ $pres->doctor->title }} @endif,<span style="padding-left: 5px">@if($pres->doctor) {{$pres->doctor->hospital }} @endif</span> </p>
            
        </div>
    </div>
    
    <div class="row" style="padding: 5px 0">
        <div class="col-xs-6">
            <div>
                <p style="border-bottom: 1px dotted #979191">Name:@if($pres->customer) {{ $pres->customer->name }} @else Customer @endif</p>
            </div>
            <!--<div class="panel panel-default">-->
            <!--    <div class="panel-heading">-->
            <!--        <b> Patient : @if($pres->customer) {{ $pres->customer->name }} @else Customer @endif </b>-->
            <!--    </div>-->
            <!--    <div class="panel-body">-->
            <!--        <p>-->
            <!--            <b>Phone</b>: @if($pres->customer)  {{ $pres->customer->phone }} @endif <br>-->
            <!--            <b>Age</b>:  @if($pres->customer)  {{ $pres->customer->age }} @endif <br>-->
            <!--            <b>Date of Visit : </b>:  {{date('d F, Y h:i:s', strtotime($pres->created_at))}}  <br>-->
            <!--            <br>-->
            <!--        </p>-->
            <!--    </div>-->
            <!--</div>-->
        </div>
        <div class="col-xs-6 text-right">
            <div style="display:flex; gap: 12px; float:right !important">
                <p style="border-bottom: 1px dotted #979191">Age: @if($pres->customer)  {{ $pres->customer->age }} @endif</p>
                <p style="border-bottom: 1px dotted #979191">Gender: @if($pres->customer)  {{ $pres->customer->gender }} @endif </p>
                <p style="border-bottom: 1px dotted #979191">Date: {{date('d F, Y', strtotime($pres->created_at))}} </p>
            </div>
            <!--<div class="panel panel-default">-->
            <!--    <div class="panel-heading">-->
            <!--        <b> Info : </b>-->
            <!--    </div>-->
            <!--    <div class="panel-body">-->
            <!--        <p>-->
            <!--            <b>Referred To</b> : @if($pres->doctor) {{ $pres->doctor->name }} @endif<br>-->
            <!--            @if($pres->doctor) {{ $pres->doctor->title }} @endif,-->
            <!--            <small></small>-->
            <!--            <br>-->
            <!--            <b>Prescribed Date</b> : {{ date('d F, Y h:i', strtotime($pres->created_at)) }} <br>  -->
            <!--        </p>-->
            <!--    </div>-->
            <!--</div>-->
        </div>
    </div>
    <div class="prescription_icon" style="color: #00ABBE!important; width: 100%">
        <img src="{{asset('prescription/icons8-pharmacy-60.png')}}" />
        <span style="float: right; font-size: 22px; font-weight: bold;color: #00ABBE!important; verticle-align: meddle">Visiting Fee: {{$pres->visiting_fee ?? ""}}</span>
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
                
                @php
                    $medicine = json_decode($pres->medicines, true);
                @endphp
                 @if(!empty($medicine) && is_array($medicine))
                    @foreach($medicine as $key => $item)
                    <tr>
                        <td class="text-center"> {{($key+1)}} </td>
                        <td class="text-center"> {{$item['0']}}  </td>
                        <td class="text-center">  {{$item['1']}}  </td>
                        <td class="text-center"> {{$item['2']}} </td>
                    </tr>
                    
                    @endforeach
                @endif
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
                        
                        @php
                            $test = json_decode($pres->tests, true);
                        @endphp
                        @if(!empty($test) && is_array($test))
                        @foreach($test as $key => $item)
                        <tr>
                            <td>{{ ($key+1) }}</td>
                            <td>{{$item}} </td>
            
                        </tr> 
                        @endforeach
                        @endif
                        </tbody>
                </table>
            </div>
            <div class="col-xs-6">
                <h3> Patients Problems Finding </h3> 
                <div>
                    <textarea rows="5" class="form-control" readonly>{!! $pres->des !!}</textarea>
                </div>
            </div>
        </div>
         
    </div>
    </div>
    <div class="row">
         <div class="col-xs-12">
                <h3>Dostor's Advice</h3> 
                <div>
                    <textarea rows="3" class="form-control" readonly>{!! $pres->advice !!}</textarea>
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
     <img src="{{asset('prescription/icons8-pharmacy-100.png')}}" style="width: 250px" />
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
</script>
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
    body{
        background-color: #444;
    }
</style>
</head>

<body>


<div class="table-responsive">
    <div id="invoice" class="row">
        <div class="col-xs-12 col-md-12">
            <div style="text-align: center;margin: 33px 0px;">
                <a href="{{ url()->previous() }}" class="btn btn-success" style="
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
            
            <section  style="width: 302px; margin: 10px auto;background-color: #fff; padding:5px" id="invoiceArea">

                <header style="text-align: center; padding-bottom: 0px">

                    <h2 style="font-size: 24px; font-weight: 700; margin: 0; padding: 0;">{{Auth::user()->shop->name}}</h2>
                    <div style="margin-bottom: 5px; line-height: 1;">
                        <span style="font-size: 12px;">{{Auth::user()->shop->address}}</span>
                        <div style="display: block;">
                            <span style="font-size: 12px;">Mobile: {{Auth::user()->shop->phone}}</span>, <span
                                    style="font-size: 12px;">Email: {{Auth::user()->shop->email}}</span>
                        </div>
                    </div>
                </header>
                <hr>
                <section style="font-size: 12px;  line-height: 1.222;">
                    <table style="width: 100%;">
                        <tr style="border-top: 1px solid #000; border-bottom: 1px solid #000;">
                            <td class="w-30" style="font-size:12px"><span style="font-size:12px"><b>Date:</b></td>
                            <td style="font-size:12px">{{date('d M, Y', strtotime($invoice->date))}}</td>
                        </tr>
                        <tr style="border-top: 1px solid #000; border-bottom: 1px solid #000;">
                            <td class="w-30" style="font-size:12px"><span style="font-size:12px"><b>Invoice ID:</b></td>
                            <td style="font-size:12px">{{$invoice->inv_id}}</td>
                        </tr>
                        @if($invoice->customer_id != 0)
                            <tr style="border-top: 1px solid #000; border-bottom: 1px solid #000;">
                                <td class="w-30" style="font-size:12px"><b>Customer Name:</b></td>
                                <td style="font-size:12px">{{$invoice->customer->name}}</td>
                            </tr>
                            <tr style="border-top: 1px solid #000; border-bottom: 1px solid #000;">
                                <td class="w-30" style="font-size:12px" ><b>Phone:</b></td>
                                <td style="font-size:12px">{{$invoice->customer->phone}}</td>
                            </tr>
                            <tr style="border-top: 1px solid #000; border-bottom: 1px solid #000;">
                                <td class="w-30" style="font-size:12px"><b>Address:</b></td>
                                <td style="font-size:12px">{{$invoice->customer->address}}</td>
                            </tr>
                        @else

                            <tr style="border-top: 1px solid #000; border-bottom: 1px solid #000;">
                                <td class="w-30" style="font-size:12px"><b>Customer Name:</b></td>
                                <td style="font-size:12px">Walking Customer</td>
                            </tr>

                        @endif
                    </table>
                </section>
                <hr>
                <h4 style="font-size: 15px;
                    font-weight: 700;
                    text-align: center;
                    margin: 16px 0px 5px 0px;
                    padding: 0px 0;">INVOICE</h4>
               <span class="tb-dotted"></span>
                @php
                    $total = 0;
                    $paid = \App\Models\InvoicePay::where('invoice_id', $invoice->id)->sum('amount');
                    $medicine = json_decode($invoice['medicines'], true);
                    $count = count($medicine);
                @endphp
                <section style="line-height: 1.23;">
                    <table style="width: 100%">
                        <thead>
                        <tr style="  font-weight: 700; font-size: 12px">
                            <th class="w-10 text-center" style="font-size: 12px ;line-height: 30px; text-align: center">Sl.</th>
                            <th class="w-40" style="font-size: 15px ;line-height: 30px;">Name</th>
                            <th class="w-15 text-center" style="font-size: 12px ;line-height: 30px; text-align: center">Qty</th>
                            <th class="w-15 text-right" style="font-size: 12px ;line-height: 30px; text-align: center">Price</th>
                            <th class="w-20 text-right" style="border-bottom: none; font-size: 12px ;line-height: 30px; text-align: center">Total </td>
                        </tr>
                        </thead>
                        <tbody>
                            
                        @for ($i = 0; $i < $count; $i++)
                            @php
                                if(isset($medicine[$i]['batch'])){
                                $batch = \App\Models\Batch::find($medicine[$i]['batch']);
                               $detail = \App\Models\Medicine::find($medicine[$i]['id']);
                               $amount = ($batch->price*$medicine[$i]['quantity']);
                               $total += $amount;
                            @endphp
                            <tr >
                                <td class="text-center" style="vertical-align: top; font-size: 15px ;line-height: 30px; text-align: center">{{($i+1)}}</td>
                                <td style="vertical-align: top; font-size: 15px ;line-height: 30px; text-align:center">{{ Str::limit($detail->name, 150)  }}
                                    @if(!empty($detail->strength))
                                    <small>[{{ Str::limit($detail->strength, 50) }}]</small>
                                    @endif
                                </td>
                                <td class="text-center" style="vertical-align: top; font-size: 15px ;line-height: 30px; text-align: center">{{$medicine[$i]['quantity']}} </td>
                                <td class="text-right" style="vertical-align: top; font-size: 15px ;line-height: 30px; text-align: center">{{number_format($batch->price, 2)}}</td>
                                <td class="text-right" style="border-bottom: none;vertical-align: top;font-size: 15px ;line-height: 30px;text-align: center ">{{$amount}}</td>
                            </tr>
                            @php
                                }
                            @endphp
                        @endfor
                        
                        </tbody>
                        
                        <tbody>
                            <tr >
                            <th></th>
                            <th></th>
                            <th class="text-center" style="font-size: 12px">Qty</th>
                            <th class="text-center" style="font-size: 12px">Price</th>
                            <th class="text-center" style="font-size: 12px">Amount</th>
                        </tr>
                        
                        <tr>
                            <td class="text-center" colspan="2">
                                <p style="font-size: 12px"><b>Return Medicine</b></p>
                            </td>
                            <td class="text-center" style="font-size: 12px">{{ $returns->quantity }}</td>
                            <td class="text-center" style="font-size: 12px">{{ number_format($returns->amount / $returns->quantity,2)}}</td>
                            <td class="text-center" style="font-size: 12px">{{ number_format($returns->amount,2)  }}</td>
                        </tr>
                        </tbody>
                    </table>
                </section>
                

                <section style="line-height: 1.23; font-size: 15px; border-top: 1px solid #000;">
                    <table style="width: 100%; margin-top: 5px">
                        <tr style="  ">
                            <td style="text-align: right; font-size: 15px; width: 70%">Sub Total:</td>
                            <td style="text-align: right; font-size: 15px; width: 70%">{{number_format($total - $returns->amount,2)}}</td>
                        </tr>
                        <tr style="  ">
                            <td style="text-align: right; font-size: 15px ; width: 70%">Discount:</td>
                            <td style="text-align: right; font-size: 15px ; width: 70%">{{number_format($invoice->discount,2)}}</td>
                        </tr>
                        <tr style="  ">
                            <td style="text-align: right; font-size: 15px ; width: 70%">Due:</td>
                            <td style="text-align: right; font-size: 15px ; width: 70%">{{number_format($invoice->due_price,2)}}</td>
                        </tr>

                        <tr style="  ">
                            <td style="text-align: right; font-size: 15px ; width: 70%">Total Amount:</td>
                            <td style="text-align: right; font-size: 15px ;width: 70%">{{number_format($paid - $returns->amount,2)}}</td>
                        </tr>
                    </table>
                </section>
                @php
                    $f = new NumberFormatter( locale_get_default(), \NumberFormatter::SPELLOUT );

                $word = $f->format(round($invoice->total_price,2));
                @endphp
                
                <hr>
          <span class="tb-dotted"></span>
            
                <section style="font-size: 15px ;line-height: 30px; line-height: 1.222; text-align: center; padding-top: 0px">
                    <span style="display: block; font-weight: 700;">Thank you for choosing us!</span>
                    <span style="display: block;">Software Developed By Ayaantech Limited. www.ayaantec.com</span>
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
</html>
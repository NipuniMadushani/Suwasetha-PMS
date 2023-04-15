<!DOCTYPE html>
<html lang="en">
    <head>
        
        <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/print/style.css') }}">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <title>Invoice #{{$invoice->inv_no}}</title>
    </head>
    <body>
        <div class="ticket">
            <div  class="centered">{{Auth::user()->shop->name}}</div>
            <p class="centered">{{translate('Invoice')}} #{{$invoice->inv_id}}
               @if($invoice->customer_id != 0) <br>{{$invoice->customer->name}}<br>{{$invoice->customer->address}} @else
                    <br>Walking Customer
               @endif
            </p>   
            <table>
                <thead>
                    <tr>
                           <th class="">{{\App\CPU\translate('Name')}}</th>
                            <th class="pvl36">{{\App\CPU\translate('QTY')}}</th>
                            <th class="">{{\App\CPU\translate('Price')}}</th>
                    </tr>
                </thead>
                
               @php
                $total = 0;
                $paid = \App\Models\InvoicePay::where('invoice_id', $invoice->id)->sum('amount');
                $medicine = json_decode($invoice['medicines'], true);
                $count = count($medicine);
                @endphp
                <tbody>
                    <tbody>
                                
                                 
                                  @for ($i = 0; $i < $count; $i++)
                                 
                                @php
                 if(isset($medicine[$i]['batch'])){
                 $batch = \App\Models\Batch::find($medicine[$i]['batch']);
                $detail = \App\Models\Medicine::find($medicine[$i]['id']);
                $amount = ($batch->price*$medicine[$i]['quantity']);
                $total += $amount;
                @endphp
                                <tr>
                    <td class="">
                        <span class="pvl37"> {{ Str::limit($detail->name, 150) }} ({{ Str::limit($detail->strength, 50) }})</span>
                    </td>
                    <td class="">
                        {{$medicine[$i]['quantity']}}
                    </td>
                    
                    <td class="pvl38">
                        {{$amount}}
                    </td>
                </tr>
                @php
                }
                @endphp
                @endfor
                               
                            </tbody>
                            <tfoot>
                                
                         <tr>
                             <td></td>
                             <td>{{translate('Subtotal')}}:</td>
                            <td>{{round($total,2)}}</td>
                         </tr>
                         
                         <tr>
                             <td></td>
                             <td>{{translate('extra_discount')}}:</td>
                            <td>{{round($invoice->discount,2)}}</td>
                         </tr>
                         
                         <tr>
                             <td></td>
                             <td>{{translate('paid')}}:</td>
                            <td>{{round($paid,2)}}</td>
                         </tr>
                         <tr>
                             <td></td>
                             <td>{{translate('due')}}:</td>
                            <td>{{round($invoice->due_price,2)}}</td>
                         </tr>
                          <tr>
                             <td></td>
                             <td>{{translate('Total')}}:</td>
                            <td>{{round($invoice->total_price,2)}}</td>
                         </tr>
                            </tfoot>
                </tbody>
            </table>
            <p class="centered">{{ __('pages.purchase_thanks') }}</p>
        </div>
         <script>
          window.onload = function() { window.print(); }
        </script>
    </body>
</html>
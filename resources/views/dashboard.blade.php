@extends('layouts.app')
@section('custom-css')
<link rel="stylesheet" href="{{ asset('dashboard/app-assets/morris-chart/morris.css') }}">

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

@endsection
@section('title', __('pages.dashboard'))
@section('content')

            
         <div class="container-fluid mb-5 plm">
            <div class="row mt-3 statrow">   
                
                @php
                $my_pack = \App\Models\Package::where('id', Auth::user()->shop->package_id)->first();
                @endphp
                
                @if(Auth::user()->shop->email != env('SUPERUSER'))
                <ul class="planbtnm">
                    <li><span>My Plan : {{$my_pack->name}}</span>
                    </li>
                    <li><span>Expired In : {{Auth::user()->shop->next_pay}}</span>
                    </li>
                    <li><a target="_blank" rel="noopener noreferrer" href="https://{{ Auth::user()->shop->username }}.pharmacyss.com"><span>My Website</span></a>
                    </li>
                    
                </ul>
                @endif
            </div>
        </div>


<div class="container-fluid mb-4">
    <div class="row mt-3 statrow fourboxstat">
        
        @if(Auth::user()->shop->email != env('SUPERUSER'))
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="smalll-box d-flex justify-content-between">
                    <div class="inner">
                        <h3>{{ number_format($medicine,0,".",",")}}</h3>
                        <p>{{ __('Stock Medicine') }}</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-pills fa-2xl"></i>
                    </div>
                </div>
                <a href="{{ route('instock') }}" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="smalll-box d-flex justify-content-between">
                    <div class="inner">
                        <h3>{{ number_format($customer,2,".",",")}}</h3>
                        <p>{{ __('Total Sales') }}</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-usd fa-2xl"></i>
                    </div>
                </div>
                <a href="{{ route('invoice.reports') }}" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="smalll-box d-flex justify-content-between">
                    <div class="inner">
                        <h3>{{ $expire->count() }}</h3>
                        <p>{{ __('pages.expired_medicine') }}</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-hourglass-end fa-2xl"></i>
                    </div>
                </div>
                <a href="{{ route('expired') }}" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="smalll-box d-flex justify-content-between">
                    <div class="inner">
                        <h3>{{ $stockout->count() }}</h3>
                        <p>{{ __('pages.stock_out_medicine') }}</p>
                    </div>
                    <div class="icon">
                        <i class="fa-brands fa-product-hunt fa-2xl"></i>
                    </div>
                </div>
                <a href="{{ route('stockout') }}" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        @else
        
        @php
        $date = date('Y-m-d', time());
        $active_shop = \App\Models\Shop::select('id')->where('status', 1)->count();
        $inactive_shop = \App\Models\Shop::select('id')->where('status', 0)->where('next_pay', '<=', $date)->count();
        $amt = \App\Models\Income::where('status', 1)->sum('amount');
        $inv = \App\Models\Income::select('id')->where('status', 0)->count();
        @endphp
        
            <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="smalll-box d-flex justify-content-between">
                    <div class="inner">
                        <h3>{{ $active_shop }}</h3>
                        <p>{{ __('Active Pharmacy') }}</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-store fa-2xl"></i>
                    </div>
                </div>
                <a href="{{ route('saas.management') }}" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="smalll-box d-flex justify-content-between">
                    <div class="inner">
                        <h3>{{ $inactive_shop }}</h3>
                        <p>{{ __('Inactive Pharmacy') }}</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-store fa-2xl"></i>
                    </div>
                </div>
                <a href="{{ route('saas.management') }}" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-primary">
                <div class="smalll-box d-flex justify-content-between">
                    <div class="inner">
                        <h3>{{ $amt }}</h3>
                        <p>{{ __('Total Money Received') }}</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-hourglass-end fa-2xl"></i>
                    </div>
                </div>
                <a href="{{ route('saas.invoice') }}" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="smalll-box d-flex justify-content-between">
                    <div class="inner">
                        <h3>{{ $inv }}</h3>
                        <p>{{ __('Pending Order') }}</p>
                    </div>
                    <div class="icon">
                        <i class="fa-brands fa-product-hunt fa-2xl"></i>
                    </div>
                </div>
                <a href="{{ route('saas.invoice') }}" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        @endif
        
    </div>
</div>
<section id="dashboard-ecommerce">
    <div class="row">
      <div class="col-md-6 col-sm-12">
        <div class="card">
          <div class="card-header d-flex justify-content-between align-items-sm-center align-items-start flex-sm-row flex-column">
          <div class="header-left">
            <h4 class="card-title" style="color:#000; font-weight:600;">{{ __('pages.last_7_days') }}</h4>
          </div>
            <div class="header-right d-flex align-items-center mt-sm-0 mt-1">
            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
            </div>
          </div>
        <div class="card-body">
          <div class="atlchart">
              <div id="line-example" class="line-atl morris-chart"></div>
          </div>
        </div>
        </div>
      </div>
      <div class="col-md-6 col-sm-12">
        <div class="card">
          <div class="card-header d-flex justify-content-between align-items-sm-center align-items-start flex-sm-row flex-column">
          <div class="header-left">
            <h4 class="card-title" style="color:#000; font-weight:600;">{{ __('pages.last_7_days') }}</h4>
          </div>
           
          </div>
        <div class="card-body">
          <div class="atlchart">
              <div id="graph"></div>
          </div>
        </div>
        </div>
      </div>
    </div>
     @if(Auth::user()->shop->email == env('SUPERUSER'))
    <div class="row" id="basic-table">
        <div class="col-md-6 col-sm-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title Titlee">Expired Shop</h4>
              </div>
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>{{ __('Shop Name') }}</th>
                      <th>{{ __('Phone') }}</th>
                      <th>{{ __('Expired') }}</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach($expired_shop as $shop)
                    <tr>
                      <td>
                        {{ $shop->name }}
                      </td>
                      <td>{{ $shop->phone }}</td>
                       <td>{{ $shop->next_pay }}</td>
                    </tr>
                   @endforeach 
                  </tbody>
                </table>
              </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title Titlee">Recent Pending Order</h4>
          </div>
            <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>{{ __('Date') }}</th>
                  <th>{{ __('Shop') }}</th>
                  <th>{{ __('Amount') }}</th>
                  <th>{{ __('Phone Number') }}</th>
                </tr>
              </thead>
              <tbody>
                  @foreach($income as $taka)
                <tr>
                  <td>{{ $taka->date }}</td>
                  <td>{{ $taka->shop->name }}</td>
                  <td>{{ $taka->amount }}</td>
                  <td>{{ $taka->shop->phone }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    @endif
     @if(Auth::user()->shop->email != env('SUPERUSER'))
    <div class="row" id="basic-table">
        <div class="col-md-6 col-sm-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title Titlee">Today's sell</h4>
              </div>
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>{{ __('pages.title') }}</th>
                      <th>{{ __('pages.amount') }}</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        {{ __('pages.today_invoice') }}
                      </td>
                      <td>{{ $invoice }}</td>
                    </tr>
                    <tr>
                      <td>
                        {{ __('pages.sold_amount') }}
                      </td>
                      <td>{{ $invoice_amt }}</td>
                    </tr>
                    <tr>
                      <td>
                        {{ __('pages.received_amount') }}
                      </td>
                      <td>{{ $received }}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title Titlee">Today's Purchase</h4>
          </div>
            <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>{{ __('pages.title') }}</th>
                  <th>{{ __('pages.amount') }}</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>{{ __('pages.today_purchase') }}</td>
                  <td>{{ $purchase }}</td>
                </tr>
                <tr>
                  <td>{{ __('pages.purchase_amount') }}</td>
                  <td>{{ $purchase_amt }}</td>
                </tr>
                <tr>
                  <td>{{ __('pages.paid_amount') }}</td>
                  <td>{{ $paid }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="row" id="basic-table">
        <div class="col-md-6 col-sm-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title Titlee" style="">Expired Medicines</h4>
          </div>
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>{{ __('pages.name') }}</th>
                  <th>{{ __('pages.batch') }}</th>
                  <th>{{ __('pages.amount') }}</th>
                </tr>
              </thead>
              <tbody>
                @if($expire->count() > 0) 
                    @foreach($expire as $expired)   
                      <tr>
                      <td>
                          @php
                            $medi = \App\Models\Medicine::where('id', $expired->medicine_id)->first();
                          @endphp
                           @if($medi != null) 
                           {{ $medi->name }} 
                           @endif
                      </td>
                      <td>{{ $expired->name }}</td>
                      
                      <td>{{ $expired->qty }}</td>
                    </tr>
                  @endforeach  
                @else 
                    <tr> <td>{{ __('pages.no_expired') }}</td></tr>
                @endif
              </tbody>
            </table>
            {{ $expire->links() }}
          </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title Titlee">{{ __('pages.stock_out') }}</h4>
      </div>
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>{{ __('pages.name') }}</th>
              <th>{{ __('pages.amount') }}</th>
            </tr>
          </thead>
          <tbody>
            @if($stockout->count() > 0) 
            @foreach($stockout as $stock)   
              <tr>
              <td>
                {{ $stock->name }}
              </td>
              <td>{{ $stock->batch->sum('qty') }}</td>
            </tr>
          @endforeach  
            @else 
            <tr> <td>{{ __('pages.all_stock') }}</td></tr>
            @endif
          </tbody>
        </table>
        {{ $stockout->links() }}
      </div>
    </div>
  </div>
    </div>  
    @endif
     @if(Auth::user()->shop->email != env('SUPERUSER'))
    <div id="stockmodal" class="modal fade show" role="dialog" style="padding-right: 15px; display: none;" aria-modal="true">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-bs-dismiss="modal">×</button>
            <h4 class="modal-title"></h4>
          </div>
          <div class="modal-body">
          <div> <h4><center>{{ __('pages.expired_medicine') }}</center></h4></div>
            <table id="" class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th class="text-center">{{ __('pages.name') }}</th>
                        <th class="text-center">{{ __('pages.batch') }}</th>
                        <th class="text-center">{{ __('pages.amount') }}</th>
                    </tr>
                </thead>
                <tbody>@if($expire->count() > 0) 
                    @foreach($expire as $expired)  
                    
                    
                      <tr>
                      <td>
                        @php
                          $medi = \App\Models\Medicine::where('id', $expired->medicine_id)->first();
                          @endphp
                       @if($medi != null) 
                       {{ $medi->name }} 
                       @endif
                      </td>
                      <td>{{ $expired->name }}</td>
                      
                      <td>{{ $expired->qty }}</td>
                    </tr>
                  @endforeach  
                    @else 
                    <tr> <td>{{ __('pages.no_expired') }}</td></tr>
                    @endif
                </tbody>
            </table>
            <div> <h4><center>{{ __('pages.stock_out') }}</center></h4></div>                   
            <table id="" class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th class="text-center">{{ __('pages.name') }}</th>
                        
                        <th class="text-center">{{ __('pages.amount') }}</th>
                    </tr>
                </thead>
                <tbody>
                  @if($stockout->count() > 0) 
                    @foreach($stockout as $stock)   
                      <tr>
                      <td>
                        {{ $stock->name }}
                      </td>
                      
                      <td>{{ $stock->batch->sum('qty') }}</td>
                    </tr>
                  @endforeach  
                    @else 
                    <tr> <td>{{ __('pages.all_stock') }}</td></tr>
                    @endif
                    <input type="hidden" value="36" id="stpcount">
                </tbody>
            </table>
        </div>
          <div class="modal-footer">
            <input type="hidden" name="is_modal_shown" id="is_modal_shown">
            <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    @endif
</section>      
@endsection
@section('custom-js')
 @if(Auth::user()->shop->email != env('SUPERUSER'))

<script type="text/javascript">
 $(document).ready(function(){
    
    
    var modelShown = localStorage.getItem('modelShown');
    if(modelShown != 'YES'){
        $('#stockmodal').modal('show');
      localStorage.setItem('modelShown', 'YES');
    }
 
    
  });
</script>
@endif
</script>
<script src="{{ asset('dashboard/app-assets/morris-chart/popper.min.js') }}"></script>
<script src="{{ asset('dashboard/app-assets/morris-chart//raphael-min.js') }}"></script>
<script src="{{ asset('dashboard/app-assets/morris-chart/morris.min.js') }}"></script>
 @php
    $dfrom = date('Y-m-d', strtotime("-7 day", time()));
    $dto = date('Y-m-d');
     $datelist = list_days($dfrom,$dto);
     $i = 0;
    $data = [];
    @endphp

@foreach ($datelist as $date) 
@if(Auth::user()->shop->email != env('SUPERUSER'))
@php
$data[$i]['y'] = $date;
$data[$i]['a'] = \App\Models\Invoice::where('shop_id', Auth::user()->shop_id)->where('date', $date)->count();
$data[$i]['b'] = \App\Models\Purchase::where('shop_id', Auth::user()->shop_id)->where('date', $date)->count();
$i++;
@endphp
@else

@php
$data[$i]['y'] = $date;
$data[$i]['a'] = \App\Models\Income::where('shop_id', Auth::user()->shop_id)->where('date', $date)->count();
$data[$i]['b'] = \App\Models\Income::where('shop_id', Auth::user()->shop_id)->where('date', $date)->where('status', 1)->count();
$data[$i]['c'] = \App\Models\Income::where('shop_id', Auth::user()->shop_id)->where('date', $date)->where('status', 1)->sum('amount');
$i++;
@endphp

@endif
@endforeach
<script>
Morris.Line({
  element: 'line-example',
  data: @php echo json_encode($data) @endphp,
  xkey: 'y',
  labelColor: '#000000',
  @if(Auth::user()->shop->email != env('SUPERUSER'))
  ykeys: ['a', 'b'],
  labels: ['Sales', 'Purchase']
  @else
  ykeys: ['a', 'b', 'c'],
  labels: ['Total Order', 'Approved Order', 'Received Amount']
  @endif
});
</script>
@if(Auth::user()->shop->email != env('SUPERUSER'))
@php
$sales = \App\Models\Invoice::where('shop_id', Auth::user()->shop_id)->whereBetween('date', [$dfrom, $dto])->sum('total_price');
$purchase = \App\Models\Purchase::where('shop_id', Auth::user()->shop_id)->whereBetween('date', [$dfrom, $dto])->sum('total_price');
@endphp
@else
@php
$expired = \App\Models\Shop::whereBetween('next_pay', [$dfrom, $dto])->count();
$active_order = \App\Models\Income::where('status', 1)->whereBetween('date', [$dfrom, $dto])->count();
@endphp
@endif
<script>Morris.Donut({
  element: 'graph',
  data: [
      @if(Auth::user()->shop->email != env('SUPERUSER'))
    {value: {{$sales}}, label: 'Sales'},
    {value: {{$purchase}}, label: 'Purchase'}
    @else
    {value: {{$expired}}, label: 'Expired Pharmacy'},
    {value: {{$active_order}}, label: 'Approved Order'}
    @endif
  ],
  formatter: function (x) { return x + ""}
}).on('click', function(i, row){
  console.log(i, row);
});
</script>
@endsection


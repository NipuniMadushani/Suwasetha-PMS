<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Method;
use App\Models\Medicine;
use App\Models\Leaf;
use App\Models\Purchase;
use App\Models\PurchasePay;
use App\Models\Batch;
use App\Models\Balance;
use App\Models\Supplier;
use App\Models\PurchaseReturn;
use Brian2694\Toastr\Facades\Toastr;
use Yajra\DataTables\DataTables;
class PurchaseController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function new(Request $request, $id=0)
    {
        if ($request->isMethod('post')) {
            $purchase = new Purchase();
            $purchase->supplier_id = $request->supplier_id;
            $purchase->date = date('Y-m-d', strtotime($request->date));
            $offerNo = Purchase::count();
            $purchase->total_price = $request->total;
            $purchase->total_price = $request->total;
            $purchase->due_price = $request->due;
            $purchase->inv_id = uniqueOrderId($offerNo, Auth::user()->shop->prefix, 'purchases', 'inv_id');
            $purchase->total_price = $request->total;
            $purchase->total_price = $request->total;
            $purchase->due_price = $request->due;
        
                if($request->due>0){
                $sup = Balance::where('supplier_id', $request->supplier_id)->where('shop_id', Auth::user()->shop_id)->first();
                if($sup != null){
                $sup->due += $request->due;
                $sup->save();
                } else {
                    $sip = new Balance();
                    $sip->due = $request->due;
                    $sip->supplier_id = $request->supplier_id;
                    $sip->shop_id = Auth::user()->shop_id;
                    $sip->save();
                }
                }
            $purchase->shop_id = Auth::user()->shop_id;
            $purchase->district_id = Auth::user()->shop->district_id;
            $purchase->thana_id = Auth::user()->shop->thana_id;
            if($purchase->save()){
                $invpay = new PurchasePay();
                $invpay->shop_id = Auth::user()->shop_id;
                $invpay->purchase_id = $purchase->id;
                $invpay->date = $request->date;
                $invpay->amount = $request->paid;
                $invpay->supplier_id = $request->supplier_id;
                $invpay->method_id = $request->method_id;
                $invpay->save();
                
                $method = Method::find($request->method_id);
                $method->balance -= $request->paid;
                $method->save();
                $batches = $request->test;
                
                for($i = 0;$i < count($batches);$i++)
                {
                    $leaf_id = $batches[$i]['leaf_id'];
                    $leaf = Leaf::where('id', $leaf_id)->first()->amount;
                    $batch = new Batch();
                    $batch->shop_id = Auth::user()->shop_id;
                    $batch->qty = ($batches[$i]['box_qty']*$leaf);
                    $batch->medicine_id = $batches[$i]['medicine_id'];
                    $batch->name = $batches[$i]['batch_no'];
                    $batch->price = $batches[$i]['mrp'];
                    $batch->buy_price = ($batches[$i]['bprice']/$batch->qty);
                    $batch->expire = $batches[$i]['expiry_date'];
                    $batch->name = $batches[$i]['batch_no'];
                    $batch->leaf_id = $batches[$i]['leaf_id'];
                    $batch->purchase_id = $purchase->id;
                    
                    $batch->save();
                
                }
                 Toastr::success('Customer successfully created', '', ['progressBar' => true, 'closeButton' => true, 'positionClass' => 'toast-top-right']);
                return redirect()->route('purchase.view', $purchase->id);
            } else {
                Toastr::error('Something Went Wrong', '', ['progressBar' => true, 'closeButton' => true, 'positionClass' => 'toast-top-right']);
                return redirect()->back();
            }
        } else {
            
            if($id != null){
            $medicine = Medicine::where(function($q) {
          $q->where('shop_id', Auth::user()->shop_id)
            ->orWhere('global', 1);
      })->where('supplier_id', $id)->orderBy('name', 'asc')->get();
            $sup_id = $id;
            } else {
             $medicine = Medicine::where(function($q){
          $q->where('shop_id', Auth::user()->shop_id)
            ->orWhere('global', 1);
      })->orderBy('name', 'asc')->where('hot', 1)->get();   
             $sup_id = $id;
            }  
            $method = Method::where('shop_id', Auth::user()->shop_id)->orWhere('global', 1)->get();
            $supplier = Supplier::where('shop_id', Auth::user()->shop_id)->orWhere('global', 1)->get();
            $leaf = Leaf::where('shop_id', Auth::user()->shop_id)->orWhere('global', 1)->get();
            return view('purchase.new', compact('supplier','method','medicine','sup_id', 'leaf'));
        }
    }
    
    
    public function reports(Request $request){

        if ($request->ajax()) {
                    
        if($request->filled('from') && $request->filled('to')){
        $data = Purchase::select('*')->whereBetween('date', [$request->from, $request->to])->where('shop_id', Auth::user()->shop_id)->latest('id');    
                   
        } else {
        $data = Purchase::select('*')->where('shop_id', Auth::user()->shop_id)->latest('id');
        }
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('supplier', function($row){  
                
                       if(!empty($row->shops)){
                            $name = Shop::find($row->shops);
                            return $name->name;
                        } else {
                
                $supplier = Supplier::where('id', $row->supplier_id)->first();
                if($supplier != null){
                   return $supplier->name;
                }
                        }          
            })
            ->addColumn('action', function($row){
             
               return '<a href="'.route('sell.order.invoice', $row->id).'" class="badge bg-info"><i class="fas fa-eye"></i></a> <a href="'.route('purchase.returned', $row->id).'" class="badge bg-warning"><i class="fa fa-undo"></i></a><a onclick="return confirm(\'Are you sure?\')" href="'.route('purchase.delete', $row->id).'" class="badge bg-danger"><i class="fas fa-trash"></i></a>';
           
            })
                            
            ->rawColumns(['action'])
            ->make(true);
        
        } 
        
        return view('purchase.reports');
    }
    
    
    
    
    
    public function returned(Request $request, $id){
        
        $inv = Purchase::findorFail($id);
        $medicine = Batch::where('purchase_id', $id)->get();
        if ($request->isMethod('post')) {
           $batch = Batch::where('medicine_id', $request->medicine)->where('purchase_id', $id)->first();
            if($request->qty > $batch->qty){
                Toastr::success('Amount Must Be Less Than '.$batch->qty.'', '', ['progressBar' => true, 'closeButton' => true, 'positionClass' => 'toast-top-right']);
                return redirect()->back();
            }
            $batch->qty -= $request->qty;
            $batch->save();
            $amt = ($batch->buy_price*$request->qty);
            if($inv->supplier_id != 0){
                $customer = Supplier::find($inv->supplier_id);
                if($customer->due >= $amt){
                $customer->due -= $amt;    
                }
                $customer->save();
            }
            
           
            $return = new PurchaseReturn();
            $return->date = date('Y-m-d');
            $return->purchae_id = $id;
            $return->amount = $amt;
            $return->quantity = $request->qty;
            $return->shop_id = Auth::user()->shop_id;
            $return->save();
            Toastr::success('Return Accepted', '', ['progressBar' => true, 'closeButton' => true, 'positionClass' => 'toast-top-right']);
                return redirect()->route('purchase.return.history');
        }
        
        return view('purchase.returned', compact('inv', 'medicine'));
    }
    
    
    public function purchase_return_invoice($id)
    {
        $return = PurchaseReturn::findOrFail($id);
        $data['order'] = Purchase::where('id',$return->purchae_id)->firstOrFail();
        $data['return'] = $return;
        return view('sell.order.purchase_return_invoice')->with($data);
    }
    
    
    public function return_history(Request $request){
        if ($request->ajax()) {
            $data = PurchaseReturn::select('*')->where('shop_id', Auth::user()->shop_id)->latest('id');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('view', function($row){
                           return '<a href="'.route('purchase.return_invoice', $row->id).'" class="badge bg-primary">View Invoice</a>';
                    })
                    ->rawColumns(['view'])
                    ->make(true);
        }
       return view('purchase.returns');
    }
    
    
    
    
    
    public function edit(Request $request, $id)
    {
        $customer = Customer::where('shop_id', Auth::user()->shop_id)->where('id', $id)->firstOrFail();
        if ($request->isMethod('post')) {
            
            $customer->name = $request->name;
            $customer->phone = $request->phone;
            $customer->address = $request->address;
            if($request->filled('due')){
            $customer->due = $request->due;    
            }
            $customer->thana_id = Auth::user()->shop->thana_id;
            $customer->shop_id = Auth::user()->shop_id;
            $customer->district_id = Auth::user()->shop->district_id;
            if($customer->save()){
                   Toastr::success('Customer successfully created', '', ['progressBar' => true, 'closeButton' => true, 'positionClass' => 'toast-top-right']);
                    return redirect()->route('customer.list');
            } else {
                Toastr::error('Something Went Wrong', '', ['progressBar' => true, 'closeButton' => true, 'positionClass' => 'toast-top-right']);
                return redirect()->route('customer.list');
            }
        } else {
            
            return view('customer.edit', compact('customer'));
        }
    }
    
    
     public function delete(Request $request, $id)
    {
        $customer = Purchase::where('shop_id', Auth::user()->shop_id)->where('id', $id)->firstOrFail();

        if($customer->delete()){
               Toastr::success('Customer successfully Deleted', '', ['progressBar' => true, 'closeButton' => true, 'positionClass' => 'toast-top-right']);
            return redirect()->back();
        } else {
            Toastr::error('Something Went Wrong', '', ['progressBar' => true, 'closeButton' => true, 'positionClass' => 'toast-top-right']);
            return redirect()->back();
        }

    }
    
    
    //  public function view(Request $request, $id)
    //  {
    //     $data['customer'] = Purchase::where('shop_id', Auth::user()->shop_id)->where('id', $id)->firstOrFail();
        
    //     if ($request->ajax()) {
            
    //         $data = PurchasePay::select('*')->where('purchase_id', $id);
           
    //         return Datatables::of($data)
    //                 ->addIndexColumn()
    //                 ->make(true);
    //     }
    //     $data['invoice'] = Purchase::where('id', $id)->first();
    //     $data['transaction'] = Batch::where('purchase_id', $id)->get();
    //     return view('purchase.view')->with($data);

    // }
    
     public function view(Request $request, $id)
    {
        $data['customer'] = Purchase::where('shop_id', Auth::user()->shop_id)->where('id', $id)->firstOrFail();
        
        if ($request->ajax()) {
            
            $data = PurchasePay::select('*')->where('purchase_id', $id);
           
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->make(true);
        }
        $data['invoice'] = Purchase::where('id', $id)->first();
        $data['transaction'] = Batch::where('purchase_id', $id)->get();
        return view('purchase.view')->with($data);

    }
    
    public function addtrx(Request $request, $id){
        $invoice = Purchase::where('id', $id)->first();
        
       
        if ($request->isMethod('post')) {
            $type = Method::where('id', $request->method)->first();
       
        if($request->amount > $invoice->due_price){
           Toastr::error('Amount Can Not Be Bigger Then Due', '', ['progressBar' => true, 'closeButton' => true, 'positionClass' => 'toast-top-right']);
        return redirect()->back();
        }
       
        if($request->amount>$type->balance){
           Toastr::error('No Available Balance On Method', '', ['progressBar' => true, 'closeButton' => true, 'positionClass' => 'toast-top-right']);
        return redirect()->back();
        }
            $pays = new PurchasePay();
            $pays->purchase_id = $id;
            $pays->shop_id = Auth::user()->shop_id;
            $pays->date = date('Y-m-d');
            $pays->amount = $request->amount;
            $pays->method_id = $request->method;
            if($pays->save()){
              $invoice->due_price -=   $request->amount;
              $invoice->save();
              $invoice = Balance::where('supplier_id', $invoice->supplier_id)->where('shop_id', Auth::user()->shop_id)->first();
              $invoice->due -= $request->amount;
              $invoice->save();
              
              $method = Method::where('id', $request->method)->first();
              $method->balance -= $request->amount;
              $method->save();
              Toastr::success('Payment Add Done', '', ['progressBar' => true, 'closeButton' => true, 'positionClass' => 'toast-top-right']);
            return redirect()->route('purchase.trx', $id);
            }
        } 
    return view('purchase.addtrx', compact('invoice'));
        
    }
    
    
    
     public function due(Request $request)
    {
        
         if ($request->ajax()) {
            $data = Customer::select('id','name','address','phone','due')->where('shop_id', Auth::user()->shop_id)->where('due', '>', 0)->latest('id');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                           return '<a href="'.route('customer.edit', $row->id).'" class="badge bg-primary"><i class="fas fa-edit"></i></a> <a href="'.route('customer.view', $row->id).'" class="badge bg-info"><i class="fas fa-eye"></i></a> <a onclick="return confirm(\'Are you sure?\')" href="'.route('customer.delete', $row->id).'" class="badge bg-danger"><i class="fas fa-trash"></i></a>';
      
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        $customer = Customer::where('shop_id', Auth::user()->shop_id)->get();
        
        return view('customer.list', compact('customer'));
    }
    
    public function index(Request $request)
    {
        
         if ($request->ajax()) {
            $data = Customer::select('id','name','address','phone','due')->where('shop_id', Auth::user()->shop_id)->latest('id');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
     
                           return '<a href="'.route('customer.edit', $row->id).'" class="badge bg-primary"><i class="fas fa-edit"></i></a> <a href="'.route('customer.view', $row->id).'" class="badge bg-info"><i class="fas fa-eye"></i></a> <a onclick="return confirm(\'Are you sure?\')" href="'.route('customer.delete', $row->id).'" class="badge bg-danger"><i class="fas fa-trash"></i></a>';
      
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        $customer = Customer::where('shop_id', Auth::user()->shop_id)->get();
        
        return view('customer.list', compact('customer'));
    }
}

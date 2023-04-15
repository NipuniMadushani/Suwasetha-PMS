<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Method;
use App\Models\Medicine;
use App\Models\Leaf;
use App\Models\Invoice;
use App\Models\Purchase;
use App\Models\InvoicePay;
use App\Models\PurchasePay;
use App\Models\Batch;
use App\Models\Customer;
use App\Models\Shop;
use App\Models\Lol;
use App\Models\Returns;
use Mike42\Escpos\Printer;
use Mike42\Escpos\ImagickEscposImage;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Brian2694\Toastr\Facades\Toastr;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Response;
use PDF;
class InvoiceController extends Controller
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

            $purchase = new Invoice();
            $purchase->customer_id = $request->customer_id;
            $purchase->date = date('Y-m-d', strtotime($request->date));
            $offerNo = Invoice::count();
            $purchase->total_price = $request->total;
            $purchase->due_price = $request->due;
            $purchase->inv_id = uniqueOrderId($offerNo, Auth::user()->shop->prefix, 'purchases', 'inv_id');
            $purchase->total_price = $request->total;
            $purchase->due_price = $request->due;
            $purchase->medicines = json_encode($request->invoice);

            if($request->due>0){
                $sup = Customer::where('id', $request->customer_id)->first();
                if($sup != null){
                    $sup->due += $request->due;
                    $sup->save();
                }
            }
            $purchase->thana_id = Auth::user()->shop->thana_id;
            $purchase->shop_id = Auth::user()->shop_id;
            $purchase->district_id = Auth::user()->shop->district_id;
            if($purchase->save()){
                $invpay = new InvoicePay();
                $invpay->shop_id = Auth::user()->shop_id;
                $invpay->invoice_id = $purchase->id;
                $invpay->date = $request->date;
                $invpay->amount = $request->paid;
                $invpay->customer_id = $request->customer_id;
                $invpay->method_id = $request->method_id;
                $invpay->save();

                $method = Method::find($request->method_id);
                $method->balance += $request->paid;
                $method->save();
                $batches = $request->invoice;
                for($i = 0;$i < count($batches);$i++)
                {
                    $now = \Carbon\Carbon::now()->format('Y-m-d');
                    $batch = Batch::where('qty', '>'. 0)->whereDate('expire', '>', $now)->where('medicine_id', $batches[$i]['medicine_id'])->where('shop_id', Auth::user()->shop_id)->first();
                    if($batch != null){
                        $batch->qty -= $batches[$i]['box_qty'];
                        $batch->save();
                    }
                }
                Toastr::success('Customer successfully created', '', ['progressBar' => true, 'closeButton' => true, 'positionClass' => 'toast-top-right']);
                return redirect()->route('invoice.view', $purchase->id);
            } else {
                Toastr::error('Something Went Wrong', '', ['progressBar' => true, 'closeButton' => true, 'positionClass' => 'toast-top-right']);
                return redirect()->back();
            }
        } else {

            $now = \Carbon\Carbon::now()->format('Y-m-d');
            $medicine = Batch::where('shop_id', Auth::user()->shop_id)->groupBy('medicine_id')->get();
            $sup_id = $id;
            $method = Method::where('shop_id', Auth::user()->shop_id)->get();
            $supplier = Customer::where('shop_id', Auth::user()->shop_id)->get();
            $leaf = Leaf::where('shop_id', Auth::user()->shop_id)->get();
            return view('invoice.new', compact('supplier','method','medicine','sup_id', 'leaf'));
        }
    }


    public function reports(Request $request){

        if ($request->ajax()) {
            if($request->filled('from') && $request->filled('to')){
                $data = Invoice::select('*')->whereBetween('date', [$request->from, $request->to])->where('shop_id', Auth::user()->shop_id)->latest('id');
            } else {
                $data = Invoice::select('*')->where('shop_id', Auth::user()->shop_id)->latest('id');
            }
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('supplier', function($row){
                    $cdata = Customer::where('id', $row->customer_id)->first();
                    if($cdata != null){
                        return $cdata->name;
                    } else {
                        return 'No Customer';
                    }
                })
                ->addColumn('action', function($row){
                
                    if($row->shop_id != 79){
                        $value = '<a onclick="return confirm(\'Are you sure?\')" href="'.route('invoice.delete', $row->id).'" class="badge bg-danger"><i class="fas fa-trash"></i></a>';
                    } else{
                        $value = '';
                    }
                    // $medicines = json_decode($row->medicines,true);
                    // foreach($medicines as $medicine){
                    //   if(!$medicine['quantity'] < 1){
                    //     return '<a href="'.route('returned', $row->id).'" class="badge bg-warning"><i class="fa fa-undo"></i></a>';
                    //     }  
                    // }
                    if($row->qty > 0){
                        return '<a href="'.route('invoice.view', $row->id).'" class="badge bg-primary"><i class="fas fa-eye"></i></a><a href="'.route('returned', $row->id).'" class="badge bg-warning mx-1"><i class="fa fa-undo"></i></a>'.$value;
                    }else{
                        return '<a href="'.route('invoice.view', $row->id).'" class="badge bg-primary me-1"><i class="fas fa-eye"></i></a>'.$value;
                    }
                



                })
                ->rawColumns(['action'])
                ->make(true);

        }
    
        return view('invoice.reports');
    }


    public function returned(Request $request, $id)
    {
        
        $inv = Invoice::findorFail($id);
        if ($request->isMethod('post')) {
            $request->validate(
             ['qty' => 'required']
            );
            $result = explode("_", $request->medicine);
            $batch = $result['0']; // Batch id
            $qty = $request->qty;  // Return quantity
            $amt = $result['2'];   // Total invoice amount
            
            $unit_price = ($result['2']/$result['1']); // Single product price
            
            $return_amount  = ($qty*$unit_price); // Total return amount
            
            $inv->total_price -= $return_amount;
            $inv->qty -= $qty;
            
            if($inv->due_price >= $return_amount){
                $inv->due_price -= $return_amount;
            }
            $inv->save();

            if($inv->customer_id != 0){
                $customer = Customer::find($inv->customer_id);
                if($customer->due >= $amt){
                    $customer->due -= $amt;
                }
                $customer->save();
            }

            $batch= Batch::find($batch);
            $batch->qty += $request->qty;
            $batch->save();

            $return = new Returns();
            $return->date = date('Y-m-d');
            $return->inv_id = $id;
            $return->quantity = $qty;
            $return->amount = $return_amount;
            $return->shop_id = Auth::user()->shop_id;
            $return->save();
            Toastr::success('Return Accepted', '', ['progressBar' => true, 'closeButton' => true, 'positionClass' => 'toast-top-right']);
            return redirect()->route('return.history');
        }

        return view('invoice.returned', compact('inv'));
    }

    public function allreports(Request $request)
    {
         $from_date = '';
        $to_date = '';
        if(!empty($request->from) && !empty($request->to) ){
            $from_date = $request->from;
            $to_date = $request->to;
        }else{
            $from_date = date('Y-m-d', strtotime("-7 day", time()));
            $to_date = date('Y-m-d');
        }
        
        $dates = list_days($from_date,$to_date);
        
        $total_sale = 0;
        $total_sale_amount = 0;
        $total_purchase = 0;
        $total_purchase_amount = 0;
        $reports = [];
        foreach($dates as $date){
            $data['date'] = $date;
            $data['total_sele'] = \App\Models\Invoice::where('shop_id', Auth::user()->shop_id)->where('date', $date)->count();
            $data['total_sale_price'] = \App\Models\Invoice::where('shop_id', Auth::user()->shop_id)->where('date', $date)->sum('total_price');
            $data['total_sale_amount'] = \App\Models\InvoicePay::where('shop_id', Auth::user()->shop_id)->where('date', $date)->sum('amount');
          
            $data['total_purchase'] = \App\Models\Purchase::where('shop_id', Auth::user()->shop_id)->where('date', $date)->count();
            $data['total_purchase_price'] = \App\Models\Purchase::where('shop_id', Auth::user()->shop_id)->where('date', $date)->sum('total_price');
            $data['total_purchase_amount'] = \App\Models\PurchasePay::where('shop_id', Auth::user()->shop_id)->where('date', $date)->sum('amount');
            
            $total_sale += $data['total_sele'];
            $total_sale_amount += $data['total_sale_amount'];
            $total_purchase += $data['total_purchase'];
            $total_purchase_amount += $data['total_purchase_amount'];
            
            array_push($reports,$data);
        }
        return view('invoice.allreports', compact('reports','total_sale_amount','total_purchase_amount','total_sale','total_purchase'));
    }

    public function recart($id)
    {
        Lol::where('id', $id)->delete();
        Toastr::success('Cart Remove', '', ['progressBar' => true, 'closeButton' => true, 'positionClass' => 'toast-top-right']);
        return redirect()->back();
    }
    public function profit(Request $request)
    {
        $from_date = '';
        $to_date = '';
        if(!empty($request->from) && !empty($request->to) ){
            $from_date = $request->from;
            $to_date = $request->to;
        }else{
            $from_date = date('Y-m-d', strtotime("-7 day", time()));
            $to_date = date('Y-m-d');
        }
        
        $dates = list_days($from_date,$to_date);

        $reports = [];
        $total_sale_balance = 0;
        $total_profit_balance = 0;
        $total_loss_balance = 0;
        
        foreach (array_reverse($dates) as $date) {
             $buy = Invoice::where('shop_id', Auth::user()->shop_id)->where('date', $date)->get();
             $quantity = Invoice::where('shop_id', Auth::user()->shop_id)->where('date', $date)->count();
             $amounts = Invoice::where('shop_id', Auth::user()->shop_id)->where('date', $date)->sum('total_price');
             
             $table['date'] = $date;
             $table['quantity'] = $quantity;
             $table['amounts'] = $amounts;
             
             $sales_amount = 0;
             $buy_amount = 0;
                             
             foreach($buy as $profit){
                 $data = json_decode($profit->medicines, true);
                 $count = count($data);
    
                for ($i = 0; $i < $count; $i++){
                 if(isset($data[$i]['batch'])){
                    $detail = \App\Models\Batch::find($data[$i]['batch']);
                    $sales_amount += ($detail['price']*$data[$i]['quantity']);
                    $buy_amount += ($detail['buy_price']*$data[$i]['quantity']);
                 }
                }
            }
          
            $total = ($sales_amount-$buy_amount);
            $table['profit'] = 0;  
            $table['loss'] = 0;
            
             if($total > 0){
               $table['profit'] = $total;
             }else{
                $table['loss'] = $total; 
             }
             
            $total_sale_balance += $sales_amount;
            $total_profit_balance += $table['profit'];
            $total_loss_balance += $table['loss'];
            
            array_push($reports,$table);
        }
        if ($request->ajax()) {
            return Datatables::addIndexColumn()
                ->addColumn('action', function($row){
                    return '<a href="'.route('invoice.view', $row->id).'" class="badge bg-info"><i class="fas fa-eye"></i></a> <a onclick="return confirm(\'Are you sure?\')" href="'.route('invoice.delete', $row->id).'" class="badge bg-danger"><i class="fas fa-trash"></i></a>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('invoice.profit', compact('reports','total_sale_balance','total_profit_balance','total_loss_balance','from_date','to_date'));
    }

    public function approve($id){
        $invoice = Invoice::find($id);
        $invoice->due_price = 0;
        if(!empty($invoice->shops)){
            $purchase = new Purchase();
            $purchase->date = date('Y-m-d', strtotime($invoice->date));
            $offerNo = Purchase::count();
            $purchase->total_price = $invoice->total_price;
            $purchase->total_price = $invoice->total_price;
            $purchase->due_price = 0;
            $purchase->inv_id = uniqueOrderId($offerNo, Auth::user()->shop->prefix, 'purchases', 'inv_id');
            $purchase->total_price = $invoice->total_price;
            $purchase->total_price = $invoice->total_price;
            $purchase->due_price = 0;
            $purchase->shops = Auth::user()->shop->id;

            $purchase->shop_id = $invoice->shops;
            $purchase->district_id = Auth::user()->shop->district_id;
            $purchase->thana_id = Auth::user()->shop->thana_id;
            if($purchase->save()){
                $invpay = new PurchasePay();
                $invpay->shop_id = $invoice->shops;
                $invpay->purchase_id = $purchase->id;
                $invpay->date = date('Y-m-d');
                $invpay->amount = $invoice->total_price;
                $invpay->method_id = 6;
                $invpay->save();


            }
        }
        $invoice->save();
        Toastr::success('Order Approved', '', ['progressBar' => true, 'closeButton' => true, 'positionClass' => 'toast-top-right']);
        return redirect()->route('dashboard');

    }

    public function checkout(Request $request){
        $uid = Customer::where('uid', Auth::user()->id)->first();
        $shop = Shop::where('id', Auth::user()->shop->id)->first();

        if($uid == null){

            $newuid = new Customer();
            $newuid->name = Auth::user()->shop->name;
            $newuid->phone = Auth::user()->shop->phone;
            $newuid->address = Auth::user()->shop->address;
            $newuid->uid = Auth::user()->id;
            $newuid->shop_id = $shop->shop_id;
            $newuid->thana_id = $shop->thana_id;
            $newuid->district_id = $shop->district_id;

            if($newuid->save()){
                $customer = $newuid->id;
            }
        } else {
            $customer = $uid->id;
        }
        $cart = Lol::where('user_id', Auth::user()->id)->get();
        $fcart = Lol::where('user_id', Auth::user()->id)->first();
        $amt = Lol::where('user_id', Auth::user()->id)->sum('price');
        $purchase = new Invoice();
        $purchase->customer_id = $customer;
        $purchase->date = date('Y-m-d');
        $offerNo = Invoice::count();
        $purchase->total_price = $amt;
        $purchase->due_price = $amt;
        $purchase->inv_id = uniqueOrderId($offerNo, $shop->prefix, 'purchases', 'inv_id');

        $purchase->medicines = json_encode($cart->toArray());
        $purchase->type = 'ecommerce';
        if($request->due>0){
            $sup = Customer::where('id', $customer)->first();
            if($sup != null){
                $sup->due += $request->due;
                $sup->save();
            }
        }
        $purchase->union_id = $shop->union_id;
        $purchase->shop_id = $fcart->shop_id;
        $purchase->shops = Auth::user()->shop->id;
        $purchase->district_id = $shop->district_id;
        $purchase->thana_id = $shop->thana_id;
        if($purchase->save()){

            foreach($cart as $test){
                Lol::where('id', $test->id)->delete();
            }

            Toastr::success('Order Placed', '', ['progressBar' => true, 'closeButton' => true, 'positionClass' => 'toast-top-right']);
            return redirect()->route('dashboard');
        } else {
            Toastr::error('Something Went Wrong', '', ['progressBar' => true, 'closeButton' => true, 'positionClass' => 'toast-top-right']);
            return redirect()->back();
        }


    }
    public function cart($id, $shop){



        Lol::where('shop_id', '!=', $shop)->delete();

        $cart = Lol::where('user_id', Auth::user()->id)->where('medicine_id', $id)->where('shop_id', $shop)->first();
        $medicine = Medicine::find($id);
        if($cart != null){
            $cart->qty += 1;
            $cart->price == $medicine->price;
            $cart->save();
        } else {

            $new = new Lol();
            $new->shop_id = $shop;
            $new->medicine_id = $id;
            $new->price = $medicine->price;
            $new->qty = 1;
            $new->user_id = Auth::user()->id;
            $new->save();
        }
        Toastr::success('Cart Added', '', ['progressBar' => true, 'closeButton' => true, 'positionClass' => 'toast-top-right']);
        return redirect()->back();

    }

    public function addtrx(Request $request, $id){
        $invoice = Invoice::where('id', $id)->first();

        if($request->amount>$invoice->due_price){
            Toastr::error('Amount Can Not Be Bigger Then Due', '', ['progressBar' => true, 'closeButton' => true, 'positionClass' => 'toast-top-right']);
            return redirect()->back();
        }


        if ($request->isMethod('post')) {
            $pays = new InvoicePay();
            $pays->invoice_id = $id;
            $pays->shop_id = Auth::user()->shop_id;
            $pays->amount = $request->amount;
            $pays->method_id = $request->method;
            if($pays->save()){
                $invoice->due_price -=   $request->amount;
                $invoice->save();

                $invoice = Customer::where('id', $invoice->customer_id)->first();
                $invoice->due -= $request->amount;
                $invoice->save();

                $method = Method::where('id', $request->method)->first();
                $method->balance -= $request->amount;
                $method->save();
                Toastr::success('Payment Add Done', '', ['progressBar' => true, 'closeButton' => true, 'positionClass' => 'toast-top-right']);
                return redirect()->route('invoice.trx', $id);
            }
        }


        return view('invoice.addtrx', compact('invoice'));

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
            $customer->shop_id = Auth::user()->shop_id;
            $customer->district_id = Auth::user()->shop->district_id;
            $customer->thana_id = Auth::user()->shop->thana_id;
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
        $customer = Invoice::where('shop_id', Auth::user()->shop_id)->where('id', $id)->firstOrFail();

        if($customer->delete()){
            Toastr::success('Customer successfully Deleted', '', ['progressBar' => true, 'closeButton' => true, 'positionClass' => 'toast-top-right']);
            return redirect()->route('invoice.reports');
        } else {
            Toastr::error('Something Went Wrong', '', ['progressBar' => true, 'closeButton' => true, 'positionClass' => 'toast-top-right']);
            return redirect()->route('invoice.reports');
        }

    }


    public function view(Request $request, $id)
    {
        $data['invoice'] = Invoice::where('shop_id', Auth::user()->shop_id)->where('id', $id)->firstOrFail();
        $data['transaction'] = InvoicePay::where('invoice_id', $id)->get();
        return view('invoice.view')->with($data);
    }

    public function return_invoce_view(Request $request, $id)
    {
        $returns = Returns::findOrFail($id);
        $data['invoice'] = Invoice::where('shop_id', Auth::user()->shop_id)->where('id', $returns->inv_id)->firstOrFail();
        $data['transaction'] = InvoicePay::where('invoice_id', $id)->get();
        $data['returns'] = $returns;
        return view('invoice.return_invoice_view')->with($data);
    }

    public function print(Request $request, $id)
    {
        $data['invoice'] = Invoice::where('shop_id', Auth::user()->shop_id)->where('id', $id)->firstOrFail();
        $data['transaction'] = InvoicePay::where('invoice_id', $id)->get();
        return view('invoice.print')->with($data);
    }

    public function returnInvoicePrint(Request $request, $id)
    {
        $returns = Returns::findOrFail($id);
        $data['invoice'] = Invoice::where('shop_id', Auth::user()->shop_id)->where('id', $returns->inv_id)->firstOrFail();
        $data['transaction'] = InvoicePay::where('invoice_id', $id)->get();
        $data['returns'] = $returns;
        return view('invoice.return_invoice')->with($data);

    }

    public function pdf(Request $request, $id)
    {
        // $data['invoice'] = Invoice::where('shop_id', Auth::user()->shop_id)->where('id', $id)->firstOrFail();
        // $data['transaction'] = InvoicePay::where('invoice_id', $id)->get();

        // $pdf = public_path('pdf/invoice_'.$id.'.pdf');
        // // $pdf = 'pharmacyss.com/public/pdf/invoice_'.$id.'.pdf';
        // //return $pdf;
        //  $connector = new FilePrintConnector("php://stdout");
        // $printer = new Printer($connector);
        // try {
        //     $pages = ImagickEscposImage::loadPdf($pdf);
        //     // dd($pages);
        //     foreach ($pages as $page) {
        //         $printer->graphics($page);
        //     }
        //      $printer -> cut();
        //     } catch (Exception $e) {
        //         /*
        //     	 * loadPdf() throws exceptions if files or not found, or you don't have the
        //     	 * imagick extension to read PDF's
        //     	 */
        //         echo $e -> getMessage() . "\n";
        //     } finally {
        //     $printer -> close();
        // }
        $connector = new FilePrintConnector("php://stdout");
        $printer = new Printer($connector);
        $printer -> text("Hello World!\n");
        $printer -> cut();
        $printer -> close();
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


    public function return_history(Request $request){
        if ($request->ajax()) {
            $data = Returns::select('*')->where('shop_id', Auth::user()->shop_id)->latest('id')->orderBy('id','DESC');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('view', function($row){
                    return '<a href="'.route('invoice.return_invoice.view', $row->id).'" class="badge bg-primary">View Invoice</a>';
                })
                ->rawColumns(['view'])
                ->make(true);
        }
        return view('invoice.returns');
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

    public function ecommerce(Request $request){
        $result = false;
        $shop = Shop::where('username', 'ashtha')->first();
        if ($request->filled('shop')) {
            $shop = Shop::where(function($q) use($request) {
                $q->where('name', 'like', '%' . $request->shop . '%')
                    ->orWhere('username', 'like', '%' . $request->shop . '%');
            })->where('thana_id', Auth::user()->shop->thana_id)->first();
            if ($shop != null){
                $result = true;
                $medicine = Medicine::where('hot', 1)->where(function($q) use($shop) {
                    $q->where('shop_id', $shop->id)
                        ->orWhere('global', 1);
                })->orderBy('created_at','desc')->paginate(18);
                return view('ecommerce', compact('result','medicine', 'shop'));
            }

        }
        $medicine = Medicine::where('shop_id', 0)->paginate(16);
        return view('ecommerce', compact('result','medicine','shop'));
    }
}

<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Prescription;
use App\Models\Customer;
use App\Models\Doctor;
use Brian2694\Toastr\Facades\Toastr;
use Yajra\DataTables\DataTables;
class PrescriptionController extends Controller
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
    public function add(Request $request)
    {
        if ($request->isMethod('post')) {
            
            $custom = Leaf::where('name', $request->name)->where('shop_id', Auth::user()->shop_id)->first();
            
            if($custom != null){
                Toastr::error('Leaf Exists Already', '', ['progressBar' => true, 'closeButton' => true, 'positionClass' => 'toast-top-right']);
            }
            $customer = new Prescription();
            $customer->name = $request->name;
            $customer->amount = $request->qty;
            $customer->shop_id = Auth::user()->shop_id;
            if($customer->save()){
                Toastr::success('Leaf successfully created', '', ['progressBar' => true, 'closeButton' => true, 'positionClass' => 'toast-top-right']);
               return redirect()->route('prescrive.list');
            } else {
                Toastr::error('Something Went Wrong', '', ['progressBar' => true, 'closeButton' => true, 'positionClass' => 'toast-top-right']);
               return redirect()->route('prescrive.list');
            }
        } else {
            
            return view('leaf.add');
        }
    }
    
    public function view($id){
        $pres = Prescription::findorFail($id);
        return view('prescrive.view', compact('pres'));
        
        
    }
    
    public function data($id){
        $pres = Prescription::findorFail($id);
        return view('prescrive.data', compact('pres'));
        
        
    }
    
    public function userinfo($id)
    {
        $customer = Customer::where('shop_id', Auth::user()->shop_id)->where('phone', $id)->first();
        $data = [];
        if($customer != null){
            $data['patient_id'] = $customer->id;
            $data['full_name'] = $customer->name;
            $data['phone'] = $customer->phone;
            $data['age'] = $customer->age;
            return json_encode($data);
        } else {
            return 'null';
        }
        
    }
    
    public function edit(Request $request, $id)
    {
        $customer = Prescription::where('shop_id', Auth::user()->shop_id)->where('id', $id)->firstOrFail();
        if ($request->isMethod('post')) {          
            $customer->name = $request->name;
            $customer->amount = $request->qty;
            if($customer->save()){
                Toastr::success('Leaf successfully created', '', ['progressBar' => true, 'closeButton' => true, 'positionClass' => 'toast-top-right']);
                return redirect()->route('prescrive.list');
            } else {
                Toastr::error('Something Went Wrong', '', ['progressBar' => true, 'closeButton' => true, 'positionClass' => 'toast-top-right']);
                return redirect()->route('prescrive.list');
            }
        } else {
            
            return view('leaf.edit', compact('customer'));
        }
    }
    
    
     public function delete(Request $request, $id)
    {
        $customer = Prescription::where('shop_id', Auth::user()->shop_id)->where('id', $id)->firstOrFail();

        if($customer->delete()){
               Toastr::success('Leaf successfully Deleted', '', ['progressBar' => true, 'closeButton' => true, 'positionClass' => 'toast-top-right']);
            return redirect()->route('prescrive.list');
        } else {
            Toastr::error('Something Went Wrong', '', ['progressBar' => true, 'closeButton' => true, 'positionClass' => 'toast-top-right']);
            return redirect()->route('prescrive.list');
        }

    }
    
     public function pop(Request $request)
    {
        
        if ($request->isMethod('post')) {
           // return print_r($request->all());
            
            $visitor = Customer::where('shop_id', Auth::user()->shop_id)->where('phone', $request->phone)->first();
            
            if($visitor != null){
                $pcustomer = $visitor->id;
            } else {
                $customer = new Customer();
                $customer->name = $request->name;
                $customer->phone = $request->phone;
                $customer->address = '';
                $customer->gender = $request->gender;
                $customer->shop_id = Auth::user()->shop_id;
                $customer->thana_id = Auth::user()->shop->thana_id;
                $customer->district_id = Auth::user()->shop->district_id;
                $customer->save();   
                $pcustomer = $customer->id;
            }
            $sample = array();
            if(isset($request->drugs)){
                for($z=0; $z<count($request->drugs); $z++){
                    $sample[]=array($request->drugs[$z],$request->instruction[$z],$request->days[$z]);
                }
            }
            $pres = new Prescription();
            $pres->date = date('Y-m-d');
            $pres->customer_id = $pcustomer;
            $pres->doctor_id = $request->referred_to;
            $pres->des = $request->disease;
            $pres->advice = $request->advice;
            $pres->medicines = json_encode($sample);
            $pres->tests = json_encode($request->diag_test);
            $pres->visiting_fee = $request->visiting_fee;
            $pres->des = $request->des;
            $pres->shop_id = Auth::user()->shop_id;
            $pres->inv_no = $request->prescription_number;
            if($pres->save()){
                return redirect()->route('prescrive.list');
            }
        }
        $offerNo = Prescription::where('shop_id', Auth::user()->shop_id)->count();
        $data['visit_no'] = Prescription::where('shop_id', Auth::user()->shop_id)->where('date', date('Y-m-d'))->count();
        $data['inv_id'] = uniqueOrderId($offerNo, Auth::user()->shop->prefix, 'prescriptions', 'inv_no');
        $data['doctors'] = Doctor::where('shop_id', Auth::user()->shop_id)->get();
        return view('prescrive.pop')->with($data);
    }
    
    
    public function index(Request $request)
    {
        
         if ($request->ajax()) {
            $data = Prescription::select('*')->where('shop_id', Auth::user()->shop_id)->latest();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('customer', function($row){
                        $customer = Customer::where('id', $row->customer_id)->first();
                        if($customer != null){
                        return $customer->name;
                        } else {
                            return '';
                        }
                    })
                    ->addColumn('doctor', function($row){
                        $customer = Doctor::where('id', $row->doctor_id)->first();
                        if($customer != null){
                        return $customer->name;
                        } else {
                            return '';
                        }
                    })
                    ->addColumn('action', function($row){
                        if($row->global != 1){
                           return '<a href="'.route('prescrive.data', $row->id).'" target="_blank"><i class="fa fa-print"></i></a>
                       <a onclick="return confirm(\'Are you sure?\')" href="'.route('prescrive.delete', $row->id).'" class="badge bg-danger"><i class="fas fa-trash"></i></a>';
                        }
      
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
    
    return view('prescrive.list');
    }
}

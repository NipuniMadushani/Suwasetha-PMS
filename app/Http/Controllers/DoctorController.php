<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Invoice;
use App\Models\InvoicePay;
use Brian2694\Toastr\Facades\Toastr;
use Yajra\DataTables\DataTables;
class DoctorController extends Controller
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
            
            $custom = Doctor::where('phone', $request->phone)->where('shop_id', Auth::user()->shop_id)->first();
            
            if($custom != null){
                Toastr::error('Doctor Existes With Given Phone Number', '', ['progressBar' => true, 'closeButton' => true, 'positionClass' => 'toast-top-right']);
            }
            $customer = new Doctor();
            $customer->name = $request->name;
            $customer->phone = $request->phone;
            $customer->hospital = $request->hospital;
            $customer->address = $request->address;
            $customer->title = $request->title;
            $customer->shop_id = Auth::user()->shop_id;
            $customer->speciality = $request->speciality;
            
            if($customer->save()){
                   Toastr::success('Doctor successfully created', '', ['progressBar' => true, 'closeButton' => true, 'positionClass' => 'toast-top-right']);
                return redirect()->route('doctor.list');
            } else {
                Toastr::error('Something Went Wrong', '', ['progressBar' => true, 'closeButton' => true, 'positionClass' => 'toast-top-right']);
                return redirect()->route('doctor.list');
            }
        } else {
            
            return view('doctor.add');
        }
    }
    
    
    
    
    public function edit(Request $request, $id)
    {
        $customer = Doctor::where('shop_id', Auth::user()->shop_id)->where('id', $id)->firstOrFail();
        if ($request->isMethod('post')) {
            
           
          
           $customer->name = $request->name;
            $customer->phone = $request->phone;
            $customer->hospital = $request->hospital;
            $customer->address = $request->address;
            $customer->speciality = $request->speciality;
            $customer->title = $request->title;
            if($customer->save()){
                   Toastr::success('Doctor successfully created', '', ['progressBar' => true, 'closeButton' => true, 'positionClass' => 'toast-top-right']);
                return redirect()->route('doctor.list');
            } else {
                Toastr::error('Something Went Wrong', '', ['progressBar' => true, 'closeButton' => true, 'positionClass' => 'toast-top-right']);
                return redirect()->route('doctor.list');
            }
        } else {
            
            return view('doctor.edit', compact('customer'));
        }
    }
    
    
     public function delete(Request $request, $id)
    {
        $customer = Doctor::where('shop_id', Auth::user()->shop_id)->where('id', $id)->firstOrFail();

        if($customer->delete()){
               Toastr::success('Doctor successfully Deleted', '', ['progressBar' => true, 'closeButton' => true, 'positionClass' => 'toast-top-right']);
            return redirect()->route('doctor.list');
        } else {
            Toastr::error('Something Went Wrong', '', ['progressBar' => true, 'closeButton' => true, 'positionClass' => 'toast-top-right']);
            return redirect()->route('doctor.list');
        }

    }
    
    
     
    public function index(Request $request)
    {
        
         if ($request->ajax()) {
            $data = Doctor::select('*')->where('shop_id', Auth::user()->shop_id)->latest();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        return '<a href="'.route('doctor.edit', $row->id).'" class="badge bg-primary"><i class="fas fa-edit"></i></a><a onclick="return confirm(\'Are you sure?\')" href="'.route('doctor.delete', $row->id).'" class="badge bg-danger"><i class="fas fa-trash"></i></a>';
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        $customer = Doctor::where('shop_id', Auth::user()->shop_id)->get();
        
        return view('doctor.list', compact('customer'));
    }
}

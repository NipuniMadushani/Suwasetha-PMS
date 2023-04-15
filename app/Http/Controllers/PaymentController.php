<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Method;
use App\Models\Medicine;
use Brian2694\Toastr\Facades\Toastr;
use Yajra\DataTables\DataTables;
class PaymentController extends Controller
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
            $custom = Method::where('name', $request->name)->where('shop_id', Auth::user()->shop_id)->first();
            
            if($custom != null){
                Toastr::error('Method Exists Already', '', ['progressBar' => true, 'closeButton' => true, 'positionClass' => 'toast-top-right']);
            }
            $customer = new Method();
            $customer->name = $request->name;
            $customer->balance = $request->balance;
            $customer->shop_id = Auth::user()->shop_id;
            if($customer->save()){
                Toastr::success('Method successfully created', '', ['progressBar' => true, 'closeButton' => true, 'positionClass' => 'toast-top-right']);
                return redirect()->route('payment.method');
            } else {
                Toastr::error('Something Went Wrong', '', ['progressBar' => true, 'closeButton' => true, 'positionClass' => 'toast-top-right']);
                return redirect()->route('payment.method');
            }
        } else {
            return view('method.add');
        }
    }
    
    
    
    
   
    
    
     public function delete(Request $request, $id)
    {
        $customer = Method::where('shop_id', Auth::user()->shop_id)->where('id', $id)->firstOrFail();

        if($customer->delete()){
               Toastr::success('Method successfully Deleted', '', ['progressBar' => true, 'closeButton' => true, 'positionClass' => 'toast-top-right']);
            return redirect()->route('payment.method');
        } else {
            Toastr::error('Something Went Wrong', '', ['progressBar' => true, 'closeButton' => true, 'positionClass' => 'toast-top-right']);
            return redirect()->route('payment.method');
        }

    }
    
    
    
    
    public function method(Request $request)
    {
        
         if ($request->ajax()) {
            $data = Method::select('*')->where('shop_id', Auth::user()->shop_id)->latest();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                           return ' <a onclick="return confirm(\'Are you sure?\')" href="'.route('payment.delete', $row->id).'" class="badge bg-danger"><i class="fas fa-trash"></i></a>';
      
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
   
    return view('method.list');
    }
}

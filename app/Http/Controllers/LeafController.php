<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Leaf;
use Brian2694\Toastr\Facades\Toastr;
use Yajra\DataTables\DataTables;
class LeafController extends Controller
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
            $customer = new Leaf();
            $customer->name = $request->name;
            $customer->amount = $request->qty;
            $customer->shop_id = Auth::user()->shop_id;
            if($customer->save()){
                Toastr::success('Leaf successfully created', '', ['progressBar' => true, 'closeButton' => true, 'positionClass' => 'toast-top-right']);
                return redirect()->route('leaf');
            } else {
                Toastr::error('Something Went Wrong', '', ['progressBar' => true, 'closeButton' => true, 'positionClass' => 'toast-top-right']);
                return redirect()->route('leaf');
            }
        } else {
            
            return view('leaf.add');
        }
    }
    
    
    
    
    public function edit(Request $request, $id)
    {
        $customer = Leaf::where('shop_id', Auth::user()->shop_id)->where('id', $id)->firstOrFail();
        if ($request->isMethod('post')) {          
            $customer->name = $request->name;
            $customer->amount = $request->qty;
            if($customer->save()){
                Toastr::success('Leaf successfully created', '', ['progressBar' => true, 'closeButton' => true, 'positionClass' => 'toast-top-right']);
                return redirect()->route('leaf');
            } else {
                Toastr::error('Something Went Wrong', '', ['progressBar' => true, 'closeButton' => true, 'positionClass' => 'toast-top-right']);
                return redirect()->route('leaf');
            }
        } else {
            
            return view('leaf.edit', compact('customer'));
        }
    }
    
    
     public function delete(Request $request, $id)
    {
        $customer = Leaf::where('shop_id', Auth::user()->shop_id)->where('id', $id)->firstOrFail();

        if($customer->delete()){
               Toastr::success('Leaf successfully Deleted', '', ['progressBar' => true, 'closeButton' => true, 'positionClass' => 'toast-top-right']);
            return redirect()->route('leaf');
        } else {
            Toastr::error('Something Went Wrong', '', ['progressBar' => true, 'closeButton' => true, 'positionClass' => 'toast-top-right']);
            return redirect()->route('leaf');
        }

    }
    
    
    
    
    public function leaf(Request $request)
    {
        
         if ($request->ajax()) {
            $data = Leaf::select('*')->where('shop_id', Auth::user()->shop_id)->orWhere('global', 1)->latest();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        if($row->global != 1){
                           return '<a href="'.route('leaf.edit', $row->id).'" class="badge bg-primary"><i class="fas fa-edit"></i></a><a onclick="return confirm(\'Are you sure?\')" href="'.route('leaf.delete', $row->id).'" class="badge bg-danger"><i class="fas fa-trash"></i></a>';
                        }
      
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
    $category = Leaf::where('shop_id', Auth::user()->shop_id)->get();
    
    return view('leaf.list', compact('category'));
    }
}

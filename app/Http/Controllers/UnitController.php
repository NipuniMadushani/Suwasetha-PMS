<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Unit;
use Brian2694\Toastr\Facades\Toastr;
use Yajra\DataTables\DataTables;
class UnitController extends Controller
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
            $custom = Unit::where('name', $request->name)->where('shop_id', Auth::user()->shop_id)->first();
            
            if($custom != null){
                Toastr::error('Unit Exists Already', '', ['progressBar' => true, 'closeButton' => true, 'positionClass' => 'toast-top-right']);
            }
            $customer = new Unit();
            $customer->name = $request->name;
            $customer->shop_id = Auth::user()->shop_id;
            if($customer->save()){
                Toastr::success('Unit successfully created', '', ['progressBar' => true, 'closeButton' => true, 'positionClass' => 'toast-top-right']);
                return redirect()->route('units');
            } else {
                Toastr::error('Something Went Wrong', '', ['progressBar' => true, 'closeButton' => true, 'positionClass' => 'toast-top-right']);
                return redirect()->route('units');
            }
        } else {
            
            return view('unit.add');
        }
    }
    
    
    
    
    public function edit(Request $request, $id)
    {
        $customer = Unit::where('shop_id', Auth::user()->shop_id)->where('id', $id)->firstOrFail();
        if ($request->isMethod('post')) {
            
            $customer->name = $request->name;
           
            if($customer->save()){
                   Toastr::success('Units successfully created', '', ['progressBar' => true, 'closeButton' => true, 'positionClass' => 'toast-top-right']);
                return redirect()->route('units');
            } else {
                Toastr::error('Something Went Wrong', '', ['progressBar' => true, 'closeButton' => true, 'positionClass' => 'toast-top-right']);
                return redirect()->route('units');
            }
        } else {
            
            return view('unit.edit', compact('customer'));
        }
    }
    
    
     public function delete(Request $request, $id)
    {
        $customer = Unit::where('shop_id', Auth::user()->shop_id)->where('id', $id)->firstOrFail();

    if($customer->delete()){
           Toastr::success('Unit successfully Deleted', '', ['progressBar' => true, 'closeButton' => true, 'positionClass' => 'toast-top-right']);
        return redirect()->route('units');
    } else {
        Toastr::error('Something Went Wrong', '', ['progressBar' => true, 'closeButton' => true, 'positionClass' => 'toast-top-right']);
        return redirect()->route('units');
    }

    }
    
    
    
    
    public function unit(Request $request)
    {
        
         if ($request->ajax()) {
            $data = Unit::select('*')->where('shop_id', Auth::user()->shop_id)->latest();
            return Datatables::of($data)
                    ->addIndexColumn()
                    
                    ->addColumn('action', function($row){
     
                           return '<a href="'.route('unit.edit', $row->id).'" class="badge bg-primary"><i class="fas fa-edit"></i></a> <a onclick="return confirm(\'Are you sure?\')" href="'.route('unit.delete', $row->id).'" class="badge bg-danger"><i class="fas fa-trash"></i></a>';
      
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
    $category = Unit::where('shop_id', Auth::user()->shop_id)->get();
    
    return view('unit.list', compact('category'));
    }
}

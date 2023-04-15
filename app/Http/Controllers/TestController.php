<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Test;
use Brian2694\Toastr\Facades\Toastr;
use Yajra\DataTables\DataTables;
class TestController extends Controller
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
            
            $custom = Test::where('name', $request->name)->where('shop_id', Auth::user()->shop_id)->first();
            
            if($custom != null){
                Toastr::error('Category Exists Already', '', ['progressBar' => true, 'closeButton' => true, 'positionClass' => 'toast-top-right']);
            }
            $customer = new Test();
            $customer->name = $request->name;
            $customer->center = $request->center;
            $customer->shop_id = Auth::user()->shop_id;
            if($customer->save()){
                   Toastr::success('Diagonosis successfully created', '', ['progressBar' => true, 'closeButton' => true, 'positionClass' => 'toast-top-right']);
                return redirect()->route('test.list');
            } else {
                Toastr::error('Something Went Wrong', '', ['progressBar' => true, 'closeButton' => true, 'positionClass' => 'toast-top-right']);
                return redirect()->route('test.list');
            }
        } else {
            
            return view('test.add');
        }
    }
    
    
    
    
    public function edit(Request $request, $id)
    {
        $customer = Test::where('shop_id', Auth::user()->shop_id)->where('id', $id)->firstOrFail();
        if ($request->isMethod('post')) {
            $customer->name = $request->name;
             $customer->center = $request->center;
            if($customer->save()){
                   Toastr::success('Diagonosis successfully created', '', ['progressBar' => true, 'closeButton' => true, 'positionClass' => 'toast-top-right']);
                return redirect()->route('test.list');
            } else {
                Toastr::error('Something Went Wrong', '', ['progressBar' => true, 'closeButton' => true, 'positionClass' => 'toast-top-right']);
                return redirect()->route('test.list');
            }
        } else {
            
            return view('test.edit', compact('customer'));
        }
    }
    
    
     public function delete(Request $request, $id)
    {
        $customer = Test::where('shop_id', Auth::user()->shop_id)->where('id', $id)->firstOrFail();

        if($customer->delete()){
               Toastr::success('Diagonosis successfully Deleted', '', ['progressBar' => true, 'closeButton' => true, 'positionClass' => 'toast-top-right']);
            return redirect()->route('test.list');
        } else {
            Toastr::error('Something Went Wrong', '', ['progressBar' => true, 'closeButton' => true, 'positionClass' => 'toast-top-right']);
            return redirect()->route('test.list');
        }

    }
    
    
    
    
    public function index(Request $request)
    {
        
         if ($request->ajax()) {
            $data = Test::select('*')->where('shop_id', Auth::user()->shop_id)->latest();
            return Datatables::of($data)
                    ->addIndexColumn()
                    
                    ->addColumn('action', function($row){
                    if($row->global != 1){
                   return '<a href="'.route('test.edit', $row->id).'" class="badge bg-primary"><i class="fas fa-edit"></i></a>  <a onclick="return confirm(\'Are you sure?\')" href="'.route('test.delete', $row->id).'" class="badge bg-danger"><i class="fas fa-trash"></i></a>';
                    }
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
    $category = Test::where('shop_id', Auth::user()->shop_id)->get();
    
    return view('test.list', compact('category'));
    }
}

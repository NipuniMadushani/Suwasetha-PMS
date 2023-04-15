<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Medicine;
use Brian2694\Toastr\Facades\Toastr;
use Yajra\DataTables\DataTables;
class CategoryController extends Controller
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
            
            $custom = Category::where('name', $request->name)->where('shop_id', Auth::user()->shop_id)->first();
            
            if($custom != null){
                Toastr::error('Category Exists Already', '', ['progressBar' => true, 'closeButton' => true, 'positionClass' => 'toast-top-right']);
            }
            $customer = new Category();
            $customer->name = $request->name;
            $customer->shop_id = Auth::user()->shop_id;
            if($customer->save()){
                   Toastr::success('Customer successfully created', '', ['progressBar' => true, 'closeButton' => true, 'positionClass' => 'toast-top-right']);
                return redirect()->route('category');
            } else {
                Toastr::error('Something Went Wrong', '', ['progressBar' => true, 'closeButton' => true, 'positionClass' => 'toast-top-right']);
                return redirect()->route('category');
            }
        } else {
            
            return view('category.add');
        }
    }
    
    
    
    
    public function edit(Request $request, $id)
    {
        $customer = Category::where('shop_id', Auth::user()->shop_id)->where('id', $id)->firstOrFail();
        if ($request->isMethod('post')) {
            $customer->name = $request->name;
           
            if($customer->save()){
                   Toastr::success('Category successfully created', '', ['progressBar' => true, 'closeButton' => true, 'positionClass' => 'toast-top-right']);
                return redirect()->route('category');
            } else {
                Toastr::error('Something Went Wrong', '', ['progressBar' => true, 'closeButton' => true, 'positionClass' => 'toast-top-right']);
                return redirect()->route('category');
            }
        } else {
            
            return view('category.edit', compact('customer'));
        }
    }
    
    
     public function delete(Request $request, $id)
    {
        $customer = Category::where('shop_id', Auth::user()->shop_id)->where('id', $id)->firstOrFail();

        if($customer->delete()){
               Toastr::success('Customer successfully Deleted', '', ['progressBar' => true, 'closeButton' => true, 'positionClass' => 'toast-top-right']);
            return redirect()->route('category');
        } else {
            Toastr::error('Something Went Wrong', '', ['progressBar' => true, 'closeButton' => true, 'positionClass' => 'toast-top-right']);
            return redirect()->route('category');
        }

    }
    
    
    
    
    public function categories(Request $request)
    {
        
         if ($request->ajax()) {
            $data = Category::select('*')->where('shop_id', Auth::user()->shop_id)->orWhere('global', 1)->latest();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('medicine', function($row){
                    return Medicine::where('category_id', $row->id)->count();
                         
      
                    })
                    ->addColumn('action', function($row){
                    if($row->global != 1){
                   return '<a href="'.route('category.edit', $row->id).'" class="badge bg-primary"><i class="fas fa-edit"></i></a> <a onclick="return confirm(\'Are you sure?\')" href="'.route('category.delete', $row->id).'" class="badge bg-danger"><i class="fas fa-trash"></i></a>';
                    }
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
    $category = Category::where('shop_id', Auth::user()->shop_id)->get();
    
    return view('category.list', compact('category'));
    }
}

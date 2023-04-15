<?php

namespace App\Http\Controllers;

use App\Models\Balance;
use App\Models\Medicine;
use App\Models\Vendor;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class VendorController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Vendor::where('shop_id', Auth::user()->shop_id)->orderBy('id','DESC');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    if ($row->global != 1) {
                        return '<a href="' . route('vendor.edit', $row->id) . '" class="badge bg-primary"><i class="fas fa-edit"></i></a> <a onclick="return confirm(\'Are you sure?\')" href="' . route('vendor.destroy', $row->id) . '" class="badge bg-danger"><i class="fas fa-trash"></i></a>';
                    } else {
                        return '<a href="' . route('vendor.show', $row->id) . '" class="badge bg-info"><i class="fas fa-eye"></i></a> ';
                    }
                })
                ->addColumn('medicine', function ($row) {
                    return Medicine::where('vendor_id', $row->id)->count();
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $vendors = Vendor::where('shop_id', Auth::user()->shop_id)->get();
        return view('vendor.list', compact('vendors'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vendor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);
        $data = $request->all();
        $data['name'] = $request->name;
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;
        $data['due'] = $request->due;
        $data['payable'] = $request->payable;
        $data['thana_id'] = Auth::user()->shop->thana_id;
        $data['shop_id'] = Auth::user()->shop_id;
        $data['district_id'] = Auth::user()->shop->district_id;
        
        $res = Vendor::create($data);
        if ($res) {
            Toastr::success('Vendor successfully created', '', ['progressBar' => true, 'closeButton' => true, 'positionClass' => 'toast-top-right']);
            return redirect()->route('vendor.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Vendor $vendor
     * @return \Illuminate\Http\Response
     */
    public function show(Vendor $vendor)
    {
        $res = $vendor->delete();
        if ($res) {
            Toastr::success('Vendor successfully deleted', '', ['progressBar' => true, 'closeButton' => true, 'positionClass' => 'toast-top-right']);
            return redirect()->route('vendor.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Vendor $vendor
     * @return \Illuminate\Http\Response
     */
    public function edit(Vendor $vendor)
    {
        return view('vendor.edit', compact('vendor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Vendor $vendor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vendor $vendor)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required'
        ]);
        $data = $request->all();
        $res = $vendor->update($data);
        if ($res) {
            Toastr::success('Vendor successfully updated', '', ['progressBar' => true, 'closeButton' => true, 'positionClass' => 'toast-top-right']);
            return redirect()->route('vendor.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Vendor $vendor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vendor $vendor)
    {
        dd($vendor);
    }
}

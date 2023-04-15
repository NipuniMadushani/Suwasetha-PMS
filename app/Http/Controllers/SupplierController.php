<?php

namespace App\Http\Controllers;

use App\Models\Balance;
use App\Models\Batch;
use App\Models\Medicine;
use App\Models\Purchase;
use App\Models\PurchasePay;
use App\Models\Supplier;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class SupplierController extends Controller
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
            $custom = Supplier::where('phone', $request->phone)->where('shop_id', Auth::user()->shop_id)->first();
            if ($custom != null) {
                Toastr::error('Manufactures Existes With Given Phone Number', '', ['progressBar' => true, 'closeButton' => true, 'positionClass' => 'toast-top-right']);
            }
            $customer = new Supplier();
            $customer->name = $request->name;
            $customer->phone = $request->phone;
            $customer->address = $request->address;
            if ($request->filled('due')) {
                $customer->due = $request->due;
            }
            $customer->shop_id = Auth::user()->shop_id;
            $customer->upazilla_id = Auth::user()->shop->upazilla_id;
            $customer->thana_id = Auth::user()->shop->thana_id;
            if ($customer->save()) {
                Toastr::success('Supplier successfully created', '', ['progressBar' => true, 'closeButton' => true, 'positionClass' => 'toast-top-right']);
                return redirect()->route('supplier.list');
            } else {
                Toastr::error('Something Went Wrong', '', ['progressBar' => true, 'closeButton' => true, 'positionClass' => 'toast-top-right']);
                return redirect()->route('supplier.list');
            }
        } else {

            return view('supplier.add');
        }
    }


    public function edit(Request $request, $id)
    {
        $customer = Supplier::where('shop_id', Auth::user()->shop_id)->where('id', $id)->firstOrFail();
        if ($request->isMethod('post')) {
            $customer->name = $request->name;
            $customer->phone = $request->phone;
            $customer->address = $request->address;
            if ($request->filled('due')) {
                $customer->due = $request->due;
            }
            $customer->thana_id = Auth::user()->shop->thana_id;
            $customer->shop_id = Auth::user()->shop_id;
            $customer->district_id = Auth::user()->shop->district_id;
            if ($customer->save()) {
                Toastr::success('Supplier successfully created', '', ['progressBar' => true, 'closeButton' => true, 'positionClass' => 'toast-top-right']);
                return redirect()->route('supplier.list');
            } else {
                Toastr::error('Something Went Wrong', '', ['progressBar' => true, 'closeButton' => true, 'positionClass' => 'toast-top-right']);
                return redirect()->route('supplier.list');
            }
        } else {

            return view('supplier.edit', compact('customer'));
        }
    }


    public function delete(Request $request, $id)
    {
        $customer = Supplier::where('shop_id', Auth::user()->shop_id)->where('id', $id)->firstOrFail();

        if ($customer->delete()) {
            Toastr::success('Supplier successfully Deleted', '', ['progressBar' => true, 'closeButton' => true, 'positionClass' => 'toast-top-right']);
            return redirect()->route('supplier.list');
        } else {
            Toastr::error('Something Went Wrong', '', ['progressBar' => true, 'closeButton' => true, 'positionClass' => 'toast-top-right']);
            return redirect()->route('supplier.list');
        }

    }


    public function view(Request $request, $id)
    {
        $data['customer'] = Supplier::where(function ($q) {
            $q->where('shop_id', Auth::user()->shop_id)
                ->orWhere('global', 1);
        })->where('id', $id)->firstOrFail();

        if ($request->ajax()) {

            if ($request->has('purchases')) {
                if ($request->filled('from') && $request->filled('to')) {
                    $data = Purchase::select('id', 'total_price', 'due_price')->where('supplier_id', $id);
                } else {
                    $data = Purchase::select('id', 'total_price', 'due_price')->where('supplier_id', $id)->whereBetween('date', [$request->from, $request->to]);
                }
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {

                        return '<a href="' . route('purchase.view', $row->id) . '" class="badge bg-info"><i class="fas fa-eye"></i></a> <a onclick="return confirm(\'Are you sure?\')" href="' . route('purchase.delete', $row->id) . '" class="badge bg-danger"><i class="fas fa-trash"></i></a>';

                    })
                    ->rawColumns(['action'])
                    ->make(true);

            } else {
                $data = Medicine::select('*')->where('supplier_id', $id);

                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('stock', function ($row) {
                        return Batch::where('medicine_id', $row->id)->sum('qty');
                    })
                    ->addColumn('action', function ($row) {

                        return '<a href="' . route('medicine.edit', $row->id) . '" class="badge bg-primary"><i class="fas fa-pencil"></i></a> <a href="' . route('medicine.view', $row->id) . '" class="badge bg-info"><i class="fas fa-eye"></i></a> <a onclick="return confirm(\'Are you sure?\')" href="' . route('medicine.delete', $row->id) . '" class="badge bg-danger"><i class="fas fa-trash"></i></a>';

                    })
                    ->rawColumns(['action'])
                    ->make(true);

            }
        }

        $data['invoice'] = Purchase::where('shop_id', Auth::user()->shop_id)->where('supplier_id', $id)->get();
        $data['transaction'] = PurchasePay::where('shop_id', Auth::user()->shop_id)->where('supplier_id', $id)->get();
        return view('supplier.view')->with($data);

    }

    public function due(Request $request)
    {

        if ($request->ajax()) {
            $data = Purchase::where('shop_id', Auth::user()->shop_id)->groupBy('supplier_id')->selectRaw('sum(due_price) as sum, supplier_id, id')->having('sum', '>', 0);

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('name', function ($row) {

                    return $row->supplier->name;

                })
                ->addColumn('phone', function ($row) {

                    return $row->supplier->phone;

                })
                ->addColumn('dues', function ($row) {
                    $data = Balance::where('shop_id', Auth::user()->shop_id)->where('supplier_id', $row->id)->sum('due');
                    return $data;
                })
                ->addColumn('address', function ($row) {
                    return $row->supplier->address;
                })
                ->addColumn('action', function ($row) {

                    return ' <a href="' . route('supplier.view', $row->supplier->id) . '" class="badge bg-info"><i class="fas fa-eye"></i></a>';

                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $customer = Supplier::where('shop_id', Auth::user()->shop_id)->get();

        return view('supplier.due', compact('customer'));
    }


    // get city by state
    public function medicine($id = 0)
    {
        $medicine = Medicine::where('shop_id', Auth::user()->shop_id)->where('supplier_id', $id)->orderBy('name', 'asc')->where('status', 1)->get();
        $output = $allmedicine = '';
        if (count($medicine) > 0) {
            $allmedicine .= '<option value="">Select Medicine</option>';
            foreach ($medicine as $medicine) {
                $allmedicine .= '<option value="' . $medicine->id . '">' . $medicine->name . '</option>';
            }
        }
        $output = array('status' => true, 'allmedicine' => $allmedicine);
        return response()->json($output);
    }


    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = Supplier::select('id', 'name', 'address', 'phone', 'due', 'global')
                ->where('shop_id', Auth::user()->shop_id)
                ->orderBy('name', 'asc')->latest();;
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('payable', function ($row) {
                    $balance = Balance::where('shop_id', Auth::user()->shop_id)->where('supplier_id', $row->id)->sum('due');
                    return $balance;
                })
                ->addColumn('action', function ($row) {
                    if ($row->global != 1) {
                        return '<a href="' . route('supplier.edit', $row->id) . '" class="badge bg-primary"><i class="fas fa-edit"></i></a> <a href="' . route('supplier.view', $row->id) . '" class="badge bg-info"><i class="fas fa-eye"></i></a> <a onclick="return confirm(\'Are you sure?\')" href="' . route('supplier.delete', $row->id) . '" class="badge bg-danger"><i class="fas fa-trash"></i></a>';
                    } else {
                        return '<a href="' . route('supplier.view', $row->id) . '" class="badge bg-info"><i class="fas fa-eye"></i></a> ';
                    }
                })
                ->addColumn('medicine', function ($row) {
                    return Medicine::where('supplier_id', $row->id)->count();
                })
                ->rawColumns(['action'])
                ->make(true);
        }
//        $customer = Supplier::where('shop_id', Auth::user()->shop_id)->get();
        return view('supplier.list');
    }
}

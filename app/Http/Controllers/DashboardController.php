<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Medicine;
use App\Models\Batch;
use App\Models\Stock;
use App\Models\Shop;
use App\Models\Income;
use App\Models\Logo;
use App\Models\Invoice;
use App\Models\Purchase;
use App\Models\InvoicePay;
use App\Models\PurchasePay;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Toastr;
use Carbon\Carbon;
class DashboardController extends Controller
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
    public function dashboard()
    {
        $date = date('Y-m-d', time());
        $data['customer'] = Invoice::select('total_price')->where('shop_id', Auth::user()->shop_id)->sum('total_price');
        $data['medicine'] = Batch::where('shop_id', Auth::user()->shop_id)->sum('qty');

        $data['invoice'] = Invoice::where('shop_id', Auth::user()->shop_id)->where('date', $date)->count();
        $data['purchase'] = Purchase::where('shop_id', Auth::user()->shop_id)->where('date', $date)->count();

        $data['invoice_amt'] = Invoice::where('shop_id', Auth::user()->shop_id)->where('date', $date)->sum('total_price');
        $data['purchase_amt'] = Purchase::where('shop_id', Auth::user()->shop_id)->where('date', $date)->sum('total_price');

        $data['received'] = InvoicePay::where('shop_id', Auth::user()->shop_id)->where('date', $date)->sum('amount');
        $data['paid'] = PurchasePay::where('shop_id', Auth::user()->shop_id)->where('date', $date)->sum('amount');

        $data['expire'] = Batch::where('shop_id', Auth::user()->shop_id)->where('expire', '<=', $date)->paginate(10);

        $data['expired_shop'] = Shop::where('next_pay', '<=', $date)->take(8)->get();

        $data['income'] = Income::where('status', 0)->take(8)->get();

        $data['stockout'] = Medicine::where('shop_id', Auth::user()->shop_id)->whereHas('batch', function ($query) {
            $query->where('qty', '<', 1);
        })->paginate(10);

        return view('dashboard')->with($data);
    }




    public function settings(Request $request){

        $shop = Shop::find(Auth::user()->shop_id);
        if ($request->isMethod('post')) {
            $shop->name = $request->name;
            $shop->site_title = $request->site_title;
            $shop->email = $request->email;
            $shop->phone = $request->phone;
            $shop->currency = $request->currency;
            $shop->address = $request->address;
            $shop->prefix = $request->prefix;
            $shop->theme = $request->theme;
            // site logo
            if($request->hasFile('site_logo'))
            {

                $image=$request->file('site_logo');
                $currentDate=Carbon::now()->toDateString();
                $logoimageName=$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
                if(!Storage::disk('public')->exists('images/admin/site_logo'))
                {
                    Storage::disk('public')->makeDirectory('images/admin/site_logo');
                }
                $logoImage = Image::make($image)->resize(100,100)->stream();
                Storage::disk('public')->put('images/admin/site_logo/'.$logoimageName,$logoImage);
                $shop->site_logo=$logoimageName;
            }elseif(!empty($shop->site_logo)){
                $shop->site_logo = $shop->site_logo;
            }
            else{
                $shop->site_logo= "default.png";
            }
            // favicon
            if($request->hasFile('favicon'))
            {

                $image=$request->file('favicon');
                $currentDate=Carbon::now()->toDateString();
                $faviconimageName=$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
                if(!Storage::disk('public')->exists('images/admin/favicon'))
                {
                    Storage::disk('public')->makeDirectory('images/admin/favicon');
                }
                $favImage = Image::make($image)->resize(100,100)->stream();
                Storage::disk('public')->put('images/admin/favicon/'.$faviconimageName,$favImage);
                $shop->favicon=$faviconimageName;
            }elseif(!empty($shop->favicon)){
                $shop->favicon = $shop->favicon;
            }
            else{
                $shop->favicon= "default.png";
            }

            $shop->save();

            Toastr::success('Updated Succesfully', '', ['progressBar' => true, 'closeButton' => true, 'positionClass' => 'toast-top-right']);
            return redirect()->back();

        }
        return view('settings', compact('shop'));
    }

    public function uploadLogo(Request $request){
        $data= New Logo();
        if($request->isMethod('post')){
            Toastr::error('You are in demo mode!','Error!');
            return redirect()->back();
            if($request->hasFile('logo'))
            {
                $image=$request->file('logo');
                $currentDate=Carbon::now()->toDateString();
                $imageName=$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
                if(!Storage::disk('public')->exists('images/admin/banner/'.$data->image))
                {
                    Storage::disk('public')->makeDirectory('images/admin/banner/'.$data->image);
                }
                $logoImage = Image::make($image)->resize(100,100)->stream();
                Storage::disk('public')->put('images/admin/banner/'.$imageName,$logoImage);
                $data->logo=$imageName;
            }else{
                $data->logo= "default.png";
            }
            $data->user_id= Auth::user()->id;
            $data->save();
            Toastr::success('Logo Uploaded!','Success!');
            return redirect()->back();die;
        }
    }
}

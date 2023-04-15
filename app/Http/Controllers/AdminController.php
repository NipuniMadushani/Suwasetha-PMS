<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;


class AdminController extends Controller
{
    public function index(Request $request)
    {
        $admins = User::with('role')->where('shop_id',Auth::user()->shop_id)->where('role_id','>',1)->latest()->get();
        return view('systems.admin.index',compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles  = Role::where('id','!=',1)->get();
        return view('systems.admin.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Mail::to($request->email)->send(new SendMail($request));
        if ($this->validateCheck($request)) {
            $data =  [
                      "shop_id" => $request->shop_id,
                      "role_id" => $request->role_id,
                      "name" => $request->name,
                      "email" => $request->email,
                      "password" => \Hash::make($request->password)
                ];
            $res = User::create($data);

   
            Toastr::success('User created successfully!', '', [ 'toast-top-right']);
            return redirect()->route('admin.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Admin $admin)
    {
    
        if (Auth::guard('admin')->user()->role_id == 1) {
            return User::with('role')->find($admin->id);
        }
        return User::with('role')->find(Auth::guard('admin')->user()->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin $admin
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = User::findOrFail($id);
        $roles  = Role::where('id','!=',1)->get();
       return view('systems.admin.edit',compact('admin','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $admin = User::findOrFail($id);
        $arr = [
            'name'    => $request->name,
            'role_id' => $request->role_id ?? $admin->role_id,
            'email'  => $request->email,
            'password'  => $request->password ? \Hash::make($request->password) : $admin->password,
        ];
        $admin->update($arr);

        Toastr::success('User updated successfully!', '', [ 'toast-top-right']);
        return redirect()->route('admin.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = User::findOrFail($id);
        $res = $admin->delete();
        Toastr::success('User deleted successfully!', '', [ 'toast-top-right']);
        return redirect()->route('admin.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin $admin
     * @return \Illuminate\Http\Response
     */
    public function checkOldPassword(Request $request)
    {
        if (empty($request->for_delete)) {
            if (Auth::guard('admin')->user()->role_id == 1 && Auth::guard('admin')->user()->id != $request->id) {
                return response()->json(true);
            }
        }
        if (Auth::guard('admin')->validate(['password' => $request->old_password, 'id' => $request->id])) {
            return response()->json(true);
        } else {
            return response()->json(false);
        }
    }
    //password change==============
    public function passwordChange(Request $request)
    {
        $request->validate([
            'new_password'     => 'required|min:6|required_with:confirm_password|same:confirm_password',
            'confirm_password' => 'required|min:6',
        ]);
        $password = Hash::make($request->new_password);
        Admin::where('id', $request->id)->update(['password' => $password]);
        return response()->json(['message' => 'Password change successfully!!'], 200);
    }

    /**
     * Validate form field.
     *
     * @return \Illuminate\Http\Response
     */
    public function validateCheck($request)
    {
        return $request->validate([
            'name'     => 'required',
            'email'    => 'required|unique:users',
            'password' => 'required|min:8',
            'role_id'  => 'required',
        ],
        [
            'required' => 'The :attribute field is required.',
            'unique' => 'Email has already been taken,',
            'min' => 'To sort, at least :min characters',
            ]
        );
    }
}
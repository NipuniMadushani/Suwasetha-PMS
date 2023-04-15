<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\Resource;
use App\Models\Permission;
use App\Models\Role;
use App\Models\System\RolePermission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use App\Models\Admin;
use Brian2694\Toastr\Facades\Toastr;
class RoleController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request ) 
    {
        $roles = Role::latest()->get();
        return view('systems.role.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $modules = (new Admin())->modules();
        return view('systems.role.create', compact('modules'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request ) {
        $request->validate( [
            'name'   => 'required|string|max:100|unique:roles',
            'status' => 'required',
        ] );
        $data = [
                "name"  => $request->name,
                "status" => $request->status,
            ];

        $permissions = $request->get( 'permissions' );
        $role = Role::create( $data );
        if ( $role ) {
            if (!empty($permissions)) {
                $permission = [
                    'role_id' => $role->id,
                    'permissions' => json_encode($permissions),
                ];
                Permission::create($permission);
                Toastr::success('Successfully Created!', '', [ 'toast-top-right']);
                return redirect()->route('role.index');
            }
        } else {
            Toastr::success('Opps! Something wrong. Please try again', '', [ 'toast-top-right']);
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show( Request $request, Role $role ) {
        if ( $request->format() == 'html' ) {
            return view( 'layouts.backend_app' );
        }
        $data                = $role;
        $data['permissions'] = $this->getAccessPermissions( $role->id );
        return $data;
    }

    // GET PERMISSIONS
    public function getPermissions() {
        /*create permission*/
        $this->createRolePermission();
        return Permission::with( 'children' )->whereNull( 'parent_id' )->get();
    }

    // GET ACCESS PERMISSIONS
    public function getAccessPermissions( $id ) {
        return RolePermission::where( 'role_id', $id )
            ->pluck( 'permission_id' )->toArray();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit( Role $role )
    {
        $modules = (new Admin())->modules();
        $roleWisePermission = Permission::where('role_id',$role->id)->first();
        $permissions = [];
        if(!empty($roleWisePermission)){
            $permissions = json_decode($roleWisePermission->permissions,true);
        }
        
        return view('systems.role.edit', compact('modules','role','permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, Role $role )
    {
        $request->validate( [
            'name'   => 'required',
            'status' => 'required',
        ]);
        $data = [
                "name"  => $request->name,
                "status" => $request->status,
            ];

        $permissions = $request->get( 'permissions' );
        $role->fill( $data )->save();
        $oldpermissions = Permission::where('role_id',$role->id)->first();
        if(!empty($oldpermissions)){
            $oldpermissions->delete();
        }
        
        if ( $role ) {
            if (!empty($permissions)) {
                $permission = [
                    'role_id' => $role->id,
                    'permissions' => json_encode($permissions),
                ];
                Permission::create($permission);
                Toastr::success('Successfully updated!', '', [ 'toast-top-right']);
                return redirect()->route('role.index');
            }
        } else {
            Toastr::success('Opps! Something wrong. Please try again', '', [ 'toast-top-right']);
            return back();
        }
    }

    // SYSTEM ROLE UPDATE
    public function systemsRoleUpdate() {
        Cache::forget( 'role_pemission_cache' );
        $this->createRolePermission();

        /*===Administrator===*/
        $permissions = Permission::pluck( 'id' );
        $role        = Role::find( 1 );
        $role->permissions()->sync( $permissions );
        /*===Administrator===*/
        return response()->json( ['message' => 'Successfully Updated'], 200 );
    }
    // PERMISSION CREATE FOR ROLE
    private function createRolePermission() {
        $allMenuListInserted = App::make( 'premitedMenuArr' );
        // dd($allMenuListInserted);
        $allRoutes = Route::getRoutes();
        // dd($allRoutes);
        $controllers = [];
        foreach ( $allRoutes as $route ) {
            $action = $route->getAction();
            if ( is_array( $action['middleware'] ) && in_array( 'auth.access', $action['middleware'] ) ) {
                $route                = explode( '.', $action['as'] );
                $controllerActionName = class_basename( $action['controller'] );
                // dd($controllerActionName);

                if ( !in_array( $controllerActionName, $allMenuListInserted ) ) {
                    $controllerAction                                        = explode( '@', $controllerActionName );
                    $controllers[$controllerAction[0]][$controllerAction[1]] = $route[0];
                }
            }
        }
        // dd($controllers);

        foreach ( $controllers as $key => $controller ) {
            $data['name'] = $key;
            $parent       = Permission::firstOrCreate( $data );
            if ( $parent ) {
                $data2['parent_id'] = $parent->id;
                foreach ( $controller as $process => $route ) {
                    $data2['name']  = $process;
                    $data2['route'] = $route . '.' . $process;
                    Permission::firstOrCreate( $data2 );
                }
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function delete($id) {
        $role = Role::findOrFail($id);
        $oldpermissions = Permission::where('role_id',$role->id)->first();
        $oldpermissions->delete();
        
        if ( $role->delete() ) {
                Toastr::error('Deleted Successfully!', '', [ 'toast-top-right']);
                return redirect()->route('role.index');
        } else {
            return response()->json( ['error' => 'Delete Unsuccessfully!'], 200 );
        }
    }
}

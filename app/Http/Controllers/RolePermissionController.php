<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($roleId ,Request $request)
    {

        // $permissions = Permission::all();
        //  return response()->view('cms.spatie.roles.role-permissions', ['permissions' => $permissions]);
        // $permissions = Permission::orderBy("id",'desc');
        $role = Role::where('id',$roleId)->get();
        foreach( $role as $item){

            if($item->guard_name == 'admin'){
                $permissions = Permission::where('guard_name','admin')->orderBy("id",'desc');

            }
            if($item->guard_name == 'trainer'){
                $permissions = Permission::where('guard_name','trainer')->orderBy("id",'desc');

            }
            if($item->guard_name == 'employee'){
                $permissions = Permission::where('guard_name','employee')->orderBy("id",'desc');

            }
            if($item->guard_name == 'student'){
                $permissions = Permission::where('guard_name','student')->orderBy("id",'desc');

            }
        }

        if ($request->get('search')) {
            $moduleIndex = Permission::where('created_at', 'like', '%' . $request->search . '%');
        }

        if ($request->get('name')) {
            $permissions = Permission::where('name', 'like', '%' . $request->name . '%');
        }
        if ($request->get('guard_name')) {
            $permissions = Permission::where('guard_name', 'like', '%' . $request->guard_name . '%');
        }
        if ($request->status != null) {
            $permissions = Permission::where('status', $request->status);
        }
        $permissions=$permissions->get();
        $rolePermissions = Role::findOrFail($roleId)->permissions;

        if (count($rolePermissions) > 0) {
            foreach ($permissions as $permission) {
                $permission->setAttribute('active', false);
                foreach ($rolePermissions as $rolePermission) {
                    if ($rolePermission->id == $permission->id) {
                        $permission->active = true;
                    }
                }
            }
        }

        return response()->view('dashboard.spaite.roles.role-permission', ['roleId' => $roleId, 'permissions' => $permissions ,'permissions'] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function searchPermission(Request $request){

    }
    public function create(Request $request, $roleId)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $roleId)
    {
        //
        $validator = Validator($request->all(), [
            // 'permission_id' => 'required|exists:permissions,id',
        ]);

        if (!$validator->fails()) {
            $role = Role::findOrFail($roleId);
            $permission = Permission::findOrFail($request->get('permission_id'));

            if ($role->hasPermissionTo($permission->id)) {
                $role->revokePermissionTo($permission->id);
            } else {
                $role->givePermissionTo($permission->id);
            }

                return response()->json(['icon' => 'success' , 'title' => 'تمت العملية بنجاح'] , 200);

            }

            else{
                // return response()->json(['icon' => 'error' , 'title' => $validator->getMessageBag()->first()] , 400);
                return response()->json(['message' => $validator->getMessageBag()->first()], 400);

            }
        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

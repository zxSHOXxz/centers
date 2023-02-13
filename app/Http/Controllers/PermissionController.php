<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::orderBy('id' , 'desc')->Paginate(5);
        return response()->view('dashboard.spaite.permissions.index' , compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('dashboard.spaite.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator($request->all(),
        [
            'guard_name' => 'required|string|in:admin,trainer,student,employee',
            'name' => 'required|string'
        ]);

        if(! $validator->fails()){
            $permissions = new Permission();
            $permissions->name = $request->get('name');
            $permissions->guard_name = $request->get('guard_name');
            $isSaved = $permissions->save();

            if($isSaved){
                return response()->json(['icon' => 'success' , 'title' => 'تمت الاضافة بنجاح'], 200);
            }
            else{
                return response()->json(['icon' => 'error' , 'title' => 'فشلت عملية الاضافة '], 400);

            }
        }
        else{
            return response()->json(['icon' => 'error' , 'title' => $validator->getMessageBag()->first()] , 400);

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
        $permissions = Permission::findOrFail($id);
        return response()->view('dashboard.spaite.permissions.edit' , compact('permissions'));
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
        $validator = Validator($request->all(),
        [
            'guard_name' => 'required|string|in:admin,trainer,student,employee',
            'name' => 'required|string'
        ]);

        if(! $validator->fails()){
            $permissions = Permission::findOrFail($id);
            $permissions->name = $request->get('name');
            $permissions->guard_name = $request->get('guard_name');
            $isSaved = $permissions->save();
            return ['redirect' =>route('permissions.index')];

            if($isSaved){
                return response()->json(['icon' => 'success' , 'title' => 'تمت عملية التعديل بنجاح'], 200);
            }
            else{
                return response()->json(['icon' => 'error' , 'title' => 'فشلت عملية التعديل '], 400);

            }
        }
        else{
            return response()->json(['icon' => 'error' , 'title' => $validator->getMessageBag()->first()] , 400);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permissions = Permission::destroy($id);
        return response()->json(['icon' => 'success' , 'title' => 'تمت عملية الحذف بنجاح'], 200);

    }
}

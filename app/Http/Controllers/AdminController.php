<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\City;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
    // {
    //     $admins = Admin::with('user')->orderBy('created_at' , 'desc')->paginate(5);
    //     return response()->view('dashboard.admin.index' , compact('admins'));

             $admins = Admin::with('user')->orderBy('created_at' , 'desc');

    // if ($request->get('name')) {
    //     $admins = Admin::where('name', 'like', '%' . $request->user->name . '%');
    // }
    if ($request->get('email')) {
        $admins = Admin::where('email', 'like', '%' . $request->email . '%');
    }
    if ($request->get('created_at')) {
        $admins = Admin::where('created_at', 'like', '%' . $request->created_at . '%');
    }
    if ($request->status != null) {
        $admins = Admin::where('status', $request->status);
    }
    $admins = $admins->paginate(5);

    return response()->view('dashboard.admin.index', compact('admins'));
    // } else {
    //     return response()->view('error-6');
    // }
}



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();
        $roles = Role::where('guard_name' , 'admin')->get();

        return response()->view('dashboard.admin.create' , compact('cities' , 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

            $validator = Validator($request->all(),[
                // 'image'=>"image|max:2048|mimes:png,jpg,jpeg,pdf",

            ]);

            if(! $validator->fails()){
                $admins = new Admin();
                $admins->email = $request->get('email');
                $admins->password = Hash::make($request->get('password'));

                if (request()->hasFile('image')) {

                $image = $request->file('image');

                $imageName = time() . 'image.' . $image->getClientOriginalExtension();

                $image->move('storage/images/admin', $imageName);

                $admins->image = $imageName;

                }

                if (request()->hasFile('cv')) {

                $cv = $request->file('cv');

                $fileName = time() . 'cv.' . $cv->getClientOriginalExtension();

                $cv->move('storage/files/admin', $fileName);

                $admins->cv = $fileName;
                }

            $isSaved = $admins->save();
            if($isSaved){

                $users = new User();
                $roles = Role::findOrFail($request->get('role_id'));
                $admins->assignRole($roles->name);
                $users->first_name = $request->get('first_name');
                $users->last_name = $request->get('last_name');
                $users->mobile = $request->get('mobile');
                $users->date_of_birth = $request->get('date_of_birth');
                $users->salary_type = $request->get('salary_type');
                $users->salary_value = $request->get('salary_value');
                $users->speciality = $request->get('speciality');
                $users->job_title = $request->get('job_title');
                $users->certification = $request->get('certification');
                $users->city_id = $request->get('city_id');
                $users->actor()->associate($admins);
                $isSaved = $users->save();

                return response()->json(['icon' => 'success' , 'title' => 'تم إضافة المشرف بنجاح'] , 200);

            }
            else{
                return response()->json(['icon' => 'error' , 'title' => 'فشلت إضافة المشرف'] , 400);
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
        $admins = Admin::findOrFail($id);
        $cities = City::all();
        $cities = Admin::with('city')->get();
        return response()->view('dashboard.admin.show' , compact('admins' , 'cities'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admins = Admin::findOrFail($id);
        $cities = City::all();

        return response()->view('dashboard.admin.edit' , compact('admins' , 'cities'));
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
        $validator = Validator($request->all(),[

        ]);

        if(! $validator->fails()){
            $admins = Admin::findOrFail($id);
            $admins->email = $request->get('email');
            $admins->password = Hash::make($request->get('password'));

            if (request()->hasFile('image')) {

            $image = $request->file('image');

            $imageName = time() . 'image.' . $image->getClientOriginalExtension();

            $image->move('images/admin', $imageName);

            $admins->image = $imageName;

            }

            if (request()->hasFile('cv')) {

            $cv = $request->file('cv');

            $fileName = time() . 'cv.' . $cv->getClientOriginalExtension();

            $cv->move('storage/files/admin', $fileName);

            $admins->cv = $fileName;
            }


            $isSaved = $admins->save();
            if($isSaved){
                $users = $admins->user;
                $users->first_name = $request->get('first_name');
                $users->last_name = $request->get('last_name');
                $users->mobile = $request->get('mobile');
                $users->date_of_birth = $request->get('date_of_birth');
                $users->salary_type = $request->get('salary_type');
                $users->salary_value = $request->get('salary_value');
                $users->speciality = $request->get('speciality');
                $users->job_title = $request->get('job_title');
                $users->certification = $request->get('certification');
                $users->city_id = $request->get('city_id');
                $users->actor()->associate($admins);

                $isSaved = $users->save();
                return ['redirect' =>route('admins.index')];

                return response()->json(['icon' => 'success' , 'title' => 'تم تعديل المشرف بنجاح'] , 200);

            }
            else{
                return response()->json(['icon' => 'error' , 'title' => 'فشل تعديل المشرف'] , 400);
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
    public function destroy(Admin $admin)
    {
        // $admins = Admin::destroy($id);
        //
        // return response()->json(['icon' => ' success' , 'title' => 'تم حذف المشرف بنجاح'] , $admins ? 200 : 400);

        if ($admin->id == Auth::id()){
            return redirect()->route('admins.index')
            ->withErrors(trans('cannot delete yourself'));
        }
        else {
            $admin->user()->delete();
            $isDeleted = $admin->delete();

                return response()->json(['icon' => 'success', 'title' => 'admin deleted successfully'], $isDeleted ? 200 : 400);
            }
    }
    public function indexDelete(){
        $admins=Admin::onlyTrashed()->get();
        return response()->view('dashboard.admin.soft_delete',compact('admins'));
    }
    public function restore($id){
        $admins=Admin::onlyTrashed()->findOrFail($id)->restore();
        return redirect()->route('admins.index');
    }
    public function forceDelete($id){
        $admins=Admin::onlyTrashed()->findOrFail($id)->forceDelete();

        // return response()->view('dashboard.admin.soft_delete',compact('admins'));
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\City;
use App\Models\Employee;
use App\Models\Trainer;
use App\Models\User;
use App\Policies\EmployeePolicy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $employees = Employee::with('user')->orderBy('id' , 'desc');

    if ($request->get('first_name')) {
        $employees = Employee::where('first_name', 'like', '%' . $request->first_name . '%');
    }
    if ($request->get('email')) {
        $employees = Employee::where('email', 'like', '%' . $request->email . '%');
    }
    if ($request->get('created_at')) {
        $employees = Employee::where('created_at', 'like', '%' . $request->created_at . '%');
    }
    if ($request->status != null) {
        $employees = Employee::where('status', $request->status);
    }
    $employees = $employees->paginate(10);
    $this->authorize('viewAny', Employee::class);
    return response()->view('dashboard.employee.index' , compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();
        $roles = Role::where('guard_name' , 'employee')->get();
        $this->authorize('create',Employee::class);
        return response()->view('dashboard.employee.create' , compact('cities','roles'));

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
            $employees = new Employee();
            $employees->email = $request->get('email');
            $employees->password = Hash::make($request->get('password'));

            if (request()->hasFile('image')) {

            $image = $request->file('image');

            $imageName = time() . 'image.' . $image->getClientOriginalExtension();

            $image->move('images/employee', $imageName);

            $employees->image = $imageName;

            }

            if (request()->hasFile('cv')) {

            $cv = $request->file('cv');

            $fileName = time() . 'cv.' . $cv->getClientOriginalExtension();

            $cv->move('storage/files/employee', $fileName);

            $employees->cv = $fileName;
            }

        $isSaved = $employees->save();
        if($isSaved){
            $users = new User();
            $roles = Role::findOrFail($request->get('role_id'));
            $employees->assignRole($roles->name);
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
            $users->actor()->associate($employees);

            $isSaved = $users->save();

            return response()->json(['icon' => 'success' , 'title' => 'تم إضافة الموظف بنجاح'] , 200);

        }
        else{
            return response()->json(['icon' => 'error' , 'title' => 'فشلت إضافة الموظف'] , 400);
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
        $employees = Employee::findOrFail($id);
        $cities = City::all();
        return response()->view('dashboard.employee.show' ,compact('employees' , 'cities'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $employees = Employee::with('user')->findOrFail(Auth::guard('employee')->id());
        $cities = City::all();
        $this->authorize('update' , Employee::class);

        return response()->view('dashboard.employee.edit' , compact('employees' , 'cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = Validator($request->all(),[

        ]);

        if(! $validator->fails()){
            $employees = Employee::findOrFail(Auth::guard('employee')->id());
            $employees->email = $request->get('email');
            $employees->password = Hash::make($request->get('password'));

            if (request()->hasFile('image')) {

            $image = $request->file('image');

            $imageName = time() . 'image.' . $image->getClientOriginalExtension();

            $image->move('images/employee', $imageName);

            $employees->image = $imageName;

            }

            if (request()->hasFile('cv')) {

            $cv = $request->file('cv');

            $fileName = time() . 'cv.' . $cv->getClientOriginalExtension();

            $cv->move('storage/files/employee', $fileName);

            $employees->cv = $fileName;
            }

        $isSaved = $employees->save();
        if($isSaved){
            $users = $employees->user;
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
            $users->actor()->associate($employees);

            $isSaved = $users->save();
            return ['redirect' =>route('home')];

            return response()->json(['icon' => 'success' , 'title' => 'تم تعديل الموظف بنجاح'] , 200);

        }
        else{
            return response()->json(['icon' => 'error' , 'title' => 'فشلت عملية تعديل الموظف'] , 400);
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
        $employees = Employee::findOrFail($id);
        $isDeleted=$employees->delete();
        $this->authorize('delete' , Employee::class);

        return response()->json(['icon' => 'success' , 'title' => 'تم حذف الموظف بنجاح'] , 200 );
        // if($isDeleted){
        //     return response()->json(['icon' => ' success' , 'title' => 'تم حذف الموظف بنجاح'] ,200);

        // }else{
        //     return response()->json(['icon' => 'error' , 'title' => 'فشل حذف الموظف '] ,400);

        // }
    }
}

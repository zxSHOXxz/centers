<?php

namespace App\Http\Controllers;

use App\Exports\StudentsExport;
use App\Models\City;
use App\Models\Diploma;
use App\Models\Finance;
use App\Models\Group;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\Permission\Models\Role;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function indexStudents(Request $request , $id){
        $students = Student::with('group')->withCount('condition')->withCount('student_evaluations')->orderBy('id','desc');
        $students = Student::where('group_id' , $id)->orderBy('id','desc')->paginate(20);
        // $students = $students->paginate(20);

        return response()->view('dashboard.student.indexStudent',compact('students' , 'id'));

    }


    public function index(Request $request)
    {
        // $students=Student::with('group')->withCount('condition')->orderBy('id','desc');
        $groups = Group::all();
        $students=Student::with('group')->withCount('condition')->withCount('student_evaluations')->orderBy('id','desc');
        if ($request->get('name_ar')) {
            $students = Student::where('name_ar', 'like', '%' . $request->name_ar . '%');
        }

        if ($request->get('mobile1')) {
            $students = Student::where('mobile1', 'like', '%' . $request->mobile1 . '%');
        }
        if ($request->get('created_at')) {
            $students = Student::where('created_at', 'like', '%' . $request->created_at . '%');
        }
        if ($request->get('status')) {
            $students = Student::where('status', 'like', '%' . $request->status);
        }
        if ($request->get('group_id')) {
            $students = Student::where('group_id', 'like', '%' . $request->group_id);
        }
        $students = $students->paginate(10);
        $this->authorize('viewAny' , Student::class);
        return response()->view('dashboard.student.index',compact('students' , 'groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities=City::all();
        $groups=Group::all();
        $finances=Finance::all();
        $diplomas=Diploma::all();
        $diplomas=Diploma::all();
        $roles = Role::where('guard_name' , 'student')->get();
        $this->authorize('create' , Student::class);

        

        return response()->view('dashboard.student.create',compact('cities','groups','finances' , 'diplomas','roles'));
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
                'name_en' => 'required|string',
                'email' => 'required|email'

        ]

    );
        if(! $validator->fails()){
            $students = new Student() ;
            $roles = Role::findOrFail($request->get('role_id'));
            $students->assignRole($roles->name);
            $students->name_en = $request->get('name_en');
            $students->name_ar = $request->get('name_ar');
            $students->email = $request->get('email');
            $students->password = Hash::make($request->get("password"));
            $students->mobile1 = $request->get('mobile1');
            $students->mobile2 = $request->get('mobile2');
            $students->date_of_birth = $request->get('date_of_birth');
            $students->another_mobile = $request->get('another_mobile');
            $students->another_name = $request->get('another_name');
            $students->spciality = $request->get('spciality');
            $students->employee = $request->get('employee');
            $students->qualification = $request->get('qualification');
            $students->work_place = $request->get('work_place');
            $students->access_method = $request->get('access_method');
            $students->status = $request->get('status');
            $students->specialities_id = $request->get('specialities_id');
            $students->group_id = $request->get('group_id');
            $students->city_id = $request->get('city_id');
            $students->diploma_id = $request->get('diploma_id');

            $isSaved = $students->save();
            // return ['redirect' =>route('students.index')];

            if($isSaved){
                return response()->json(['icon' => 'success' , 'title' => 'تم تسجيل الطالب  بنجاح'] , 200);

            }
            else{
                return response()->json(['icon' => 'error' , 'title' => 'فشلت عملية تسجيل  الطالب'] , 400);
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
        $students = Student::findOrFail($id);
        $cities=City::all();
        $groups=Group::all();
        $finances=Finance::all();
        $diplomas=Diploma::all();
        return response()->view("dashboard.student.show",compact('cities','groups','finances','students','diplomas'));

    }

    // public function showGroup($id)
    // {
    //     $groups = Group::where('diploma_id' , $id)->withCount('students')->get();
    //     $diplomas = Diploma::all();
    //     $students = Student::all();
    //     return response()->view('dashboard.diploma.showGroups', compact('groups', 'diplomas', 'students' ,'id'));

    // }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cities=City::all();
        $groups=Group::all();
        $finances=Finance::all();
        $diplomas=Diploma::all();
        $students=Student::findOrFail($id);
        $this->authorize('update' , Student::class);

        return response()->view("dashboard.student.edit",compact('cities','groups','finances','students','diplomas'));
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
                'name_en' => 'required|string',
                'email' => 'required|email'

            ]

        );
            if(! $validator->fails()){
                $students =Student::findOrFail($id) ;
                $students->name_en = $request->get('name_en');
                $students->name_ar = $request->get('name_ar');
                $students->email = $request->get('email');
                $students->mobile1 = $request->get('mobile1');
                $students->mobile2 = $request->get('mobile2');
                $students->date_of_birth = $request->get('date_of_birth');
                $students->another_mobile = $request->get('another_mobile');
                $students->another_name = $request->get('another_name');
                $students->spciality = $request->get('spciality');
                $students->employee = $request->get('employee');
                $students->qualification = $request->get('qualification');
                $students->work_place = $request->get('work_place');
                $students->access_method = $request->get('access_method');
                $students->status = $request->get('status');
                $students->specialities_id = $request->get('specialities_id');
                $students->group_id = $request->get('group_id');
                $students->city_id = $request->get('city_id');
                $students->diploma_id = $request->get('diploma_id');

                $isSaved = $students->save();
                return ['redirect' =>route('students.index')];

                if($isSaved){
                    return response()->json(['icon' => 'success' , 'title' => 'تم تسجيل الطالب  بنجاح'] , 200);

                }
                else{
                    return response()->json(['icon' => 'error' , 'title' => 'فشلت عملية تسجيل  الطالب'] , 400);
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
        $this->authorize('delete' , Student::class);

        $students=Student::destroy($id);
    }

    public function getStudent()
    {
        $students = Student::select('id' , 'name_ar' , 'mobile1')->get()->toArray();
        return $students;
    }

    public function export()
    {
        return Excel::download(new StudentsExport, 'students.xlsx');
    }
}

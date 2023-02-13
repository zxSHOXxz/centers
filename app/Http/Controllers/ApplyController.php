<?php

namespace App\Http\Controllers;

use App\Models\Apply;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applies = Apply::orderBy('created_at', 'desc')->paginate(5);
        $this->authorize('viewAny', Apply::class);
        return response()->view('dashboard.apply.index', compact('applies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees= Employee::all();
        $this->authorize('create', Apply::class);

        return response()->view('dashboard.apply.create',compact('employees'));
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
            'name_en'     =>  'required',
            // 'email' => 'required|email|unique:users,email',
    ]

);
    if(! $validator->fails()){
        $applies = new Apply() ;

        $applies->name_en = $request->get('name_en');
        $applies->name_ar = $request->get('name_ar');
        $applies->spciality = $request->get('spciality');
        $applies->address = $request->get('address');
        $applies->topic = $request->get('topic');
        $applies->email = $request->get('email');
        $applies->mobile1 = $request->get('mobile1');
        $applies->name_topic = $request->get('name_topic');
        $applies->employee_id = Auth::guard('employee')->id();
        $applies->status = $request->get('status');

        $isSaved = $applies->save();
        // return ['redirect' =>route('applies.index')];

        if($isSaved){
            return response()->json(['icon' => 'success' , 'title' => 'تم تسجيل الطلب  بنجاح'] , 200);

        }
        else{
            return response()->json(['icon' => 'error' , 'title' => 'فشلت عملية تسجيل  الطلب'] , 400);
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
        $applies=Apply::findOrFail($id);
        $employees= Employee::all();
        $this->authorize('update', Apply::class);


        return response()->view("dashboard.apply.edit",compact('applies','employees'));
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
            $applies =Apply::findOrFail($id) ;


        $applies->name_en = $request->get('name_en');
        $applies->name_ar = $request->get('name_ar');
        $applies->spciality = $request->get('spciality');
        $applies->address = $request->get('address');
        $applies->topic = $request->get('topic');
        $applies->email = $request->get('email');
        $applies->mobile1 = $request->get('mobile1');
        $applies->name_topic = $request->get('name_topic');
        $applies->status = $request->get('status');

        $isSaved = $applies->save();
        return ['redirect' =>route('applies.index')];

            if($isSaved){
                return response()->json(['icon' => 'success' , 'title' => 'تم تسجيل الطلب  بنجاح'] , 200);

            }
            else{
                return response()->json(['icon' => 'error' , 'title' => 'فشلت عملية تسجيل الطلب'] , 400);
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
        $this->authorize('delete', Apply::class);

        $applies=Apply::destroy($id);
    }
}

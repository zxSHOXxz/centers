<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Student_evaluation;
use App\Models\Trainer;
use Illuminate\Http\Request;

class StudentEvalutionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexStudent($id)
    {

        $evalutions = Student_evaluation::where('student_id', $id)->orderBy('created_at', 'desc')->paginate(5);
        $this->authorize('viewAny',Student_evaluation::class);
        return response()->view('dashboard.student-evaluation.index', compact('evalutions','id'));
    }
    public function createStudent($id)
    {
        $this->authorize('create',Student_evaluation::class);


        return response()->view('dashboard.student-evaluation.create', compact( 'id'));
    }

    public function index()
    {
        $evalutions=Student_evaluation::orderBy("id",'desc')->get();
        $this->authorize('viewAny',Student_evaluation::class);

        return response()->view('dashboard.student-evaluation.index' , compact('evalutions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $this->authorize('create',Student_evaluation::class);

        return response()->view('dashboard.student-evaluation.create',compact('students','trainers'));

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
            // 'mid_exam' => 'required|number',
            // 'activity' => 'required|number',
            //     'project' => 'required|number',
            //     'fina_exam' => 'required|number',
            //     'total' => 'required|number',

        ]

    );
        if(! $validator->fails()){
            $evalutions = new Student_evaluation() ;
            $evalutions->mid_exam = $request->get('mid_exam');
            $evalutions->activity = $request->get('activity');
            $evalutions->project = $request->get('project');
            $evalutions->fina_exam = $request->get('fina_exam');
            // $evalutions->total = $request->get('total');
            $evalutions->student_id = $request->get('student_id');


            $isSaved = $evalutions->save();
            // return ['redirect' =>route('student_evalutions.index')];

            if($isSaved){
                return response()->json(['icon' => 'success' , 'title' => 'تم تسجيل التقيم الطالب  بنجاح'] , 200);

            }
            else{
                return response()->json(['icon' => 'error' , 'title' => 'فشلت عملية تقيم  الطالب'] , 400);
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
        $evalutions=Student_evaluation::findOrFail($id);
        $students=Student::all();
        $this->authorize('update',Student_evaluation::class);

        return response()->view('dashboard.student-evaluation.edit',compact('evalutions','students','id'));
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
            // 'mid_exam' => 'required|number',
            // 'activity' => 'required|number',
            //     'project' => 'required|number',
            //     'fina_exam' => 'required|number',
            //     'total' => 'required|number',

        ]

    );
        if(! $validator->fails()){
            $evalutions = Student_evaluation::findOrFail($id);
            $evalutions->mid_exam = $request->get('mid_exam');
            $evalutions->activity = $request->get('activity');
            $evalutions->project = $request->get('project');
            $evalutions->fina_exam = $request->get('fina_exam');
            $evalutions->total = $request->get('total');
            $evalutions->student_id = $request->get('student_id');


            $isSaved = $evalutions->save();
            return ['redirect' =>route('indexStudent',$id)];

            if($isSaved){
                return response()->json(['icon' => 'success' , 'title' => 'تم تسجيل التقيم الطالب  بنجاح'] , 200);

            }
            else{
                return response()->json(['icon' => 'error' , 'title' => 'فشلت عملية تقيم  الطالب'] , 400);
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
        $this->authorize('delete',Student_evaluation::class);

        Student_evaluation::destroy($id);
    }
}

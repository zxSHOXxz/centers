<?php

namespace App\Http\Controllers;

use App\Models\Trainer;
use App\Models\TrainerEvaluation;
use Illuminate\Http\Request;

class TrainerEvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexTrainerEvaluation($id)
    {

        $trainers = TrainerEvaluation::where('trainer_id', $id)->orderBy('created_at', 'desc')->paginate(5);
        $this->authorize('viewAny',TrainerEvaluation::class );
        return response()->view('dashboard.trainer-evaluation.index', compact('trainers','id'));
    }
    public function createTrainerEvaluation($id)
    {

        $this->authorize('create',TrainerEvaluation::class );

        return response()->view('dashboard.trainer-evaluation.create', compact( 'id'));
    }

    public function index()
    {
        $trainers=TrainerEvaluation::orderBy("id",'desc')->get();
        $this->authorize('viewAny',TrainerEvaluation::class );

        return response()->view('dashboard.trainer-evaluation.index' , compact('trainers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        $this->authorize('create',TrainerEvaluation::class );

        return response()->view('dashboard.trainer-evaluation.create');

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
            $trainers = new TrainerEvaluation() ;
            $trainers->mid_exam = $request->get('mid_exam');
            $trainers->activity = $request->get('activity');
            $trainers->project = $request->get('project');
            $trainers->fina_exam = $request->get('fina_exam');
            $trainers->total = $request->get('total');
            $trainers->trainer_id = $request->get('trainer_id');


            $isSaved = $trainers->save();
            // return ['redirect' =>route('student_evalutions.index')];

            if($isSaved){
                return response()->json(['icon' => 'success' , 'title' => 'تم تسجيل التقيم المدرب  بنجاح'] , 200);

            }
            else{
                return response()->json(['icon' => 'error' , 'title' => 'فشلت عملية تقيم  المدرب'] , 400);
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
        $evaluations=TrainerEvaluation::findOrFail($id);
        $trainers=Trainer::all();
        $this->authorize('update',TrainerEvaluation::class );

        return response()->view('dashboard.trainer-evaluation.edit',compact('trainers','evaluations','id'));
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
            $trainers = TrainerEvaluation::findOrFail($id);
            $trainers->mid_exam = $request->get('mid_exam');
            $trainers->activity = $request->get('activity');
            $trainers->project = $request->get('project');
            $trainers->fina_exam = $request->get('fina_exam');
            $trainers->total = $request->get('total');
            $trainers->trainer_id = $request->get('trainer_id');


            $isSaved = $trainers->save();
            return ['redirect' =>route('indexTrainer',$id)];

            if($isSaved){
                return response()->json(['icon' => 'success' , 'title' => 'تم تعديل التقيم المدرب  بنجاح'] , 200);

            }
            else{
                return response()->json(['icon' => 'error' , 'title' => 'فشلت عملية تقيم  المدرب'] , 400);
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
        $this->authorize('delete',TrainerEvaluation::class );

        TrainerEvaluation::destroy($id);
    }
}

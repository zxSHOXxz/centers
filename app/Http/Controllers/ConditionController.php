<?php

namespace App\Http\Controllers;

use App\Models\Condition;
use App\Models\Student;
use Illuminate\Http\Request;

class ConditionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function indexCondition($id)
    {
        //
        $conditions = Condition::where('student_id', $id)->with('student')->orderBy('created_at', 'desc')->paginate(5);
        $this->authorize('viewAny' ,Condition::class);
        return response()->view('dashboard.condition.index', compact('conditions','id'));
    }

    public function createCondition($id)
    {
        $students=Student::all();
        $this->authorize('create' ,Condition::class);

        return response()->view('dashboard.condition.create', compact('students' , 'id'));
    }

    public function index()
    {
        $conditions = Condition::orderBy('id' ,'desc');
        $conditions = $conditions->paginate(5);
        $this->authorize('viewAny' ,Condition::class);

        return response()->view('dashboard.condition.index' , compact('conditions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create' ,Condition::class);

        return response()->view('dashboard.condition.create');

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
            // 'date' => 'required|string|min:3|max:20',
            // 'street' => 'string|min:3|max:30',
        ]
    );

        if(!$validator->fails()){

            $conditions = new Condition();
            $conditions->date = $request->get('date');
            $conditions->statmente = $request->get('statmente');
            $conditions->student_id = $request->get('student_id');

            $isSaved = $conditions->save();

            if($isSaved){
                return response()->json(['icon' => 'success' , 'title' => 'تم إضافة حالة الطالب بنجاح'] , 200);

            }
            else{
                return response()->json(['icon' => 'error' , 'title' => 'فشلت إضافة حالة الطالب'] , 400);
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
        
    }
}

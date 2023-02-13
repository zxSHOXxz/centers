<?php

namespace App\Http\Controllers;

use App\Exports\GroupsExport;
use App\Models\Diploma;
use App\Models\Group;
use App\Models\Room;
use App\Models\Trainer;
use App\Models\TranierGroup;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use PHPUnit\TextUI\XmlConfiguration\Groups;

class GroupCountroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // public function indexGroup($id)
    // {
    //     //
    //     $groups = Group::where('diploma_id', $id)->orderBy('created_at', 'desc')->paginate(5);
    //     return response()->view('dashboard.group.index', compact('groups','id'));
    // }

    // public function createGroup($id)
    // {
    //     $rooms =  Room::all();
    //     return response()->view('dashboard.group.create', compact('id' , 'rooms'));
    // }

    public function index(Request $request)
    {
        $groups = Group::with('diploma','room','timelines')->withCount('students', 'trainers')->orderBy('created_at' , 'desc');
        if ($request->get('search')) {
            $moduleIndex = Group::where('created_at', 'like', '%' . $request->search . '%');
        }

        if ($request->get('group_name')) {
            $groups = Group::where('group_name', 'like', '%' . $request->group_name . '%');
        }
        if ($request->get('group_number')) {
            $groups = Group::where('group_number', 'like', '%' . $request->group_number . '%');
        }
        if ($request->get('created_at')) {
            $groups = Group::where('created_at', 'like', '%' . $request->created_at . '%');
        }
        if ($request->status != null) {
            $groups = Group::where('status', $request->status);
        }
        $groups = $groups->paginate(10);
        $this->authorize('viewAny',Group::class);
        return response()->view('dashboard.group.index' , compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $diplomas = Diploma::all();
        $rooms = Room::all();
        $trainers = Trainer::all();
        $this->authorize('create',Group::class);


        return response()->view('dashboard.group.create' , compact( 'diplomas','rooms' ,'trainers'));
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
            // 'name' => 'required|string',
            // 'status' => 'required|string|on:Active,Ready,Finshed',

        ]);
        if(! $validator->fails()){
            $groups = new Group();
            $groups->group_number = $request->get('group_number');
            $groups->group_name = $request->get('group_name');
            $groups->dayes = $request->get('dayes');
            $groups->diploma_id = $request->get('diploma_id');
            $groups->room_id = $request->get('room_id');
            $groups->trainers()->trainer_id = $request->get('trainer_id');

            $isSaved = $groups->save();

            $trainers = Trainer::find($request);
            $groups->trainers()->attach($trainers);

            if($isSaved){
                return response()->json(['icon' => 'success' , 'title' => 'تم إضافة المجموعة بنجاح'] , 200);

            }
            else{
                return response()->json(['icon' => 'error' , 'title' => 'فشلت إضافة المجموعة'] , 400);
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

    // public function showTrainersGroup($id)
    // {
    //     // $trainers = TranierGroup::where('group_id' , $id )->with('traner_groups')->get();
    //     // $trainers = Trainer::withCount('groups')->get();
    //     // $trainers = Trainer::all();
    //     $trainers = Trainer::with('groups')->get();

    //     return response()->view('dashboard.group.showTrainer', compact( 'trainers','id'));

    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $groups = Group::findOrFail($id);
        $rooms = Room::all();
        $this->authorize('update',Group::class);

        return response()->view('dashboard.group.edit' , compact('groups' , 'rooms'));
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
            // 'name' => 'required|string',
            // 'status' => 'required|string|on:Active,Ready,Finshed',

        ]

    );
        if(! $validator->fails()){
            $groups = Group::findOrFail($id);
            // $groups->group_number = $request->get('group_number');
            $groups->group_name = $request->get('group_name');
            $groups->dayes = $request->get('dayes');
            // $groups->diploma_id = $request->get('diploma_id');
            $groups->room_id = $request->get('room_id');

            $isSaved = $groups->save();
            return ['redirect' =>route('Groupss.index' , $id)];

            if($isSaved){
                return response()->json(['icon' => 'success' , 'title' => 'تم تعديل المجموعة بنجاح'] , 200);

            }
            else{
                return response()->json(['icon' => 'error' , 'title' => 'فشلت عملية تعديل المجموعة'] , 400);
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
        $groups = Group::destroy($id);
        $this->authorize('delete',Group::class);

        return response()->json(['icon' => 'success' , 'title' => 'تم حذف الدبلومة بنجاح'] , $groups ? 200 : 400);

    }
    public function getStudent()
    {
        $students = Group::select('id' , 'group_name' , 'dayes')->get()->toArray();
        return $students;
    }

    public function export()
    {
        return Excel::download(new GroupsExport, 'groups.xlsx');
    }
}

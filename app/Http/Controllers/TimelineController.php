<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Room;
use App\Models\Timeline;
use Illuminate\Http\Request;

class TimelineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $times = Timeline::orderBy('days' , 'desc')->orderBy('status','desc')->orderBy('time','asc')->get();
        $this->authorize('viewAny', Timeline::class);
        return response()->view('dashboard.timeline.index2' , compact('times'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups = Group::all();
        $rooms = Room::all();
        $this->authorize('create', Timeline::class);


        return response()->view('dashboard.timeline.create' , compact('groups' , 'rooms'));

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

    ]
);
    if(! $validator->fails()){
        $times = new Timeline() ;
        $times->days = $request->get('days');
        $times->time = $request->get('time');
        $times->period = $request->get('period');
        $times->status = $request->get('status');
        $times->group_name = $request->get('group_name');
        $times->room_name = $request->get('room_name');

        $isSaved = $times->save();
        // return ['redirect' =>route('times.index')];

        if($isSaved){
            return response()->json(['icon' => 'success' , 'title' => 'تم إنشاء الجدول  بنجاح'] , 200);
        }
        else{
            return response()->json(['icon' => 'error' , 'title' => 'فشلت عملية إنشاء  الجدول'] , 400);
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
        $times = TimeLine::findOrFail($id);
        $groups = Group::all();
        $rooms = Room::all();
        $this->authorize('update', Timeline::class);


        return response()->view('dashboard.timeline.edit' , compact('groups' , 'rooms' , 'times'));

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

            ]
        );
            if(! $validator->fails()){ 
                $times = Timeline::findOrFail($id) ;
                $times->days = $request->get('days');
                $times->time = $request->get('time');
                $times->period = $request->get('period');
                $times->status = $request->get('status');
                $times->group_name = $request->get('group_name');
                $times->room_name = $request->get('room_name');
        
                $isSaved = $times->save();
                // return ['redirect' =>route('timelines.index')];
        
                if($isSaved){
                    return response()->json(['icon' => 'success' , 'title' => 'تم تعديل الجدول  بنجاح'] , 200);
                }
                else{
                    return response()->json(['icon' => 'error' , 'title' => 'فشلت عملية تعديل  الجدول'] , 400);
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
        $times=Timeline::destroy($id);
        $this->authorize('Delete', Timeline::class);

        return response()->json(['icon' => 'success' , 'title' => 'تم الحذف بنجاح'] , $times ? 200 : 400);

    }
}

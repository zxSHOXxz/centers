<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $rooms = Room::orderBy('id' ,'desc');
        if ($request->get('search')) {
            $moduleIndex = Room::where('created_at', 'like', '%' . $request->search . '%');
        }

        if ($request->get('room_number')) {
            $rooms = Room::where('room_number', 'like', '%' . $request->room_number . '%');
        }
        if ($request->get('from')) {
            $rooms = Room::where('from', 'like', '%' . $request->from . '%');
        }
        if ($request->get('created_at')) {
            $rooms = Room::where('created_at', 'like', '%' . $request->created_at . '%');
        }
        if ($request->status != null) {
            $rooms = Room::where('status', $request->status);
        }
        $rooms = $rooms->paginate(10);
        $this->authorize('viewAny',Room::class);
        return response()->view('dashboard.room.index' , compact('rooms'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create',Room::class);

        return response()->view('dashboard.room.create');
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
            'room_number' => 'required|string|min:3|max:20',
            'from' => 'required|string',
            'to' => 'required|string',

        ]
    );

        if(!$validator->fails()){
        $rooms = new Room();
        $rooms->room_number = $request->get('room_number');
        $rooms->from = $request->get('from');
        $rooms->to = $request->get('to');

        $isSaved = $rooms->save();

        if($isSaved){
            return response()->json(['icon' => 'success' , 'title' => 'تم إضافة الغرفة بنجاح'] , 200);

        }
        else{
            return response()->json(['icon' => 'error' , 'title' => 'فشلت إضافة الغرفة'] , 400);
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
        $rooms = Room::findOrFail($id);
        $this->authorize('update',Room::class);

        return response()->view('dashboard.room.edit' , compact('rooms'));
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

        $validator = Validator($request->all(), [
            'room_number' => 'required|string|min:3|max:20',
            'from' => 'required|string',
            'to' => 'required|string',
        ]);

        if(!$validator->fails()){

            $rooms = Room::findOrFail($id);
            $rooms->room_number = $request->get('room_number');
            $rooms->from = $request->get('from');
            $rooms->to = $request->get('to');

            $isUpdate = $rooms->save();
            return ['redirect' =>route('rooms.index')];

            if($isUpdate){
                return response()->json(['icon' => 'success' , 'title' => 'تم تعديل الغرفة بنجاح'] , 200);
             }
             else {
                return response()->json(['icon' => 'error' , 'title' => ' فشلت عملية تعديل الغرفة'] , 400);

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
        $rooms = Room::destroy($id);
        $this->authorize('delete',Room::class);

        return response()->json(['icon' => 'success' , 'title' => 'تم حذف الغرفة بنجاح'] , $rooms ? 200 : 400);
    }
}

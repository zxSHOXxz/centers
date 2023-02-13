<?php

namespace App\Http\Controllers;

use App\Exports\ConnectionExport;
use App\Models\Connection;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ConnectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $connections=Connection::orderBy('id','desc');
        if ($request->get('search')) {
            $moduleIndex = Connection::where('created_at', 'like', '%' . $request->search . '%');
        }

        if ($request->get('name')) {
            $connections = Connection::where('name', 'like', '%' . $request->name . '%');
        }
        if ($request->get('status')) {
            $connections = Connection::where('status', 'like', '%' . $request->status . '%');
        }
        if ($request->get('created_at')) {
            $connections = Connection::where('created_at', 'like', '%' . $request->created_at . '%');
        }
        if ($request->status != null) {
            $connections = Connection::where('status', $request->status);
        }
        $connections = $connections->paginate(5);
        $this->authorize('viewAny',Connection::class);
        return response()->view("dashboard.connection.index",compact('connections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create',Connection::class);
        return response()->view("dashboard.connection.create");

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valditor=validator($request->all(),[
            "name"=>'required|min:5',
            "mobile"=>'required|min:10',
            "date"=>'required',
            "status"=>'required',
            "replay"=>'required',
            "replay_date"=>'required',
            "description"=>'required',
        ]);
        if(!$valditor->fails()){
            $connections=new Connection();
            $connections->name= $request->get('name');
            $connections->mobile= $request->get('mobile');
            $connections->date= $request->get('date');
            $connections->status= $request->get('status');
            $connections->employee= $request->get('employee');
            $connections->replay= $request->get('replay');
            $connections->replay_date= $request->get('replay_date');
            $connections->description= $request->get('description');
            $connections->connection_type= $request->get('connection_type');
            $isSaved=$connections->save();
            if($isSaved){
                return response()->json(['icon'=>'success','title'=>'تم تسجيل الاتصال  بنجاح '],200);
            }else{
                return response()->json(['icon'=>'error','title'=>'فشلت عملية تسجيل الاتصال   '],400);

            }

        }else{
            return response()->json(['icon'=>'error','title'=>$valditor->getMessageBag()->first()],400);
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
        $connections=Connection::findOrFail($id);
        $this->authorize('update',Connection::class);

        return response()->view("dashboard.connection.edit",compact('connections'));
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
        $valditor=validator($request->all(),[
            "name"=>'required|min:5',
            "mobile"=>'required|min:10',
            "date"=>'required',
            "status"=>'required',
            "replay"=>'required',
            "replay_date"=>'required',
            "description"=>'required',
        ]);
        if(!$valditor->fails()){
            $connections= Connection::findOrFail($id);
            $connections->name= $request->get('name');
            $connections->mobile= $request->get('mobile');
            $connections->date= $request->get('date');
            $connections->status= $request->get('status');
            $connections->employee= $request->get('employee');
            $connections->replay= $request->get('replay');
            $connections->replay_date= $request->get('replay_date');
            $connections->description= $request->get('description');
            $connections->connection_type= $request->get('connection_type');
            // $connections->recepion_id= $request->get('recepion_id');

            $isSaved=$connections->save();
            return ['redirect'=>route('connections.index')];
            if($isSaved){
                return response()->json(['icon'=>'success','title'=>'تم تسجيل الاتصال  بنجاح '],200);
            }else{
                return response()->json(['icon'=>'error','title'=>'فشلت عملية تسجيل الاتصال   '],400);

            }

        }else{
            return response()->json(['icon'=>'error','title'=>$valditor->getMessageBag()->first()],400);
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
        $this->authorize('delete',Connection::class);

        $connections=Connection::destroy($id);
    }

    public function export()
    {
        return Excel::download(new ConnectionExport, 'Connection.xlsx');
    }
}

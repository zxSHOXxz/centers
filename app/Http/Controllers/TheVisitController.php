<?php

namespace App\Http\Controllers;

use App\Models\TheVisit;
use Illuminate\Http\Request;

class TheVisitController extends Controller
{


    public function indexTheVisit($id){
        $visites= TheVisit::where('vistor_id',$id)->get();
        return response()->view('dashboard.the_visit.index',compact('id','visites'));

    }

    public function createTheVisit($id){

        return response()->view('dashboard.the_visit.create',compact('id'));

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
            'number_visit' => 'required',
        ]
    );

        if(!$validator->fails()){

            $visites = new TheVisit();
            $visites->number_visit = $request->get('number_visit');
            $visites->description = $request->get('description');
            $visites->vistor_id = $request->get('vistor_id');

            $isSaved = $visites->save();

            if($isSaved){
                return response()->json(['icon' => 'success' , 'title' => 'تم إضافة الزيارة بنجاح'] , 200);

            }
            else{
                return response()->json(['icon' => 'error' , 'title' => 'فشلت إضافة الزيارة'] , 400);
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
        $visites= TheVisit::findOrFail($id);
        return response()->view('dashboard.the_visit.edit',compact('visites'));
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
            'number_visit' => 'required',
        ]
    );

        if(!$validator->fails()){

            $visites =  TheVisit::findOrFail($id);
            $visites->number_visit = $request->get('number_visit');
            $visites->description = $request->get('description');

            $isSaved = $visites->save();

            return back() ;
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
        return TheVisit::destroy($id);
    }
}

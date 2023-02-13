<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cities = City::orderBy('id' ,'desc');
        if ($request->get('search')) {
            $moduleIndex = city::where('created_at', 'like', '%' . $request->search . '%');
        }

        if ($request->get('name')) {
            $cities = city::where('name', 'like', '%' . $request->name . '%');
        }
        if ($request->get('street')) {
            $cities = city::where('street', 'like', '%' . $request->street . '%');
        }
        if ($request->get('created_at')) {
            $cities = city::where('created_at', 'like', '%' . $request->created_at . '%');
        }
        if ($request->status != null) {
            $cities = city::where('status', $request->status);
        }
        $cities = $cities->paginate(5);
        
        return response()->view('dashboard.city.index' , compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return response()->view('dashboard.city.create');
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
            'name' => 'required|string|min:3|max:20',
            // 'street' => 'string|min:3|max:30',
        ]
    );

        if(!$validator->fails()){

            $cities = new City();
            // $cities->name = $request->input('name');
            // $cities->name = $request->name;
            $cities->name = $request->get('name');
            $cities->street = $request->get('street');

            $isSaved = $cities->save();

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
        $cities = City::findOrFail($id);

               return response()->view('dashboard.city.edit' , compact('cities'));
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
            'name' => 'required|string|min:3|max:20',
            'street' => 'required|string|min:3|max:30',

        ]);

        if(!$validator->fails()){

        $cities = City::findOrFail($id);
        $cities->name = $request->get('name');
        $cities->street = $request->get('street');

        $isUpdate = $cities->save();
        return ['redirect' =>route('cities.index')];

        if($isUpdate){
            return response()->json(['icon' => 'success' , 'title' => 'تم تعديل المدينة بنجاح'] , 200);
         }
         else {
            return response()->json(['icon' => 'error' , 'title' => ' فشلت عملية تعديل المدينة'] , 400);

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
       $cities = City::destroy($id);
       
       return response()->json(['icon' => 'success' , 'title' => 'تم حذف المدينة بنجاح'] , $cities ? 200 : 400);
    }
}
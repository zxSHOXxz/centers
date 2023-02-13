<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::orderBy('id' ,'desc')->simplePaginate(5);
        return response()->json([
            'status' => true ,
            'message' => 'تم عرض بيانات المدينة بنجاح' ,
            'data' => $cities
    ]);

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
         
            $cities->name = $request->get('name');
            $cities->street = $request->get('street');

            $isSaved = $cities->save();

            if($isSaved){
                return response()->json([
                    'status' => true , 
                    'message' => 'تم إضافة المدينة بنجاح' ]
                     , 200);

            }
            else{
                return response()->json([
                    'status' => false , 
                    'message' => 'فشلت إضافة المدينة ' ]
                     , 400);
            }
        }
            else{
                return response()->json([
                    'status' => false ,
                     'message' => $validator->getMessageBag()->first()]
                      , 400);
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
        $cities = City::findOrFail($id);
        
        // if (is_null($cities)) {
        //     return $this->sendError('لا يوجد بيانات ');
        // }
        return response()->json([
            'status' => true ,
            'message' => 'عرض بيانات المدينة',
            'data' => $cities
        ]);
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
        // return ['redirect' =>route('cities.index')];

        if($isUpdate){
            return response()->json([
                'status' => true , 
                'message' => 'تم تعديل المدينة بنجاح' ]
                 , 200);

        }
        else{
            return response()->json([
                'status' => false , 
                'message' => 'فشل تعديل المدينة ' ]
                 , 400);
        }
    }
        else{
            return response()->json([
                'status' => false ,
                 'message' => $validator->getMessageBag()->first()]
                  , 400);
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
        $cities = City::findOrFail($id);
        $cities->delete();
        return response()->json([
            'status' => true ,
             'message' => 'تم حذف المدينة بنجاح'] ,
             $cities ? 200 : 400);
     }
 }
    

<?php

namespace App\Http\Controllers;

use App\Models\FinancialPayment;
use App\Models\Group;
use Illuminate\Http\Request;

class FinancialPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $financials =FinancialPayment::withCount(['payment'])->with('payment')->orderBy('id','desc')->paginate(8);
        return response()->view('dashboard.financial_payment.index',compact("financials"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups=Group::all();
        return response()->view('dashboard.financial_payment.create',compact('groups'));
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
            $financials = new FinancialPayment();
            $financials->name = $request->get('name');
            $financials->mobile2 = $request->get('mobile2');
            $financials->mobile1 = $request->get('mobile1');
            $financials->order_number = $request->get('order_number');
            $financials->date_registration = $request->get('date_registration');
            $financials->price = $request->get('price');
            $financials->pay = $request->get('pay');
            $financials->payment_method = $request->get('payment_method');
            $financials->date_week = $request->get('date_week');
            $financials->group_id = $request->get('group_id');
            $financials->notes = $request->get('notes');

            $isSaved = $financials->save();

            if($isSaved){
                return response()->json(['icon' => 'success' , 'title' => 'تم إضافة الدفعة بنجاح'] , 200);

            }
            else{
                return response()->json(['icon' => 'error' , 'title' => 'فشلت إضافة الدفعة'] , 400);
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
        $groups=Group::all();
        $financials=FinancialPayment::findOrFail($id);
        return response()->view('dashboard.financial_payment.edit',compact('groups','financials'));
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

        ]);
        if(! $validator->fails()){
            $financials=FinancialPayment::findOrFail($id);
            $financials->name = $request->get('name');
            $financials->mobile2 = $request->get('mobile2');
            $financials->mobile1 = $request->get('mobile1');
            $financials->order_number = $request->get('order_number');
            $financials->date_registration = $request->get('date_registration');
            $financials->price = $request->get('price');
            $financials->pay = $request->get('pay');
            $financials->payment_method = $request->get('payment_method');
            $financials->date_week = $request->get('date_week');
            $financials->group_id = $request->get('group_id');
            $financials->notes = $request->get('notes');

            $isSaved = $financials->save();
            return ['redirect'=>route("financial_payments.index")];

            if($isSaved){
                return response()->json(['icon' => 'success' , 'title' => 'تم تعديل الدفعة بنجاح'] , 200);

            }
            else{
                return response()->json(['icon' => 'error' , 'title' => 'فشلت تعديل الدفعة'] , 400);
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
        FinancialPayment::destroy($id);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
   
    public function indexPayment($id)
    {
        $payments = Payment::where('financial_payment_id',$id)->orderBy('id' ,'desc')->paginate(5);
        // $this->authorize('viewAny' , Payment::class);
        return response()->view('dashboard.payment.index' , compact('payments','id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createPayment($id)
    {
        // $this->authorize('create' , Payment::class);

        return response()->view('dashboard.payment.create',compact("id"));
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
            'pay_nubmer' => 'required|string|min:3',
            // 'street' => 'string|min:3|max:30',
        ]
    );

        if(!$validator->fails()){

            $payments = new Payment();
        
            $payments->pay_nubmer = $request->get('pay_nubmer');
            $payments->pay = $request->get('pay');
            $payments->financial_payment_id = $request->get('financial_payment_id');

            $isSaved = $payments->save();

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
        $payments = Payment::findOrFail($id);
        
        // $this->authorize('update', Payment::class);
        return response()->view('dashboard.payment.edit' , compact('payments'));
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
            'pay_nubmer' => 'required|string|min:3|max:20',

        ]);

        if(!$validator->fails()){

        $payments = Payment::findOrFail($id);
        $payments->pay_nubmer = $request->get('pay_nubmer');
            $payments->pay = $request->get('pay');

        $isUpdate = $payments->save();
        return ['redirect' =>route('indexPayment',$id)];

        if($isUpdate){
            return response()->json(['icon' => 'success' , 'title' => 'تم تعديل الدفع بنجاح'] , 200);
         }
         else {
            return response()->json(['icon' => 'error' , 'title' => ' فشلت عملية تعديل الدفع'] , 400);

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
       $payments = Payment::destroy($id);
       $this->authorize('delete' , Payment::class);

       return response()->json(['icon' => 'success' , 'title' => 'تم حذف المدينة بنجاح'] , $payments ? 200 : 400);
    }
}

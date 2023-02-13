<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthUserController extends Controller
{

    public function register(Request $request){
        $validator = Validator($request->all() ,[
            'email' => 'required|email|unique:admins,email' ,
            'password' => 'required|string|min:3'

        ]);

        if(! $validator->fails()){
            $admins = new Admin();
            $admins->email = $request->get('email');
            $admins->password = Hash::make($request->get('password'));
            $isSaved = $admins->save();
            if($isSaved){
                return response()->json([
                    'status' => true ,
                    'message' => 'تم إنشاء حساب بنجاح'
                ] , 200);
            }
            else {
                return response()->json([
                    'status' => false ,
                    'message' => 'فشل إنشاء الحساب '
                ] , 400);
            }
        }
        else{
            return response()->json([
                'status' => false ,
                'message' => $validator-> getMessageBag()->first()
            ] , 400);
        }

    }


    public function login(Request $request){
        $validator = Validator($request->all() ,[
            'email' => 'required|email|exists:admins,email' ,
            'password' => 'required|string',
        ]);

        if(! $validator->fails()){
            $admins = Admin::where('email' , '=' , $request->get('email'))->first();
            if(Hash::check($request->get('password') , $admins->password)){
                $token = $admins->createToken('admin-api');
                $admins->setAttribute('token' , $token->accessToken);
                return $token;
                return response()->json([
                    'status' => true ,
                    'message' => '  تم تسجيل الدخول بنجاح'
                ] , 200);
            }
            else{
                return response()->json([
                    'status' => false ,
                    'message' => '  فشل تسجيل الدخول '
                ] , 400);
            }
        }
        else{
            return response()->json([
                'status' => false ,
                'message' => $validator-> getMessageBag()->first()
            ], 400);

        }
    }

    public function logout(Request $request){
        $token = $request->user('admin-api')->token();
        $revoked = $token->revoke();

        return response()->json([
            'status' => $revoked ,
            'message' => $revoked ? 'تم تسجيل الخروج بنجاح' :
            ' فشلت عملية تسجيل الخروج'
        ]);
    }

    public function resetPassword(Request $request){
        $validator = Validator($request->all() ,[
            'email' => 'required|email|exists:admins,email' ,
            'authCode' => 'required|digits:4',
            'password' => 'required|string|min:3|confirmed'
        ]);

            if (! $validator->fails()){
                $admins = Admin::where('email' , '=' , $request->get('email'))->first();
                if(Hash::check($request->get('authCode') , $admins->authCode)){
                    $admins->password = Hash::make($request->get('password'));
                    $admins->authCode = null ;

                    $isSaved = $admins->save();
                    return response()->json([
                        'status' => $isSaved ,
                        'message' => $isSaved ? 'تم انشاء كلمة مرور جديدة' : 'فشلت عملية انشاء كلمة مرور جديدة',
                    ] , $isSaved ? 200 : 400);

                }
            }
            else{
                return response()->json([
                    'message' => $validator->getMessageBag()->first()
                ] , 400);
            }
        }

    public function forgetPassword(Request $request){
        $validator = Validator($request->all() ,[
            'email' => 'required|email|exists:admins,email' ,
        ]);

        if (! $validator->fails()){
            $admins = Admin::where('email' , '=' , $request->get('email'))->first();
            $authCode = random_int(1000 , 9999);
            $admins->authCode = Hash::make($authCode);

            $isSaved = $admins->save();
            return response()->json([
                'status' => $isSaved ,
                'message' => $isSaved ? 'تم ارسال الكود الى الايميل الخاص بك' : 'فشل ارسال الكود تحقق من صحة الايميل',
                'code' => $authCode
            ]);
        }
        else{
            return response()->json([
                'message' => $validator->getMessageBag()->first()
            ] , 400);
        }
    }
}

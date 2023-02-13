<?php

namespace App\Http\Controllers;

use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SettingController extends Controller
{
    public function editPassword(){
        return response()->view('dashboard.auth.edit_password');
    }

    public function updatePassword(Request $request){
        $guard = auth('admin')->check() ? 'admin' : 'web';
        $validator = Validator($request->all(),[
            // 'password' => 'required|string|min:6|max:25' . $guard ,

            'current_password' => 'required|string|min:6|max:25' ,
            'new_password' => 'required|string|min:6|max:25|confirmed' ,
            'new_password_confirmation'=> 'required|string|min:6|max:25' ,
        ]);

        if(! $validator->fails()){
            $user = auth('admin')->user();
            $user->password = Hash::make($request->get('new_password'));
            $isSaved = $user->save();
            return ['redirect' =>route('admins.index')];

            if($isSaved){
                return response()->json([
                    'icon' => 'success' ,
                    'title' => 'تم تعديل كلمة المرور بنجاح'
                ] ,200);
            }
            else{
                return response()->json([
                    'icon' => 'error' ,
                    'title' => 'فشل تعديل كلمة المرور '
                ] ,400);
            }
        }
        else{
            return response()->json([
                'icon' => 'error' ,
                'title' => $validator->getMessageBag()->first()] ,
                 400 );
        }
    }
}

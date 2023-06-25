<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;


use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function login(REQUEST $request){
        $rulese = [
            'email' => 'required|email',
            'password' => 'required',
        ];
        $messages = [
            'email.required' => 'MSG_MISSING_FIELD',
            'email.email' => 'MSG_WROND_DATA_TYPE',
            'password.required' => 'MSG_MISSING_FIELD',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            $error = $validator->errors()->first();
            return response()->json(['success' => false, 'error' => $error], 400);
        }else{
            $user = DB::table('log')->where('email',$request->email)->first();

            if (!$user) {
                if (!Hash::check($request->password, $user->password)) {
                    return response()->json(['success' => false, 'error' => 'MSG_INVALID_LOGIN'], 403);
                };
            }else{
                return response()->json(['success' => false, 'error' => 'MSG_INVALID_LOGIN'], 403);
            }
        }
    }

    public function loguot(REQUEST $request){
        
    }
}

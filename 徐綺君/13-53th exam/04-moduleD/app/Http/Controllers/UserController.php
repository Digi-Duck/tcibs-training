<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class UserController extends Controller
{
    public function login(REQUEST $request){
        $rules = [
            'email' => 'required|email',
            'password' => 'required',
        ];
        $messages = [
            '*.required' => 'MSG_MISSING_FIELD',
            'email.email' => 'MSG_WROND_DATA_TYPE',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            $error = $validator->errors()->first();
            return response()->json(['success' => false, 'error' => $error], 400);
        }else{
            $user = DB::table('log')->where('email',$request->email)->first();

            if ($user && Hash::check($request->password, $user->password)) {
                $hash = hash('sha256', $user->email);
                DB::table('log')->where('email',$request->email)->update([
                    "access_token" => $hash,
                ]);
                $user = DB::table('log')->where('email',$request->email)->first();
                $data = [
                    "id" => $user->id,
                    "email"=> $user->email,
                    "nickname"=> $user->nickname,
                    "profile_image"=> $user->profile_image,
                    "type"=> $user->type,
                    "access_token"=> $user->access_token,
                ];
                return response()->json(['success'=>true,'data'=>$data]);
            }else{
                return response()->json(['success' => false, 'error' => 'MSG_INVALID_LOGIN'], 403);
            }
        }
    }

    public function register(Request $request){
        if ($request->has(['email','password','nickname','profile_image','type'])) {
            $rules = [
                '*' => 'required',
                'email' => 'email',
                'password' => 'min:4',
                'profile_image' => 'mimes:png,jpg,jpeg',
            ];
            $messages = [
                '*.required' => 'MSG_MISSING_FIELD',
                'email.email' => 'MSG_WROND_DATA_TYPE',
                'password' => 'MSG_PASSWORD_NOT_SECURE',
                'profile_image.mimes' => 'MSG_WROND_DATA_TYPE',
            ];
            $num = [
                '*.required' => 400,
                'email' => 400,
                'password' => 409,
                'profile_image.mimes' => 400,
            ];

            $validator = Validator::make($request->all(), $rules, $messages);
            $validator2 = Validator::make($request->all(), $rules, $num);
            $user = DB::table('log')->where('email',$request->email)->first();

            if ($validator->fails() || $validator2->fails()) {
                $error = $validator->errors()->first();
                $error2 = $validator2->errors()->first();
                return response()->json(['success' => false, 'error' => $error], $error2);
            }else if($user){
                return response()->json(['success'=>false,'error'=>'MSG_USER_EXISTS'],409);
            }else{
                $path = Storage::disk('local')->put('public/img', $request->profile_image);
                $path = str_replace("public","storage",$path);
                DB::table('log')->insert([
                    "email" => $request->email,
                    "password" => Hash::make($request->password),
                    "nickname" => $request->nickname,
                    "profile_image" => $path,
                    "type" => $request->type,
                    "access_token" => '',
                    "created_at" => date('Y-m-d H:i:s'),
                ]);
                $user = DB::table('log')->where('email',$request->email)->first();
                $data = [
                    "id" => $user->id,
                    "email"=> $user->email,
                    "nickname"=> $user->nickname,
                    "profile_image"=> $user->profile_image,
                    "type"=> $user->type,
                    "access_token"=> $user->access_token,
                ];
                return response()->json(['success'=>true,'data'=>$data],409);
            }
        }else{
            return response()->json(['success'=>false,'error'=>'MSG_MISSING_FIELD'],400);
        }
    }

    public function logout(Request $request){
        DB::table('log')->update([
            "access_token" => '',
        ]);
        return response()->json(['success'=>true]);
    }
}

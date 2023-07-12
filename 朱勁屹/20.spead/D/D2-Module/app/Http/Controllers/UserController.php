<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    function login(Request $re) {
        if(!$re->has(['email'],['password'])){
            return response()->json([
                "success"=>false,
                "MSG"=>'MSG_MISSING_FIELD',
            ],400 );
        }
        $va = Validator::make($re->all(),[
            'email'=>'required|email',
            'password'=>'required',
        ]);
        if($va->fails()){
            return response()->json([
                'success'=>false,
                'MSG'=>'MSG_WROND_DATA_TYPE',
            ], 400);
        }
        $email = $re->email;
        $password = $re->password;
        $user = DB::table('user')->where('email',$email)->first();
        if(!isset($user)){
            return response()->json([
                'success'=>false,
                'MSG'=>'MSG_INVALID_LOGIN',
            ], 403);
        }
        if(!Hash::check($password,$user->password)){
            return response()->json([
                'success'=>false,
                'MSG'=>'MSG_INVALID_LOGIN',
            ], 403);
        }
        $access_token = hash('sha256',$email);
        DB::table('user')->where('email',$email)->update([
            "access_token"=>$access_token,
        ]);
        return response()->json([
            'success'=>true,
            'data'=>[
                "id"=>$user->id,
                "email"=>$user->email,
                "password"=>$user->password,
                "nickname"=>$user->nickname,
                "profile_image"=>$user->profile_image,
                "access_token"=>$access_token,
                "type"=>$user->type,
            ],
        ]);
    }
    function register(Request $re) {
        if(!$re->has(['email'],['password'],['nickname'],['profile_image'])){
            return response()->json([
                'success'=>false,
                'MSG'=>"MSG_MISSING_FIELD",
            ], 400);
        }
        $va = Validator::make($re->all(),[
            'email'=>'required|email',
            'password'=>'required',
            'nickname'=>'required',
            'profile_image'=>'required|image',

        ]);
        $email = $re->email;
        $password = $re->password;
        if(strlen($password) < 4){
            return response()->json([
                'success'=>false,
                'MSG'=>'MSG_PASSWORD_NOT_SECURE',
            ],409 );
        }
        if($va->fails()){
            return response()->json([
                'success'=>false,
                'MSG'=>"MSG_WROND_DATA_TYPE",
            ], 400);
        }
        $table = DB::table('user')->where('email',$email);
        if($table->doesntExist()){
            return response()->json([
                'success'=>false,
                'MSG'=>'MSG_USER_EXISTS',
            ], 409);
        }
        $profile_image = $re->profile_image->store('public','local');
        $profile_image = Storage::url($profile_image);
        $access_token = hash('sha256',$email);

        DB::table('user')->insert([
            "email"=>$email,
            "password"=>Hash::make($password),
            "nickname"=>$re->nickname,
            "profile_image"=>$profile_image,
            "access_token"=>$access_token,
            "type"=>'user',
        ]);
        return response()->json([
            'success'=>true,
            "data"=>[
                "email"=>$email,
                "password"=>Hash::make($password),
                "nickname"=>$re->nickname,
                "profile_image"=>$profile_image,
                "access_token"=>$access_token,
                "type"=>'user',
            ]
        ]);
    }
    function logout(Request $re) {
        $token = $re->header('access_token');
        $table = DB::table('user')->where('access_token',$token);
        if($table->doesntExist()){
            return response()->json([
                "success"=>false,
                "MSG"=>"MSG_INVALID_ACCESS_TOKEN",
            ], 401);
        }
        $table->update([
            'access_token'=>'',
        ]);
        return response()->json([
            'success'=>true,
        ]);
    }
}

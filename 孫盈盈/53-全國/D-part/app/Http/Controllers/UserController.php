<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\Http\Controllers\ErrorController;

class UserController extends Controller
{
    public function login(Request $request){
        $user = DB::table('user')->where('email', $request->email)->first();

        $vaildata = Validator::make($request->all(),['email' => 'email']);

        if(!$request->filled(['email', 'password'])){
            return ErrorController::body_null();
        }else if($vaildata -> fails()){
            return ErrorController::body_format();
        }else if(empty($user) || !Hash::check($request->password, $user->password)){
            return ErrorController::login_Invalid();
        }else{
            $access = hash('sha256', $request->email);
            $accessToken = strtolower($access);
            DB::table('user')->where('email', $request->email)->update(['accessToken'=> $accessToken]);
            $user = DB::table('user')->where('email', $request->email)->first();
            return response()->json([
                'success'=>TRUE,
                'data'=>([
                    'id'=>$user->id,
                    'email'=>$user->email,
                    'nickname'=>$user->nickname,
                    'profile_image'=>$user->profile,
                    'type'=>$user->type,
                    'access_token'=>$user->accessToken
                ])
            ]);
        }
    }

    public function register(Request $request){
        $userExist = DB::table('user')->where('email', $request->email)->get();

        $vaildata = Validator::make($request->all(),
        [
            'email' => 'email',
            'file' => 'file|mimes:png,jpg'
        ]);

        $password = Validator::make($request->all(), [
            'password' => 'min:4'
        ]);

        if(!$request->filled(['email', 'password', 'nickname'])){
            return ErrorController::body_null();
        }else if($password -> fails()){
            return ErrorController::register_password();
        }else if($vaildata -> fails()){
            return ErrorController::body_format();
        }else if(!$userExist->isEmpty()){
            return ErrorController::register_user();
        }else{
            if(empty($request->profile)){
                $url = '';
            }else{
                $path = $request->profile->store('public');
                $url = Storage::url($path);
            }
            $password = Hash::make($request->password);
            DB::insert('insert into user (email, nickname, profile, type, password) values (?, ?, ?, ?, ?)', [$request->email, $request->nickname, $url, 'USER', $password]);

            $user = DB::table('user')->where('email', $request->email)->first();
            return response()->json([
                'success'=>TRUE,
                'data'=>([
                    'id'=>$user->id,
                    'email'=>$user->email,
                    'nickname'=>$user->nickname,
                    'profile_image'=>$user->profile,
                    'type'=>$user->type,
                    'access_token'=>$user->accessToken
                ])
            ]);
        }
    }

    public function logout(Request $request){
        DB::table('user')->where('email', $request->email)->update(['accessToken'=>'']);
        return response()->json([
            'success'=> TRUE
        ]);
    }
}

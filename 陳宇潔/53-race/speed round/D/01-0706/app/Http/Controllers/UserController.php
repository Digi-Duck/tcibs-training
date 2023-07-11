<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ErrorController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function login(Request $request){
        if(!$request->has(['email', 'password'])){//缺少必要欄位
            return (new ErrorController)->missing();
        }else {
            $validator = Validator::make($request->all(),[
                'email' => 'required|email',
                'password' => 'required',
            ]);
            if($validator->fails()){ //格式不正確
                return (new ErrorController)->data();
            }else{
                $user = DB::table('user')->where('email', $request->email)->first();
                if(!$user || Hash::check($request->password, $user->password)){
                    return (new ErrorController)->log();
                }else{
                    $hash = hash("sha256", $request->email);
                    DB::table('user')->where('email', $request->email)->update(['access_token' => "Bearer ".$hash]);
                    $data = (array)$user;
                    unset($data['password']);
                    $response = [
                        "success" => true,
                        "data" => $data
                    ];
                    return response()->json($response);
                }
            }
        }
    }
    public function  register(Request $request){
        if(!$request->has(['email', 'password'])){//缺少必要欄位
            return (new ErrorController)->missing();
        }else {
            $validator = Validator::make($request->all(),[
                'email' => 'required|email',
                'password' => 'required',
                'nickname' => 'required',
                'profile_image' => 'file|mimes:jpg,jpeg,png',
            ]);
            if($validator->fails()){ //格式不正確
                return (new ErrorController)->data();
            }else{
                $user = DB::table('user')->where('email', $request->email)->first();
                if($user){
                    return (new ErrorController)->exists();
                }else{
                    if(strlen($request -> password) < 4){
                        return (new ErrorController)->password();
                    }else{
                        $path = $request->profile_image->store('public');
                        $url = Storage::url($path);
                        if($url){
                            $password = Hash::make($request->password);
                            $data = [
                                'email' => $request->email,
                                'password' => $password,
                                'nickname' => $request->nickname,
                                'profile_image' => $url,
                                'type' => 'user'
                            ];
                            DB::table('user')->insert($data);
                            $response = [
                                "success" => true,
                                "data" => $data
                            ];
                            return response()->json($response);
                        }
                    }
                }
            }
        }
    }
    public function logout(Request $request){
        $user = DB::table('user')->where('access_token', $request->header('Authorization'))->first();
        if(!$user){ //無效的token
            return (new ErrorController)->token();
        }else{
            DB::table('user')->where('access_token', $request->header('Authorization'))->update(['access_token' => '']);
            return response()->json(["success" => true]);
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\ErrorController;

class UserController extends Controller
{
    public function login(Request $request){
        if(!$request->has(['email', 'password'])){//缺少必要欄位
            return (new ErrorController)->missing();
        }else{
            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required',
            ]);
            if($validator->fails()){//資料格式錯誤
                return (new ErrorController)->data();
            }else{
                $user = DB::table('user')->where('email', $request->email)->first();
                if(!$user || Hash::check($request->password, $user->password)){//使用者不存在 或密碼有誤
                    return (new ErrorController)->loing();
                }else{
                    if(strlen($request->password) < 4){//密碼長度錯誤
                        return (new ErrorController)->password();
                    }else{
                        $hash = hash("sha256", $request->email);
                        DB::table('user')->where('email', $request->email)->update(['access_token' => "Brearer ".$hash]);
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
    }
    public function register(Request $request){
        if(!$request->has(['email', 'password', 'nickname', 'profile_image'])){//缺少必要欄位
            return (new ErrorController)->missing();
        }else{
            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required',
                'nickname' => 'required',
                'profile_image' => 'file|mimes:jpg,jpeg,png'
            ]);
            if($validator->fails()){//資料格式錯誤
                return (new ErrorController)->data();
            }else{
                $exists = DB::table('user')->where('email', $request->email)->exists();
                if($exists){//使用者已存在
                    return (new ErrorController)->exists();
                }else{
                    if(strlen($request->password) < 4){//密碼長度錯誤
                        return (new ErrorController)->password();
                    }else{
                        $path = $request->profile_image->store('public');
                        $url = Storage::url($path);
                        if($url){
                            $password = Hash::make($request->password);
                            $data =  [
                                'email' => $request->email,
                                'password' => $request->$password,
                                'nickname' => $request->nickname,
                                'profile_image' => $request->$url,
                                'type' => 'user',
                            ];
                            DB::table('user')->insert($data);
                            $data = DB::table('user')->where('email', $request->email)->first();
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
        if(!$user){
            return (new ErrorController)->token();
        }else{
            DB::table('user')->where('access_token', $request->header('Authorization'))->update(['access_token' => '']);
            return response()->json(["success" => true]);
        }
    }
}

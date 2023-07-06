<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $errorController = new ErrorController();
        if (!($request -> has(['email', 'password']))) { // 缺少必要欄位
            return $errorController -> missing();
        } else {
            $validator = Validator::make($request -> all(), [
                'email' => 'required|email',
                'password' => 'required'
            ]);
            if ($validator -> fails()) { // 格式不正確
                return $errorController -> data();
            }
            $user = DB::table('log') -> where('email', $request -> email) -> first();
            if (!$user) { // 使用者不存在
                return $errorController -> log();
            }else{
                if(Hash::check($request -> password, $user -> password)){
                    $hash = hash("sha256", $request -> email);
                    DB::table('log') -> where('email', $request -> email) -> update(['access_token' =>  "Bearer " . $hash]);
                    $response = [
                        "success" => true,
                        "data" => [
                            "id" => $user -> id,
                            "email" => $user -> email,
                            "nickname" => $user -> nickname,
                            "profile_image" => $user -> profile_image,
                            "type" => $user -> type
                        ]
                    ];
                    return response()->json($response);
                }
            }
        }
    }
    public function register(Request $request)
    {
        $errorController = new ErrorController();

        if (!($request -> has(['email', 'password', 'nickname', 'profile_image']))) { // 缺少必要欄位
            return $errorController -> missing();
        } else {
            $validator = Validator::make($request -> all(), [
                'email' => 'required|email',
                'password' => 'required',
                'nickname' => 'required',
                'profile_image' => 'file|mimes:jpg,jpeg,png'
            ]);
            if ($validator -> fails()) { // 格式不正確
                return $errorController -> data();
            }
            $user = DB::table('log') -> where('email', $request -> email) -> first();
            if ($user) { // 使用者已存在
                return $errorController -> appear();
            }else{
                if(strlen($request -> password) < 4){ // 密碼長度不正確
                    return $errorController -> password();
                }
                $path = $request -> profile_image -> store('public');
                $url = Storage::url($path);
                if($url){ // 檔案類型
                    $password = Hash::make($request -> password);
                    DB::table('log')->insert([
                        'email' => $request -> email,
                        'password' => $password,
                        'nickname' => $request -> nickname,
                        'profile_image' => $url,
                        'type' => 'USER'
                    ]);
                    $response = [
                        "success" => true,
                        "data" => [
                            "email" => $request -> email,
                            "nickname" => $request -> nickname,
                            "password" => $request -> password,
                            "profile_image" => $url,
                            'type' => 'USER'
                        ]
                    ];
                    return response()->json($response);
                }
            }
        }
    }
    public function logout(Request $request)
    {
        $errorController = new ErrorController();
        $user = DB::table('log') -> where('access_token', $request -> header('Authorization'));
        if ($user) {
            $user -> update(['access_token' => '']);
            return response()->json([ "success" => true ]);
        }else{
            return $errorController -> permission(); // 權限不足
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class AmongusController extends Controller
{
    function login(REQUEST $request){
        $re = $request;
        $false = [
            'success'=> false,
            'message'=>'MSG_INVALID_LOGIN'
        ];

        if($re->email == '' || $re->password == ''){
            return response()->json([
                "success"=>false,
                "MSG"=>"MSG_MISSING_FIELD",
            ], 400);
        }else{
            if(!(gettype($re->password) == "string") || !(gettype($re->email) == "string")){
                return response()->json([
                    "success"=>false,
                    "MSG"=>"MSG_WROND_DATA_TYPE"
                ], 400);
            }else{
                $sha =hash("sha256",$re->email);
                $user = DB::table('login')->get()->where('access_token',$sha)->first();
                if(!$user){
                    return response()->json([
                        "success"=>false,
                        "MSG"=>"MSG_INVALID_ACCESS_TOKEN",
                    ], 400);
                    // return gettype($re->password);
                }else{
                    if($user->password == $re->password){
                        return response()->json([
                            "id"=> $user->id,
                            "email"=> $user->email,
                            "nickname"=> $user->nickname,
                            "profile_image"=> $user->profile_image,
                            "type"=> $user->type,
                            "access_token"=> $user->access_token
                        ]);
                    }else{
                        return response()->json($false, 403);
                    }
                }

            }

    }

        return $request->password;
    }
    function register(REQUEST $re){
        if(is_uploaded_file($re->profile_image)){
            if($re->email == ''|| $re->nickname == '' || $re->password == '' || $re->profile_image == ''){
                return response()->json([
                    "success"=>false,
                    "MSG"=>"MSG_MISSING_FIELD"
                ],400);
            }else{
                if(!filter_var($re->email,FILTER_VALIDATE_EMAIL)){
                    return response()->json([
                        "success"=>false,
                        "MSG"=>"MSG_WROND_DATA_TYPE"
                    ], 400);
                }else{
                    $file = $re->profile_image;
                    $filename = $file->getClientOriginalName();
                    $filetype = $file->extension();
                    if($filetype == 'png' || $filetype == 'jpg'){
                        $user = DB::table('login')->get()->where('email',$re->email)->first();
                        if(isset($user)){
                            return response()->json([
                                "success"=>false,
                                "MSG"=>"MSG_USER_EXISTS"
                            ], 400);
                        }else{
                            if(strlen($re->password) < 4){
                                return response()->json([
                                    "success"=>false,
                                    "MSG"=>"MSG_PASSWORD_NOT_SECURE"
                                ], 409);
                            }else{
                                $dest = "/upload/".$filename;
                                move_uploaded_file($file,public_path().$dest);
                                DB::table('login')->insert([
                                    'email'=>$re->email,
                                    'password'=>$re->password,
                                    'nickname'=>$re->nickname,
                                    'profile_image'=>$dest,
                                    'type'=>'USER',
                                    'access_token'=>hash("sha256",$re->email)
                                ]);
                                return response()->json([
                                    "success"=>true,
                                    "data"=>([
                                        "email"=>$re->email,
                                        "nickname"=>$re->nickname,
                                        "password"=>$re->password,
                                        "profile_image"=>$dest,
                                ])
                                ]);
                            }
                        }

                    }else{
                        return response()->json([
                            "success"=>false,
                            "MSG"=>"MSG_WROND_DATA_TYPE"
                        ], 400);
                    }


            }
            // $dest = '/upload/'.$re->profile_image->name'];
        }
    }else{
            return response()->json([
                "success"=>false,
                "MSG"=>"MSG_MISSING_FIELD",
            ], 400);
        }


            // return 1;

    }
    function userImage($id) {
        $user = DB::table('login')->where('id',$id)->first();
        if(!isset($user)){
            return response()->json([
                "success"=>false,
                "MSG"=>"MSG_USER_NOT_EXISTS"
            ], 404);
        }else{

            $image = DB::table('image_detail')->where('userId',$id)->get();
            
            return $image;

        }
    }
}

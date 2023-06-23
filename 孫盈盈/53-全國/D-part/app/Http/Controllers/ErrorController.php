<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorController extends Controller
{
    public static function login_Invalid(){
        return response()->json([
            'success'=> FALSE,
            'message'=>'MSG_INVALID_LOGIN'
        ], 403);
    }
    public static function register_user(){
        return response()->json([
            'success'=> FALSE,
            'message'=>'MSG_USER_EXISTS'
        ], 409);
    }
    public static function register_password(){
        return response()->json([
            'success'=> FALSE,
            'message'=>'MSG_PASSWORD_NOT_SECURE'
        ], 409);
    }
    public static function access_token(){
        return response()->json([
            'success'=> FALSE,
            'message'=>'MSG_INVALID_ACCESS_TOKEN'
        ], 401);
    }
    public static function level(){
        return response()->json([
            'success'=> FALSE,
            'message'=>'MSG_PERMISSION_DENY'
        ], 403);
    }
    public static function body_null(){
        return response()->json([
            'success'=> FALSE,
            'message'=>'MSG_MISSING_FIELD'
        ], 400);
    }
    public static function body_format(){
        return response()->json([
            'success'=> FALSE,
            'message'=>'MSG_WROND_DATA_TYPE'
        ], 400);
    }
    public static function picture(){
        return response()->json([
            'success'=> FALSE,
            'message'=>'MSG_POST_NOT_EXISTS'
        ], 404);
    }
    public static function comment(){
        return response()->json([
            'success'=> FALSE,
            'message'=>'MSG_COMMENT_NOT_EXIST'
        ], 404);
    }
    public static function user(){
        return response()->json([
            'success'=> FALSE,
            'message'=>'MSG_USER_NOT_EXIST'
        ], 404);
    }
    public static function file_format(){
        return response()->json([
            'success'=> FALSE,
            'message'=>'MSG_INVALID_FILE_FORMAT'
        ], 400);
    }
}

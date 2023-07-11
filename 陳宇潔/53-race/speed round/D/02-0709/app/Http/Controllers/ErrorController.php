<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorController extends Controller
{
    public function exists(){ //使用者已存在 2
        return response()->json([
            "success" => false,
            "message" => "MSG_USER_EXISTS"
        ], 409);
    }
    public function password(){ //密碼長度錯誤 2
        return response()->json([
            "success" => false,
            "message" => "MSG_PASSWORD_NOT_SECURE"
        ], 409);
    }
    public function token(){ //無效 token 所有需要登入api
        return response()->json([
            "success" => false,
            "message" => "MSG_INVALID_ACCESS_TOKEN"
        ], 401);
    }
    public function login(){ //使用者不存在 帳密有誤 1
        return response()->json([
            "success" => false,
            "message" => "MSG_INVALID_LOGIN"
        ], 403);
    }
    public function permission(){ //權限不足 8 10 13
        return response()->json([
            "success" => false,
            "message" => "MSG_PERMISSION_DENY"
        ], 403);
    }
    public function missing(){ //缺少必要欄位 1 2 4 7 8 12
        return response()->json([
            "success" => false,
            "message" => "MSG_MISSING_FIELD"
        ], 400);
    }
    public function data(){ //資料格式錯誤 1 2 4 7 8 12
        return response()->json([
            "success" => false,
            "message" => "MSG_WRONG_DATA_TYPE"
        ], 400);
    }
    public function file(){ //檔案格式錯誤 7
        return response()->json([
            "success" => false,
            "message" => "MSG_INVALID_FILE_FORMAT"
        ], 400);
    }
    public function post(){ //不存在的圖片 8 9 10 11 12
        return response()->json([
            "success" => false,
            "message" => "MSG_POST_NOT_EXISTS"
        ], 409);
    }
    public function comment(){ //不存在的留言 或留言不屬於此貼文 13
        return response()->json([
            "success" => false,
            "message" => "MSG_COMMENT_NOT_EXISTS"
        ], 409);
    }
    public function user(){ //不存在的使用者 6
        return response()->json([
            "success" => false,
            "message" => "MSG_USER_NOT_EXISTS"
        ], 409);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorController extends Controller
{
    public function appear() // 使用者已存在
    {
        return response()->json([
            "success" => false,
            "message" => "MSG_USER_EXISTS"
        ], 409);
    }
    public function password() // 密碼長度不正確
    {
        return response()->json([
            "success" => false,
            "message" => "MSG_PASSWORD_NOT_SECURE"
        ], 409);
    }
    public function token() // 無效的Access token
    {
        return response()->json([
            "success" => false,
            "message" => "MSG_INVALID_ACCESS_TOKEN"
        ], 401);
    }
    public function log() // 使用者不存在、帳密有誤
    {
        return response()->json([
            "success" => false,
            "message" => "MSG_INVALID_LOGIN"
        ], 403);
    }
    public function permission() // 權限不足
    {
        return response()->json([
            "success" => false,
            "message" => "MSG_PERMISSION_DENY"
        ], 403);
    }
    public function missing() // 缺少必要欄位
    {
        return response()->json([
            "success" => false,
            "message" => "MSG_INVALID_TOKEN"
        ], 400);
    }
    public function data() // 資料格式錯誤
    {
        return response()->json([
            "success" => false,
            "message" => "MSG_WROND_DATA_TYPE"
        ], 400);
    }
    public function file() // 檔案格式錯誤
    {
        return response()->json([
            "success" => false,
            "message" => "MSG_INVALID_FILE_FORMAT"
        ], 400);
    }
    public function post() // 不存在圖片
    {
        return response()->json([
            "success" => false,
            "message" => "MSG_POST_NOT_EXISTS"
        ], 404);
    }
    public function comment() // 不存在留言
    {
        return response()->json([
            "success" => false,
            "message" => "MSG_COMMENT_NOT_EXISTS"
        ], 404);
    }
    public function user() // 不存在使用者
    {
        return response()->json([
            "success" => false,
            "message" => "MSG_USER_NOT_EXISTS"
        ], 404);
    }
}

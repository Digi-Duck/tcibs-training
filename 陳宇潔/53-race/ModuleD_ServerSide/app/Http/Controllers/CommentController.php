<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
    // 11. 取得圖片評論
        // a. 顯示圖片的評論
        // b. 評論可以回覆給圖片或是其他留言
    // 12. 發布圖片評論
        // a. 登入後使用者可以對圖片進行評論
    // 13. 刪除評論
        // a. 登入後評論者或圖片所有者可以刪除評論
class CommentController extends Controller
{
    public function getComment($id)
    {
        $errorController = new ErrorController();
        $comment = DB::table('comment')->where('img_id', $id)->first();
        if (!$comment) { // 圖片不存在
                return $errorController -> post();
        }else{
            return response()->json($comment);
        }
    }
    public function publishComment(Request $request, $id)
    {
        $errorController = new ErrorController();

        if (!($request -> has('comment'))) { // 缺少必要欄位
            return $errorController -> missing();
        } else {
            $validator = Validator::make($request -> all(), [
                'comment' => 'required'
            ]);
            if ($validator -> fails()) { // 格式不正確
                return $errorController -> data();
            }
            $img = DB::table('img') -> where('id', $id) -> first();
            if (!$img) { // 圖片不存在
                return $errorController -> post();
            }else{
                DB::table('comment')->insert([
                    'comment' => $request -> comment,
                    'img_id' => $id,
                    'user_id' => $userId
                ]);
            }
        }
    }
    public function delComment(Request $request, $id)
    {
        $user = DB::table('log') -> where('access_token', $request -> header('Authorization'));
        if ($user) {
            $comment = DB::table('comment') -> where('id', $id) -> first();
            $img = DB::table('img') -> where('id', $comment -> img_id) -> first();
            if (!$img) { // 圖片不存在
                return $errorController -> post();
            }else{
                $comment -> delete();
            }
        }else{
            return $errorController -> token();
        }
    }
}

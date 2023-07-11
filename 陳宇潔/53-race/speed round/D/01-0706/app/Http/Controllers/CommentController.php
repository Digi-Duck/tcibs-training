<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ErrorController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    public function getComment(Request $request, $id){
        $post = DB::table('image')->whereNull('deleted_at')->where('id', $id)->get();
        if(!$post){
            return (new ErrorController)->post();
        }else{
            $comment = DB::table('comment')->where('image_id', $id)->get();
            $response = [
                "success" => true,
                "data" => $comment
            ];
            return response()->json($response);
        }
    }
    public function publish(Request $request, $id){
        $user = DB::table('user')->where('access_token', $request->header('Authorization'))->first();
        if(!$user){ //無效的token
            return (new ErrorController)->token();
        }else{
            if(!$request->has(['comment'])){//缺少必要欄位
                return (new ErrorController)->missing();
            }else {
                $validator = Validator::make($request->all(),[
                        'comment' => 'required'
                ]);
                if($validator->fails()){//格式不正確
                        return (new ErrorController)->data();
                }else{
                    $post = DB::table('image')->whereNull('deleted_at')->where('id', $id)->get();
                    if(!$post){
                        return (new ErrorController)->post();
                    }else{
                        $comment = DB::table('comment')->where('image_id', $id)->get();
                        DB::table('comment')->insert([
                            'comment' => $request -> comment,
                            'user_id' => $user -> id,
                            'image_id' => $id
                        ]);
                        $response = [
                            "success" => true,
                            "data" => $comment
                        ];
                        return response()->json($response);
                    }
                }
            }
        }
    }
    public function delComment(Request $request, $id){
        $user = DB::table('user')->where('access_token', $request->header('Authorization'))->first();
        if(!$user){ //無效的token
            return (new ErrorController)->token();
        }else{
            if($user->type != 'admin'){ //權限不足
                return (new ErrorController)->permission();
            }else{
                $comment = DB::table('comment')->where('id', $id)->get();
                if(!$comment){
                    return (new ErrorController)->comment();
                }else{
                    $comment = DB::table('comment')->where('image_id', $id)->delete();
                    $response = [
                        "success" => true,
                        "data" => $comment
                    ];
                    return response()->json($response);
                }
            }
        }
    }
}

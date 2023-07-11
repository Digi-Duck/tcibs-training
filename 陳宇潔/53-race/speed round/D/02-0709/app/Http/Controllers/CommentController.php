<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    function getComment($image_id){
        $post = DB::table('images')->where('id', $image_id);
        if($post->doesntExist()){//圖片不存在
            return (new ErrorController)->post();
        }else{
            $comments = DB::table('comments')->where('image_id', $image_id)->get();
            $data = $comments->map(function ($comment){
                $user = DB::table('users')->where('id', $comment->user_id)->first();
                $author = (array)$user;
                unset($author['password']);
                $each =  [
                    'id' => $comment->id,
                    'author' => $author,
                    'comment' => $comment->comment
                ];
                return $each;
            });
            $response = [
                "success" => true,
                "data" => $data
            ];
            return response()->json($response);
        }
    }
    function publish(Request $request, $image_id){
        $user = DB::table('users')->where('access_token', $request->header('Authorization'))->first();
        if(!$user){//無效 token
            return (new ErrorController)->token();
        }else{
            $post = DB::table('images')->where('id', $image_id);
            if($post->doesntExist()){//圖片不存在
                return (new ErrorController)->post();
            }else{
                if(!$request->has(['comment'])){//缺少必要欄位
                    return (new ErrorController)->missing();
                }else{
                    $validator = Validator::make($request->all(), [
                        'comment' => 'required',
                    ]);
                    if($validator->fails()){//資料格式錯誤
                        return (new ErrorController)->data();
                    }else{
                        $now = now()->format("Y-m-d\TH:i:s");
                        $id = DB::table('comment')->insertGetId([
                            'comment' => $request->comment,
                            'user_id' => $user->id,
                            'image_id' => $image_id
                        ]);
                        $author = (array)$user;
                        unset($author['password']);
                        $data =  [
                            'id' => $id,
                            'author' => $author,
                            'comment' => $request->comment
                        ];
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
    function delComment($comment_id){
        $user = DB::table('users')->where('access_token', $request->header('Authorization'))->first();
        if(!$user){//無效 token
            return (new ErrorController)->token();
        }else{
            if($user->type != 'admin'){//權限不足
                return (new ErrorController)->permission();
            }else{
                $comment = DB::table('comments')->where('id', $comment_id);
                if($comment->doesntExist()){//圖片不存在
                    return (new ErrorController)->comment();
                }else{
                    DB::table('comments')->where('id', $comment_id)->delete();
                    $response = [
                        "success" => true
                    ];
                    return response()->json($response);
                }
            }
        }
    }
}

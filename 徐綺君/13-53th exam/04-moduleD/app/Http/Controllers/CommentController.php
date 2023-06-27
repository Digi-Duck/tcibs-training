<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use illuminate\Database\Eloquent\SoftDeletes;

class CommentController extends Controller
{
    function getdata($image_id, Request $request){
        $image = DB::table('images')->where('id',$image_id)->first();
        if($image && $image->deleted == 0){
            $data = DB::table('comments')->get();

            return $data;
        }else{
            return response()->json(['success'=>false,'error'=>'MSG_POST_NOT_EXISTS'],404);
        }
    }

    function create($image_id, Request $request){
        $user = DB::table('log')->where('access_token',$request->header('Authorization'))->first();
        $image = DB::table('images')->where('id',$image_id)->first();
        if ($user) {
            if($image && $image->deleted == 0){
                DB::table('comments')->insert([
                    "content" => $request->content,
                    "user_id" => $user->id,
                    "image_id" => $image_id,
                    "created_at" => $date,
                ]);
            }else{
                return response()->json(['success'=>false,'error'=>'MSG_POST_NOT_EXISTS'],404);
            }
        }else{
            return response()->json(['success'=>false,'error'=>'MSG_INVALID_ACCESS_TOKEN'],401);
        }
    }

    function delete($comment_id, Request $request){
        $comments = DB::table('comments')->where('id',$comment_id)->first();
        $user = DB::table('log')->where('access_token',$request->header('Authorization'))->first();
        $image = DB::table('images')->where('id',$comments->image_id)->first();

        if ($user) {
            if($image && $image->deleted == 0){
                if ($user->id == $image->user_id || $user->id == $comments->user_id){
                    DB::table('comments')->where('id',$comment_id)->delete();
                }else{
                    return response()->json(['success'=>false,'error'=>'MSG_PERMISSION_DENY'],403);
                }
            }else{
                return response()->json(['success'=>false,'error'=>'MSG_COMMENT_NOT_EXISTS'],404);
            }
        }else{
            return response()->json(['success'=>false,'error'=>'MSG_INVALID_ACCESS_TOKEN'],401);
        }
    }
}

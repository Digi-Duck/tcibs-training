<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Vaildator;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ErrorController;

class CommentController extends Controller
{
    public function addComment(Request $request, $image_id){
        if(DB::table('image')->where('id', $image_id)->doesntExist()){
            return ErrorController::picture();
        }else if(!$request->filled('comment')){
            return ErrorController::body_null();
        }else{
            DB::table('comment')->insert([
                'image_id'=>$image_id,
                'comment'=>$request->comment
            ]);
            return 'scuess';
        }
    }
    public function selectComment(Request $request, $image_id){
        if(DB::table('image')->where('id', $image_id)->doesntExist()){
            return ErrorController::picture();
        }else{
            $comment = DB::table('comment')->where('image_id', $image_id)->get();
            return $comment;
        }
    }
    public function deleteComment(Request $request, $comment_id){
        if(DB::table('comment')->where('id', $comment_id)->doesntExist()){
            return ErrorController::comment();
        }else{
            DB::table('comment')->where('id', $comment_id)->delete();
            return 'delete sucess';
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class TextController extends Controller
{
    //
    function insertComment(Request $re,$image_id){
        // return $image_id;
        $image = DB::table('image')->where('id',$image_id)->first();
        if(!isset($image_id)){
            return response()->json([
                "success"=>false,
                "MSG"=>"MSG_POST_NOT_EXISTS"
            ], 404);
        }else{
            if(gettype($re->text) != "string"){
                return response()->json([
                    "success"=>false,
                    "MSG"=>"MSG_WROND_DATA_TYPE"
                ], 400);
            }else{
                if($re->text == ''){
                    return response()->json([
                        "success"=>false,
                        "MSG"=>"MSG_MISSING_FIELD"
                    ], 400);
                }else{
                    DB::table('img_text')->insert([
                        "imgId"=>$image_id,
                        "who"=>'',
                        "text"=>$re->text
                    ]);
                }
            }
        }
    }
    function getComment($image_id) {
        // return 1;
        $image = DB::table('image')->where('id',$image_id)->first();
        if(!isset($image)){
            return response()->json([
                "success"=>false,
                "MSG"=>"MSG_POST_NOT_EXISTS"
            ], 404);
        }else{
            $text = DB::table('img_text')->where('imgId',$image_id)->get();
            return json_encode($text);
        }
    }
    function deleteComment($text_id) {
        $text = DB::table('img_text')->where('id',$text_id)->first();
        if(!isset($text)){
            return response()->json([
                "success"=>false,
                "MSG"=>"MSG_POST_NOT_EXISTS"
            ], 404);
        }else{
            DB::table('img_text')->where('id',$text_id)->delete();

        }
    }
    function fuck(Request $re){
        $file = $re->file;
        $path = $re->file->store('public');
        $url = Storage::url($path);
        return response()->json([
            "url"=>$url,
        ]);
    }
}

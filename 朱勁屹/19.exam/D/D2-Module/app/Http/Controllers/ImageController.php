<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ImageController extends Controller
{
    function search(Request $re) {
        $keyword = '';
        $page = 0;
        $page_size = 10;
        $order_type = 'asc';
        $order_by = 'created_at';
        if(isset($re->keyword)){
            $keyword = $re->keyword;
        }
        if(isset($re->page_size)){
            $page_size = $re->page_size;
        }
        if(isset($re->page)){
            $page = $re->page - 1;
            $page = $page * 10;
        }
        if(isset($re->order_type)){
            $order_type = $re->order_type;
        }
        if(isset($re->order_by)){
            $order_by = $re->order_by;
        }
        // ->where('title','like','%'.$keyword.'%')->orWhere('description','like','%'.$keyword.'%')
        $image = DB::table('image_detail')->where(function ($qu) use ($keyword) {
            $qu->where('title','like','%'.$keyword.'%')->orWhere('description','like','%'.$keyword.'%');
        })->orderBy($order_by,$order_type)->where('delete',1)->skip($page)->take($page_size)->get();
        return response()->json([
            "success"=>true,
            "data"=>[
                "total_count"=>$page_size,
                "image"=>$image
            ]
        ]);
        return $image;
    }

    function popular() {
        $image = DB::table('image_detail')->where('delete',1)->orderBy('view_count')->get();
        return $image;
    }

    function upload(Request $re){
        if($re->url == '' || $re->title == '' || $re->description == '' || $re->width == '' || $re->height == '' || $re->userId == ''){
            return response()->json([
                "success"=>false,
                "MSG"=>"MSG_MISSING_FIELD"
            ], 400);
        }else{
            if (!(is_uploaded_file($re->url))) {
                return response()->json([
                    "success"=>false,
                    "MSG"=>"MSG_INVALID_FILE_FORMAT"
                ], 400);
            }else{
                $filetype = $re->url->extension();
                $filename = $re->url->getClientOriginalName();
                if($filetype != "png" && $filetype != 'jpg'){
                    return response()->json([
                        "success"=>false,
                        "MSG"=>"MSG_INVALID_FILE_FORMAT"
                    ], 400);
                }else{
                    if(gettype($re->title) != "string" || gettype($re->description) != "string" || gettype($re->height) != "string" || gettype($re->width) != "string" || gettype($re->userId) != "string"){
                        return response()->json([
                            "success"=>false,
                            "MSG"=>"MSG_WROND_DATA_TYPE"
                        ], 400);
                    }else{
                        $file = $re->url;
                        $dest = "/upload/".$filename;
                        $date = date("Y-m-d").'T'.date("H:i:s");
                        move_uploaded_file($file,public_path().$dest);
                        DB::table('image')->insert([
                            'url'=>$dest,
                            'title'=>$re->title,
                            'created_at'=>$date
                        ]);
                        $user = DB::table('login')->where('id',$re->userId)->first();
                        DB::table('image_detail')->insert([
                            'url'=>$dest,
                            "userId"=>$user->id,
                            "author"=>json_encode([
                                "id"=>$user->id,
                                "email"=>$user->email,
                                "password"=>$user->password,
                                "nickname"=>$user->nickname,
                                "profile_image"=>$user->profile_image,

                            ]),
                            'title'=>$re->title,
                            'description'=>$re->description,
                            'width'=>$re->width,
                            'height'=>$re->height,
                            'mimetype'=>$filetype,
                            'view_count'=>0,
                            'updated_at'=>$date,
                            'created_at'=>$date,
                            'delete'=>1
                        ]);
                        return response()->json([
                            "author"=>([
                                "id"=>$user->id,
                                "email"=>$user->email,
                                "nickname"=>$user->nickname,
                                "password"=>$user->password,
                                "profile_image"=>$user->profile_image
                            ])
                        ]);
                    }
                }
            }
        }
    }
    function put(Request $re,$image_id){
        // dd('123');
        $putdata = file_get_contents("php://input", "r");
        return $putdata;
        if($re == '' || $image_id == ''){
            return response()->json([
                "success"=>false,
                "MSG"=>"MSG_MISSING_FIELD"
            ], 400);
        }else{
            $data1 = DB::table('image')->where('id',$image_id)->first();
            $data2 = DB::table('image_detail')->where('id',$image_id)->first();
            $d1 = $re->input('title');
            $d2 = $re->only(['author','title','description','width','height','mimetype','view_count']);
            $date = $date = date("Y-m-d").'T'.date("H:i:s");
            if(!isset($data1)){
                return response()->json([
                    "success"=>false,
                    "MSG"=>"MSG_COMMENT_NOT_EXISTS"
                ], 404);
            }else{
                if(is_uploaded_file($re->url)){
                    $file = $re->url;
                    $filename = $file->getClientOriginalName();
                    $fileType = $file->extension();
                    $dest = '/upload/'.$filename;
                    move_uploaded_file($file,$dest);
                    $d1->merge([
                        'url'=>$dest
                    ]);
                    $d2->merge([
                        'url'=>$dest,
                        'createAt'=>$date
                    ]);
                    // $data1->update($d1);
                    // $data2->update($d2);
                    return $re->all();
                }else{
                    return $re->all();
                    // $data1->update($d1);
                    // $data2->update($d2);
                }
            }
        }
    }
    function delete($image_id){
        $data = DB::table('image_detail')->where('id',$image_id)->first();
        if(!isset($data) || $data->delete == 0){
            return response()->json([
                    "success"=>false,
                    "MSG"=>"MSG_POST_NOT_EXISTS"
                ],404 );
        }else{
            // return $data;
            DB::table('image_detail')->where('id',$image_id)->update(['delete'=>0]);
        }
    }
    function getImgDetail($image_id) {
        $image = DB::table('image_detail')->where('id',$image_id)->first();
        if(!isset($image)){
            return response()->json([
                "success"=>false,
                "MSG"=>"MSG_POST_NOT_EXISTS"
            ], 404);
        }else{
            return $image;
        }
    }

}

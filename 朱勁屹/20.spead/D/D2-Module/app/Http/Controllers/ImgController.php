<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hasd;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class ImgController extends Controller
{
    function search(Request $re) {
        $orderBy = $re->input('order_by','created_at');
        $ordertype = $re->input('order_type','asc');
        $keyword = $re->input('keyword');
        $page = $re->input('page',1);
        $page_size = $re->input('page_size',10);
        $table = DB::table('img')->where('delete',1);
        // dd($orderBy);
        if($orderBy != 'created_at' && $orderBy != 'updated_at'){
            return response()->json([
                'success'=>false,
                'MSG'=>'MSG_WROND_DATA_TYPE',
            ], 400);
        }
        if($ordertype != 'asc' && $ordertype != 'desc'){
            return response()->json([
                'success'=>false,
                'MSG'=>'MSG_WROND_DATA_TYPE',
            ], 400);
        }
        $table = $table->orderBy($orderBy,$ordertype);
        if($keyword != ''){
            $table = $table->where('title','LIKE','%'.$keyword.'%')->orwhere('title','LIKE','%'.$keyword.'%');
        }
        $images = $table->get();
        $response = collect([]);
        foreach ($images as $key => $value) {
            $user = DB::table('user')->where('id',$value->author)->first();

            $object = collect([
                'id'=>$value->id,
                'url'=>$value->url,
                'author'=>[
                    'id'=>$user->id,
                    'email'=>$user->email,
                    'nickname'=>$user->nickname,
                    'profile_image'=>$user->profile_image,
                    'type'=>$user->type,
                ],
                'title'=>$value->title,
                'description'=>$value->description,
                'width'=>$value->width,
                'height'=>$value->height,
                'mimetype'=>$value->mimetype,
                'view_count'=>$value->view_count,
                'updated_at'=>$value->updated_at,
                'created_at'=>$value->created_at,

            ]);
            $response->push($object);
        }
        $response = $response->chunk($page_size);
        return response()->json([
            'success'=>true,
            'data'=>$response->take($page),
        ]);

    }
    function popular() {
        $images = DB::table('img')->where('delete',1)->orderBy('view_count','asc')->get();
        $response = collect([]);
        foreach ($images as $key => $value) {
            $user = DB::table('user')->where('id',$value->author)->first();

            $object = collect([
                'id'=>$value->id,
                'url'=>$value->url,
                'author'=>[
                    'id'=>$user->id,
                    'email'=>$user->email,
                    'nickname'=>$user->nickname,
                    'profile_image'=>$user->profile_image,
                    'type'=>$user->type,
                ],
                'title'=>$value->title,
                'description'=>$value->description,
                'width'=>$value->width,
                'height'=>$value->height,
                'mimetype'=>$value->mimetype,
                'view_count'=>$value->view_count,
                'updated_at'=>$value->updated_at,
                'created_at'=>$value->created_at,

            ]);
            $response->push($object);
        }
        return response()->json([
            'success'=>true,
            'data'=>$response,
        ]);
    }
    function upload(Request $re) {
        $token = $re->header('access_token');
        $table = DB::table('user')->where('access_token',$token);
        $user = $table->first();
        if($table->doesntExist()){
            return response()->json([
                "success"=>false,
                "MSG"=>"MSG_INVALID_ACCESS_TOKEN",
            ], 401);
        }
        if(!$re->has(['url','title','description','width','height'])){
            return response()->json([
                'success'=>false,
                'MSG'=>'MSG_MISSING_FIELD',
            ], 400);
        }
        $validator = Validator::make($re->all(),[
            'title'=>'required',
            'description'=>'required',
            'width'=>'required|numeric',
            'height'=>'required|numeric',
            'url'=>'required|image',
        ]);
        if($validator->fails()){
            return response()->json([
                'success'=>false,
                'MSG'=>$re->all(),
            ], 400);
        }
        $image = $re->url->store('public','local');
        $image = Storage::url($image);
        $now = Carbon::now();
        $now = $now->toDateTimeString();
        $id = DB::table('img')->insertGetId([
            'author'=>$user->id,
            'url'=>$image,
            'description'=>$re->description,
            'title'=>$re->title,
            'width'=>$re->width,
            'height'=>$re->height,
            'mimetype'=>$re->url->getMimeType(),
            'updated_at'=>$now,
            'created_at'=>$now,
            'view_count'=>0,
            'delete'=>1,
        ]);
        $img = DB::table('img')->where('id',$id)->first();
        return response()->json([
            'id'=>$id,
            'author'=>[
                'id'=>$user->id,
                'email'=>$user->email,
                'password'=>$user->password,
                'nickname'=>$user->nickname,
                'profile_image'=>$user->profile_image,
            ],
            'url'=>$image,
            'description'=>$re->description,
            'title'=>$re->title,
            'width'=>$re->width,
            'height'=>$re->height,
            'mimetype'=>$re->url->getMimeType(),
            'updated_at'=>$now,
            'created_at'=>$now,
            'view_count'=>0,
            'delete'=>1,
        ]);

    }
    function updateImg(Request $re,$id) {
        $token = $re->header('access_token');
        $user = DB::table('user')->where('access_token',$token);
        if($user->doesntExist()){
            return response()->json([
                "success"=>false,
                "MSG"=>"MSG_INVALID_ACCESS_TOKEN",
            ], 401);
        }
        $image = DB::table('img')->where('id',$id)->where('delete',1);
        if($image->doesntExist()){
            return response()->json([
                'success'=>false,
                'MSG'=>'MSG_POST_NOT_EXISTS',
            ],404 );
        }
        $imageId = $image->first()->author;
        if($imageId != $user->first()->id && $user->first()->type != 'admin'){
            return response()->json([
                'success'=>false,
                'MSG'=>'MSG_PERMISSION_DENY',
            ], 403);
        }
        $now = Carbon::now();
        $now = $now->toDateTimeString();
        if(!$re->has(['title','description'])){
            return response()->json([
                "success"=>false,
                "MSG"=>'MSG_MISSING_FIELD',
            ],400 );
        }
        $validator = Validator::make($re->all(),[
            'title'=>'required',
            'description'=>'required',
        ]);
        if($validator->fails()){
            return response()->json([
                'success'=>false,
                'MSG'=>'MSG_WROND_DATA_TYPE',
            ], 400);
        }
        $image->update([
            'title'=>$re->title,
            'description'=>$re->description,
            'updated_at'=>$now,
        ]);
        return response()->json([
            'success'=>true,
        ]);
        // $image->update([
        //     'title'
        // ]);
    }
    function getImg($id) {
        $image = DB::table('img')->where('id',$id)->where('delete',1);
        if($image->doesntExist()){
            return response()->json([
                'success'=>false,
                'MSG'=>'MSG_POST_NOT_EXISTS',
            ],404 );
        }
        $count =$image->first()->view_count + 1;
        $image->update([
            'view_count'=>$count,
        ]);
        $image = $image->first();
        $user = DB::table('user')->where('id',$image->author)->first();
        return response()->json([
            'success'=>true,
            'data'=>[
                'id'=>$id,
                'author'=>[
                    'id'=>$user->id,
                    'email'=>$user->email,
                    'password'=>$user->password,
                    'nickname'=>$user->nickname,
                    'profile_image'=>$user->profile_image,
                ],
                'url'=>$image->url,
                'description'=>$image->description,
                'title'=>$image->title,
                'width'=>$image->width,
                'height'=>$image->height,
                'mimetype'=>$image->mimetype,
                'updated_at'=>$image->updated_at,
                'created_at'=>$image->created_at,
                'view_count'=>$count,
                'delete'=>$image->delete,
            ]
        ]);
    }
    function deleteImg(Request $re,$id) {
        $token = $re->header('access_token');
        $user = DB::table('user')->where('access_token',$token);
        if($user->doesntExist()){
            return response()->json([
                "success"=>false,
                "MSG"=>"MSG_INVALID_ACCESS_TOKEN",
            ], 401);
        }
        $image = DB::table('img')->where('id',$id)->where('delete',1);
        if($image->doesntExist()){
            return response()->json([
                'success'=>false,
                'MSG'=>'MSG_POST_NOT_EXISTS',
            ],404 );
        }
        $imageId = $image->first()->author;
        if($imageId != $user->first()->id && $user->first()->type != 'admin'){
            return response()->json([
                'success'=>false,
                'MSG'=>'MSG_PERMISSION_DENY',
            ], 403);
        }
        $now = Carbon::now();
        $now = $now->toDateTimeString();
        $image->update([
            'delete'=>0,
            'updated_at'=>$now,
        ]);
        return response()->json([
            'success'=>true,
        ]);


    }
}

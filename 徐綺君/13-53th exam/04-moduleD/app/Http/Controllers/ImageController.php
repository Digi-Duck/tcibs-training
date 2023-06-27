<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    function search(Request $request){
        $rules = [
            'page' => 'integer',
            'page_size' => 'integer'
        ];
        $messages = [
            'page.integer' => 'MSG_WROND_DATA_TYPE',
            'page_size.integer' => 'MSG_WROND_DATA_TYPE'
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            $error = $validator->errors()->first();
            return response()->json(['success' => false, 'error' => $error], 400);
        }else{
            if(!$request->order_by) {
                $request->order_by = 'created_at';
            }
            if(!$request->order_type){
                $request->order_type = 'desc';
            }
            if(!$request->page){
                $request->page = 1;
            }
            if(!$request->page_size){
                $request->page_size = 10;
            }

            if ($request->order_by == 'created_at' || $request->order_by == 'view_count' || $request->order_type == "asc" || $request->order_type == 'desc') {
                if ($request->keyword) {
                    $num = $request->page_size * $request->page;
                    $data = DB::table('images')->where('deleted',0)->where('title','like',"%$request->keyword%")->orWhere('description','like',"%$request->keyword%")->orderby($request->order_by,$request->order_type)->skip($num)->take($request->page_size)->get();
                    return $data;
                }else{
                    $num = $request->page_size * ($request->page - 1);
                    $data = DB::table('images')->where('deleted',0)->orderby($request->order_by,$request->order_type)->skip($num)->take($request->page_size)->get();
                    return $data;
                }
            }else{
                return response()->json(['success' => false, 'error' => 'MSG_WROND_DATA_TYPE'], 400);
            }
        }
    }

    function popular(Request $request){
        $num = $request->page_size * ($request->page - 1);
        $data = DB::table('images')->where('deleted',0)->orderby('view_count','desc')->get();
        return $data;
    }

    function images($user_id){
        $data = DB::table('images')->where('user_id',$user_id)->get();
        return $data;
    }

    function upload(Request $request){
        if ($request -> has(['title','description','image'])) {
            $rules = [
                '*' => 'required',
                'image' => 'mimes:png,jpg,jpeg',
            ];
            $messages = [
                '*.required' => 'MSG_MISSING_FIELD',
                'image.mimes' => 'MSG_INVALID_FILE_FORMAT',
            ];
            $validator = Validator::make($request->all(), $rules, $messages);
            if ($validator->fails()) {
                $error = $validator->errors()->first();
                return response()->json(['success' => false, 'error' => $error], 400);
            }else{
                $path = Storage::disk('local')->put('public/img', $request->image);
                $path = str_replace("public","storage",$path);
                $user = DB::table('log')->where('access_token',$request->header('Authorization'))->first();
                DB::table('images')->insert([
                    "url" => $path,
                    "user_id" => $user->id,
                    "title" => $request->title,
                    "description" => $request->description,
                    "width" => getimagesize($request->image)[0],
                    "height" => getimagesize($request->image)[1],
                    "mimetype" => str_replace('image/','',$request->image->getMimeType()),
                    "view_count" => 0,
                    "created_at" => date('Y-m-d H:i:s'),
                ]);
            }
        }else{
            return response()->json(['success'=>false,'error'=>'MSG_MISSING_FIELD'],400);
        }
    }

    function updata($image_id, Request $request){
        $user = DB::table('log')->where('access_token',$request->header('Authorization'))->first();
        $image = DB::table('images')->where('id',$image_id)->first();
        if($user && $image){
            if ($user->type == 'admin' || $user->id == $image->user_id) {
                if ($request->has(['title','description'])) {
                    DB::table('images')->where('id',$image_id)->update([
                        "title" => $request->title,
                        "description" => $request->description,
                        "updated_at" => date('Y-m-d H:i:s'),
                    ]);
                }else{
                    return response()->json(['success'=>false,'error'=>'MSG_MISSING_FIELD'],400);
                }
            }else{
                return repsonse()->json(['success'=>false,'error'=>'MSG_PERMISSION_DENY'],403);
            }
        }else{
            return response()->json(['success'=>false,'error'=>'MSG_POST_NOT_EXISTS'],404);
        }
    }

    function getdata($image_id){
        $image = DB::table('images')->where('id',$image_id)->first();
        if($image){
            return response()->json(['success'=>true,'data'=>$image]);
        }else{
            return response()->json(['success'=>false,'error'=>'MSG_POST_NOT_EXISTS'],404);
        }
    }

    function delete($image_id, Request $request){
        $user = DB::table('log')->where('access_token',$request->header('Authorization'))->first();
        $image = DB::table('images')->where('id',$image_id)->first();
        if($user && $image){
            if ($user->type == 'admin' || $user->id == $image->user_id) {
                DB::table('images')->where('id',$image_id)->update([
                    "deleted" => 1,
                ]);
            }else{
                return repsonse()->json(['success'=>false,'error'=>'MSG_PERMISSION_DENY'],403);
            }
        }else{
            return response()->json(['success'=>false,'error'=>'MSG_POST_NOT_EXISTS'],404);
        }
    }
}

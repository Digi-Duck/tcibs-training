<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\ErrorController;

class ImageController extends Controller
{
    public function search(Request $request){
        if(!$request->has(['order_by', 'order_type', 'keyword', 'page', 'page_size'])){//缺少必要欄位
            return (new ErrorController)->missing();
        }else{
            $validator = Validator::make($request->all(), [
                'order_by' => 'in:created_at,updated_at', 
                'order_type' => 'in:asc,desc', 
                'page' => 'integar', 
                'page_size' => 'integar|between:1,100'
            ]);
            if($validator->fails()){//資料格式錯誤
                return (new ErrorController)->data();
            }else{
                $order_by = $request->input('order_by', 'created_at');
                $order_type = $request->input('order_type', 'desc');
                $page = $request->input('page', 1);
                $page_size = $request->input('page_size', 10);
                $keyword = $request->input('keyword');
                if(empty($keyword)){
                    $post = DB::table('images_detail')
                    ->whereNull('deleted_at')
                    ->orderBy($order_by, $order_type)
                    ->get();
                }else{
                    $post = DB::table('images_detail')
                    ->whereNull('deleted_at')
                    ->where('title', 'like', '%'.$keyword.'%')
                    ->orWhere('description', 'like', '%'.$keyword.'%')
                    ->orderBy($order_by, $order_type)
                    ->get();
                }
                if($post){
                    $total = count($post);
                    $posts = $post->forPage($page, $page_size);
                    $images = $posts->map(function ($post){
                        $image = Db::table('images')
                        ->where('id', $post->image_id)
                        ->first();
                        return $image;
                    });
                    $response = [
                        "success" => true,
                        "data" => [
                            "total_count" => $total,
                            "images" => $images
                        ]
                    ];
                    return response()->json($response);
                }
            }
        }
    } 
    function popular(){
        $post = DB::table('images_detail')
        ->whereNull('deleted_at')
        ->orderBy('view_count', 'desc')
        ->get();
        $images = $posts->map(function ($post){
            $image = Db::table('images')
            ->where('id', $post->image_id)
            ->first();
            return $image;
        });
        $response = [
            "success" => true,
            "images" => $images
        ];
        return response()->json($response);
    }
    function browse($user_id){
        $post = DB::table('images_detail')
        ->whereNull('deleted_at')
        ->where('user_id', $user_id)
        ->get();
        $images = $posts->map(function ($post){
            $image = Db::table('images')
            ->where('id', $post->image_id)
            ->first();
            return $image;
        });
        $response = [
            "success" => true,
            "images" => $images
        ];
        return response()->json($response);
    }

    //------
    function upload(Request $request){
        $user = DB::table('users')->where('access_token', $request->header('Authorization'))->first();
        if(!$user){//無效 token
            return (new ErrorController)->token();
        }else{
            if(!$request->has(['title', 'description', 'url'])){//缺少必要欄位
                return (new ErrorController)->missing();
            }else{
                $validator = Validator::make($request->all(), [
                    'title' => 'required',
                    'description' => 'required'
                ]);
                if($validator->fails()){//資料格式錯誤
                    return (new ErrorController)->data();
                }else{
                    $fileValidator = Validator::make($request->all(), [
                        'url' => 'file|mimes:jpg,jpeg,png'
                    ]);
                    if($fileValidator->fails()){//檔案格式錯誤
                        return (new ErrorController)->file();
                    }else{
                        $path = $request->url->store('public');
                        $url = Storage::url($path);
                        if($url){
                            $filePath = storage_path('app/'.$path);
                            $detail = getimagesize($filePath);
                            $now = now()->format("Y-m-d\TH:i:s");
                            $image_id = DB::table('images')->insertGetId([
                                'title' => $request->title,
                                'url' => $url,
                                'created_at' => $now
                            ]);
                            $id = DB::table('images_detail')->insertGetId([
                                'title' => $request->title,
                                'url' => $url,
                                'width' => $request->$detail[0],
                                'height' => $request->$detail[1],
                                'mimetype' => $request->$detail[2],
                                'created_at' => $now,
                                'user_id' => $user->id,
                                'image_id' => $image_id,
                            ]);
                            $image = DB::table('images_detail')->where('image_id', $id)->first();
                            $author = (array)$user;
                            unset($author['password']);
                            $data =  [
                                'id' => $id,
                                'url' => $url,
                                'author' => $author,
                                'title' => $request->title,
                                'description' => $request->description,
                                'width' => $detail[0],
                                'height' => $detail[1],
                                'mimetype' => $detail['mime'],
                                'view_count' => $image->view_count,
                                'created_at' => $image->created_at,
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
    }
    function update(Request $request, $image_id){
        $user = DB::table('users')->where('access_token', $request->header('Authorization'))->first();
        if(!$user){//無效 token
            return (new ErrorController)->token();
        }else{
            if($user->type != 'admin'){//權限不足
                return (new ErrorController)->permission();
            }else{
                $post = DB::table('images')->where('id', $image_id);
                if($post->doesntExist()){//圖片不存在
                    return (new ErrorController)->post();
                }else{
                    if(!$request->has(['title', 'description'])){//缺少必要欄位
                        return (new ErrorController)->missing();
                    }else{
                        $validator = Validator::make($request->all(), [
                            'title' => 'required',
                            'description' => 'required'
                        ]);
                        if($validator->fails()){//資料格式錯誤
                            return (new ErrorController)->data();
                        }else{
                            $now = now()->format("Y-m-d\TH:i:s");
                            $post->update([
                                'title' => $request->title
                            ]);
                            DB::table('images_detail')->where('image_id', $image_id)->update([
                                'title' => $request->title,
                                'description' => $request->description,
                                'updated_at' => $now
                            ]);
                            $image = DB::table('images_detail')->where('image_id', $image_id)->first();
                            $author = (array)$user;
                            unset($author['password']);
                            $data =  [
                                'id' => $id,
                                'url' => $url,
                                'author' => $author,
                                'title' => $request->title,
                                'description' => $request->description,
                                'width' => $detail[0],
                                'height' => $detail[1],
                                'mimetype' => $detail['mime'],
                                'view_count' => $image->view_count,
                                'created_at' => $image->created_at,
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
    }
    function getImg($image_id){
        $post = DB::table('images')->where('id', $image_id);
        if($post->doesntExist()){//圖片不存在
            return (new ErrorController)->post();
        }else{
            DB::table('images_detail')->where('image_id', $image_id)->update([
                'view_count' => DB::raw('view_count + 1')
            ]);
            $image = DB::table('images_detail')->where('image_id', $image_id)->first();
            $author = (array)$user;
            unset($author['password']);
            if($image->mimetype == 2){
                $mime = 'jpg';
            }else if($image->mimetype == 3){
                $mime = 'png';
            }
            $data =  [
                'id' => $image_id,
                'url' => $image->url,
                'author' => $author,
                'title' => $image->title,
                'description' => $request->description,
                'width' => $imgae->width,
                'height' => $imgae->height,
                'mimetype' => $mime,
                'view_count' => $image->view_count,
                'created_at' => $image->created_at,
            ];
            $response = [
                "success" => true,
                "data" => $data
            ];
            return response()->json($response);
        }
    }
    function delImg($image_id){
        $user = DB::table('users')->where('access_token', $request->header('Authorization'))->first();
        if(!$user){//無效 token
            return (new ErrorController)->token();
        }else{
            if($user->type != 'admin'){//權限不足
                return (new ErrorController)->permission();
            }else{
                $post = DB::table('images')->where('id', $image_id);
                if($post->doesntExist()){//圖片不存在
                    return (new ErrorController)->post();
                }else{
                    $now = now()->format("Y-m-d\TH:i:s");
                    DB::table('images_detail')->where('image_id', $image_id)->update([
                        'deleted_at' => $now
                    ]);
                    $response = [
                        "success" => true
                    ];
                    return response()->json($response);
                }
            }
        }
    }
}

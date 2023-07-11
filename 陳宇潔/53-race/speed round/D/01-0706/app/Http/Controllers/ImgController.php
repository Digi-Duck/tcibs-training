<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ErrorController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ImgController extends Controller
{
    public function search(){
        if(!$request->has(['email', 'password'])){//缺少必要欄位
            return (new ErrorController)->missing();
        }else {
            $validator = Validator::make($request->all(),[
                'order_by' => 'in:created_at,update_at',
                'ordey_type' => 'in:asc,desc',
                'page' => 'integar',
                'page_size' => 'integar|between:1,100',
            ]);
            if($validator->fails()){ //格式不正確
                return (new ErrorController)->data();
            }else{
                if(empty($request -> order_by)){
                    $request->order_by = 'created_at';
                }
                if(empty($request -> order_type)){
                    $request->order_type = 'desc';
                }
                if(empty($request -> page)){
                    $request->page = '1';
                }
                if(empty($request -> page_size)){
                    $request->page_size = '10';
                }
                if(empty($request -> keyword)){
                    $post = DB::table('image_detail')
                    ->whereNull('deleted_at')
                    ->orderBy($request->order_by, $request->order_type)
                    ->get();
                }else{
                    $post = DB::table('image_detail')
                    ->whereNull('deleted_at')
                    ->where('title','like','%'.$request->keyword.'%')
                    ->orWhere('description','like','%'.$request->keyword.'%')
                    ->orderBy($request->order_by, $request->order_type)
                    ->get();
                }
                if($post){
                    $total = $posts->count();
                    $page = $request->page;
                    $pageSize = $request -> page_size;
                    $post = $post->chunk($pageSize);
                    $result = $post->slice(0, $page + 1)->toArray();
                    $response = [
                        "success" => true,
                        "data" => [
                            "total_count" => $total,
                            "images" => $result
                        ]
                    ];
                    return response()->json($response);
                }
            }
        }
    }
    public function popular(){
        $post = DB::table('image_detail')->whereNull('deleted_at')->orderBy('view_count', 'desc')->get();
        $response = [
            "success" => true,
            "data" => $post
        ];
        return response()->json($response);
    }
    public function browse($id){
        $post = DB::table('image')->whereNull('deleted_at')->where('user_id', $id)->get();
        if(!$post){
            return (new ErrorController)->user();
        }else{
            $response = [
                "success" => true,
                "data" => $post
            ];
            return response()->json($response);
        }
    }
    public function upload(Request $request){
        $user = DB::table('user')->where('access_token', $request->header('Authorization'))->first();
        if(!$user){ //無效的token
            return (new ErrorController)->token();
        }else{
            if(!$request->has(['title', 'description', 'url'])){//缺少必要欄位
                return (new ErrorController)->missing();
            }else {
                $validator1 = Validator::make($request->all(),[
                        'title' => 'required',
                        'description' => 'required'
                    ]);
                if($validator1->fails()){//格式不正確
                        return (new ErrorController)->data();
                }else{
                    $validator2 = Validator::make($request->all(),[
                        'url' => 'file|mimes:jpg,jpeg,png',
                    ]);
                    if($validator2->fails()){//檔案格式錯誤
                        return (new ErrorController)->file();
                    }else{
                        $path = $request->url->store('public');
                        $url = Storage::url($path);
                        $filePath = storage_path('app/'.$path);
                        $detail = getimagesize($filePath);
                        $now = now()->format('Y-m-d\TH:i:s');
                        return response()->json($response);
                        $imgId = DB::table('image')->insertGetId([
                            'title' => $request -> title,
                            'url' => $url,
                            'user_id' => $user -> id,
                            'created_at' => $now
                        ]);
                        DB::table('image_detail')->insert([
                            'title' => $request -> title,
                            'url' => $url,
                            'user_id' => $user -> id,
                            'image_id' => $imgId,
                            'description' => $request -> description,
                            'created_at' => $now,
                            'width' => $detail[0],
                            'height' => $detail[1],
                            'mimetype' => $detail[2],
                        ]);
                    }
                }
            }
        }
    }
    public function update(Request $request, $id){
        $user = DB::table('user')->where('access_token', $request->header('Authorization'))->first();
        if(!$user){ //無效的token
            return (new ErrorController)->token();
        }else{
            if($user->type != 'admin'){ //權限不足
                return (new ErrorController)->permission();
            }else{
                if(!$request->has(['title', 'description'])){//缺少必要欄位
                    return (new ErrorController)->missing();
                }else {
                    $validator1 = Validator::make($request->all(),[
                            'title' => 'required',
                            'description' => 'required'
                        ]);
                    if($validator1->fails()){//格式不正確
                            return (new ErrorController)->data();
                    }else{
                        $post = DB::table('image')->where('id', $id)->first();
                        if(!$post){ //不存在的圖片
                            return (new ErrorController)->post();
                        }else{
                            $now = now()->format('Y-m-d\TH:i:s');
                            return response()->json($response);
                            DB::table('image')->where('id', $id)->update([
                                'title' => $request -> title
                            ]);
                            DB::table('image_detail')->where('image_id', $id)->update([
                                'title' => $request -> title,
                                'description' => $request -> description,
                                'updated_at' => $now
                            ]);
                        }
                    }
                }
            }
        }
    }
    public function getImg(Request $request, $id){
        $post = DB::table('image')->whereNull('deleted_at')->where('id', $id)->get();
        if($post){
            DB::table('image_detail')->where('image_id', $id)->update(['view_count' => DB::raw('view_count +1')]);
            $data = DB::table('image_detail')->where('img_id', $id)->get();
            $response = [
                "success" => true,
                "data" => $data
            ];
            return response()->json($response);
        }
    }
    public function delImg(Request $request, $id){
        $user = DB::table('user')->where('access_token', $request->header('Authorization'))->first();
        if(!$user){ //無效的token
            return (new ErrorController)->token();
        }else{
            if($user->type != 'admin'){ //權限不足
                return (new ErrorController)->permission();
            }else{
                $post = DB::table('image')->whereNull('deleted_at')->where('id', $id)->get();
                if(!$post){ //圖片不存在
                    return (new ErrorController)->post();
                }else{
                    DB::table('image_detail')->where('img_id', $id)->update(['deleted_at' => null]);
                }
            }
        }
    }
}

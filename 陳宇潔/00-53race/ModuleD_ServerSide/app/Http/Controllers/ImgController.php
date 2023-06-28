<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage; // php artisan storage:link

class ImgController extends Controller
{
    public function searchImg(Request $request)
    {
        $errorController = new ErrorController();
        if (!($request -> has(['order_by', 'order_type', 'keyword', 'page', 'page_size']))) { // 缺少必要欄位
            return $errorController -> missing();
        } else {
            $validator = Validator::make($request -> all(), [
                'order_by' => 'in:created_at, updated_at',
                'order_type' => 'in:asc, desc',
                'keyword' => 'nullable',
                'page' => 'nullable|integer',
                'page_size' => 'nullable|integer|between:1,100'
            ]);
            // if($request -> order_by === null || $request -> order_type === null){
                if ($validator -> fails()) { // 格式不正確
                    return $errorController -> data();
                }else{
                if(empty($request -> order_by)){
                    $request -> order_by = 'created_at';
                }
                if(empty($request -> order_type)){
                    $request -> order_type = 'desc';
                }
                if(empty($request -> keyword)){
                    $post = DB::table('img_detail') -> whereNull('deleted_at') -> get();
                }else{
                    $post = DB::table('img_detail') -> whereNull('deleted_at') -> where('title', 'like', '%' . $request -> keyword . '%') -> orwhere('description', 'like', '%' . $request -> keyword . '%') -> get();
                }
                if(empty($request -> page)){
                    $request -> page = '1';
                }
                if(empty($request -> page_size)){
                    $request -> page_size = '10';
                }
                if($post){
                    $total = $post -> count();
                    $page = $request -> page;
                    $pageSize = $request -> page_size;
                    $posts = $post -> chunk($pageSize);
                    $result = $posts -> slice(0, $page + 1) -> toArray();
                    $response = [
                        "success" => true,
                        "total_count" => $total,
                        "data" => $result
                    ];
    
                    return response()->json($response);
                }
            }
        }
    }
    public function popularImg()
    {
        $hot = DB::table('img_detail') -> whereNull('deleted_at') -> orderBy('view_count', 'desc') -> get();
        $response = [
            "success" => true,
            "data" => $hot
        ];
        return response()->json($response);
    }

    public function browseImg($id)
    {
        $errorController = new ErrorController();
        $user =  DB::table('img') -> where('id', $id) -> exists();
        if($user){
            $img = DB::table('img') -> where('user_id', $id) -> whereNull('deleted_at') -> get();
            $response = [
                "success" => true,
                "data" => $img
            ];
            return response()->json($response);
        }else{
            return $errorController -> user(); // 不存在使用者
        }
    }

    public function uploadImg(Request $request){
        $errorController = new ErrorController();
        $user = DB::table('log') -> where('access_token', $request -> header('Authorization')) -> first();
        if ($user) {
            if (!($request -> has(['title', 'description', 'img']))) { // 缺少必要欄位
                return $errorController -> missing();
            } else {
                $validator2 = Validator::make($request -> all(), [
                    'img' => 'file|mimes:jpg,jpeg,png'
                ]);
                if ($validator2 -> fails()) { // 格式不正確
                    return $errorController -> file();
                }
                $validator = Validator::make($request -> all(), [
                    'title' => 'required',
                    'description' => 'required'
                ]);
                if ($validator -> fails()) { // 格式不正確
                    return $errorController -> data();
                }else{
                    $path = $request -> img -> store('public');
                    $url = Storage::url($path);
                    $filePath = storage_path('app/'.$path);
                    $imageInfo = getimagesize($filePath);
                    $now = now()->format('Y-m-d\TH:i:s');
                    if($url){ 
                        $img = [
                            'title' => $request -> title,
                            'url' => $url,
                            'created_at'=> $now
                        ];
                        $imgDetail = [
                            'title' => $request -> title,
                            'description' => $request -> description,
                            'user_id' => $user -> id,
                            'url' => $url,
                            'width' => $imageInfo[0],
                            'height' => $imageInfo[1],
                            'mimetype' => $imageInfo['mime'],
                            'created_at' => $now
                        ];
                        $imgId = DB::table('img')->insertGetId([
                            'title' => $request -> title,
                            'url' => $url,
                            'user_id'=> $user -> id,
                            'created_at'=> now()->format('Y-m-d H:i:s')
                        ]);
                        // dd($imageInfo);
                        DB::table('img_detail')->insert([
                            'url' => $url,
                            'user_id' => $user -> id,
                            'title' => $request -> title,
                            'description' => $request -> description,
                            'width' => $imageInfo[0],
                            'height' => $imageInfo[1],
                            'mimetype' => $imageInfo[2],
                            'img_id' => $imgId,
                            'created_at'=> now()->format('Y-m-d H:i:s')
                        ]);
                        return response()->json([ 'img' => $img, 'imgDetail' => $imgDetail]);
                    }
                }
            }
        }else{
            return $errorController -> permission(); // 權限不足
        }
    }
    public function updateImg(Request $request, $id){
        $user = DB::table('log') -> where('access_token', $request -> header('Authorization'));
        if ($user) {
            $img = DB::table('img') -> where('id', $id) -> first();
            if (!($request -> has(['title', 'description']))) { // 缺少必要欄位
                return $errorController -> missing();
            } else {
                $validator = Validator::make($request -> all(), [
                    'title' => 'required',
                    'description' => 'required',
                    'profile_image' => 'file|mimes:jpg,jpeg,png'
                ]);
                if ($validator -> fails()) { // 格式不正確
                    return $errorController -> data();
                }
                $img = DB::table('img') -> where('id', $id) -> first();
                if (!$img) { // 圖片不存在
                    return $errorController -> post();
                }else{
                    $path = $request -> img -> store('public');
                    $url = Storage::url($path);
                    if($url){ 
                        $img = [
                            'title' => $request->title,
                            'img' => $url
                        ];
                        DB::table('img')->where('id', $imgId)->update($img);
                        $imgDetail = [
                            'title' => $request->title,
                            'description' => $request->description
                        ];
                        DB::table('img_detail')->where('img_id', $imgId)->update($imgDetail);
                    }
                }
            }
        }else{
            return $errorController -> permission(); // 權限不足
        }
    }
    public function getImgData(Request $request, $id){
        DB::table('img_detail') -> where('img_id', $id) -> update(['view_count' => DB::raw('view_count + 1')]);
    }
    public function delImg(Request $request, $id){
        $user = DB::table('log') -> where('access_token', $request -> header('Authorization'));
        if ($user) {
            DB::table('img')->where('id', $id)->update(['deleted_at' => now()]);
        }else{
            return $errorController -> permission(); // 權限不足
        }
    }
}

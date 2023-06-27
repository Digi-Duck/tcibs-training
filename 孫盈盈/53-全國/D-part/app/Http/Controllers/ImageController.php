<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use App\Http\Controllers\ErrorController;

class ImageController extends Controller
{
    //還未做完
    public function selectPhoto(Request $request){
        
        $order_by = ($request->filled('order_by'))?$request->order_by:'created_at';
        $order_type = ($request->filled('order_type'))?$request->order_type:'desc';
        $page = ($request->filled('page'))?$request->page:1;
        $page_size = ($request->filled('page_size'))?$request->page_size:10;

        $images = DB::table('image');
        $image_array = array();

        $total = 0;
        foreach($images as $key => $image){
            if(empty($image -> delete_at)){
                $total++;
                DB::table('image')->where('id', $image->id)->update(['view_count'=>DB::raw('view_count + 1')]);
                $update_image = DB::table('image')->where('id', $image->id)->first();
                $image_array[] = $update_image;
            }
        }
        $s = array_chunk($image_array, $page_size);

        return $total;
    }

    public function hotPhoto(){
        $images = DB::table('image')->orderby('view_count', 'desc')->get();
        $image_array = array();
        foreach($images as $image){
            if(empty($image->delete_at)){
                $image_array = $image;
            }
        }
        return $image_array;
    }

    public function userPhoto(Request $request, $user_id){
        $user = DB::table('user')->where('id', $user_id);
        if($user->doesntExist()){
            return ErrorController::user();
        }else{
            $images = DB::table('image')->where('user_id', $user_id)->get();
            $image_array = array();
            foreach($images as $image){
                if(empty($image->delete_at)){
                    $image_array = $image;
                }
            }
            return $image_array;
        }
    }

    public function add_photo(Request $request){
        $user = DB::table('user')->where('accessToken', $request->header('Authorization'))->first();
        if(!$request->has(['file', 'title', 'desciption'])){
            return ErrorController::body_null();
        }else{
            $path = $request->file->store('public');
            $url = Storage::url($path);
            $imageSize = getimagesize($request->file);
            DB::table('image')->insert([
                'user_id'=>$user->id,
                'url'=>$url,
                'title'=>$request->title,
                'desciption'=>$request->desciption,
                'width'=>$imageSize[0],
                'height'=>$imageSize[1],
                'mimetype'=>$imageSize[2],
                'view_count'=>0,
                'updated_at'=>'',
                'created_at'=>date('Y-m-d').'T'.date('H:i:s'),
                'delete_at'=>''
            ]);
            return 'add success';
        }
    }

    public function update_photo(Request $request, $image_id){
        $user = DB::table('user')->where('accessToken', $request->header('Authorization'))->first();
        $image = DB::table('image')->where('id', $image_id)->first();
        if(DB::table('image')->where('id', $image_id)->doesntExist()){
            return ErrorController::picture();
        }else if(empty($request->header('Authorization'))){
            return ErrorController::access_token();
        }else if(!$request->has(['file', 'title', 'desciption'])){
            return ErrorController::body_null();
        }else if($image->user_id !== $user->id){
            return [ErrorController::level()];
        }else{
            $path = $request->file->store('public');
            $url = Storage::url($path);
            $imageSize = getimagesize($request->file);

            DB::table('image')->where('id', $image_id)->update([
                'user_id'=>$user->id,
                'url'=>$url,
                'title'=>$request->title,
                'desciption'=>$request->desciption,
                'width'=>$imageSize[0],
                'height'=>$imageSize[1],
                'mimetype'=>$imageSize[2],
                'updated_at'=>date('Y-m-d\TH:i:s')
            ]);
            return 'update success';
        }
    }

    public function delete_photo(Request $request, $image_id){
        $user = DB::table('user')->where('accessToken', $request->header('Authorization'))->first();
        $image = DB::table('image')->where('id', $image_id)->first();
        if(DB::table('image')->where('id', $image_id)->doesntExist()){
            return ErrorController::picture();
        }else if($image->user_id !== $user->id){
            return ErrorController::level();
        }else{
            DB::table('image')->where('id', $image_id)->update([
                'delete_at'=>date('Y-m-d\TH:i:s')
            ]);
            return 'delete success';
        }
    }

    public function get_photo_data(Request $request, $image_id){
        $image = DB::table('image')->where('id', $image_id);
        if($image->doesntExist()){
            return ErrorController::picture();
        }else{
            $image = $image->first();
            return $image;
        }

    }


}

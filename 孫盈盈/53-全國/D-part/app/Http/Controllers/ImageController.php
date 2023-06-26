<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use App\Http\Controllers\ErrorController;

class ImageController extends Controller
{
    public function selectPhoto(){

    }

    public function hotPhoto(){

    }

    public function userPhoto(){

    }

    public function add_photo(Request $request){
        $user = DB::table('user')->where('accessToken', $request->header('Authorization'))->first();
        if(!$request->has(['file', 'title', 'desciption'])){
            return ErrorController::body_null();
        }else{
            $path = $request->file->store('public');
            $url = Storage::url($path);
            $imageSize = getimagesize($request->file);
            $p = $request->file('file')->getClientOriginalExtension();
            DB::table('image')->insert([
                'user_id'=>$user->id,
                'url'=>$url,
                'title'=>$request->title,
                'desciption'=>$request->desciption,
                'width'=>$imageSize[0],
                'height'=>$imageSize[1],
                'mimetype'=>$p,
                'view_count'=>0,
                'update_at'=>'',
                'create_at'=>date('Y-m-d').'T'.date('H:i:s'),
                'delete_at'=>''
            ]);
            return date('Y-m-d H:i:s');
        }
    }

    public function update_photo(Request $request, $image_id){
        $user = DB::table('user')->where('accessToken', $request->header('Authorization'))->first();
        return $request->input();
        // if(!$request->has(['file', 'title', 'desciption'])){
        //     return ErrorController::body_null();
        // }else{
        //     $path = $request->file->store('public');
        //     $url = Storage::url($path);
        //     $imageSize = getimagesize($request->file);
        //     $p = $request->file('file')->getClientOriginalExtension();

        //     DB::table('image')->where('id', $image_id)->update([
        //         'user_id'=>$user->id,
        //         'url'=>$url,
        //         'title'=>$request->title,
        //         'desciption'=>$request->desciption,
        //         'width'=>$imageSize[0],
        //         'height'=>$imageSize[1],
        //         'mimetype'=>$p,
        //         'update_at'=>date('Y-m-d').'T'.date('H:i:s')
        //     ]);
        //     return date('Y-m-d H:i:s');
        // }
    }

    public function delete_photo(){

    }

    public function get_photo_data(){

    }


}

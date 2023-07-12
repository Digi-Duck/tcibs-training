<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Stroage;
use Carbon\Carnon;
use Illumimate\Support\Facades\Validator;

class TextControler extends Controller
{
    function getComments($id) {

    }
    function updateComments(Request $re,$id) {
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

        $now = Carbon::now();
        $now = $now->toDateTimeString();

        if(!$re->has(['text'])){
            return response()->json([
                "success"=>false,
                "MSG"=>'MSG_MISSING_FIELD',
            ],400 );
        }
        $validator = Validator::make($re->all(),[
            'text'=>'required',
        ]);
    }
}

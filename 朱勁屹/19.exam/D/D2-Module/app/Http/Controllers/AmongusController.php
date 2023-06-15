<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AmongusController extends Controller
{
    function login(REQUEST $request){
        $re = $request->post();
        $data = DB::table('login')->get();
        foreach ($data as $key => $value) {

        }
        if(!isset($data['email']) || !isset($data['password'])){

        }else{
            $user = DB::table('login')->where('email',$data['email']);
            $sha =Hash::make($plaintext, [$data['email'] => 'sha256']);
            if(!isset($user)){

            }else{
                if($user->password == $data['password']){

                }else{
                    return response()->json([
                        "success"
                    ], 403);
                }
            }
        }
        return $data;
    }
}

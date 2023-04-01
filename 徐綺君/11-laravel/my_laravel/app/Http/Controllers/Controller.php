<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;


    public function say(){
        return view('say');
    }

    public function comment(){
        return view('comment');
    }


    public function microsoft(){
        $data = DB::table('news')->orderBy('id','desc')->take(4)->get();
        return view('microsoft-1',['data' => $data]);
    }
}

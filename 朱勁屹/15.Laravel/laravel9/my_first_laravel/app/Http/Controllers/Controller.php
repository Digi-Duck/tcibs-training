<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    
    public function index()
    {
        // return "a";
    }
    public function new(Request $request)
    {
        $data = DB::table('news_tabe')->get();
        
        // DB::table('news_tabe')->insert([
        //     'title' =>$request->title,
        //     'content' => $request->content,
        //     'img' => $request->img

        // ]);
        // return redirect('/index');導向畫面
            
    }
}


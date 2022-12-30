<?php

namespace App\Http\Controllers;//controller 導入

use Illuminate\support\facades\DB;//導入資料庫
use Illuminate\Http\Request;//HTTP 請求

class FrontController extends Controller
{
    //
    // public function hello()
    // {
    //     return view('hello');
    // }

    public function hello()
    {
        
        return view('hello');
    }
    public function news()
    {
        $news = DB::table('news')->get();
        // dd($news);

        return view('news',compact('news'));
    }
    public function newsContent($id)
    {
        //透過id找資料
        // $news = DB::table('news')->find($id);
        $news = DB::table('news')->where('id',$id)->get();

        // dd($news);
        return view('newsContent',compact('news'));
    }
}


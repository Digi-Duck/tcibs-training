<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    /**
     * Show the profile for a given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */

    public function index()
    {
        return view('index');
    }

    public function hello($id = null)
    {
        $name = 'jenny';
        $age = 16;

        dd(compact('name','age','id'));

        // return view('hello',['name' => $name,'age' => $age]);
        return view('hello',compact('name','age','id'));
        // return view('hello',)->with('name',$name)->with('age',$age);
    }
    public function news()
    {
        $news = DB::table('news')->get();
        // dd($news);
        return view("news",compact('news'));
    }
    public function newsContent($id)
    {
        //透過id尋找資料
        $news = DB::table('news')->find($id);

        // $news = DB::table('news')->where('id',$id)->get();

        // $news = DB::table('news')->where('id',$id)->first();
        // dd($news->title);

        return view('news-content',compact('news'));
    }
}

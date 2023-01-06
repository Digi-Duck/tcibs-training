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
    public function createNews()
    {
        DB::table('news')->insert([
            'title'=>'111年「台灣好行」評比出爐，持續提供優質旅運服務',
            'date'=>'2022-12-27',
            'content'=>'111年「台灣好行」評鑑結果頒獎暨成果分享會今（27）日於交通部觀光局旅遊服務中心舉行，由交通部觀光局局長張錫聰親自出席，除了鼓勵各獲獎績優單位與人員並頒發獎牌、獎金外，會中亦由績優單位分享提升服務品',
            'image_url'=>'https://www.taiwan.net.tw/pic.ashx?qp=/0042791/13_0042791_1.jpg&sizetype=2',
        ]);

        return 'success';
    }
}

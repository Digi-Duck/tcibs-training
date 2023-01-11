<?php

namespace App\Http\Controllers;

use App\models\News;
use App\Models\Contact;
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

    public function newsList()
    {
        // $news = DB::table('news')->get();
        $news = News::get();

        // dd($news);
        return view("front.news.list",compact('news'));
    }

    public function newsContent($id)
    {
        //透過id尋找資料
        $news = News::find($id);
        // dd($news);
        // $news = DB::table('news')->where('id',$id)->get();

        // $news = DB::table('news')->where('id',$id)->first();
        // dd($news->title);

        return view('front.news.content',compact('news'));
    }


    public function contact(Request $request)
    {
        Contact::create([
            'name'=>$request->name,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'content'=>$request->content,
        ]);

        return redirect('/');
    }

}

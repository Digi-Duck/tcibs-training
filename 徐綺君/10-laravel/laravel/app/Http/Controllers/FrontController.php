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
        // $news = DB::table('news')->get();
        $news = News::get();

        // dd($news);
        return view("news",compact('news'));
    }

    public function newsContent($id)
    {
        //透過id尋找資料
        $news = News::table('news')->find($id);

        // $news = DB::table('news')->where('id',$id)->get();

        // $news = DB::table('news')->where('id',$id)->first();
        // dd($news->title);

        return view('news-content',compact('news'));
    }

    public function createNews()
    {
        return view('news-create');
    }

    public function storeNews(Request $request)
    {
        // News::create([
        //     'title' => $request->title,
        //     'date' => $request->date,
        //     'image_url' => $request->image_url,
        //     'content' => $request->content,
        // ]);
        News::create($request->all());
        // dd($request->all());
        return redirect('/create-news');
    }

    public function updateNews($id)
    {
        News::find($id)->update([
            'title'=>'5555',
            'date'=>'3012-3-3',
        ]);

        return 'update success';
    }

    public function destroyNews($id)
    {
        News::find($id)->delete();

        return 'delete success';
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

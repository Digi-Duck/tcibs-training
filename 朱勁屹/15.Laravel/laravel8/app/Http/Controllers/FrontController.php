<?php

namespace App\Http\Controllers;//controller 導入

use App\Models\News;//導入Models->News
use App\Models\Indb;
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
        $news = News::get();
        // dd($news);

        return view('news-list',compact('news'));
    }
    public function newsContent($id)
    {
        //透過id找資料
        // $news = DB::table('news')->find($id);
        $news = DB::table('news')->where('id',$id)->get();

        // dd($news);
        return view('newsContent',compact('news'));
    }
    public function createNews()
    {
        News::insert([
            'title'=>'udshfniakhfm',
            'date'=>'2022-01-07',
            'content'=>'susususususususus',
            'image_url'=>'data:image/png;base64,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',
        ]);

        // $news = new News;
        // $news->title = 'udshfniakhfm';
        // $news->data = '2022-01-07';
        // $news->content = 'susususususususus';
        // $news->image_url = 'data:image/png;base64,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';
        // $news->save();

        return 'success';
        //新增model->php artisan make:model Name
    }
    public function updateNews($id)
    {
        News::find($id)->update([
            'title'=>'5555',
        ]);

        return 'success';
    }

    public function deleteNews($id)
    {
        News::find($id)->delete();
        return 'success';
    }

    public function content(Request $request)
    {
        Contect::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'content' => $request->content,
        ]);
        //$request->key
        //傳過來的值會在->$request
        //return redirect("/news);
    }
    public function inputform()
    {
        return view("/inputform");
    }
    public function inDB(Request $a)
    {
        Indb::insert([
            'name'=> $a->name,
            'thing'=> $a->thing,
            'number'=> $a->number,
        ]);
        return 'succes';
    }
    public function index()
    {
        return view('welcome');
    }
}
//建migration
//php artisan make:migration_name_name


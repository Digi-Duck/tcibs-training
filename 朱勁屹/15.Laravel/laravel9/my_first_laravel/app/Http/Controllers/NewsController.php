<?php

namespace App\Http\Controllers;

use App\Models\NewTabe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;




class NewsController extends Controller
{
    public function mi()
    {
        $data = DB::table('news_tabe')->get();
        
        return view('index');
    }
    public function cool()
    {
        $comments = NewTabe::orderby('id','desc')->get();
        // dd($comments);
        // $data = DB::table('news_tabe')->get();
        $data = $comments;

        return view('cool',compact('data'));
    }

    public function insert(Request $request)
    {
        // DB::table('news_tabe')->insert([
        //     'title'=>$request->title,
        //     'content'=>$request->content,
        //     'img'=>$request->img
        // ]);
        NewTabe::create([
            'title'=>$request->title,
            'content'=>$request->content,
            'img'=>$request->img
        ]);
        return redirect("/cool");
    }

    public function update($id)
    {
        
        $data = DB::table('news_tabe')->where('id',$id)->first();
       return view("updateView",compact('data'));
    }

    public function updateup(Request $re)
    {
        $id = $re->id;
        DB::table('news_tabe')->where('id',$id)->update([
            'title' => $re->title,
            'content' => $re->content,
            'img' => $re->img,
        ]);
        return redirect('/cool');

    }

    public function delete($id)
    {
        DB::table('news_tabe')->where('id',$id)->delete();
        return redirect('/cool');
    }
}

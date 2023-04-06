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


    public function say(){
        return view('say');
    }

    public function comment(){
        $comments = DB::table('comments')->orderby('id','desc')->get();
        return view('comment',compact('comments'));
    }

    public function save_comment(Request $request)
    {
        DB::table('comments')->insert([
            'title' => $request -> title,
            'name' => $request -> name,
            'content' => $request -> content,
            'email' => $request -> email,
        ]);

        return redirect('/comment');
    }

    public function dalete_comment($id)
    {
        $deleted = DB::table('comments')->where('id',$id)->delete();
        return redirect('/comment');
    }

    public function edit_comment($id)
    {
        // $comment = DB::table('comments')->where('id',$id)->first();
        $comment =  DB::table('comments')->find($id);
        // dd($comment);
        return view('update',compact('comment'));
    }

    public function update_comment($id, Request $request)
    {

        //DB操作
        $comment =  DB::table('comments')->where('id',$id)->update([
            'title' => $request -> title,
            'name' => $request -> name,
            'content' => $request -> content,
            'email' => $request -> email,
        ]);

        return redirect('/comment');
    }

    public function microsoft(){
        $data = DB::table('news')->orderBy('id','desc')->take(4)->get();
        return view('microsoft-1',['data' => $data]);
    }
}

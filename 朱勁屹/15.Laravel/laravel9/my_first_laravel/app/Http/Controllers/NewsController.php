<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;




class NewsController extends Controller
{
    public function mi()
    {
        $data = DB::table('news_tabe')->get();
        dd($data);
        return view('index');
    }
}

<?php

namespace App\Http\Controllers;
use Illuminate\support\facades\DB;
use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::get();
        return view('admin.news.index',compact('news'));
    }
}

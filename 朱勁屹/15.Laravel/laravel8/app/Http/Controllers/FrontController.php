<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        
        return view('news');
    }
}


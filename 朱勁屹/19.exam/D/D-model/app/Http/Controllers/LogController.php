<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogController extends Controller
{
    function login(REQUEST $request){
        $a = json_decode($request->getContent());
        return $a;
    }
}

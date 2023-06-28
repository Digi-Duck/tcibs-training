<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB; // 需要引入 DB 類別

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function yourMethod()
    {
        $data = DB::table('user')->get();
        dd($data);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    // 資料表名稱
    protected $table = 'commetns';

    // 資料表主key
    protected $primaryKey = 'id';

    //model可以適使用黑名單或白名單(二選一) 去設定可填寫欄位

    protected $fillable = ['title','name','contect','email']; //整張表格只有name可以被填寫

    // protected $guard = ['created_at','update_at','id']; //除了左邊三個以外 其他都能被填寫
}

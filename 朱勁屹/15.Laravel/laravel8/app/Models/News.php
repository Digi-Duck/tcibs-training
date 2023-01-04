<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $table = 'news';

    //白名單 填充
    protected $fillable = ['title','date','content','image_url'];

    //黑名單 保護
    // protected [''];
}

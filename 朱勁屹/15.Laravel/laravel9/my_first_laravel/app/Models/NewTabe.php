<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewTabe extends Model
{
    use HasFactory;
    protected $table = "news_tabe";
    protected $key = "id";

    protected $fillable = ['title','content','img'];//白名單

    // protected $guard = ['name'];//黑名單
}

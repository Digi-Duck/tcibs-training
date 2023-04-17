<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $table = 'banners';

    // 資料表主key
    protected $primaryKey = 'id';

    protected $fillable = ['img_path','img_opacity','weight'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indb extends Model
{
    use HasFactory;
    protected $table = "indb";

    protected $fillabe = ['name','thing','number'];
}

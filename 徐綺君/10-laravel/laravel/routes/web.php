<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
    // return view('index');
// });

Route::get('/',[FrontController::class,'index']);

Route::get('/hello/{id}', function ($id) {
    $name = 'jenny';
    $age = 16;

    // dd(compact('name','age'));

    // return view('hello',['name' => $name,'age' => $age]);
    return view('hello',compact('name','age','id'));
    // return view('hello',)->with('name',$name)->with('age',$age);
});


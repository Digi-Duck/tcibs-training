<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImgController;
use App\Http\Controllers\NewsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// 首頁
Route::get('/', function () {
    return view('welcome');
});

// 測試
Route::get("/test",function()
{
    return view("welcome");
});

Route::get('/mi' ,[NewsController::class,'mi']);

Route::get('/tem',function ()
{
    return view('tem');
});
Route::get('/new',[Controller::class,'new']);



Route::get('/cool',[NewsController::class,'cool']);
Route::get('/insert',[NewsController::class,'insert']);
// 畫面
Route::get('/update/{id}',[NewsController::class,'update']);
Route::get('/updateup',[NewsController::class,'updateup']);
Route::get('/delete/{id}',[NewsController::class,'delete']);

Route::prefix('/imgTest')->group(function () {
    Route::get('/',[ImgController::class,'index']);

    Route::get('/create',[ImgController::class,'create']);
    Route::get('/store',[ImgController::class,'store']);

    Route::get('/edit',[ImgController::class,'edit']);
    Route::get('/update',[ImgController::class,'update']);

    Route::get('/destroy',[ImgController::class,'destroy']);
});
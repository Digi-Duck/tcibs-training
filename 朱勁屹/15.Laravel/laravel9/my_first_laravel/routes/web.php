<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
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

Route::get('/', function () {
    return view('welcome');
});
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
Route::get('/update/{id}',[NewsController::class,'update']);
Route::get('/updateup',[NewsController::class,'updateup']);
Route::get('/delete/{id}',[NewsController::class,'delete']);
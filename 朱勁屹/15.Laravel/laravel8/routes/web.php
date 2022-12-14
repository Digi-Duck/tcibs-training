<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FrontController;//導入
use App\Http\Controllers\NewsController;//導入
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

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/hello',function(){
//     $name = 'bitchs';
//     $a = 'smallBitch';
//     $b = 'bigBitch';
//     compact('name','a','b');
//     // return view('hello',['name' => $name]);
//     return view('hello',compact('name','a','b'));
// });

Route::get('index',[FrontController::class,'index']);
Route::get('/hello',[FrontController::class,'hello']);
Route::get('/news',[FrontController::class,'news']);
Route::get('/news/{id}',[FrontController::class,'newsContent']);
Route::get('/create_news',[FrontController::class,'createNews']);
Route::get('/update-news/{id}',[FrontController::class,'updateNews']);
Route::get('/delete-news/{id}',[FrontController::class,'deleteNews']);
Route::get('/inputform',[FrontController::class,'inputform']);
Route::post('/inDB',[FrontController::class,'inDB']);
// Route::get('/hello','FrontController@hello');


// Route::prefix('/news')->group(function ()
// {
//     Route::get('/',FrontController::class,'news');//通往news
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//後台
Route::prefix('/admin')->group(function ()
{
    Route::prefix('/news')->group(function ()
    {
        Route::get('/',[NewsController::class,'index']);
    });
});

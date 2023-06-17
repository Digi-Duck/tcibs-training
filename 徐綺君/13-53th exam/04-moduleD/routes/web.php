<?php

use Illuminate\Support\Facades\Route;

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

Route::prefix('/api')->group(function () {
    Route::prefix('/auth')->group(function () {
        Route::post('/login', );    //登入
        Route::post('/register', ); //註冊
        Route::post('/logout', );   //登出
    });
    Route::prefix('/images')->group(function () {
        Route::get('/search',);     //搜索圖片
        Route::get('/popular',);    //熱門圖片
        Route::post('/upload',);    //上傳圖片

        Route::prefix('/$image_id')->group(function () {
            Route::put('/',);           //更新圖片
            Route::get('/',);           //取得圖片資訊
            Route::delete('/',);        //軟刪除圖片
            Route::get('/comments',);   //取得圖片評論
            Route::post('/comments',);  //發布圖片評論
        });
    });

    Route::get('/users/$user_id/images',);      //瀏覽使用者的圖片
    Route::delete('/comments/$comment_id',);    //刪除評論
});

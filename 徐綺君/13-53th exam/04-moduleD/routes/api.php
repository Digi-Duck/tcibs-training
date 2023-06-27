<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\CommentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/auth/login',[UserController::class,'login']);       //登入
Route::post('/auth/register',[UserController::class,'register']);    //註冊
Route::post('/auth/logout',[UserController::class,'logout']);      //登出

Route::get('/images/search',[ImageController::class,'search']);              //搜索圖片
Route::get('/images/popular',[ImageController::class,'popular']);             //熱門圖片
Route::get('/users/{user_id}/images',[ImageController::class,'images']);      //瀏覽使用者的圖片

Route::post('/images/upload',[ImageController::class,'upload']);             //上傳圖片
Route::put('/images/{image_id}',[ImageController::class,'updata']);           //更新圖片
Route::get('/images/{image_id}',[ImageController::class,'getdata']);           //取得圖片資訊
Route::delete('/images/{image_id}',[ImageController::class,'delete']);        //軟刪除圖片

Route::get('/images/{image_id}/comments',[CommentController::class,'getdata']);   //取得圖片評論
Route::post('/images/{image_id}/comments',[CommentController::class,'create']);  //發布圖片評論
Route::delete('/comments/{comment_id}',[CommentController::class,'delete']);     //刪除評論

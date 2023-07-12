<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TextController;
use App\Http\Controllers\ImgController;
use App\Http\Controllers\UserController;

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
Route::post('auth/login',[UserController::class,'login']);
Route::post('auth/register',[UserController::class,'register']);
Route::post('auth/logout',[UserController::class,'logout']);

Route::get('images/search',[ImgController::class,'search']);
Route::get('images/popular',[ImgController::class,'popular']);
Route::post('images/upload',[ImgController::class,'upload']);

Route::put('images/{id}',[ImgController::class,'updateImg']);
Route::get('images/{id}',[ImgController::class,'getImg']);
Route::delete('images/{id}',[ImgController::class,'deleteImg']);

Route::get('images/{id}/comments',[TextController::class,'getComments']);
Route::post('images/{id}/comments',[TextController::class,'updateComments']);



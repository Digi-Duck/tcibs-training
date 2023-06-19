<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AmongusController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\TextController;

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
        Route::post('/login',[AmongusController::class,'login'] );
        Route::post('/register',[AmongusController::class,'register']);
        Route::get('/users/{id}/images',[AmongusController::class,'userImage']);
        Route::post('/logout',[AmongusController::class,'logout']);
    });
    Route::prefix('/images')->group(function () {
        Route::get('/search', [ImageController::class,'search']);
        Route::post('/upload', [ImageController::class,'upload']);

        Route::put('/{image_id}',[ImageController::class,'put'] );
        Route::delete('/{image_id}',[ImageController::class,'delete'] );
        Route::get('/{image_id}',[ImageController::class,'getImgDetail'] );
        Route::get('/popular',[ImageController::class,'popular'] );

        Route::post('/{image_id}/comments',[TextController::class,'insertComment']);
        Route::get('/{image_id}/comments',[TextController::class,'getComment']);
        Route::delete('/{text_id}/comments',[TextController::class,'deleteComment']);
    });
});

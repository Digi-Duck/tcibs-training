<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AmongusController;
use App\Http\Controllers\ImageController;

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
        Route::post('/logout',[AmongusController::class,'logout']);
    });
    Route::prefix('/images')->group(function () {
        Route::get('/search', [ImageController::class,'search']);
        Route::post('/upload', [ImageController::class,'upload']);

        Route::put('/{image_id}',[ImageController::class,'put'] );
    });
});

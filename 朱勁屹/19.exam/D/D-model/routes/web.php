<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogController;


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
        Route::post('/login',[LogController::class,'login'] );
        Route::post('/register',[LogController::class,'register']);
        Route::post('/logout',[LogController::class,'logout']);
    });
    Route::prefix('/images')->group(function () {

    });
});

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ImgController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ErrorController;
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

Route::prefix('auth')->group(function () {
    Route::post('login', [UserController::class, 'login']);
    Route::post('register', [UserController::class, 'register']);
    Route::post('logout', [UserController::class, 'logout']);
});

Route::prefix('images')->group(function () {
    Route::get('search', [ImgController::class, 'searchImg']);
    Route::get('popular', [ImgController::class, 'popularImg']);
});
Route::get('users/{id}/images', [ImgController::class, 'browseImg']);

Route::prefix('images')->group(function () {
    Route::post('upload', [ImgController::class, 'uploadImg']);
    Route::put('{id}', [ImgController::class, 'updateImg']);
    Route::get('{id}', [ImgController::class, 'getImgData']);
    Route::delete('{id}', [ImgController::class, 'delImg']);
});

Route::prefix('images')->group(function () {
    Route::get('{id}/comments', [CommentController::class, 'getComment']);
    Route::post('{id}/comments', [CommentController::class, 'publishComment']);
});
Route::delete('comments/{id}', [CommentController::class, 'delComment']);

// Route::resource('images', ImgController::class);

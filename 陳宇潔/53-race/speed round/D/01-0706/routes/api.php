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
Route::prefix('auth')->group( function () {
    Route::post('login', [UserController::class, 'login']);
    Route::post('register', [UserController::class, 'register']);
    Route::post('logout', [UserController::class, 'logout']);
});
Route::get('images/search', [ImageController::class, 'search']);
Route::get('images/popular', [ImageController::class, 'popular']);
Route::get('users/{id}/images', [ImageController::class, 'browse']);

Route::post('images/upload', [ImageController::class, 'upload']);
Route::put('images/{id}', [ImageController::class, 'update']);
Route::get('images/{id}', [ImageController::class, 'getImg']);
Route::delete('images/{id}', [ImageController::class, 'delImg']);

Route::get('images/{id}/comments', [CommentController::class, 'getComment']);
Route::post('images/{id}/comments', [CommentController::class, 'publish']);
Route::delete('comments/{id}', [CommentController::class, 'delComment']);

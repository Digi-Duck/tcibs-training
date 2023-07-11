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
Route::post('auth/login',[UserController::class, 'login']);
Route::post('auth/register',[UserController::class, 'register']);
Route::post('auth/logout',[UserController::class, 'logout']);

Route::get('images/search',[ImageController::class, 'search']);
Route::get('images/popular',[ImageController::class, 'popular']);
Route::get('users/{user_id}/images',[ImageController::class, 'browse']);

Route::post('images/upload',[ImageController::class, 'upload']);
Route::put('images/{image_id}',[ImageController::class, 'update']);
Route::get('images/{image_id}',[ImageController::class, 'getImg']);
Route::delete('images/{image_id}',[ImageController::class, 'delImg']);

Route::get('images/{image_id}/comments',[CommentController::class, 'getComment']);
Route::post('images/{image_id}/comments',[CommentController::class, 'publish']);
Route::delete('comment/{comment_id}',[CommentController::class, 'delComment']);

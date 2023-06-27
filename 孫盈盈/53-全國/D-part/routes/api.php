<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ImageController;

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
Route::post('auth/register', [UserController::class, 'register']);
Route::post('auth/login', [UserController::class, 'login']);
Route::post('auth/logout', [UserController::class, 'logout']);

Route::get('images/search', [ImageController::class, 'selectPhoto']);
Route::get('images/popular', [ImageController::class, 'hotPhoto']);
Route::get('users/{user_id}/images', [ImageController::class, 'userPhoto']);
Route::post('images/upload', [ImageController::class, 'add_photo']);
Route::put('images/{image_id}', [ImageController::class, 'update_photo']);
Route::get('images/{image_id}', [ImageController::class, 'get_photo_data']);
Route::delete('images/{image_id}', [ImageController::class, 'delete_photo']);

Route::get('images/{image_id}/comments', [CommentController::class, 'selectComment']);
Route::post('images/{image_id}/comments', [CommentController::class, 'addComment']);
Route::delete('images/comments/{comment_id}', [CommentController::class, 'deleteComment']);

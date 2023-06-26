<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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
Route::post('auth/register', [UserController::class, 'register']);
Route::post('auth/login', [UserController::class, 'login']);
Route::post('auth/logout', [UserController::class, 'logout']);

Route::get('images/search', []);
Route::get('images/popular', []);
Route::get('users/{user_id}/images', []);
Route::post('images/upload', []);
Route::put('images/{image_id}', []);
Route::post('images/{image_id}', []);
Route::get('images/{image_id}', []);
Route::delete('images/{image_id}', []);

Route::get('images/{image_id}/comments', [CommentController::class, 'selectComment']);
Route::post('images/{image_id}/comments', [CommentController::class, 'addComment']);
Route::delete('images/comments/{comment_id}', [CommentController::class, 'deleteComment']);

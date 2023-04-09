<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\BannerController;

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

Route::get('/', [NewsController::class, 'index']);

Route::get('/say', [Controller::class, 'say']);

Route::get('/comment', [Controller::class, 'comment']);
Route::get('/comment/save', [Controller::class, 'save_comment']);
Route::get('/comment/dalete/{id}', [Controller::class, 'dalete_comment']);
Route::get('/comment/update/update/{id}', [Controller::class, 'update_comment']);
Route::get('/comment/update/{id}', [Controller::class, 'edit_comment']);//顯示

Route::get('/microsoft',[Controller::class, 'microsoft']);

Route::prefix('/banner')->group(function () {
    Route::get('/', [BannerController::class, 'index']);
    Route::get('/create', [BannerController::class, 'create']);
    Route::post('/store', [BannerController::class, 'store']);
    Route::get('/edit/{id}', [BannerController::class, 'edit']);
    Route::post('/update/{id}', [BannerController::class, 'update']);
    Route::get('/delete/{id}', [BannerController::class, 'delete']);
});

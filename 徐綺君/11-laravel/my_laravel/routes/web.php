<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;

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

// Route::get('/test', function () {
//     return view('welcome');
// });

Route::get('/say', [Controller::class, 'say']);
Route::get('/comment', [Controller::class, 'comment']);
Route::get('/comment/save', [Controller::class, 'save_comment']);
Route::get('/comment/dalete/{id}', [Controller::class, 'dalete_comment']);
Route::get('/comment/update/update/{id}', [Controller::class, 'update_update_comment']);
Route::get('/comment/update/{id}', [Controller::class, 'update_comment']);

Route::get('/microsoft',[Controller::class, 'microsoft']);

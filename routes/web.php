<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::resource('', UserController::class);
Route::post('/createuser', [UserController::class, 'create']);
Route::post('/insertuser', [UserController::class, 'store']);
Route::post('/refreshpage', [UserController::class, 'refresh']);
Route::post('/deleteuser', [UserController::class, 'destroy']);
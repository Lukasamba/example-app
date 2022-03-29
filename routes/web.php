<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;

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
//Route::resource('', UserController::class);
//Route::get('/', function () {
 //   return view('home');
//});
Route::get('', [HomeController::class, 'index']);
Route::get('/userlist', [UserController::class, 'index']);

Route::post('/insertuser', [UserController::class, 'store']);
Route::post('/refreshpage', [UserController::class, 'refresh']);
Route::post('/deleteuser', [UserController::class, 'destroy']);
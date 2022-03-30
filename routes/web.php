<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\LoginController;

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

Route::get('/register', [RegistrationController::class, 'index'])->middleware('alreadyLoggedIn');
Route::post('/tryregister', [RegistrationController::class, 'store'])->middleware('alreadyLoggedIn');

Route::get('/login', [LoginController::class, 'index'])->middleware('alreadyLoggedIn');
Route::post('/trylogin', [LoginController::class, 'login'])->middleware('alreadyLoggedIn');

Route::get('/profile', [LoginController::class, 'showProfile'])->middleware('isLoggedIn');
Route::get('/logout', [LoginController::class, 'logout']);
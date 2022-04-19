<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\LoginController;

Route::get('', [HomeController::class, 'index']);
Route::get('/userlist', [UserController::class, 'index'])->middleware('isAdmin');
Route::post('/insertuser', [UserController::class, 'store'])->middleware('isAdmin');
Route::post('/deleteuser', [UserController::class, 'destroy'])->middleware('isAdmin');

Route::get('/register', [RegistrationController::class, 'index'])->middleware('alreadyLoggedIn');
Route::post('/tryregister', [RegistrationController::class, 'store'])->middleware('alreadyLoggedIn');

Route::get('/login', [LoginController::class, 'index'])->middleware('alreadyLoggedIn');
Route::post('/trylogin', [LoginController::class, 'login'])->middleware('alreadyLoggedIn');

Route::get('/profile', [LoginController::class, 'showProfile'])->middleware('isLoggedIn');
Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/movies', [HomeController::class, 'openMoviesPage']);
Route::get('/tvseries', [HomeController::class, 'openTVSeriesPage']);
Route::get('/games', [HomeController::class, 'openGamesPage']);

Route::get('/admin', [HomeController::class, 'openAdminPage'])->middleware('isAdmin');
Route::get('/admin/users', [HomeController::class, 'openUserList'])->middleware('isAdmin');
Route::get('/admin/movies', [HomeController::class, 'openMoviesList'])->middleware('isAdmin');
Route::get('/admin/tvseries', [HomeController::class, 'openTVSeriesList'])->middleware('isAdmin');
Route::get('/admin/games', [HomeController::class, 'openGamesList'])->middleware('isAdmin');

Route::post('/admin/users/changeuseradmin', [HomeController::class, 'changeUserAdminStatus'])->name('changeAdminStatus')->middleware('isAdmin');
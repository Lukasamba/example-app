<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\WatchlistController;

Route::get('', [HomeController::class, 'index']);

Route::get('/register', [RegistrationController::class, 'index'])->middleware('alreadyLoggedIn');
Route::post('/tryregister', [RegistrationController::class, 'store'])->middleware('alreadyLoggedIn');

Route::get('/login', [LoginController::class, 'index'])->middleware('alreadyLoggedIn');
Route::post('/trylogin', [LoginController::class, 'login'])->middleware('alreadyLoggedIn');

Route::get('/profile', [LoginController::class, 'showProfile'])->middleware('isLoggedIn');
Route::post('/profile/editsave', [LoginController::class, 'saveEditedProfile'])->name('saveEditedProfile');
Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/movies', [HomeController::class, 'openMoviesPage']);
Route::get('/movies/{category}', [HomeController::class, 'openMoviesPageByCategory']);
Route::any('/movie/{id}', [HomeController::class, 'openMovieById']);
Route::post('/movie/{id}/addtowatchlist', [WatchlistController::class, 'add'])->middleware('alreadyLoggedIn');
Route::post('/movie/{id}/deletefromwatchlist', [WatchlistController::class, 'delete'])->middleware('alreadyLoggedIn');

Route::get('/tvseries', [HomeController::class, 'openTVSeriesPage']);
Route::get('/games', [HomeController::class, 'openGamesPage']);

Route::get('/admin', [HomeController::class, 'openAdminPage'])->middleware('isAdmin');
Route::get('/admin/users', [HomeController::class, 'openUserList'])->middleware('isAdmin');
Route::get('/admin/movies', [HomeController::class, 'openMoviesList'])->middleware('isAdmin');
Route::get('/admin/tvseries', [HomeController::class, 'openTVSeriesList'])->middleware('isAdmin');
Route::get('/admin/games', [HomeController::class, 'openGamesList'])->middleware('isAdmin');

Route::post('/admin/users/changeuseradmin', [HomeController::class, 'changeUserAdminStatus'])->name('changeAdminStatus')->middleware('isAdmin');
Route::post('/admin/users/edit', [HomeController::class, 'editOrDelete'])->middleware('isAdmin')->name('editOrDelete');
Route::post('/admin/users/editsave', [HomeController::class, 'saveEditedInfo'])->middleware('isAdmin')->name('saveEditedInfo');

Route::get('/admin/movies/add', [HomeController::class, 'openAddMoviePage'])->middleware('isAdmin')->name('openAddMoviePage');
Route::post('/admin/movies/addMovie', [HomeController::class, 'addMovie'])->middleware('isAdmin')->name('addMovie');
Route::post('/admin/movies/edit', [HomeController::class, 'openEditMoviePage'])->middleware('isAdmin')->name('openEditMoviePage');
Route::post('/admin/movies/editMovie', [HomeController::class, 'saveEditedMovieInfo'])->middleware('isAdmin')->name('editMovie');

Route::get('/watchlist/movies', [WatchlistController::class, 'index'])->middleware('alreadyLoggedIn');
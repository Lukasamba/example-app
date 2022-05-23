<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\WatchlistController;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TVSeriesController;
use App\Http\Controllers\GamesController;

Route::get('', [HomeController::class, 'index']);

Route::get('/register', [RegistrationController::class, 'index'])->middleware('alreadyLoggedIn');
Route::post('/tryregister', [RegistrationController::class, 'store'])->middleware('alreadyLoggedIn');

Route::get('/login', [LoginController::class, 'index'])->middleware('alreadyLoggedIn');
Route::post('/trylogin', [LoginController::class, 'login'])->middleware('alreadyLoggedIn');

Route::get('/profile', [LoginController::class, 'showProfile'])->middleware('isLoggedIn');
Route::post('/profile/editsave', [LoginController::class, 'saveEditedProfile'])->name('saveEditedProfile');
Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/movies', [MoviesController::class, 'openMoviesPage']);
Route::get('/movies/{category}', [MoviesController::class, 'openMoviesPageByCategory']);
Route::any('/movie/{id}', [MoviesController::class, 'openMovieById']);
Route::post('/movie/{id}/addtowatchlist', [WatchlistController::class, 'add'])->middleware('alreadyLoggedIn');
Route::post('/movie/{id}/deletefromwatchlist', [WatchlistController::class, 'delete'])->middleware('alreadyLoggedIn');

Route::get('/tvseries', [TVSeriesController::class, 'openTVSeriesPage']);
Route::get('/games', [GamesController::class, 'openGamesPage']);

Route::get('/admin', [AdminController::class, 'openAdminPage'])->middleware('isAdmin');
Route::get('/admin/users', [AdminController::class, 'openUserList'])->middleware('isAdmin');
Route::get('/admin/movies', [AdminController::class, 'openMoviesList'])->middleware('isAdmin');
Route::get('/admin/tvseries', [AdminController::class, 'openTVSeriesList'])->middleware('isAdmin');
Route::get('/admin/games', [AdminController::class, 'openGamesList'])->middleware('isAdmin');

Route::post('/admin/users/changeuseradmin', [AdminController::class, 'changeUserAdminStatus'])->name('changeAdminStatus')->middleware('isAdmin');
Route::post('/admin/users/edit', [AdminController::class, 'editOrDelete'])->middleware('isAdmin')->name('editOrDelete');
Route::post('/admin/users/editsave', [AdminController::class, 'saveEditedInfo'])->middleware('isAdmin')->name('saveEditedInfo');

Route::get('/admin/movies/add', [AdminController::class, 'openAddMoviePage'])->middleware('isAdmin')->name('openAddMoviePage');
Route::post('/admin/movies/addMovie', [AdminController::class, 'addMovie'])->middleware('isAdmin')->name('addMovie');
Route::post('/admin/movies/edit', [AdminController::class, 'openEditMoviePage'])->middleware('isAdmin')->name('openEditMoviePage');
Route::post('/admin/movies/editMovie', [AdminController::class, 'saveEditedMovieInfo'])->middleware('isAdmin')->name('editMovie');

Route::get('/watchlist/movies', [WatchlistController::class, 'index'])->middleware('alreadyLoggedIn');
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

// Start
Route::get('', [HomeController::class, 'index']);

// Everything about Authorization
Route::get('/register', [RegistrationController::class, 'index'])->middleware('alreadyLoggedIn');
Route::post('/tryregister', [RegistrationController::class, 'store'])->middleware('alreadyLoggedIn');
Route::get('/login', [LoginController::class, 'index'])->middleware('alreadyLoggedIn');
Route::post('/trylogin', [LoginController::class, 'login'])->middleware('alreadyLoggedIn');
Route::get('/profile', [LoginController::class, 'showProfile'])->middleware('isLoggedIn');
Route::post('/profile/editsave', [LoginController::class, 'saveEditedProfile'])->name('saveEditedProfile');
Route::get('/logout', [LoginController::class, 'logout']);

// Everything about Users
Route::get('/admin', [AdminController::class, 'openAdminPage'])->middleware('isAdmin');
Route::get('/admin/users', [AdminController::class, 'openUserList'])->middleware('isAdmin');
Route::post('/admin/users/changeuseradmin', [AdminController::class, 'changeUserAdminStatus'])->name('changeAdminStatus')->middleware('isAdmin');
Route::post('/admin/users/edit', [AdminController::class, 'editOrDelete'])->middleware('isAdmin')->name('editOrDelete');
Route::post('/admin/users/editsave', [AdminController::class, 'saveEditedInfo'])->middleware('isAdmin')->name('saveEditedInfo');

// Everything about Movies
Route::get('/movies', [MoviesController::class, 'openMoviesPage']);
Route::get('/movies/{category}', [MoviesController::class, 'openMoviesPageByCategory']);
Route::any('/movie/{id}', [MoviesController::class, 'openMovieById']);
Route::post('/movie/{id}/addtowatchlist', [WatchlistController::class, 'add'])->middleware('alreadyLoggedIn');
Route::post('/movie/{id}/deletefromwatchlist', [WatchlistController::class, 'delete'])->middleware('alreadyLoggedIn');
Route::get('/admin/movies', [AdminController::class, 'openMoviesList'])->middleware('isAdmin');
Route::get('/admin/movies/add', [AdminController::class, 'openAddMoviePage'])->middleware('isAdmin')->name('openAddMoviePage');
Route::post('/admin/movies/addMovie', [AdminController::class, 'addMovie'])->middleware('isAdmin')->name('addMovie');
Route::post('/admin/movies/edit', [AdminController::class, 'openEditMoviePage'])->middleware('isAdmin')->name('openEditMoviePage');
Route::post('/admin/movies/editMovie', [AdminController::class, 'saveEditedMovieInfo'])->middleware('isAdmin')->name('editMovie');
Route::get('/watchlist/movies', [WatchlistController::class, 'movies'])->middleware('alreadyLoggedIn');

// Everything about TV Series
Route::get('/tvseries', [TVSeriesController::class, 'openTVSeriesPage']);
Route::get('/tvseries/{category}', [TVSeriesController::class, 'openTVSeriesPageByCategory']);
Route::any('/tvserie/{id}', [TVSeriesController::class, 'openTVSeriesById']);
Route::post('/tvserie/{id}/addtowatchlist', [WatchlistController::class, 'addTVSeries'])->middleware('alreadyLoggedIn');
Route::post('/tvserie/{id}/deletefromwatchlist', [WatchlistController::class, 'deleteTVSeries'])->middleware('alreadyLoggedIn');
Route::get('/admin/tvseries', [AdminController::class, 'openTVSeriesList'])->middleware('isAdmin');
Route::get('/admin/tvseries/add', [AdminController::class, 'openAddTVSeriesPage'])->middleware('isAdmin')->name('openAddTVSeriesPage');
Route::post('/admin/tvseries/addtvseries', [AdminController::class, 'addTVSeries'])->middleware('isAdmin')->name('addTVSeries');
Route::post('/admin/tvseries/edit', [AdminController::class, 'openEditTVSeriesPage'])->middleware('isAdmin')->name('openEditTVSeriesPage');
Route::post('/admin/tvseries/edittvseries', [AdminController::class, 'saveEditedTVSeriesInfo'])->middleware('isAdmin')->name('editTVSeries');
Route::get('/watchlist/tvseries', [WatchlistController::class, 'tvseries'])->middleware('alreadyLoggedIn');

// Everything about Games
Route::get('/games', [GamesController::class, 'openGamesPage']);
Route::get('/games/{category}', [GamesController::class, 'openGamesPageByCategory']);
Route::any('/game/{id}', [GamesController::class, 'openGameById']);
Route::post('/game/{id}/addtowatchlist', [WatchlistController::class, 'addGame'])->middleware('alreadyLoggedIn');
Route::post('/game/{id}/deletefromwatchlist', [WatchlistController::class, 'deleteGame'])->middleware('alreadyLoggedIn');
Route::get('/admin/games', [AdminController::class, 'openGamesList'])->middleware('isAdmin');
Route::get('/admin/games/add', [AdminController::class, 'openAddGamePage'])->middleware('isAdmin')->name('openAddGamePage');
Route::post('/admin/games/addGame', [AdminController::class, 'addGame'])->middleware('isAdmin')->name('addGame');
Route::post('/admin/games/edit', [AdminController::class, 'openEditGamePage'])->middleware('isAdmin')->name('openEditGamePage');
Route::post('/admin/games/editGame', [AdminController::class, 'saveEditedGameInfo'])->middleware('isAdmin')->name('editGame');
Route::get('/watchlist/games', [WatchlistController::class, 'games'])->middleware('alreadyLoggedIn');
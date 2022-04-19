<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function openMoviesPage()
    {
        return view('movies.moviesHome');
    }

    public function openTVSeriesPage()
    {
        return view('tvseries.tvserieshome');
    }

    public function openGamesPage()
    {
        return view('games.gamesHome');
    }

    public function openAdminPage()
    {
        return view('admin.admin');
    }

    public function openUserList()
    {
        return view('admin.users');
    }

    public function openMoviesList()
    {
        return view('admin.movies');
    }

    public function openTVSeriesList()
    {
        return view('admin.tvseries');
    }

    public function openGamesList()
    {
        return view('admin.games');
    }

    public function changeUserAdminStatus(Request $request)
    {
        
        $currentId = $request->input('userid');
        $adminStatus = $request->input('adminStatus');
        $result = DB::table('users')->where('id', $currentId)->update(['admin' => $adminStatus]);
        return view('admin.users');
    }
}

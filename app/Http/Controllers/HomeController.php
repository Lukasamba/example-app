<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    public function openGamesPage()
    {
        return view('games.gamesHome');
    }
}

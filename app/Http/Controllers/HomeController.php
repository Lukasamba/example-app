<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\TVSeries;
use App\Models\Game;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            'movies' => Movie::getLastThree(),
            'tvseries' => TVSeries::getLastThree(),
            'games' => Game::getLastThree()
        ]);
        return view('home');
    }
}

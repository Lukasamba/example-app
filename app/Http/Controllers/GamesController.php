<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GamesController extends Controller
{
    public function openGamesPage()
    {
        return view('games.gamesHome');
    }
}

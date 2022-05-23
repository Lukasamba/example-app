<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\GamesWatchlist;

class GamesController extends Controller
{
    public function openGamesPage()
    {
        $games = Game::getAllGames();
        return view('games.gamesHome', [
            'games' => $games
        ]);
    }

    public function openGamesPageByCategory($category)
    {
        $games = Game::getGamesByCategory($category);
        return view('games.category', [
            'games' => $games
        ]);
    }

    public function openGameById($id)
    {
        $game = Game::get($id);
        if($game)
        {
            if (session()->has('userInfo'))
            {
                $userid = session()->get('userInfo')['id'];
                if(!GamesWatchlist::where('UserId', $userid)->where('ItemId', $id)->exists())
                {
                    return view('games.open', [
                        'id' => $game->id,
                        'name' => $game->name,
                        'description' => $game->description,
                        'rating' => $game->rating,
                        'category' => $game->category,
                        'imageUrl' => $game->imageUrl,
                        'releaseDate' => $game->releaseDate,
                        'isOnWatchlist' => false
                    ]);
                }
                else
                {
                    return view('games.open', [
                        'id' => $game->id,
                        'name' => $game->name,
                        'description' => $game->description,
                        'rating' => $game->rating,
                        'category' => $game->category,
                        'imageUrl' => $game->imageUrl,
                        'releaseDate' => $game->releaseDate,
                        'isOnWatchlist' => true
                    ]);
                }
            }
            else
            {
                return view('games.open', [
                    'id' => $game->id,
                    'name' => $game->name,
                    'description' => $game->description,
                    'rating' => $game->rating,
                    'category' => $game->category,
                    'imageUrl' => $game->imageUrl,
                    'releaseDate' => $game->releaseDate
                ]);
            }
        }
        else
        {
            return redirect('/games');
        }
    }
}

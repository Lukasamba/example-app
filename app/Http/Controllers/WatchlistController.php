<?php

namespace App\Http\Controllers;

use App\Http\Controllers\MoviesController;
use App\Http\Controllers\TVSeriesController;
use App\Http\Controllers\GamesController;
use Illuminate\Http\Request;
use App\Models\Watchlist;
use App\Models\TVSeriesWatchlist;
use App\Models\GamesWatchlist;

class WatchlistController extends Controller
{
    public function movies()
    {
        return view('watchlist.movies');
    }

    public function tvseries()
    {
        return view('watchlist.tvseries');
    }

    public function games()
    {
        return view('watchlist.games');
    }

    public function add(Request $request)
    {
        $userid = Session()->get('userInfo')['id'];
        $itemId = $request->input('itemid');
        $watchlist = new Watchlist;
        $watchlist->UserId = $userid;
        $watchlist->ItemId = $itemId;
        $watchlist->save();
        if($request->has('movies')){
            return redirect()->action([MoviesController::class, 'openMovieById'], ['id' => $itemId]);
        }
    }

    public function delete(Request $request){
        $userid = Session()->get('userInfo')['id'];
        $itemId = $request->input('itemid');
        Watchlist::where('UserId', $userid)->where('ItemId', $itemId)->delete();
        if($request->has('movies')){
            return redirect()->action([MoviesController::class, 'openMovieById'], ['id' => $itemId]);
        }
    }

    public function addTVSeries(Request $request)
    {
        $userid = Session()->get('userInfo')['id'];
        $itemId = $request->input('itemid');
        $watchlist = new TVSeriesWatchlist;
        $watchlist->UserId = $userid;
        $watchlist->ItemId = $itemId;
        $watchlist->save();
        if($request->has('tvseries')){
            return redirect()->action([TVSeriesController::class, 'openTVSeriesById'], ['id' => $itemId]);
        }
    }

    public function deleteTVSeries(Request $request){
        $userid = Session()->get('userInfo')['id'];
        $itemId = $request->input('itemid');
        TVSeriesWatchlist::where('UserId', $userid)->where('ItemId', $itemId)->delete();
        if($request->has('tvseries')){
            return redirect()->action([TVSeriesController::class, 'openTVSeriesById'], ['id' => $itemId]);
        }
    }

    public function addGame(Request $request)
    {
        $userid = Session()->get('userInfo')['id'];
        $itemId = $request->input('itemid');
        $watchlist = new GamesWatchlist;
        $watchlist->UserId = $userid;
        $watchlist->ItemId = $itemId;
        $watchlist->save();
        if($request->has('games')){
            return redirect()->action([GamesController::class, 'openGameById'], ['id' => $itemId]);
        }
    }

    public function deleteGame(Request $request){
        $userid = Session()->get('userInfo')['id'];
        $itemId = $request->input('itemid');
        GamesWatchlist::where('UserId', $userid)->where('ItemId', $itemId)->delete();
        if($request->has('games')){
            return redirect()->action([GamesController::class, 'openGameById'], ['id' => $itemId]);
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Models\Movie;
use App\Models\TVSeries;
use App\Models\Game;
use App\Models\Watchlist;
use App\Models\TVSeriesWatchlist;
use App\Models\GamesWatchlist;
use DB;

class AdminController extends Controller
{
    public function openAdminPage()
    {
        return view('admin.admin');
    }

    public function openUserList()
    {
        return view('admin.users', [
            'users' => User::getAll()
        ]);
    }

    public function openMoviesList()
    {
        return view('admin.movies', [
            'movies' => Movie::getAllMovies()
        ]);
    }

    public function openGamesList()
    {
        return view('admin.games', [
            'games' => Game::getAllGames()
        ]);
    }

    public function openAddGamePage()
    {
        return view('games.add', [
            'games' => Game::getAllGames()
        ]);
    }

    public function addGame(Request $request)
    {
        $game = new Game;
        $game->name = $request->input('name');
        $game->description = $request->input('description');
        $game->rating = $request->input('rating');
        $game->category = $request->input('category');
        $game->imageUrl = $request->input('imageUrl');
        $game->releaseDate = $request->input('releaseDate');
        $game->save();

        return view('admin.games', [
            'games' => Game::getAllGames()
        ]);
    }

    public function openEditGamePage(Request $request)
    {
        if($request->has('open')){
            $userid = Session()->get('userInfo')['id'];
            if(!GamesWatchlist::where('UserId', $userid)->where('ItemId', $id)->exists())
            {
                return view('games.open', [
                    'id' => $id,
                    'isOnWatchlist' => false
                ]);
            }
            else
            {
                return view('games.open', [
                    'id' => $id,
                    'isOnWatchlist' => true
                ]);
            }
        }
        $gameid = $request->input('gameid');
        $game = Game::where('id', $gameid)->first();

        if($request->has('update')){
            return view('games.edit')
                                    ->with('id', $game->id)
                                    ->with('name', $game->name)
                                    ->with('description', $game->description)
                                    ->with('rating', $game->rating)
                                    ->with('category', $game->category)
                                    ->with('imageUrl', $game->imageUrl)
                                    ->with('releaseDate', $game->releaseDate);
        }
        else {
            Game::where('id', $game->id)->delete();
            return view('admin.games', [
                'games' => Game::getAllGames()
            ]);
        }
    }

    public function saveEditedGameInfo(Request $request)
    {
        $id = $request->input('id');
        $name = $request->input('name');
        $description = $request->input('description');
        $rating = $request->input('rating');
        $category = $request->input('category');
        $imageUrl = $request->input('imageUrl');
        $releaseDate = $request->input('releaseDate');

        Game::where('id', $id)->update([
            'name' => $name,
            'description' => $description,
            'rating' => $rating,
            'category' => $category,
            'imageUrl' => $imageUrl,
            'releaseDate' => $releaseDate
        ]);
        return view('admin.games', [
            'games' => Game::getAllGames()
        ]);
    }

    public function openTVSeriesList()
    {
        return view('admin.tvseries', [
            'tvseries' => TVSeries::getAllTVSeries()
        ]);
    }

    public function openAddTVSeriesPage()
    {
        return view('tvseries.add', [
            'tvseries' => TVSeries::getAllTVSeries()
        ]);
    }

    public function addTVSeries(Request $request)
    {
        $tvseries = new TVSeries;
        $tvseries->name = $request->input('name');
        $tvseries->description = $request->input('description');
        $tvseries->rating = $request->input('rating');
        $tvseries->category = $request->input('category');
        $tvseries->imageUrl = $request->input('imageUrl');
        $tvseries->releaseDate = $request->input('releaseDate');
        $tvseries->seasons = $request->input('seasons');
        $tvseries->episodes = $request->input('episodes');
        $tvseries->save();

        return view('admin.tvseries', [
            'tvseries' => TVSeries::getAllTVSeries()
        ]);
    }

    public function openEditTVSeriesPage(Request $request)
    {
        if($request->has('open')){
            $userid = Session()->get('userInfo')['id'];
            if(!TVSeriesWatchlist::where('UserId', $userid)->where('ItemId', $id)->exists())
            {
                return view('tvseries.open', [
                    'id' => $id,
                    'isOnWatchlist' => false
                ]);
            }
            else
            {
                return view('tvseries.open', [
                    'id' => $id,
                    'isOnWatchlist' => true
                ]);
            }
        }
        $tvserieid = $request->input('tvserieid');
        $tvserie = TVSeries::where('id', $tvserieid)->first();

        if($request->has('update')){
            return view('tvseries.edit')
                                    ->with('id', $tvserie->id)
                                    ->with('name', $tvserie->name)
                                    ->with('description', $tvserie->description)
                                    ->with('rating', $tvserie->rating)
                                    ->with('category', $tvserie->category)
                                    ->with('imageUrl', $tvserie->imageUrl)
                                    ->with('releaseDate', $tvserie->releaseDate)
                                    ->with('seasons', $tvserie->seasons)
                                    ->with('episodes', $tvserie->episodes);
        }
        else {
            TVSeries::where('id', $tvserie->id)->delete();
            return view('admin.tvseries', [
                'tvseries' => TVSeries::getAllTVSeries()
            ]);
        }
    }

    public function saveEditedTVSeriesInfo(Request $request)
    {
        $id = $request->input('id');
        $name = $request->input('name');
        $description = $request->input('description');
        $rating = $request->input('rating');
        $category = $request->input('category');
        $imageUrl = $request->input('imageUrl');
        $releaseDate = $request->input('releaseDate');
        $seasons = $request->input('seasons');
        $episodes = $request->input('episodes');

        TVSeries::where('id', $id)->update([
            'name' => $name,
            'description' => $description,
            'rating' => $rating,
            'category' => $category,
            'imageUrl' => $imageUrl,
            'releaseDate' => $releaseDate,
            'seasons' => $seasons,
            'episodes' => $episodes
        ]);
        return view('admin.tvseries', [
            'tvseries' => TVSeries::getAllTVSeries()
        ]);
    }

    public function changeUserAdminStatus(Request $request)
    {
        $currentId = $request->input('userid');
        $adminStatus = $request->input('adminStatus');
        User::where('id', $currentId)->update(['admin' => $adminStatus]);
        return view('admin.users', [
            'users' => User::getAll()
        ]);
    }

    public function editOrDelete(Request $request)
    {
        $userid = $request->input('userid');
        $user = User::where('id', $userid)->first();
        $id = $user->id;
        $name = $user->name;
        $email = $user->email;
    
        if($request->has('update')){
            return view('admin.edit')->with('id', $id)->with('name', $name)->with('email', $email);
        }
        else {
            User::where('id', $id)->delete();
            return view('admin.users', [
                'users' => User::getAll()
            ]);
        }
    }

    public function saveEditedInfo(Request $request)
    {
        $id = $request->input('id');
        $name = $request->input('name');
        $email = $request->input('email');
        User::where('id', $id)->update([
            'name' => $name,
            'email' => $email
        ]);
        return view('admin.users', [
            'users' => User::getAll()
        ]);
    }

    public function openAddMoviePage()
    {
        return view('movies.moviesAdd');
    }

    public function addMovie(Request $request)
    {
        $movie = new Movie;
        $movie->name = $request->input('name');
        $movie->description = $request->input('description');
        $movie->rating = $request->input('rating');
        $movie->category = $request->input('category');
        $movie->imageUrl = $request->input('imageUrl');
        $movie->releaseDate = $request->input('releaseDate');
        $movie->length = $request->input('length');
        $movie->save();
        return view('admin.movies', [
            'movies' => Movie::getAllMovies()
        ]);
    }

    public function openEditMoviePage(Request $request)
    {
        if($request->has('open')){
            $userid = Session()->get('userInfo')['id'];
            if(!Watchlist::where('UserId', $userid)->where('ItemId', $id)->exists())
            {
                return view('movies.moviesOpen', [
                    'id' => $id,
                    'isOnWatchlist' => false
                ]);
            }
            else
            {
                return view('movies.moviesOpen', [
                    'id' => $id,
                    'isOnWatchlist' => true
                ]);
            }
        }
        $movieid = $request->input('movieid');
        $movie = Movie::where('id', $movieid)->first();

        if($request->has('update')){
            return view('movies.moviesEdit')
                                    ->with('id', $movie->id)
                                    ->with('name', $movie->name)
                                    ->with('description', $movie->description)
                                    ->with('rating', $movie->rating)
                                    ->with('category', $movie->category)
                                    ->with('imageUrl', $movie->imageUrl)
                                    ->with('releaseDate', $movie->releaseDate)
                                    ->with('length', $movie->length);
        }
        else {
            Movie::where('id', $movie->id)->delete();
            return view('admin.movies', [
                'movies' => Movie::getAllMovies()
            ]);
        }
    }

    public function saveEditedMovieInfo(Request $request)
    {
        $id = $request->input('id');
        $name = $request->input('name');
        $description = $request->input('description');
        $rating = $request->input('rating');
        $category = $request->input('category');
        $imageUrl = $request->input('imageUrl');
        $releaseDate = $request->input('releaseDate');
        $length = $request->input('length');

        Movie::where('id', $id)->update([
            'name' => $name,
            'description' => $description,
            'rating' => $rating,
            'category' => $category,
            'imageUrl' => $imageUrl,
            'releaseDate' => $releaseDate,
            'length' => $length
        ]);
        return view('admin.movies', [
            'movies' => Movie::getAllMovies()
        ]);
    }
}

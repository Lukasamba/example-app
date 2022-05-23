<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Watchlist;

class MoviesController extends Controller
{
    public function openMoviesPage()
    {
        $movies = Movie::getAllMovies();
        return view('movies.moviesHome', [
            'movies' => $movies
        ]);
    }

    public function openMoviesPageByCategory($category)
    {
        $movies = Movie::getMoviesByCategory($category);
        return view('movies.moviesCategory', [
            'movies' => $movies
        ]);
    }

    public function openMovieById($id)
    {
        $movie = Movie::get($id);
        if($movie)
        {
            if (session()->has('userInfo'))
            {
                $userid = session()->get('userInfo')['id'];
                if(!Watchlist::where('UserId', $userid)->where('ItemId', $id)->exists())
                {
                    return view('movies.moviesOpen', [
                        'id' => $movie->id,
                        'name' => $movie->name,
                        'description' => $movie->description,
                        'rating' => $movie->rating,
                        'category' => $movie->category,
                        'imageUrl' => $movie->imageUrl,
                        'releaseDate' => $movie->releaseDate,
                        'length' => $movie->length,
                        'isOnWatchlist' => false
                    ]);
                }
                else
                {
                    return view('movies.moviesOpen', [
                        'id' => $movie->id,
                        'name' => $movie->name,
                        'description' => $movie->description,
                        'rating' => $movie->rating,
                        'category' => $movie->category,
                        'imageUrl' => $movie->imageUrl,
                        'releaseDate' => $movie->releaseDate,
                        'length' => $movie->length,
                        'isOnWatchlist' => true
                    ]);
                }
            }
            else
            {
                return view('movies.moviesOpen', [
                    'id' => $movie->id,
                    'name' => $movie->name,
                    'description' => $movie->description,
                    'rating' => $movie->rating,
                    'category' => $movie->category,
                    'imageUrl' => $movie->imageUrl,
                    'releaseDate' => $movie->releaseDate,
                    'length' => $movie->length
                ]);
            }
        }
        else
        {
            return redirect('/movies');
        }
    }
}

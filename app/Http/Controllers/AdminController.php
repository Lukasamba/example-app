<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Models\Movie;
use App\Models\Watchlist;
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

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

    public function editOrDelete(Request $request)
    {
        $userid = $request->input('userid');
        $users = DB::table('users')->where('id', $userid)->get();
        foreach($users as $user){
            $id = $user->id;
            $name = $user->name;
            $email = $user->email;
        }
        if($request->has('update')){
            return view('admin.edit')->with('id', $id)->with('name', $name)->with('email', $email);
        }
        else {
            $result = DB::table('users')->where('id', $userid)->delete();
            return view('admin.users');
        }
    }

    public function saveEditedInfo(Request $request)
    {
        $id = $request->input('id');
        $name = $request->input('name');
        $email = $request->input('email');
        $result = DB::table('users')->where('id', $id)->update([
            'name' => $name,
            'email' => $email
        ]);
        return view('admin.users');
    }

    public function openAddMoviePage()
    {
        return view('movies.moviesAdd');
    }

    public function addMovie(Request $request)
    {
        $name = $request->input('name');
        $description = $request->input('description');
        $rating = $request->input('rating');
        $category = $request->input('category');
        $imageUrl = $request->input('imageUrl');
        $releaseDate = $request->input('releaseDate');
        $length = $request->input('length');
        $result = DB::table('movies')->insert([
            'name' => $name,
            'description' => $description,
            'rating' => $rating,
            'category' => $category,
            'imageUrl' => $imageUrl,
            'releaseDate' => $releaseDate,
            'length' => $length
        ]);
        return view('admin.movies');
    }

    public function openEditMoviePage(Request $request)
    {
        $movieid = $request->input('movieid');
        $movies = DB::table('movies')->where('id', $movieid)->get();
        foreach($movies as $movie){
            $id = $movie->id;
            $name = $movie->name;
            $description = $movie->description;
            $rating = $movie->rating;
            $category = $movie->category;
            $imageUrl = $movie->imageUrl;
            $releaseDate = $movie->releaseDate;
            $length = $movie->length;
        }
        if($request->has('update')){
            return view('movies.moviesEdit')
                                    ->with('id', $id)
                                    ->with('name', $name)
                                    ->with('description', $description)
                                    ->with('rating', $rating)
                                    ->with('category', $category)
                                    ->with('imageUrl', $imageUrl)
                                    ->with('releaseDate', $releaseDate)
                                    ->with('length', $length);
        }
        else {
            $result = DB::table('movies')->where('id', $movieid)->delete();
            return view('admin.movies');
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
        $result = DB::table('movies')->where('id', $id)->update([
            'name' => $name,
            'description' => $description,
            'rating' => $rating,
            'category' => $category,
            'imageUrl' => $imageUrl,
            'releaseDate' => $releaseDate,
            'length' => $length
        ]);
        return view('admin.movies');
    }
}

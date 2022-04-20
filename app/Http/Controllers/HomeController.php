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
}

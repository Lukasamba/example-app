<?php

namespace App\Http\Controllers;
use App\Http\Controllers\HomeController;

use Illuminate\Http\Request;
use DB;

class WatchlistController extends Controller
{
    public function index()
    {
        return view('watchlist.home');
    }

    public function add(Request $request)
    {
        $userid = Session()->get('userInfo')['id'];
        $itemId = $request->input('itemid');
        DB::table('watchlists')->insert([
            'UserId' => $userid,
            'ItemId' => $itemId
        ]);
        if($request->has('movies')){
            return redirect()->action([HomeController::class, 'openMovieById'], ['id' => $itemId]);
        }
    }

    public function delete(Request $request){
        $userid = Session()->get('userInfo')['id'];
        $itemId = $request->input('itemid');
        DB::table('watchlists')->where('UserId', $userid)->where('ItemId', $itemId)->delete();
        if($request->has('movies')){
            return redirect()->action([HomeController::class, 'openMovieById'], ['id' => $itemId]);
        }
    }
}

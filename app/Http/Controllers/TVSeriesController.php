<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TVSeries;
use App\Models\TVSeriesWatchlist;

class TVSeriesController extends Controller
{
    public function openTVSeriesPage()
    {
        return view('tvseries.tvserieshome', [
            'tvseries' => TVSeries::getAllTVSeries()
        ]);
    }

    public function openTVSeriesPageByCategory($category)
    {
        $tvseries = TVSeries::getTVSeriesByCategory($category);
        return view('tvseries.category', [
            'tvseries' => $tvseries
        ]);
    }

    public function openTVSeriesById($id)
    {
        $tvserie = TVSeries::get($id);
        if($tvserie)
        {
            if(session()->has('userInfo'))
            {
                $userid = session()->get('userInfo')['id'];
                if(!TVSeriesWatchlist::where('UserId', $userid)->where('ItemId', $id)->exists())
                {
                    return view('tvseries.open', [
                        'id' => $tvserie->id,
                        'name' => $tvserie->name,
                        'description' => $tvserie->description,
                        'rating' => $tvserie->rating,
                        'category' => $tvserie->category,
                        'imageUrl' => $tvserie->imageUrl,
                        'releaseDate' => $tvserie->releaseDate,
                        'seasons' => $tvserie->seasons,
                        'episodes' => $tvserie->episodes,
                        'isOnWatchlist' => false
                    ]);
                }
                else
                {
                    return view('tvseries.open', [
                        'id' => $tvserie->id,
                        'name' => $tvserie->name,
                        'description' => $tvserie->description,
                        'rating' => $tvserie->rating,
                        'category' => $tvserie->category,
                        'imageUrl' => $tvserie->imageUrl,
                        'releaseDate' => $tvserie->releaseDate,
                        'seasons' => $tvserie->seasons,
                        'episodes' => $tvserie->episodes,
                        'isOnWatchlist' => true
                    ]);
                }
            }
            else
            {
                return view('tvseries.open', [
                    'id' => $tvserie->id,
                    'name' => $tvserie->name,
                    'description' => $tvserie->description,
                    'rating' => $tvserie->rating,
                    'category' => $tvserie->category,
                    'imageUrl' => $tvserie->imageUrl,
                    'releaseDate' => $tvserie->releaseDate,
                    'seasons' => $tvserie->seasons,
                    'episodes' => $tvserie->episodes
                ]);
            }
        }
        else
        {
            return redirect('/tvseries');
        }
    }
}

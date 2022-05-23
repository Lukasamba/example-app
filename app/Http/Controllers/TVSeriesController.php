<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TVSeriesController extends Controller
{
    public function openTVSeriesPage()
    {
        return view('tvseries.tvserieshome');
    }
}

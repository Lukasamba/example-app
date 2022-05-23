<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TVSeries extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'rating',
        'category',
        'imageUrl',
        'releaseDate',
        'seasons',
        'episodes'
    ];

    public static function get($id)
    {
        $tvserie = TVSeries::where('id', $id)->first();
        if($tvserie)
        {
            return $tvserie;
        }
        else return false;
    }

    public static function getAllTVSeries()
    {
        return TVSeries::all();
    }

    public static function getTVSeriesByCategory($category)
    {
        return TVSeries::where('category', $category)->get();
    }

    public static function getLastThree()
    {
        return TVSeries::orderBy('id', 'desc')->take(5)->get();
    }
}

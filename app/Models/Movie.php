<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'rating',
        'category',
        'imageUrl',
        'releaseDate',
        'length'
    ];

    public static function get($id)
    {
        $movie = Movie::where('id', $id)->first();
        if($movie)
        {
            return $movie;
        }
        else return false;
    }

    public static function getAllMovies()
    {
        return Movie::all();
    }

    public static function getMoviesByCategory($category)
    {
        return Movie::where('category', $category)->get();
    }

    public static function getLastThree()
    {
        return Movie::orderBy('id', 'desc')->take(5)->get();
    }
}

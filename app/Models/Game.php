<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'rating',
        'category',
        'imageUrl',
        'releaseDate'
    ];

    public static function get($id)
    {
        return Game::where('id', $id)->first();
    }

    public static function getAllGames()
    {
        return Game::all();
    }

    public static function getGamesByCategory($category)
    {
        return Game::where('category', $category)->get();
    }

    public static function getLastThree()
    {
        return Game::orderBy('id', 'desc')->take(5)->get();
    }
}

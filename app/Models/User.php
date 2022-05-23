<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'admin'
    ];

    public static function getAll()
    {
        return User::all();
    }

    public static function get()
    {
        $id = session()->get('userInfo')['id'];
        return User::where('id', $id)->first();
    }
}

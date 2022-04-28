@extends('layouts.header')

@section('content')
  
@php
    $movies = DB::table('movies')->where('id', $id)->get();
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
@endphp

<div class="container mt-5 bg-dark text-light">
    <div class="ms-5 pt-5 pb-5">
        <div>
            <h1>{{$name}}</h1>
        </div>
        <div class="me-5" style="float: left">
            <h6>{{$releaseDate}}</h6>
        </div>
        <div class="me-5" style="float: left">
            <h6>{{$length}}</h6>
        </div>
        <div class="me-5" style="float: left">
            <h6>{{$category}}</h6>
        </div>
        <div style="float: left">
            <h6>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                    <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                </svg>
            </h6>
        </div>
        <div>
            <h6>{{$rating}}/10</h6>
        </div>
        <div class="mt-3 d-flex flex-row">
            <div>
                <img src="{{$imageUrl}}" >
            </div>
            <div class="ms-5 me-5" style="width: 60%">
                <h6>{{$description}}</h6>
                @php
                    $userid = Session()->get('userInfo')['id'];
                @endphp
                @if (!DB::table('watchlists')->where('UserId', $userid)->where('ItemId', $id)->exists())
                <form action="/movie/{{$id}}/addtowatchlist" method="POST">
                    @csrf
                    <input type="hidden" name="movies" id="movies" value="movies">
                    <input type="hidden" name="itemid" id="itemid" value="{{$id}}">
                    <button type="submit" class="btn btn-primary">Add to watchlist</button>
                </form>
                @else
                <form action="/movie/{{$id}}/deletefromwatchlist" method="POST">
                    @csrf
                    <input type="hidden" name="movies" id="movies" value="movies">
                    <input type="hidden" name="itemid" id="itemid" value="{{$id}}">
                    <button type="submit" class="btn btn-danger">Delete from watchlist</button>
                </form>
                @endif
            </div>
        </div>
    </div>

</div>

@endsection
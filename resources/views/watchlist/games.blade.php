@extends('layouts.header')

@section('content')

<div style="width: 100%">
  <div class="text-light rounded bg-dark ms-5 mt-5 pt-2 pe-5 pb-5" style="width: min-content; float: left">
    <ul class="nav flex-column ms-5 mt-5">
        <li class="nav-item">
          <a class="nav-link text-light" href="/watchlist/movies">Movies</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="/watchlist/tvseries">TV Series</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="/watchlist/games">Games</a>
        </li>
    </ul>
  </div>
  <div class="text-dark rounded bg-dark mt-5 me-5 pt-2 pe-5 pb-5" style="width: 75%; float: right">
    <div class="ms-3 mt-1 row row-cols-1 row-cols-md-5 g-4">
        @php
            $userid = Session()->get('userInfo')['id'];
            $records = DB::table('games_watchlists')->where('UserId', $userid)->get();
        @endphp

        @foreach ($records as $record)
            
            @php
                $itemid = $record->ItemId;
                $games = DB::table('games')->where('id', $itemid)->get();
                foreach($games as $game){
                    $id = $game->id;
                    $name = $game->name;
                    $imageUrl = $game->imageUrl;
                }
            @endphp

            <div class="col">
                <div class="card h-100">
                    <form action="/game/{{$id}}" method="POST">
                        @csrf
                        <input type="image" alt="submit" src="{{$imageUrl}}" style="max-width:fit-content; object-fit: cover" class="mx-auto card-img-top">
                    </form>
                    <div class="card-body">
                        <h5 class="card-title">{{$name}}</h5>
                    </div>
                </div>
            </div>

        @endforeach
    </div>
  </div>
</div>

@endsection
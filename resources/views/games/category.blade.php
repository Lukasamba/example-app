@extends('layouts.header')

@section('content')

<div style="width: 100%">
  <div class="text-light rounded bg-dark ms-5 mt-5 pt-2 pe-5 pb-5" style="width: min-content; float: left">
    <ul class="nav flex-column ms-5 mt-5">
        <li class="nav-item">
            <h2>Genre</h2>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="/games/action">Action</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="/games/adventure">Adventure</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="/games/puzzle">Puzzle</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="/games/rpg">RPG</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="/games/racing">Racing</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="/games/shooter">Shooter</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="/games/strategy">Strategy</a>
        </li>
    </ul>
  </div>
  <div class="text-dark rounded bg-dark mt-5 me-5 pt-2 pe-5 pb-5" style="width: 75%; float: right">

    <div class="ms-3 mt-1 row row-cols-1 row-cols-md-5 g-4">
      @foreach ($games as $game)
          
      <div class="col">
        <div class="card h-100">
            <form action="/game/{{$game->id}}" method="POST">
                @csrf
                <input type="image" alt="submit" src="{{$game->imageUrl}}" style="max-width:fit-content; object-fit: cover" class="mx-auto card-img-top">
            </form>
            <div class="card-body">
                <h5 class="card-title">{{$game->name}}</h5>
            </div>
        </div>
      </div>

      @endforeach

    </div>
  </div>
</div>

@endsection
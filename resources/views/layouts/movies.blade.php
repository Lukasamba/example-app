@extends('layouts.header')

@section('content')

<div style="width: 100%">
  <div class="text-light rounded bg-dark ms-5 mt-5 pt-2 pe-5 pb-5" style="width: min-content; float: left">
    <ul class="nav flex-column ms-5 mt-5">
        <li class="nav-item">
            <h2>Genre</h2>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="#">Action</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="#">Adventure</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="#">Comedy</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="#">Drama</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="#">Fantasy</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="#">Horror</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="#">Romance</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="#">Sci-Fi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="#">Superhero</a>
        </li>
    </ul>
  </div>
  <div class="text-dark rounded bg-dark mt-5 me-5 pt-2 pe-5 pb-5" style="width: 75%; float: right">

    <div class="ms-3 mt-1 row row-cols-1 row-cols-md-5 g-4">
      @php
        $movies = DB::table('movies')->get();
      @endphp

      @foreach ($movies as $movie)
          
      <div class="col">
        <div class="card h-100">
          <img src="{{$movie->imageUrl}}" style="max-width:fit-content; object-fit: cover" class="mx-auto card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">{{$movie->name}}</h5>
          </div>
        </div>
      </div>

      @endforeach

    </div>
  </div>
</div>

@endsection
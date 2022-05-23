@extends('layouts.header')

@section('content')

<div style="width: 100%">
  <div class="text-light rounded bg-dark ms-5 mt-5 pt-2 pe-5 pb-5" style="width: min-content; float: left">
    <ul class="nav flex-column ms-5 mt-5">
        <li class="nav-item">
            <h2>Genre</h2>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="/tvseries/action">Action</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="/tvseries/adventure">Adventure</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="/tvseries/comedy">Comedy</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="/tvseries/drama">Drama</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="/tvseries/fantasy">Fantasy</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="/tvseries/horror">Horror</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="/tvseries/romance">Romance</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="/tvseries/scifi">Sci-Fi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="/tvseries/superhero">Superhero</a>
        </li>
    </ul>
  </div>
  <div class="text-dark rounded bg-dark mt-5 mb-5 me-5 pt-2 pe-5 pb-5" style="width: 75%; float: right">

    <div class="ms-3 mt-1 row row-cols-1 row-cols-md-5 g-4">
      @foreach ($tvseries as $tvserie)
          
      <div class="col">
        <div class="card h-100">
            <form action="/tvserie/{{$tvserie->id}}" method="POST" style="max-width:220px; ">
                @csrf
                <input type="image" alt="submit" src="{{$tvserie->imageUrl}}" style="height: 300px; object-fit: cover" class="mx-auto card-img-top">
            </form>
            <div class="card-body">
                <h5 class="card-title">{{$tvserie->name}}</h5>
            </div>
        </div>
      </div>

      @endforeach

    </div>
  </div>
</div>

@endsection
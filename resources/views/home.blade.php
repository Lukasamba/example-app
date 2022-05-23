@extends('layouts.header')

@section('content')
    <div class="container text-light rounded bg-dark mt-5 ps-5 pt-3 pb-3 pe-5 d-flex flex-wrap justify-content-center">
        <div class="d-flex justify-content-center" style="align-text: center; width: 100%">
            <h2>Recently added Movies</h2>
        </div>
        @foreach ($movies as $movie)
            <div class="d-flex">
                <div class="card h-100 ms-3" style="width:220px; ">
                    <form action="/movie/{{$movie->id}}" method="POST">
                        @csrf
                            <input type="image" alt="submit" src="{{$movie->imageUrl}}" style="height: 300px; object-fit: cover" class="mx-auto card-img-top">
                    </form>
                </div>
            </div>
        @endforeach
    </div>
    <div class="container text-light rounded bg-dark mt-5 ps-5 pt-3 pb-3 pe-5 d-flex flex-wrap justify-content-center">
        <div class="d-flex justify-content-center"  style="align-text: center; width: 100%">
            <h2>Recently added TV Series</h2>
        </div>
        @foreach ($tvseries as $tvserie)
            <div class="d-flex">
                <div class="card h-100 ms-3" style="width:220px; ">
                    <form action="/tvserie/{{$tvserie->id}}" method="POST">
                        @csrf
                        <input type="image" alt="submit" src="{{$tvserie->imageUrl}}" style="align-content: center; height: 300px; object-fit: cover" class="mx-auto card-img-top">
                    </form>
                </div>
            </div>
        @endforeach
    </div>
    <div class="container text-light rounded bg-dark mt-5 mb-5 ps-5 pt-3 pb-3 pe-5 d-flex flex-wrap justify-content-center">
        <div class="d-flex justify-content-center"  style="align-text: center; width: 100%">
            <h2>Recently added Games</h2>
        </div>
        @foreach ($games as $game)
            <div class="d-flex">
                <div class="card h-100 ms-3" style="width:220px; ">
                    <form action="/game/{{$game->id}}" method="POST">
                        @csrf
                        <input type="image" alt="submit" src="{{$game->imageUrl}}" style="height: 300px; object-fit: cover" class="mx-auto card-img-top">
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection
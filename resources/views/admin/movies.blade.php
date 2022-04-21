@extends('layouts.header')

@section('content')
  
<div style="width: 100%">
    @include('layouts.admin')
    <div class="mt-5 pt-2 pe-5 pb-5" style="width: 85%; float: left">
        <a href="{{route('openAddMoviePage')}}" class="btn btn-primary">Add</a>
        <table class="table table-striped table-hover" style="table-layout:fixed;">
          <colgroup>
            <col style="width:40px">
            <col style="width:auto">
            <col style="width:auto">
            <col style="width:70px">
            <col style="width:90px">
            <col style="width:70px">
            <col style="width:90px">
            <col style="width:90px">
            <col style="width:auto">
          </colgroup>
            <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Description</th>
                  <th>Rating</th>
                  <th>Category</th>
                  <th>Image</th>
                  <th>Release</th>
                  <th>Length</th>
                </tr>
              </thead>
              <tbody>
                @php
                    $movies = DB::table('movies')->get();
                @endphp
                @foreach ($movies as $movie)
                <tr>
                  <th>{{$movie->id}}</th>
                  <td>{{$movie->name}}</td>
                  <td style="width:100px; overflow:hidden; text-overflow:ellipsis; white-space:nowrap;">{{$movie->description}}</td>
                  <td>{{$movie->rating}}</td>
                  <td>{{$movie->category}}</td>
                  <td style="width:10px; overflow:hidden; text-overflow:ellipsis; white-space:nowrap;">
                    <a target="_blank" href="{{$movie->imageUrl}}">Url</a>
                  </td>
                  <td>{{$movie->releaseDate}}</td>
                  <td>{{$movie->length}}</td>
                  <td>
                      <form action="{{route('openEditMoviePage')}}" method="POST">
                        @csrf
                        <input type="hidden" name="movieid" id="movieid" value="{{$movie->id}}">
                        <button type="submit" name="update" value="update" class="btn btn-warning">Update</button>
                        <button type="submit" name="delete" value="delete" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                      </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
          </table>
    </div>
</div>

@endsection
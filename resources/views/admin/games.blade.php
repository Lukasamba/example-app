@extends('layouts.header')

@section('content')
  
<div style="width: 100%">
    @include('layouts.admin')
    <div class="mt-5 pt-2 pe-5 pb-5" style="width: 85%; float: left">
        <a href="{{route('openAddGamePage')}}" class="btn btn-primary">Add</a>
        <table class="table table-striped table-hover" style="table-layout:fixed;">
          <colgroup>
            <col style="width:40px">
            <col style="width:auto">
            <col style="width:auto">
            <col style="width:70px">
            <col style="width:90px">
            <col style="width:70px">
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
                </tr>
              </thead>
              <tbody>
                @foreach ($games as $game)
                <tr>
                  <th>{{$game->id}}</th>
                  <td>{{$game->name}}</td>
                  <td style="width:100px; overflow:hidden; text-overflow:ellipsis; white-space:nowrap;">{{$game->description}}</td>
                  <td>{{$game->rating}}</td>
                  <td>{{$game->category}}</td>
                  <td style="width:10px; overflow:hidden; text-overflow:ellipsis; white-space:nowrap;">
                    <a target="_blank" href="{{$game->imageUrl}}">Url</a>
                  </td>
                  <td>{{$game->releaseDate}}</td>
                  <td>
                      <form style="float:left" class="me-1" action="/game/{{$game->id}}" method="POST">
                        @csrf
                        <button type="submit" name="open" value="open" class="btn btn-primary">Open</button>
                      </form>
                      <form class="form-inline" action="{{route('openEditGamePage')}}" method="POST">
                        @csrf
                        <input type="hidden" name="gameid" id="gameid" value="{{$game->id}}">
                        <button type="submit" name="update" value="update" class="btn btn-warning">Edit</button>
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
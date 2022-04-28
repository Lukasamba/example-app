@extends('layouts.header')

@section('content')
<div class="ms-5 mt-5 me-5 d-flex justify-content-center" style="width: auto">
    <form action="{{route('editMovie')}}" method="POST">
        @csrf
        <div class="mb-3" style="width:70ch">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" id="name" value="{{$name}}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" id="description">{{$description}} required</textarea>
        </div>
        <div class="mb-3">
            <label for="rating" class="form-label">Rating</label>
            <input type="float" name="rating" class="form-control" id="rating" value="{{$rating}}" required>
        </div>
        <div class="mb-3">
            <label for="imageUrl" class="form-label">Image Url</label>
            <input type="text" name="imageUrl" class="form-control" id="imageUrl" value="{{$imageUrl}}" required>
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select name="category" class="form-select" required>
                <option>Choose category</option>
                @if ($category == "Action")
                    <option selected value="Action">Action</option>
                @else
                    <option value="Action">Action</option>
                @endif
                @if ($category == "Adventure")
                    <option selected value="Adventure">Adventure</option>
                @else
                    <option value="Adventure">Adventure</option>
                @endif
                @if ($category == "Comedy")
                    <option selected value="Comedy">Comedy</option>
                @else
                    <option value="Comedy">Comedy</option>
                @endif
                @if ($category == "Drama")
                    <option selected value="Drama">Drama</option>
                @else
                    <option value="Drama">Drama</option>
                @endif
                @if ($category == "Fantasy")
                    <option selected value="Fantasy">Fantasy</option>
                @else
                    <option value="Fantasy">Fantasy</option>
                @endif
                @if ($category == "Horror")
                    <option selected value="Horror">Horror</option>
                @else
                    <option value="Horror">Horror</option>
                @endif
                @if ($category == "Romance")
                    <option selected value="Romance">Romance</option>
                @else
                    <option value="Romance">Romance</option>
                @endif
                @if ($category == "Sci-Fi")
                    <option selected value="Sci-Fi">Sci-Fi</option>
                @else
                    <option value="Sci-Fi">Sci-Fi</option>
                @endif
                @if ($category == "Superhero")
                    <option selected value="Superhero">Superhero</option>
                @else
                    <option value="Superhero">Superhero</option>
                @endif
              </select>
        </div>
        <div class="mb-3">
            <label for="releaseDate" class="form-label">Release Date</label>
            <input type="number" name="releaseDate" class="form-control" id="releaseDate" value="{{$releaseDate}}" required>
        </div>
        <div class="mb-3">
            <label for="length" class="form-label">Length</label>
            <input type="text" name="length" class="form-control" id="length" value="{{$length}}" required>
        </div>
        <div class="mb-3">
            <input type="hidden" name="id" id="id" value="{{$id}}">
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="/admin/movies" class="btn btn-danger">Cancel</a>
        </div>
    </form>
</div>
@endsection
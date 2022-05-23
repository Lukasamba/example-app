@extends('layouts.header')

@section('content')
<div class="ms-5 mt-5 me-5 d-flex justify-content-center" style="width: auto">
    <form action="{{route('editGame')}}" method="POST">
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
                @if ($category == "Puzzle")
                    <option selected value="Puzzle">Puzzle</option>
                @else
                    <option value="Puzzle">Puzzle</option>
                @endif
                @if ($category == "RPG")
                    <option selected value="RPG">RPG</option>
                @else
                    <option value="RPG">RPG</option>
                @endif
                @if ($category == "Racing")
                    <option selected value="Racing">Racing</option>
                @else
                    <option value="Racing">Racing</option>
                @endif
                @if ($category == "Shooter")
                    <option selected value="Shooter">Shooter</option>
                @else
                    <option value="Shooter">Shooter</option>
                @endif
                @if ($category == "Strategy")
                    <option selected value="Strategy">Strategy</option>
                @else
                    <option value="Strategy">Strategy</option>
                @endif
              </select>
        </div>
        <div class="mb-3">
            <label for="releaseDate" class="form-label">Release Date</label>
            <input type="number" name="releaseDate" class="form-control" id="releaseDate" value="{{$releaseDate}}" required>
        </div>
        <div class="mb-3">
            <input type="hidden" name="id" id="id" value="{{$id}}">
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="/admin/games" class="btn btn-danger">Cancel</a>
        </div>
    </form>
</div>
@endsection
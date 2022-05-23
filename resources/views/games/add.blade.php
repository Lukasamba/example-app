@extends('layouts.header')

@section('content')
<div class="ms-5 mt-5 me-5 d-flex justify-content-center" style="width: auto">
    <form action="{{route('addGame')}}" method="POST">
        @csrf
        <div class="mb-3" style="width:70ch">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" id="name" value="" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" id="description" value="" required></textarea>
        </div>
        <div class="mb-3">
            <label for="rating" class="form-label">Rating</label>
            <input type="float" name="rating" class="form-control" id="rating" value="" required>
        </div>
        <div class="mb-3">
            <label for="imageUrl" class="form-label">Image Url</label>
            <input type="text" name="imageUrl" class="form-control" id="imageUrl" value="" required>
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select name="category" class="form-select" required>
                <option selected>Choose category</option>
                <option value="Action">Action</option>
                <option value="Adventure">Adventure</option>
                <option value="Puzzle">Puzzle</option>
                <option value="RPG">RPG</option>
                <option value="Racing">Racing</option>
                <option value="Shooter">Shooter</option>
                <option value="Strategy">Strategy</option>
              </select>
        </div>
        <div class="mb-3">
            <label for="releaseDate" class="form-label">Release Date</label>
            <input type="number" name="releaseDate" class="form-control" id="releaseDate" value="" required>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Add</button>
            <a href="/admin/games" class="btn btn-danger">Cancel</a>
        </div>
    </form>
</div>
@endsection
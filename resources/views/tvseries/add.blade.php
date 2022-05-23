@extends('layouts.header')

@section('content')
<div class="ms-5 mt-5 me-5 d-flex justify-content-center" style="width: auto">
    <form action="{{route('addTVSeries')}}" method="POST">
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
                <option value="Comedy">Comedy</option>
                <option value="Drama">Drama</option>
                <option value="Fantasy">Fantasy</option>
                <option value="Horror">Horror</option>
                <option value="Romance">Romance</option>
                <option value="Sci-Fi">Sci-Fi</option>
                <option value="Superhero">Superhero</option>
              </select>
        </div>
        <div class="mb-3">
            <label for="releaseDate" class="form-label">Release Date</label>
            <input type="number" name="releaseDate" class="form-control" id="releaseDate" value="" required>
        </div>
        <div class="mb-3">
            <label for="seasons" class="form-label">Seasons</label>
            <input type="number" name="seasons" class="form-control" id="seasons" value="" required>
        </div>
        <div class="mb-3">
            <label for="episodes" class="form-label">Episodes</label>
            <input type="number" name="episodes" class="form-control" id="episodes" value="" required>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Add</button>
            <a href="/admin/tvseries" class="btn btn-danger">Cancel</a>
        </div>
    </form>
</div>
@endsection
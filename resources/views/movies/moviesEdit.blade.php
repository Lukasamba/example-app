@extends('layouts.header')

@section('content')
<div class="ms-5 mt-5 me-5 d-flex justify-content-center" style="width: auto">
    <form action="{{route('editMovie')}}" method="POST">
        @csrf
        <div class="mb-3" style="width:70ch">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" id="name" value="{{$name}}">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" id="description">{{$description}}</textarea>
        </div>
        <div class="mb-3">
            <label for="rating" class="form-label">Rating</label>
            <input type="float" name="rating" class="form-control" id="rating" value="{{$rating}}">
        </div>
        <div class="mb-3">
            <label for="imageUrl" class="form-label">Image Url</label>
            <input type="text" name="imageUrl" class="form-control" id="imageUrl" value="{{$imageUrl}}">
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <input type="text" name="category" class="form-control" id="category" value="{{$category}}">
        </div>
        <div class="mb-3">
            <label for="releaseDate" class="form-label">Release Date</label>
            <input type="number" name="releaseDate" class="form-control" id="releaseDate" value="{{$releaseDate}}">
        </div>
        <div class="mb-3">
            <label for="length" class="form-label">Length</label>
            <input type="text" name="length" class="form-control" id="length" value="{{$length}}">
        </div>
        <div class="mb-3">
            <input type="hidden" name="id" id="id" value="{{$id}}">
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="/admin/movies" class="btn btn-danger">Cancel</a>
        </div>
    </form>
</div>
@endsection
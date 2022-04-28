@extends('layouts.header')

@section('content')
<div class="ms-5 mt-5 me-5" style="width: 20%">
    <form action="{{route('saveEditedInfo')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="name" name="name" class="form-control" id="name" value="{{$name}}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" id="email" value="{{$email}}" required>
        </div>
        <div class="mb-3">
            <input type="hidden" name="id" id="id" value="{{$id}}">
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="/admin/users" class="btn btn-danger">Cancel</a>
        </div>
    </form>
</div>
@endsection
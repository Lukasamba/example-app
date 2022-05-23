@extends('layouts.header')

@section('content')
<div class="ms-5 mt-5 me-5" style="width: 20%">
    
    @isset ($success)
        <div class="alert alert-success">
            <p>{{ $success }}</p>
        </div>  
    @endisset
    
    @isset ($fail)
        <div class="alert alert-danger">
            <p>{{ $fail }}</p>
        </div>    
    @endisset

  <form action="{{route('saveEditedProfile')}}" method="POST">
      @csrf
      <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="name" name="name" class="form-control" id="name" value="{{$name}}">
          <span style="color:red" class="text-danger">@error('name'){{$message}}@enderror</span>
      </div>
      <div class="mb-3">
          <label for="email" class="form-label">Email address</label>
          <input type="email" name="email" class="form-control" id="email" value="{{$email}}">
          <span style="color:red" class="text-danger">@error('email'){{$message}}@enderror</span>
      </div>
      <div class="mb-3">
          <label for="oldpassword" class="form-label">Old password</label>
          <input type="password" name="oldpassword" class="form-control" id="oldpassword">
          <span style="color:red" class="text-danger">@error('oldpassword'){{$message}}@enderror</span>
      </div>
      <div class="mb-3">
          <label for="newpassword" class="form-label">New password</label>
          <input type="password" name="newpassword" class="form-control" id="newpassword">
          <span style="color:red" class="text-danger">@error('newpassword'){{$message}}@enderror</span>
      </div>
      <div class="mb-3">
          <input type="hidden" name="id" id="id" value="{{$id}}">
          <button type="submit" class="btn btn-primary">Save</button>
          <a href="/" class="btn btn-danger">Cancel</a>
      </div>
  </form>
</div>
@endsection
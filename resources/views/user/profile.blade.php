@extends('layouts.header')

@section('content')
    
<div class="container-sm rounded shadow">
    <div>
      <label class="p-4 w-auto" for="name">Name</label>
      <input disabled id="name" type="text" value="{{$data->name}}" />
    </div>
    <div>
      <label class="p-4 w-auto" for="about">Email</label>
      <input disabled id="email"type="email" value="{{$data->email}}" />
    </div>
    <div>
      <span class="p-4 w-auto">Personal login information of your account</span>
    </div>
</div>

@endsection
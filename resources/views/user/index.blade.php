@extends('layouts.header')

@section('content')
    
<div class="container ms-5 mt-5 me-5">
    <form action="insertuser" method="POST" >
        @csrf
        <input name="name" type="text" placeholder="name"/>
        <button type="submit" class="btn btn-warning">Create a new user</button>
    </form>
    <a href="userlist" class="btn btn-warning">Refresh</a>
    <table class="table">
        <tr class="table-warning">
            <th>ID</th>
            <th>Name</th>
            <th></th>
        </tr>
        @php
            $users = DB::table('userlist')->get();
        @endphp
        @foreach ($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>
                <form action="deleteuser" method="POST">
                    @csrf
                    <button name="id" value="{{$user->id}}" type="submit" class="btn btn-warning">Delete</button>
                </form>
            </td>
        </tr>                  
         @endforeach
    </table>
<div>
      
@endsection
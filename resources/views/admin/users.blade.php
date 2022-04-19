@extends('layouts.header')

@section('content')

<div style="width: auto">
    <div style="width: auto; float: left">
        @include('layouts.admin')
    </div>
    <div class="mt-5 pt-2 pe-5 pb-5" style="width: auto; float: left">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Is Admin</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @php
                    $users = DB::table('users')->get();
                @endphp
                @foreach ($users as $user)
                <tr>
                  <th>{{$user->id}}</th>
                  <td>{{$user->name}}</td>
                  <td>{{$user->email}}</td>
                  <td>
                      <form class="form-inline me-3" action="{{route('changeAdminStatus')}}" method="POST">
                        @csrf
                        <div class="form-group" style="float: left">
                            <select name="adminStatus" id="adminStatus" class="form-select">
                                @if (($user->admin) == 'YES')
                                    <option value="YES">Yes</option>
                                    <option value="NO">No</option>
                                @else
                                    <option value="NO">No</option>
                                    <option value="YES">Yes</option>
                                @endif
                            </select>
                        </div>
                        <div class="form-group" style="float: right">
                            <input type="hidden" name="userid" id="userid" value="{{$user->id}}">
                            <button type="submit" class="btn btn-warning" onclick="return confirm('Are you sure?')">Save</button>
                        </div>
                      </form>

                    </td>
                  <td>
                      <form action="#" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-warning">Update</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                      </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
          </table>
    </div>
</div>

@endsection
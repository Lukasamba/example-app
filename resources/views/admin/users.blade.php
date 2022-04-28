@extends('layouts.header')

@section('content')

<div style="width: auto">
    <div style="width: auto; float: left">
        @include('layouts.admin')
    </div>
    <div class="me-5 mt-5 pt-2 pe-5 pb-5" style="width: auto; float: left">
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
                          @if (($user->id) == 1)
                            <select name="adminStatus" id="adminStatus" class="form-select" disabled>
                                @if (($user->admin) == 'YES')
                                    <option value="YES">Yes</option>
                                    <option value="NO">No</option>
                                @else
                                    <option value="NO">No</option>
                                    <option value="YES">Yes</option>
                                @endif
                            </select>
                          @else
                            <select name="adminStatus" id="adminStatus" class="form-select">
                            @if (($user->admin) == 'YES')
                                <option value="YES">Yes</option>
                                <option value="NO">No</option>
                            @else
                                <option value="NO">No</option>
                                <option value="YES">Yes</option>
                            @endif
                            </select>
                          @endif
                        </div>
                        <div class="form-group" style="float: right">
                            <input type="hidden" name="userid" id="userid" value="{{$user->id}}">
                            @if (($user->id) == 1)
                              <button type="submit" class="btn btn-warning" onclick="return confirm('Are you sure?')" disabled>Save</button>
                            @else
                              <button type="submit" class="btn btn-warning" onclick="return confirm('Are you sure?')">Save</button>
                            @endif
                        </div>
                      </form>

                    </td>
                  <td>
                      <form action="{{route('editOrDelete')}}" method="POST">
                        @csrf
                        <input type="hidden" name="userid" id="userid" value="{{$user->id}}">
                        @if (($user->id) == 4)
                          <button type="submit" name="update" value="update" class="btn btn-warning" disabled>Update</button>
                          <button type="submit" name="delete" value="delete" class="btn btn-danger" disabled>Delete</button>
                        @else
                          <button type="submit" name="update" value="update" class="btn btn-warning">Update</button>
                          <button type="submit" name="delete" value="delete" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        @endif
                      </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
          </table>
    </div>
</div>

@endsection
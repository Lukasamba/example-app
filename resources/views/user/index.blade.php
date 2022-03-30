@include('home')
<div>
    <form action="insertuser" method="POST" class="rounded-t-lg m-5 w-5/6 mx-auto">
        @csrf
        <input name="name" type="text" placeholder="name"/>
        <button type="submit" class="bg-yellow-400 px-8">Create a new user</button>
  </form>
  <form action="refreshpage" method="POST" class="rounded-t-lg m-5 w-5/6 mx-auto">
      @csrf
      <button type="submit" class="bg-yellow-400 px-8">Refresh</button>
  </form>
  <table class="rounded-t-lg m-5 w-5/6 mx-auto bg-gray-200 text-gray-800">
    <tr class="text-left border-b-2 border-gray-300">
        <th class="px-4 py-3">ID</th>
        <th class="px-4 py-3">Name</th>
      </tr>
      @php
          $users = DB::table('userlist')->get();
      @endphp
      @foreach ($users as $user)
      <tr class="bg-gray-100 border-b border-gray-200">
        <td class="px-4 py-3">{{$user->id}}</td>
        <td class="px-4 py-3">{{$user->name}}</td>
        <td class="px-4 py-3">
            <form action="deleteuser" method="POST">
                @csrf
                <button name="id" value="{{$user->id}}" type="submit" class="bg-yellow-400 px-8">Delete</button>
            </form>
        </td>
      </tr>                  
      @endforeach
  </table>
  <div>
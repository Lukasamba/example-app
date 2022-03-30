<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <title>Login</title>
    </head>
    <body>
        <div class="h-screen bg-gradient-to-br from-blue-600 to-indigo-600 flex justify-center items-center w-full">
            <form action="trylogin" method="POST">
              @if (Session::has('success'))
                  <div class="alert alert-sucess">{{Session::get('success')}}</div>
              @endif
              @if (Session::has('fail'))
                  <div class="alert alert-danger">{{Session::get('fail')}}</div>
              @endif
              @csrf
              <div class="bg-white px-10 py-8 rounded-xl w-screen shadow-md max-w-sm">
                <div class="space-y-4">
                  <h1 class="text-center text-2xl font-semibold text-gray-600">Login</h1>
                  <div>
                    <label for="email" class="block mb-1 text-gray-600 font-semibold">Email</label>
                    <input name="email" value="{{old('email')}}" type="text" class="bg-indigo-50 px-4 py-2 outline-none rounded-md w-full" />
                    <span style="color:red" class="text-danger">@error('email'){{$message}}@enderror</span>
                  </div>
                  <div>
                    <label for="password" class="block mb-1 text-gray-600 font-semibold">Password</label>
                    <input name="password" type="password" class="bg-indigo-50 px-4 py-2 outline-none rounded-md w-full" />
                    <span style="color:red" class="text-danger">@error('password'){{$message}}@enderror</span>
                  </div>
                </div>
                <button type="submit" class="mt-4 w-full bg-gradient-to-tr from-blue-600 to-indigo-600 text-indigo-100 py-2 rounded-md text-lg tracking-wide">Login</button>
                <br><br>
                <a href="register" class="mt-4 w-full bg-gradient-to-tr from-blue-600 to-indigo-600 text-indigo-100 py-2 rounded-md text-lg tracking-wide">Not a user ? Sign up</a>
              </div>
            </form>
          </div>
    </body>
</html>
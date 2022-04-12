<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <title>Registration</title>
    </head>
    <body>
      <div class="container">
        <div class="row">
          <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card border-0 shadow rounded-3 my-5">
              <div class="card-body p-4 p-sm-5">
                <h5 class="card-title text-center mb-5 fw-light fs-5">Join us!</h5>
                <form action="tryregister" method="POST">
                  @if (Session::has('success'))
                      <div class="alert alert-sucess">{{Session::get('success')}}</div>
                  @endif
                  @if (Session::has('fail'))
                      <div class="alert alert-danger">{{Session::get('fail')}}</div>
                  @endif
                  @csrf
                  <div class="form-floating mb-3">
                    <input name="name" type="text" class="form-control" id="floatingInput" placeholder="name" value="{{old('name')}}">
                    <label for="floatingInput">Name</label>
                    <span style="color:red" class="text-danger">@error('name'){{$message}}@enderror</span>
                  </div>
                  <div class="form-floating mb-3">
                    <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com" value="{{old('email')}}">
                    <label for="floatingInput">Email address</label>
                    <span style="color:red" class="text-danger">@error('email'){{$message}}@enderror</span>
                  </div>
                  <div class="form-floating mb-3">
                    <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                    <span style="color:red" class="text-danger">@error('password'){{$message}}@enderror</span>
                  </div>
                  <div class="d-grid mb-3">
                    <button class="btn btn-primary btn-login fw-bold" type="submit">Sign up</button>
                  </div>
                  <a class="d-flex justify-content-center btn btn-primary" href="login">Already a user ? Sign in</a>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </body>
</html>
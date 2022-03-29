<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <title>Create page</title>
    </head>
    <body>
        <div>
            <form action="insertuser" method="POST">
                @csrf
              <input name="name" type="text" placeholder="name"/>
              <button type="submit">Insert</button>
          </form>
      </div>
    </body>
</html>
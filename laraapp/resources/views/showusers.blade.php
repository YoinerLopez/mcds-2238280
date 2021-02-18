<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <title>Reto 2</title>
</head>
<body>
  <div class="container">
    <div class=""> <h1>10 USERS</h1> </div>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">Fullname</th>
            <th scope="col">Date of Birth</th>
            <th scope="col">Age in years</th>
            <th scope="col">Registered since</th>
            <th scope="col">Created at</th>
          </tr>
        </thead>
        <tbody>
            @csrf
            @foreach ($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->fullname }}</td>
                    <td>{{ $user->birthdate }}</td>
                    <td>{{ $user->age }}</td>
                    <td>{{ $user->registered }}</td>
                    <td>{{ $user->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
      </table>
    </div>
</body>
</html>
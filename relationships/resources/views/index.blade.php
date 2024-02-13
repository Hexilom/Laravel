<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Roles:{{ $user->name }}</h1>
    @foreach ($user->roles as $role)
        <li > {{ $role->name }} Addedby :{{ $role->pivot->added_by }}</li>
    @endforeach
</body>
</html>
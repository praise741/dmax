
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @foreach ($users as $user )
    <ol>
        <li>{{ $user->email }}</li>
        <li>{{ $user->name }}</li>
    </ol>
    @endforeach
    <form action="/ahmed" method="POST">
    @csrf
    <input type="text" name="name"  placeholder="fullname">
    <input type="text" name="email"     placeholder="email"/>
    <input type="password" name="password" placeholder="password"/>
    <input type="submit">

    </form>
</body>
</html>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @csrf
    <table border='1'>
        <thead >
        <tr>
            <th>id</th>
            <th>Name</th>
            <th>email</th>
            <th>Password</th>
            <th>Action</th>
        </tr>
        </thead>
        <tr>
            @foreach($user as $user)
            <tr>
            <td>{{$user -> id}}</td>
            <td>{{$user -> name}}</td>
            <td>{{$user -> email}}</td>
            <td>{{$user -> password}}</td>
            <td><a href="/edituser/{{$user->id}}">Edit</a>
                |
               <a href="/deleteuser/{{$user->id}}"> delete</a></td>
            </tr>
            @endforeach
        </tr>
    </table>
</body>
</html>

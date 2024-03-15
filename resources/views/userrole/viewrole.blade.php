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
            <th>UserRoleName</th>
            <th>Action</th>
        </tr>
        </thead>
        <tr>
            @foreach($users as $item)
            <tr>
            <td>{{$item -> id}}</td>
            <td>{{$item -> role}}</td>
            <td><a href="/edit/{{$item->id}}">Edit</a>
                |
               <a href="/delete/{{$item->id}}"> delete</a></td>
            </tr>
            @endforeach
        </tr>
    </table>
</body>
</html>

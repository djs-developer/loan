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
            <th>Permission Name</th>
            <th>Action</th>
        </tr>
        </thead>
        <tr>
            @foreach($permission as $permission)
            <tr>
            <td>{{$permission -> id}}</td>
            <td>{{$permission -> permission}}</td>
            <td><a href="/editpermission/{{$permission->id}}">Edit</a>
                |
               <a href="/deletepermission/{{$permission->id}}"> delete</a></td>
            </tr>
            @endforeach
        </tr>
    </table>
</body>
</html>

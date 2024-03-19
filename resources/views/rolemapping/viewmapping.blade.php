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
            <th>Role Name</th>
            <th>User Name</th>
            <th>Action</th>
        </tr>
        </thead>
        <tr>
            @foreach($mapping as $mapping)
           
            <tr>
            <td>{{$mapping -> id}}</td>
            <td>{{$mapping -> role}}</td>
            <td>{{$mapping -> name}}</td>
            <td><a href="/editmapping/{{$mapping->id}}">Edit</a>
                |
               <a href="/deletemapping/{{$mapping->id}}"> delete</a></td>
            </tr>
           
            @endforeach
        </tr>
    </table>
</body>
</html>

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
            <th>permission</th>
            <th>role</th>
            <th>Action</th>
        </tr>
        </thead>
        <tr>
            @foreach($view as $rolepermission)
            
            <tr>
            <td>{{$rolepermission -> id}}</td>
            <td>{{$rolepermission ->permission-> permission}}</td>
            <td> {{$rolepermission->userrole->role}}</td>
            <td><a href="/editrolepermissionform/{{$rolepermission->role_id}}">Edit</a>
            |
            <a href="/deleterolepermission/{{$rolepermission->id}}">delete</a>          
            </td>
            </tr>
           
            @endforeach
        </tr>
    </table>
</body>
</html>

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
            <th>Name-role</th>
            <th>Action</th>
        </tr>
        </thead>
        <tr>
            @foreach($rolepermission as $rolepermission)
            
            <tr>
            <td>{{$rolepermission -> id}}</td>
            <td>{{$rolepermission -> permission}}</td>
            <td>{{$rolepermission ->name}}  - {{$rolepermission->role}}</td>
            <td><a href="/editrolepermission/{{$rolepermission->id}}">Edit</a>
                |
               <a href="/deleterolepermission/{{$rolepermission->id}}"> delete</a></td>
            </tr>
           
            @endforeach
        </tr>
    </table>
</body>
</html>

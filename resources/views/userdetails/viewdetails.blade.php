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
            <th>Field Name</th> 
            <th>Value</th>
            <th>User_id</th>
            <th>Action</th>
        </tr>
        </thead>
        <tr>
            @foreach($details as $details)
            <tr>
            <td>{{$details -> id}}</td>
            <td>{{$details -> name}}</td>
            <td>{{$details -> value}}</td>
            <td>{{$details ->user-> name}}</td>
            <td><a href="/edituserdetails/{{$details->user_id}}">Edit</a>
                |
               <a href="/deletedetails/{{$details->id}}"> delete</a></td>
            </tr>
            @endforeach
        </tr>
    </table>
</body>
</html>

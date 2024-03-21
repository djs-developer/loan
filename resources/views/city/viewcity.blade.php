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
            <th>city Name</th>
            <th>state Name</th>
            <th>Action</th>
        </tr>
        </thead>
        <tr>
            @foreach($city as $city)
           
            <tr>
            <td>{{$city -> id}}</td>
            <td>{{$city -> cityname}}</td>
            <td>{{$city -> state -> statename}}</td>
            <td><a href="/editcity/{{$city->id}}">Edit</a>
                |
               <a href="/deletecity/{{$city->id}}"> delete</a></td>
            </tr>
          
            @endforeach
        </tr>
    </table>
</body>
</html>

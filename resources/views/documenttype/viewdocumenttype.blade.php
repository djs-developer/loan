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
            <th>Loan Name</th>
            <th>Action</th>
        </tr>
        </thead>
        <tr>
            @foreach($doctype as $doctype)
            <tr>
            <td>{{$doctype -> id}}</td>
            <td>{{$doctype -> docname}}</td>
            <td><a href="/editdoctype/{{$doctype->id}}">Edit</a>
                |
               <a href="/deletedoctype/{{$doctype->id}}"> delete</a></td>
            </tr>
            @endforeach
        </tr>
    </table>
</body>
</html>

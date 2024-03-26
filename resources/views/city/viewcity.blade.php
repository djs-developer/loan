<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="mt-2">

            <br>
            <a href="/viewcity">All users</a> | <a href="/viewcity?status=archived">Archived users</a>

            <br><br>
            @if(request()->get('status') == 'archived')
                {!! Form::open(['method' => 'POST','route' => ['city.restoreallcity'],'style'=>'display:inline']) !!}
                {!! Form::submit('Restore All', ['class' => 'btn btn-primary btn-sm']) !!}
                {!! Form::close() !!}
            @endif
        </div>
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
            @if(request()->get('status') == 'archived')
                                {!! Form::open(['method' => 'POST','route' => ['city.restorecity', $city->id],'style'=>'display:inline']) !!}
                                {!! Form::submit('Restore', ['class' => 'btn btn-primary btn-sm']) !!}
                                {!! Form::close() !!}
            @else|
                            {!! Form::open(['method' => 'DELETE','route' => ['city.deletecity', $city->id],'style'=>'display:inline']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                                {!! Form::close() !!}
            @endif
            <td>
                            @if(request()->get('status') == 'archived')
                                {!! Form::open(['method' => 'DELETE','route' => ['city.forcedeletecity', $city->id],'style'=>'display:inline']) !!}
                                {!! Form::submit('Force Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                                {!! Form::close() !!}
                            @endif
            </td>
            </tr>
          
            @endforeach
        </tr>
    </table>
</body>
</html>

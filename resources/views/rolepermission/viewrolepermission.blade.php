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
    <a href="/viewrolepermission">All Role Permission</a> | <a href="/viewrolepermission?status=archived">Archived users</a>

    <br><br>
    @if(request()->get('status') == 'archived')
    {!! Form::open(['method' => 'POST','route' => ['rolepermission.restoreallrolepermission'],'style'=>'display:inline']) !!}
    {!! Form::submit('Restore All', ['class' => 'btn btn-primary btn-sm']) !!}
    {!! Form::close() !!}
    @endif
    </div>

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
            <td><a href="/editrolepermission/{{$rolepermission->id}}">Edit</a>
            @if(request()->get('status') == 'archived')
                                {!! Form::open(['method' => 'POST','route' => ['rolepermission.restorerolepermission', $rolepermission->id],'style'=>'display:inline']) !!}
                                {!! Form::submit('Restore', ['class' => 'btn btn-primary btn-sm']) !!}
                                {!! Form::close() !!}
            @else|
                            {!! Form::open(['method' => 'DELETE','route' => ['rolepermission.deleterolepermission', $rolepermission->id],'style'=>'display:inline']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                                {!! Form::close() !!}
            @endif
            <td>
                            @if(request()->get('status') == 'archived')
                                {!! Form::open(['method' => 'DELETE','route' => ['rolepermission.forcedeleterolepermission', $rolepermission->id],'style'=>'display:inline']) !!}
                                {!! Form::submit('Force Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                                {!! Form::close() !!}
                            @endif
            </td>
            </td>
            </tr>
           
            @endforeach
        </tr>
    </table>
</body>
</html>

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
            <a href="/viewpermission">All users</a> | <a href="/viewpermission?status=archived">Archived users</a>

            <br><br>
            @if(request()->get('status') == 'archived')
                {!! Form::open(['method' => 'POST','route' => ['permission.restoreallpermission'],'style'=>'display:inline']) !!}
                {!! Form::submit('Restore All', ['class' => 'btn btn-primary btn-sm']) !!}
                {!! Form::close() !!}
            @endif
        </div>
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
            @if(request()->get('status') == 'archived')
                                {!! Form::open(['method' => 'POST','route' => ['permission.restorepermission', $permission->id],'style'=>'display:inline']) !!}
                                {!! Form::submit('Restore', ['class' => 'btn btn-primary btn-sm']) !!}
                                {!! Form::close() !!}
            @else|
                            {!! Form::open(['method' => 'DELETE','route' => ['permission.deletepermission', $permission->id],'style'=>'display:inline']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                                {!! Form::close() !!}
            @endif
            <td>
                            @if(request()->get('status') == 'archived')
                                {!! Form::open(['method' => 'DELETE','route' => ['permission.forcedeletepermission', $permission->id],'style'=>'display:inline']) !!}
                                {!! Form::submit('Force Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                                {!! Form::close() !!}
                            @endif
            </td></td>
            </tr>
            @endforeach
        </tr>
    </table>
</body>
</html>

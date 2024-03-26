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
                    <a href="/viewuser">All User</a> | <a href="/viewuser?status=archived">Archived users</a>

                    <br><br>
                    @if(request()->get('status') == 'archived')
                {!! Form::open(['method' => 'POST','route' => ['user.restorealluser'],'style'=>'display:inline']) !!}
                {!! Form::submit('Restore All', ['class' => 'btn btn-primary btn-sm']) !!}
                {!! Form::close() !!}
            @endif
    </div>
    @csrf
    <table border='1'>
        <thead >
        <tr>
            <th>id</th>
            <th>Name</th>
            <th>email</th>
            <th>Password</th>
            <th>Action</th>
        </tr>
        </thead>
        <tr>
            @foreach($user as $user)
            <tr>
            <td>{{$user -> id}}</td>
            <td>{{$user -> name}}</td>
            <td>{{$user -> email}}</td>
            <td>{{$user -> password}}</td>
            <td><a href="/edituser/{{$user->id}}">Edit</a>
            @if(request()->get('status') == 'archived')
                                {!! Form::open(['method' => 'POST','route' => ['user.restoreuser', $user->id],'style'=>'display:inline']) !!}
                                {!! Form::submit('Restore', ['class' => 'btn btn-primary btn-sm']) !!}
                                {!! Form::close() !!}
            @else|
                            {!! Form::open(['method' => 'DELETE','route' => ['user.deleteuser', $user->id],'style'=>'display:inline']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                                {!! Form::close() !!}
            @endif
            <td>
                            @if(request()->get('status') == 'archived')
                                {!! Form::open(['method' => 'DELETE','route' => ['user.forcedeleteuser', $user->id],'style'=>'display:inline']) !!}
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

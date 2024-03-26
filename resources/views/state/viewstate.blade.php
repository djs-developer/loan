<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @csrf
    <div class="mt-2">

            <br>
            <a href="/viewstate">All users</a> | <a href="/viewstate?status=archived">Archived users</a>

            <br><br>
            @if(request()->get('status') == 'archived')
                {!! Form::open(['method' => 'POST','route' => ['state.restoreallstate'],'style'=>'display:inline']) !!}
                {!! Form::submit('Restore All', ['class' => 'btn btn-primary btn-sm']) !!}
                {!! Form::close() !!}
            @endif
        </div>
    <table border='1'>
        <thead >
        <tr>
            <th>id</th>
            <th>State Name</th>
            <th>Action</th>
        </tr>
        </thead>
        <tr>
            @foreach($state as $state)
            <tr>
            <td>{{$state -> id}}</td>
            <td>{{$state -> statename}}</td>
            <td><a href="/editstate/{{$state->id}}">Edit</a>|
            @if(request()->get('status') == 'archived')
                                {!! Form::open(['method' => 'POST','route' => ['state.restorestate', $state->id],'style'=>'display:inline']) !!}
                                {!! Form::submit('Restore', ['class' => 'btn btn-primary btn-sm']) !!}
                                {!! Form::close() !!}
            @else|
                            {!! Form::open(['method' => 'DELETE','route' => ['state.deletestate', $state->id],'style'=>'display:inline']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                                {!! Form::close() !!}
            @endif
            <td>
                            @if(request()->get('status') == 'archived')
                                {!! Form::open(['method' => 'DELETE','route' => ['state.forcedeletestate', $state->id],'style'=>'display:inline']) !!}
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

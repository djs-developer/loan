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
                    <a href="/viewuserdetails">All User</a> | <a href="/viewuserdetails?status=archived">Archived users</a>

                    <br><br>
                    @if(request()->get('status') == 'archived')
                {!! Form::open(['method' => 'POST','route' => ['userdetails.restorealldetails'],'style'=>'display:inline']) !!}
                {!! Form::submit('Restore All', ['class' => 'btn btn-primary btn-sm']) !!}
                {!! Form::close() !!}
            @endif
    </div>
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
            @if(request()->get('status') == 'archived')
                                {!! Form::open(['method' => 'POST','route' => ['userdetails.restoredetails', $details->id],'style'=>'display:inline']) !!}
                                {!! Form::submit('Restore', ['class' => 'btn btn-primary btn-sm']) !!}
                                {!! Form::close() !!}
            @else|
                            {!! Form::open(['method' => 'DELETE','route' => ['userdetails.deletedetails', $details->id],'style'=>'display:inline']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                                {!! Form::close() !!}
            @endif
            <td>
                            @if(request()->get('status') == 'archived')
                                {!! Form::open(['method' => 'DELETE','route' => ['userdetails.forcedeletedetails', $details->id],'style'=>'display:inline']) !!}
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

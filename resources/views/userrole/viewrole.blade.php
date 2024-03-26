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
                    <a href="/viewrole">All role</a> | <a href="/viewrole?status=archived">Archived users</a>

                    <br><br>
                    @if(request()->get('status') == 'archived')
                {!! Form::open(['method' => 'POST','route' => ['userrole.restorealluserrole'],'style'=>'display:inline']) !!}
                {!! Form::submit('Restore All', ['class' => 'btn btn-primary btn-sm']) !!}
                {!! Form::close() !!}
            @endif
    </div>
  
    <table border='1'>
        <thead >
        <tr>
            <th>id</th>
            <th>UserRoleName</th>
            <th>Action</th>
        </tr>
        </thead>
        <tr>
            @foreach($users as $item)
            <tr>
            <td>{{$item -> id}}</td>
            <td>{{$item -> role}}</td>
            <td><a href="/edit/{{$item->id}}">Edit</a>
                
            @if(request()->get('status') == 'archived')
                                {!! Form::open(['method' => 'POST','route' => ['userrole.restoreuserrole', $item->id],'style'=>'display:inline']) !!}
                                {!! Form::submit('Restore', ['class' => 'btn btn-primary btn-sm']) !!}
                                {!! Form::close() !!}
            @else|
                            {!! Form::open(['method' => 'DELETE','route' => ['userrole.deleterole', $item->id],'style'=>'display:inline']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                                {!! Form::close() !!}
            @endif
            <td>
                            @if(request()->get('status') == 'archived')
                                {!! Form::open(['method' => 'DELETE','route' => ['userrole.forcedeleteuserrole', $item->id],'style'=>'display:inline']) !!}
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

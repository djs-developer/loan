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
    <a href="/viewmapping">All mapping</a> | <a href="/viewmapping?status=archived">Archived users</a>

    <br><br>
    @if(request()->get('status') == 'archived')
    {!! Form::open(['method' => 'POST','route' => ['mapping.restoreallmapping'],'style'=>'display:inline']) !!}
    {!! Form::submit('Restore All', ['class' => 'btn btn-primary btn-sm']) !!}
    {!! Form::close() !!}
    @endif
    </div>
    @csrf
    <table border='1'>
        <thead >
        <tr>
            <th>id</th>
            <th>Role Name</th>
            <th>User Name</th>
            <th>Action</th>
        </tr>
        </thead>
        <tr>
            @foreach($mapping as $mapping)
            
            <tr>
            <td>{{$mapping -> id}}</td>
            <td>{{$mapping ->userrole->role}}</td>
            <td>{{$mapping ->user-> name}}</td>
            <td><a href="/editmapping/{{$mapping->id}}">Edit</a>
            @if(request()->get('status') == 'archived')
                                {!! Form::open(['method' => 'POST','route' => ['mapping.restoremapping', $mapping->id],'style'=>'display:inline']) !!}
                                {!! Form::submit('Restore', ['class' => 'btn btn-primary btn-sm']) !!}
                                {!! Form::close() !!}
            @else|
                            {!! Form::open(['method' => 'DELETE','route' => ['mapping.deletemapping', $mapping->id],'style'=>'display:inline']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                                {!! Form::close() !!}
            @endif
            <td>
                            @if(request()->get('status') == 'archived')
                                {!! Form::open(['method' => 'DELETE','route' => ['mapping.forcedeletemapping', $mapping->id],'style'=>'display:inline']) !!}
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

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
            <a href="/viewdocument">All users</a> | <a href="/viewdocument?status=archived">Archived users</a>

            <br><br>
            @if(request()->get('status') == 'archived')
                {!! Form::open(['method' => 'POST','route' => ['documenttype.restore-all'],'style'=>'display:inline']) !!}
                {!! Form::submit('Restore All', ['class' => 'btn btn-primary btn-sm']) !!}
                {!! Form::close() !!}
            @endif
        </div>
    <table border='1'>
        <thead >
        <tr>
            <th>id</th>
            <th>Document Name</th>
            <th>Action</th>
           
        </tr>
        </thead>
        <tr>
            @foreach($doctype as $doctype)
            <tr>
            <td>{{$doctype -> id}}</td>
            <td>{{$doctype -> docname}}</td>
            <td><a href="/editdoctype/{{$doctype->id}}">Edit</a>|
            
            
                            @if(request()->get('status') == 'archived')
                                {!! Form::open(['method' => 'POST','route' => ['documenttype.restore', $doctype->id],'style'=>'display:inline']) !!}
                                {!! Form::submit('Restore', ['class' => 'btn btn-primary btn-sm']) !!}
                                {!! Form::close() !!}
                            @else
                                {!! Form::open(['method' => 'DELETE','route' => ['documenttype.delete', $doctype->id],'style'=>'display:inline']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                                {!! Form::close() !!}
                            @endif
            </td>
            <td>
                            @if(request()->get('status') == 'archived')
                                {!! Form::open(['method' => 'DELETE','route' => ['documenttype.force-delete', $doctype->id],'style'=>'display:inline']) !!}
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

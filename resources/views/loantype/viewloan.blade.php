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
            <a href="/viewloan">All Loan</a> | <a href="/viewloan?status=archived">Archived users</a>

            <br><br>
            @if(request()->get('status') == 'archived')
                    {!! Form::open(['method' => 'POST','route' => ['loantype.restoreallloan'],'style'=>'display:inline']) !!}
                    {!! Form::submit('Restore All', ['class' => 'btn btn-primary btn-sm']) !!}
                    {!! Form::close() !!}
                @endif
        </div>
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
            @foreach($loan as $loan)
            <tr>
            <td>{{$loan -> id}}</td>
            <td>{{$loan -> loanname}}</td>
            <td><a href="/editloan/{{$loan->id}}">Edit</a>
            @if(request()->get('status') == 'archived')
                                {!! Form::open(['method' => 'POST','route' => ['loantype.restoreloan', $loan->id],'style'=>'display:inline']) !!}
                                {!! Form::submit('Restore', ['class' => 'btn btn-primary btn-sm']) !!}
                                {!! Form::close() !!}
            @else|
                            {!! Form::open(['method' => 'DELETE','route' => ['loantype.deleteloan', $loan->id],'style'=>'display:inline']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                                {!! Form::close() !!}
            @endif
            <td>
                            @if(request()->get('status') == 'archived')
                                {!! Form::open(['method' => 'DELETE','route' => ['loantype.forcedeleteloan', $loan->id],'style'=>'display:inline']) !!}
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

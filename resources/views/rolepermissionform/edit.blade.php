<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form method="POST" action="/addrolepermissionform">
     
    <input type="hidden" name="role_id" id="role_id" value="{{$rolepermissions[0]->role_id}}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    @csrf
        <label for="">Role Name:</label>
        <input type="text" name="role" id="role" Value="{{$rolename[0]->role}}">

        <br><br>
        <div>
        <table border='1'>
            
                <td>permission name</td>
                <td>create</td>
                <td>delete </td>
                <td>edit</td>
                <td>update</td>
           <tbody>
          
            <tr>
            <td>Loan:</td>
            @foreach($allpermission as $loan)
            @if(Str_contains($loan->permission, 'loan'))
            
                <td><input type="checkbox"  name="permission[]" id="permission" value="{{$loan->id}}"
                @if(in_array($loan->id, $rolepermission)) checked @endif                
               >{{$loan->permission}} </td>
                   
            @endif
            @endforeach
            </tr>
           
              

            <tr>
            <td>User:</td>
            @foreach($allpermission as $user)
            @if(Str_contains($user->permission, 'user'))
                <td><input type="checkbox" name="permission[]" id="permission" value="{{$user->id}}"
                @if(in_array($user->id, $rolepermission)) checked @endif
               
                >{{$user->permission}} </td>    
            @endif
            @endforeach
            </tr>
            
            
            <!-- <tr>
            <td>User:</td>
            @foreach($allpermission as $chunk)
            @if(Str_contains($chunk->permission, 'user')) 
          
            <input type="checkbox" name="permission[]" id="permission" value="{{$chunk->id}}">
                {{$chunk->permission}}
               
            @endif
            @endforeach
            </tr> -->
           
           </tbody>
        </table>

        </div>

        <div>
            <br>
        <button type="submit" name="submit" id="submit">submit</button>
        </div>
    </form>
</body>
</html>
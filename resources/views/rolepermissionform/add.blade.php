<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="/addrolepermissionform">
    @csrf
        <label for="">Role Name:</label>
        <input type="text" name="role" id="role">

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
                <td><input type="checkbox" name="permission[]" id="permission" value="{{$loan->id}}">{{$loan->permission}} </td>    
            @endif
            @endforeach
            </tr>
           
            <tr>
            <td>User:</td>
            @foreach($allpermission as $user)
            @if(Str_contains($user->permission, 'user'))
                <td><input type="checkbox" name="permission[]" id="permission" value="{{$user->id}}">{{$user->permission}} </td>    
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

        <!-- <label for="">User :</label>
        <input type="checkbox" name="create user" id="create user" value="create_user">
        <label for="">create</label></input>
        <input type="checkbox" name="edit user" id="edit user" value="edit user">
        <label for="">Edit</label></input>
        <input type="checkbox" name="update user" id="update user" value="delete user">
        <label for="">Update</label></input>
        <input type="checkbox" name="delete user" id="delete user" value="update user">
        <label for="">delete</label></input> -->
        <div>
            <br>
        <button type="submit" name="submit" id="submit">submit</button>
        </div>
    </form>
</body>
</html>
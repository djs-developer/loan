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
                <td>edit </td>
                <td>update</td>
                <td>delete</td>
           <tbody>
            <tr>
              
           
                <!-- <td>Loan:</td>
                <td><input type="checkbox" name="create_loan" id="permission" value=""> </td>
                <td><input type="checkbox" name="edit_loan" id="permission" ></td>
                <td><input type="checkbox" name="update_loan" id="permission" ></td>
                <td><input type="checkbox" name="delete_loan" id="permission" ></td> -->
         
            </tr>

            
            <tr>
            <td>User:</td>
            @foreach($user as $chunk)
            <input type="checkbox" name="permission[]" id="permission" value="{{$chunk->id}}">
                {{$chunk->permission}}
                <!-- <td>{{$chunk->permission}}</td> -->
            @endforeach
            </tr>
           
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
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
        <table border='1'>
            
                <td>permission name</td>
                <td>create</td>
                <td>edit </td>
                <td>update</td>
                <td>delete</td>
           <tbody>
            <tr>
                <td>Loan:</td>
                <td><input type="checkbox" name="permission[]" id="permission" value="create_loan"></td>
                <td><input type="checkbox" name="permission[]" id="permission" value="edit_loan"></td>
                <td><input type="checkbox" name="permission[]" id="permission" value="update_loan"></td>
                <td><input type="checkbox" name="permission[]" id="permission" value="delete_loan"></td>
            </tr>
            <!-- <tr>
                <td>User:</td>
                <td><input type="checkbox" name="permission" id="permission" value="create_user"></td>
                <td><input type="checkbox" name="permission" id="permission" value="edit_user"></td>
                <td><input type="checkbox" name="permission" id="permission" value="update_user"></td>
                <td><input type="checkbox" name="permission" id="permission" value="delete_user"></td>
            </tr> -->
           </tbody>
        </table>


        <!-- <label for="">User :</label>
        <input type="checkbox" name="create user" id="create user" value="create_user">
        <label for="">create</label></input>
        <input type="checkbox" name="edit user" id="edit user" value="edit user">
        <label for="">Edit</label></input>
        <input type="checkbox" name="update user" id="update user" value="delete user">
        <label for="">Update</label></input>
        <input type="checkbox" name="delete user" id="delete user" value="update user">
        <label for="">delete</label></input>

        <br><br>
        <label for="">Loan :</label>
        <input type="checkbox" name="create user" id="create user">
        <label for="">create</label></input>
        <input type="checkbox" name="edit user" id="edit user">
        <label for="">Edit</label></input>
        <input type="checkbox" name="update user" id="update user">
        <label for="">Update</label></input>
        <input type="checkbox" name="delete user" id="delete user">
        <label for="">delete</label></input> -->

      <button type="submit" name="submit" id="submit">submit</button>

    </form>
</body>
</html>
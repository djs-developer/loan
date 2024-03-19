<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="mappingprocess" method="post">
        @csrf
        <div>
        <div class="form-group">
                <label for=""><b>User:</b></label>
             
                <select name="role_id" id="role_id">
                     @foreach($role as $role)
                        <option value="{{$role->id}}" data-id="{{$role->id}}">{{$role->role}}</option>
                     @endforeach
                </select>
               
        </div>
          
        <div class="form-group">
                <label for=""><b>Role:</b></label>
             
                <select name="user_id" id="user_id">
                    @foreach($users as $users)
                        <option value="{{$users->id}}" data-id="{{$users->id}}">{{$users->name}}</option>
                    @endforeach
                </select>
               
        </div>
          
            <div>
                <input type="submit" name="submit" id="submit" value="submit">
            </div>
        </div>
    </form>
</body>
</html>
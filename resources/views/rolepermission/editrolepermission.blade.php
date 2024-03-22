<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/updaterolepermission/{{$rolepermission[0]->id}}" method="post">
        @csrf
        <input type="hidden" name="id" id="id" value="{{$rolepermission[0]->id}}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div>
        <div class="form-group">
                <label for=""><b>Mapping_id:</b></label>
                <select name="role_id" id="role_id">
                     @foreach($role as $role)
                        <option value="{{$role->id}}" {{$rolepermission[0]->role_id == $role->id ? 'selected' : ''}} >{{$role->role}} </option>
                     @endforeach
                </select>   
        </div>
          
        <div class="form-group">
                <label for=""><b>Permission Name:</b></label>
                <select name="permission_id" id="permission_id">
                     @foreach($permission as $permission)
                        <option value="{{$permission->id}}" {{$rolepermission[0]->permission_id == $permission->id ? 'selected' : ''}}>{{$permission->permission}}</option>
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/updatemapping/{{$mapping[0]->id}}" method="post">
        @csrf
        <input type="hidden" name="id" id="id" value="{{$mapping[0]->id}}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div>
        <div class="form-group">
                <label for=""><b>Role:</b></label>
             
                <select name="role_id" id="role_id">
                     @foreach($role as $role)
                     
                    <option value="{{$role->id}}" {{$mapping[0]->role_id == $role->id ? 'selected' : ''}} >{{$role->role}}</option>
                   
                     @endforeach
                </select>     
        </div>
          
        <div class="form-group">
                <label for=""><b>User:</b></label>
             
                <select name="user_id" id="user_id">
                    @foreach($user as $user)
                        <option value="{{$user->id}}" {{$mapping[0]->user_id == $user->id ? 'selected' : ''}} >{{$user->name}}</option>
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
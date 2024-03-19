<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="rolepermissionprocess" method="post">
        @csrf
        <div>
        <div class="form-group">
                <label for=""><b>Mapping_id:</b></label>
                <select name="mapping_id" id="mapping_id">
                     @foreach($rolemapping as $rolemapping)
                     
                        <option value="{{$rolemapping->id}}" data-id="{{$rolemapping->id}}">{{$rolemapping->id}} </option>
                     @endforeach
                </select>   
        </div>
          
        <div class="form-group">
                <label for=""><b>Permission Name:</b></label>
                <select name="permission_id" id="permission_id">
                     @foreach($permission as $permission)
                        <option value="{{$permission->id}}" data-id="{{$permission->id}}">{{$permission->permission}}</option>
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
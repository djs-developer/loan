<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/update/{{$user[0]->id}}" method="POST">
        @csrf
       
        <input type="hidden" name="id" id="id" value="{{$user[0]->id}}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        
        <div>
            <div class="form-group">
                <label for=""><b>Role Name:</b></label>
                <input type="text" name="role" id="role" Value="{{$user[0]->role}}" placeholder="Enter Role Name">
            </div>
            <div>
                <input type="submit" name="submit" id="submit" value="submit">
            </div>
        </div>
    </form>
</body>
</html>
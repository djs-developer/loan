<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/updateuser/{{$user[0]->id}}" method="post">
        @csrf
        <input type="hidden" name="id" id="id" value="{{$user[0]->id}}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div>
            <div class="form-group">
                <label for=""><b>User Name:</b></label>
                <input type="text" name="name" Value="{{$user[0]->name}}" id="name" placeholder="Enter Your Name">
            </div>
            <div class="form-group">
                <label for=""><b>User Email:</b></label>
                <input type="text" name="email" Value="{{$user[0]->email}}" id="email" placeholder="Enter Your email">
            </div>
            <div class="form-group">
                <label for=""><b>User password:</b></label>
                <input type="text" name="password" Value="{{$user[0]->password}}" id="password" placeholder="Enter Your password">
            </div>
            <div>
                <input type="submit" name="submit" id="submit" value="submit">
            </div>
        </div>
    </form>
</body>
</html>
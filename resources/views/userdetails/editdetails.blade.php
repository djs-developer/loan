<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/updateuserdetalis/{{$details[0]->user_id}}" method="post">
        @csrf
        <input type="hidden" name="user_id" id="user_id" value="{{$details[0]->user_id}}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div>
            <div class="form-group">
                <label for=""><b>Date:</b></label>
                <input type="date" name="date" Value="{{$date[0]->value}}" id="date" placeholder="Enter Your date">
            </div>
            <div class="form-group">
                <label for=""><b>Mobile:</b></label>
                <input type="text" name="mobile" Value="{{$mobile[0]->value}}" id="mobile" placeholder="Enter Your mobile">
            </div>
            <div class="form-group">
                <label for=""><b>Address:</b></label>
                <input type="text" name="address" Value="{{$address[0]->value}}" id="address" placeholder="Enter Your address">
            </div>
            <div>
                <input type="submit" name="submit" id="submit" value="submit">
            </div>
        </div>
    </form>
</body>
</html>
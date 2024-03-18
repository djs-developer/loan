<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/updatestate/{{$state[0]->id}}" method="post">
        @csrf
        <input type="hidden" name="id" id="id" value="{{$state[0]->id}}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        
        <div>
            <div class="form-group">
                <label for=""><b>state Name:</b></label>
                <input type="text" name="statename" Value="{{$state[0]->statename}}" id="statename" placeholder="Enter state Name">
            </div>
            <div>
                <input type="submit" name="submit" id="submit" value="submit">
            </div>
        </div>
    </form>
</body>
</html>
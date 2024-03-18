<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="cityprocess" method="post">
        @csrf
        <div>
            <div class="form-group">
                <label for=""><b>city Name:</b></label>
                <input type="text" name="cityname" id="cityname" placeholder="Enter city Name">
            </div>
          
            <div class="form-group">
                <label for=""><b>state Name:</b></label>
             
                <select name="state_id" id="state_id">
        @foreach($show as $show)
            <option value="{{$show->id}}" data-id="{{$show->id}}">{{$show->statename}}</option>
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
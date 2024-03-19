<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/updatecity/{{$city[0]->id}}" method="post">
        @csrf
        <input type="hidden" name="id" id="id" value="{{$city[0]->id}}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div>
            <div class="form-group">
                <label for=""><b>city Name:</b></label>
                <input type="text" name="cityname" id="cityname" value="{{$city[0]->cityname}}" placeholder="Enter city Name">
            </div>
          
            <div class="form-group">
                <label for=""><b>state Name:</b></label>
                <select name="state_id" id="state_id">
                     @foreach($edit as $edit)
                        <option value="{{$edit->id}}" {{$city[0]->state_id == $edit->id ? 'selected' : ''}}>{{$edit->statename}}</option>
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
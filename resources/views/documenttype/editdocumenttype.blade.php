<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/updatdoctype/{{$doctype[0]->id}}" method="post">
        @csrf
        <input type="hidden" name="id" id="id" value="{{$doctype[0]->id}}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div>
            <div class="form-group">
                <label for=""><b>Document Name:</b></label>
                <input type="text" name="docname" Value="{{$doctype[0]->docname}}" id="docname" placeholder="Enter document Name">
            </div>
            <div>
                <input type="submit" name="submit" id="submit" value="submit">
            </div>
        </div>
    </form>
</body>
</html>
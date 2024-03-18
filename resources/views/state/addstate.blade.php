<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="stateprocess" method="post">
        @csrf
        <div>
            <div class="form-group">
                <label for=""><b>State Name:</b></label>
                <input type="text" name="statename" id="statename" placeholder="Enter state Name">
            </div>
            <div>
                <input type="submit" name="submit" id="submit" value="submit">
            </div>
        </div>
    </form>
</body>
</html>
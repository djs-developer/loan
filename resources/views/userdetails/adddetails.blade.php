<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="userdprocess" method="post">
        @csrf
        <div>
            <div class="form-group">
                <label for=""><b>Date:</b></label>
                <input type="date" name="date" id="date" placeholder="Enter Your date">
            </div>
            <div class="form-group">
                <label for=""><b>Mobile:</b></label>
                <input type="text" name="mobile" id="mobile" placeholder="Enter Your mobile">
            </div>
            <div class="form-group">
                <label for=""><b>Address:</b></label>
                <input type="text" name="address" id="address" placeholder="Enter Your address">
            </div>
            <div>
                <input type="submit" name="submit" id="submit" value="submit">
            </div>
        </div>
    </form>
</body>
</html>
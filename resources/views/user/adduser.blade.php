<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="userprocess" method="post">
        @csrf
        <div>
            <div class="form-group">
                <label for=""><b>User Name:</b></label>
                <input type="text" name="name" id="name" placeholder="Enter Your Name">
            </div>
            <div class="form-group">
                <label for=""><b>User Email:</b></label>
                <input type="text" name="email" id="email" placeholder="Enter Your email">
            </div>
            <div class="form-group">
                <label for=""><b>User password:</b></label>
                <input type="text" name="password" id="password" placeholder="Enter Your password">
            </div>
            <div>
                <input type="submit" name="submit" id="submit" value="submit">
            </div>
        </div>
    </form>
</body>
</html>
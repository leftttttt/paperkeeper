<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width"/>
    <title>sign in</title>
</head>

    <div class="back">
        <a href="index.php">
        <button type="button">Back to home page</button>
        </a>
    </div>

<body>
    <div class="title">
        <h1>Please sign in</h1>
    </div>

    <div class="email">
        <label for="email">Email:</label>
        <input type="email" placeholder="Enter email" id="email" name="email">


    </div>

    <div class="password">
        <label for="password">Password:</label>
        <input type="password" placeholder="Enter password" id="password" name="password">
    </div>

    <div class="remember">
        <input type="checkbox" id="remember" name="remember">
        <label for="remember">Remember me</label>
    </div>

    <div class="submit">
        <a href="userinfo.php"> 
        <button type="button">Sign In</button>
        </a>
    </div>
</body>
</html>
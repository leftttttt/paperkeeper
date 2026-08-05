<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet"
     href="https://fonts.googleapis.com/css2?family=Roboto+Slab">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width"/>
    <title>sign in</title>
</head>

<body>

    <div class="navbar">
            <div class="back">
        <a href="index.php">
        <button type="button">Back to home page</button>
        </a>
    </div>
    <div class="title">
        <h1>Please sign in</h1>
    </div>

    </div>

    <div class="info">

        <div class="email">
            <label for="email">Email:</label>
            <input type="email" placeholder="Enter email" id="email" name="email">
        </div>
<br><br>
        <div class="password">
            <label for="password">Password:</label>
            <input type="password" placeholder="Enter password" id="password" name="password">
        </div>
<br><br>
        <div class="remember">
            <input type="checkbox" id="remember" name="remember">
            <label for="remember">Remember me</label>
        </div>
<br><br>
            <button class="signin" type="button" onclick="location.href='userinfo.php'">
                <span class="transition"></span>
                <span class="gradient"></span>
                <span class="label">Sign In</span>
            </button>
        </div>
    </div>
</body>
</html>
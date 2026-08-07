<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet"
     href="https://fonts.googleapis.com/css2?family=Roboto+Slab">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width"/>
    
    <title>sign up</title>
</head>

<div class="navbar">
    <div class="back">
        <a href="index.php">
        <button type="button">Back to home page</button>
        </a>
    </div>

<body>
    <div class="title">
    <h1>Please sign up</h1>
    </div>
    </div>

    <div class="info">
    <div class="email">
        <label for="email">Email:</label>
        <input type="email" placeholder="Enter email" id="email" name="email">
    </div>
<br><br><br><br>
    <div class="username">
        <label for="username">Username:</label>
        <input type="text" placeholder="Enter username" id="username" name="username">
    </div>
<br><br>
    <div class="password">
        <label for="password">Password:</label>
        <input type="password" placeholder="Enter password" id="password" name="password">
    </div>
<br><br>
    <div class="repassword">
        <label for="repassword">Repeat Password:</label>
        <input type="password" placeholder="Repeat password" id="repassword" name="repassword">
    </div>
<br><br>

    <p style="display:inline-block;margin:0;">Already have an account?</p>
    <div class="l-signin" style="display:inline-block;vertical-align:middle;">
        <!--link sign in-->
    <a href="signin.php">
        <p>Sign In</p>
    </a>
</div>

            <button class="signup" type="button" onclick="location.href='userinfo.php'">
                <span class="transition"></span>
                <span class="gradient"></span>
                <span class="label">Sign Up</span>
            </button>

    </div>
</body>
</html>
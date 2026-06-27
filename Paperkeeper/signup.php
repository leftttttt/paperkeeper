<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width"/>
    <title>sign up</title>
</head>

    <div class="back">
        <a href="index.php">
        <button type="button">Back to home page</button>
        </a>
    </div>

<body>
    <div class="title">
    <h1>Please sign up</h1>
    </div>

    <div class="email">
        <label for="email">Email:</label>
        <input type="email" placeholder="Enter email" id="email" name="email">
    </div>

    <div class="username">
        <label for="username">Username:</label>
        <input type="text" placeholder="Enter username" id="username" name="username">
    </div>

    <div class="password">
        <label for="password">Password:</label>
        <input type="password" placeholder="Enter password" id="password" name="password">
    </div>

    <div class="repassword">
        <label for="repassword">Repeat Password:</label>
        <input type="password" placeholder="Repeat password" id="repassword" name="repassword">
    </div>

<div class="signin">
    <p>Already have an account?</p>
    <a href="signin.php">
        <p>Sign In</p>
    </a>
</div>

    <div class="submit">
        <a href="userinfo.php">
        <button type="button">Sign Up</button>
        </a>
    </div>
</body>
</html>
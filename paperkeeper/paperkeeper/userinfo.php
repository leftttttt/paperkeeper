<?php
session_start();

if (!isset($_SESSION["loggedin"])) {
    header("location: signin.php");
    exit;
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto+Slab">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width" />
    <title>User Information</title>
</head>

<body>

    <div class="navbar">
        <div class="back">
            <a href="index.php">
                <button class="home" type="button">
                    <span>Home</span>
                </button>
            </a>
        </div>

        <div class="title">
            <h1>User Information</h1>
        </div>
    </div>

    <div class="userinfo">
        <p>User Name: <?php echo htmlspecialchars($_SESSION["username"]); ?></p>
        <br>
        <p>Email: <?php echo htmlspecialchars($_SESSION["email"]); ?></p>
        <br><br>
        <button class="signout" type="button" onclick="location.href='signout.php'">
            <span class="transition"></span>
            <span class="gradient"></span>
            <span class="label">Sign Out</span>
        </button>
    </div>
</body>

</html>
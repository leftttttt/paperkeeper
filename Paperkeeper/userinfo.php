<?php
session_start();

if(!isset($_SESSION["loggedin"]))
{
    header("location: signin.php");
    exit;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Roboto+Slab">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width"/>
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
        <br>
        Year:
            <select>
                    <option>Year 1</option>
                    <option>Year 2</option>
                    <option>Year 3</option>
                    <option>Year 4</option>
                    <option>Year 5</option>
                    <option>Year 6</option>
                    <option>Year 7</option>
                    <option>Year 8</option>
                    <option>Year 9</option>
                    <option>Year 10</option>
                    <option>Year 11</option>
                    <option>Year 12</option>
                    <option>Year 13</option>
            </select>
<br><br>
        Set Subject:
        <select>
            <option>physics</option>
            <option>math</option>
            <option>english</option>
            <option>chinese</option>
            <option>digi tech</option>
        </select>
<br><br>
    Set Category:
        <select>
                    <option>physics</option>
                    <option>math</option>
                    <option>english</option>
                    <option>chinese</option>
                    <option>digi tech</option>
                </select>

                <br><br>

            <button class="signout" type="button" onclick="location.href='signout.php'">
                <span class="transition"></span>
                <span class="gradient"></span>
                <span class="label">Sign Out</span>
            </button>
    </div>
</body>
</html>
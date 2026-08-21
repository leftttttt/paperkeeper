<?php
session_start();
require_once "config.php";

// 如果已经登录，直接跳添加物品页
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: create.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto+Slab">
    <meta name="viewport" content="width=device-width"/>
    <link rel="stylesheet" href="style.css">
    <title>choose account</title>
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
    <h1>Please choose your account</h1>
    </div>
</div>

<div class="info">
    <p>Choose which account you would like to use:</p>

    <div class="button">

            <button class="signup" type="button" onclick="location.href='acsignin.php'">
                <span class="transition"></span>
                <span class="gradient"></span>
                <span class="label">Sign In</span>
            </button>
<br><br>

            <button class="signup" type="button" onclick="location.href='acsignup.php'">
                <span class="transition"></span>
                <span class="gradient"></span>
                <span class="label">Sign Up</span>
            </button>
    </div>
    </div>
</body>
</html>
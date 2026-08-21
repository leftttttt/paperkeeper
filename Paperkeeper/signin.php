<?php
session_start();

if(isset($_SESSION["loggedin"])&&$_SESSION["loggedin"]===true){
    header("location:userinfo.php");
    exit;
}

require_once "config.php";

$email = $password = "" ;
$email_err = $password_err = $signin_err = "";
    
if($_SERVER["REQUEST_METHOD"] == "POST"){

if(empty(trim($_POST["email"]))){
    $email_err = "Please enter your email.";
} else{
    $email = trim($_POST["email"]);
}
if(empty(trim($_POST["password"]))){
    $password_err = "Please enter your password.";
} else{
    $password = trim($_POST["password"]);
}
if(empty($email_err) && empty($password_err)){
    $sql = "SELECT id, username, email, password FROM user WHERE email = ?";

    if($stmt = mysqli_prepare($link, $sql)){
        mysqli_stmt_bind_param($stmt, "s", $param_email);

        $param_email = $email;

        if(mysqli_stmt_execute($stmt)){

        mysqli_stmt_store_result($stmt);

        if(mysqli_stmt_num_rows($stmt) == 1){
            mysqli_stmt_bind_result($stmt, $id, $username, $email, $hashed_password);

            if(mysqli_stmt_fetch($stmt)){
                if(password_verify($password, $hashed_password)){

                $_SESSION["loggedin"] = true;
                $_SESSION["id"] = $id;
                $_SESSION["email"] = $email;
                $_SESSION["username"] = $username;

                header("location:userinfo.php");
                exit;
                } else{
                    $signin_err = "Invalid email or password.";
                }
            }
        }else{
            $signin_err = "Invalid email or password.";
        }
        }else{
            echo "Oops! Something went wrong. Please try again later.";
        }

        mysqli_stmt_close($stmt);
    }
}
    mysqli_close($link);
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
    <title>sign in</title>
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
        <h1>Please sign in</h1>
    </div>
    </div>

        <?php 
        if(!empty($signin_err)){
            echo '<div class="alert alert-danger">' . $signin_err . '</div>';
        }        
        ?>
        
    <form method="post">
    <div class="info">

        <div class="email">
            <label for="email" style="color: #274c77;">Email:</label>
            <input type="email" class="input" placeholder="Enter email" id="email" name="email" value="<?php echo $email; ?>">
            <span style="display: block; margin-top: 10px; color: #dc3545;"><?php echo $email_err; ?></span>
        </div>
<br><br>
        <div class="password">
            <label for="password" style="color: #274c77;">Password:</label>
            <input type="password" class="input" placeholder="Enter password" id="password" name="password">
            <span style="display: block; margin-top: 10px; color: #dc3545;"><?php echo $password_err; ?></span>
        </div>
<br><br>
            <button class="signin" type="submit">
                <span class="transition"></span>
                <span class="gradient"></span>
                <span class="label">Sign In</span>
            </button>
        </div>
        </form>
    </div>
</body>
</html>
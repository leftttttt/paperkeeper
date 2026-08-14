<?php
require_once "config.php";

$email = $username = $password = $repassword = $param_email = $param_password = "";
$email_err = $username_err = $password_err = $repassword_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){


if (empty(trim($_POST["email"]))){
    $email_err = "Please enter an email.";
} elseif(!filter_var(trim($_POST["email"]), FILTER_VALIDATE_EMAIL)){
    $email_err = "Please enter a valid email address.";
} else{
    $sql = "SELECT id FROM user WHERE email = ?";

    if($stmt = mysqli_prepare($link, $sql)){

    mysqli_stmt_bind_param($stmt, "s", $param_email);

    $param_email = trim($_POST["email"]);

        if(mysqli_stmt_execute($stmt)){

            mysqli_stmt_store_result($stmt);

            if(mysqli_stmt_num_rows($stmt) == 1){
                $email_err = "This email is already taken.";
            } else{
                $email = trim($_POST["email"]);
            }
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }

        mysqli_stmt_close($stmt);
    }
}

if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
        $username_err = "Username can only contain letters, numbers, and underscores.";
    } else{
        $sql = "SELECT id FROM user WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            $param_username = trim($_POST["username"]);
            
            if(mysqli_stmt_execute($stmt)){
                
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            mysqli_stmt_close($stmt);
        }
    }
    
    
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    
    if(empty(trim($_POST["repassword"]))){
        $repassword_err = "Please confirm password.";     
    } else{
        $repassword = trim($_POST["repassword"]);
        if(empty($password_err) && ($password != $repassword)){
            $repassword_err = "Password did not match.";
        }
    }
    
    
    if(empty($email_err) && empty($username_err) && empty($password_err) && empty($repassword_err)){
        
        
        $sql = "INSERT INTO user (email, username, password) VALUES (?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            
            mysqli_stmt_bind_param($stmt, "sss", $param_email, $param_username, $param_password);
            
            
            $param_email = $email;
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT);
            
 
            if(mysqli_stmt_execute($stmt)){

                header("location: userinfo.php");
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
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
    
    <title>sign up</title>
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
    <h1>Please sign up</h1>
    </div>
    </div>

    <form method="POST" action="signup.php">



    <div class="info">
    <div class="email">
        <label for="email" style="color: #274c77;">Email:</label>
        <input type="email" class="input" placeholder="Enter email" id="email" name="email" value="<?php echo $email; ?>">
        <span style="display: block; margin-top: 10px; color: #dc3545;"><?php echo $email_err; ?></span>
    </div>
<br><br>
    <div class="username">
        <label for="username" style="color: #274c77;">Username:</label>
        <input type="text" class="input" placeholder="Enter username" id="username" name="username" value="<?php echo $username; ?>">
        <span style="display: block; margin-top: 10px; color: #dc3545;"><?php echo $username_err; ?></span>
    </div>
<br><br>
    <div class="password">
        <label for="password" style="color: #274c77;">Password:</label>
        <input type="password" class="input" placeholder="Enter password" id="password" name="password" value="<?php echo $password; ?>">
        <span style="display: block; margin-top: 10px; color: #dc3545;"><?php echo $password_err; ?></span>
    </div>
<br><br>
    <div class="repassword">
        <label for="repassword" style="color: #274c77;">Repeat Password:</label>
        <input type="password" class="input" placeholder="Repeat password" id="repassword" name="repassword" value="<?php echo $repassword; ?>">
        <span style="display: block; margin-top: 10px; color: #dc3545;"><?php echo $repassword_err; ?></span>
    </div>
<br><br>

    <p style="display:inline-block;margin:0; color: #274c77;">Already have an account?</p>
    <div class="l-signin" style="display:inline-block;vertical-align:middle;">
        <!--link sign in-->
    <a href="signin.php">
        <p>Sign In</p>
    </a>
</div>

            <button class="signup" type="submit">
                <span class="transition"></span>
                <span class="gradient"></span>
                <span class="label">Sign Up</span>
            </button>

    </div>
    </form>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width"/>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto+Slab">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Paperkeeper</title>
</head>

<body>
    <div class="navbar">
        <div class="leftside">
        <div class="user-icon">
            <a href="userinfo.php">
        <img src="images/user.png" alt="the user icon" width="45" height="45">
        </a>
        <p>Personal Center</p>
        </div>

        <div class="headerbuttons">
            <button class="signinbtn" type="button" onclick="location.href='signin.php'">Sign In</button>
            <button class="signupbtn" type="button" onclick="location.href='signup.php'">Sign Up</button>
        </div>
    </div>

        <div class="title">
            <h1>Item</h1>
        </div>

        <div class="function-box">
            <form class="search" method="get" action="search.php">
                <div class="searchbox">
                <input type="text" placeholder="search..." name="search">
                <button type="submit"><i class="fa fa-search"></i></button>
            </div>

            <div class="filter">
                <select name="subject">
                    <option value="">Choose Subject</option>
                    <option value="physics">physics</option>
                    <option value="math">math</option>
                    <option value="english">english</option>
                    <option value="chinese">chinese</option>
                    <option value="digi tech">digi tech</option>
                </select>
            </div>
            </form>
        </div>


    </div>

    <div class="item-box">

    </div>



<button class="create" type="button" onclick="location.href='accountchoose.php'" >
  <div class="sign">+</div>
  <div class="text">Create</div>
</button>
    
<a href="item.php">1</a>
    
</body>
<footer>
    
</footer>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto+Slab">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width"/>
    <title>Item Detail</title>
</head>

<body>
    <div class="navbar">
        
        <div class="user-icon">
            <a href="signup.php">
        <img src="images/user.png" alt="the user icon" width="45" height="45">
        </a>
        </div>


        <div class="title">
            <h1>Item Detail</h1>
        </div>
    </div>

    <a href="index.php">
    <button type="button">Back to home page</button>
    </a>

    <div class="item-image">
        <img src="images/item.jpg" alt="the item image" width="200" height="200">
    </div> 

    <div class="item-info">
        <p>Item: </p>
        <p>Subject: </p>
        <p>Category: </p>
        <p>Time you get: </p>
        <p>due date: </p>

<br>
    <div class="buttons">
            <button class="edit" type="button" onclick="location.href='edititem.php'">
                <span>Edit</span>
            </button>
        
            <button class="delete" type="button" onclick="location.href='index.php'">
                <span>Delete</span>
            </button>
        </div>
    </div>
</div>
</body>
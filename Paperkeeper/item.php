<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width"/>
    <title>Item Detail</title>
</head>

<body>
    <div class="navbar">
        
        <div class="user-icon">
            <a href="signup.php">
        <img src="images/user.jpg" alt="the user icon" width="30" height="30">
        </a>
        </div>


        <div class="title">
            <h1>Item Detail</h1>
        </div>
    </div>

    <a href="index.php">
    <button type="button">Back to home page</button>
    </button>
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
    </div>

    <div class="buttons">
        <div class="edit">
            <a href="edititem.php">
            <button type="button">Edit</button>
            </a>
        </div>
        
        <div class="delete">
            <a href="index.php">
            <button type="button">Delete</button>
            </a>
        </div>
    </div>
</div>
</body>
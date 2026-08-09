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
        <a href="index.php">
        <button class="home" type="button">
            <span>Home</span>
        </button>
        </a>



        <div class="title">
            <h1>Item Detail</h1>
        </div>
    </div>



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
                Edit
            </button>
        
            <button class="delete" type="button" onclick="location.href='index.php'">
                Delete
            </button>
        </div>
    </div>
</div>
</body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width"/>
    <title>create item</title>
</head>

<body>
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

    <div class="image">
        <p>Add icon/picture</p>
    </div>

    <div class="edit-item">
        <label for="item-name">Item Name:</label>
        <input type="text" id="item-name" name="item-name" placeholder="Enter item name">

        <label for="subject">Subject:</label>
        <select id="subject" name="subject">
            <option>physics</option>
            <option>math</option>
            <option>english</option>
            <option>chinese</option>
            <option>digi tech</option>
        </select>

        <label for="category">Category:</label>
        <select id="category" name="category">
            <option>physics</option>
            <option>math</option>
            <option>english</option>
            <option>chinese</option>
            <option>digi tech</option>
        </select>

        <label for="time-get">Time You Get:</label>
        <input type="datetime-local" id="time-get" name="time-get">

        <label for="due-date">Due Date:</label>
        <input type="datetime-local" id="due-date" name="due-date">

        <div class="buttons">
            <div class="save">
                <a href="index.php">
                <button type="button">Save</button>
                </a>
            </div>

            <div class="cancel">
                <a href="index.php">
                <button type="button">Cancel</button>
                </a>
            </div>
        </div>
    </div>
</body>
</body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto+Slab">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width"/>
    <title>Edit Item</title>
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
            <h1>Edit Item</h1>
        </div>
    </div>

    <div class="image">
        <p>Edit icon/picture</p>
    </div>

    <div class="edit-item">
        <label for="item-name">Item Name:</label>
        <input type="text" id="item-name" name="item-name" placeholder="Enter item name">
<br>
        <label for="subject">Subject:</label>
        <select id="subject" name="subject">
            <option>physics</option>
            <option>math</option>
            <option>english</option>
            <option>chinese</option>
            <option>digi tech</option>
        </select>
<br>
        <label for="category">Category:</label>
        <select id="category" name="category">
            <option>physics</option>
            <option>math</option>
            <option>english</option>
            <option>chinese</option>
            <option>digi tech</option>
        </select>
<br>
        <label for="time-get">Time You Get:</label>
        <input type="datetime-local" id="time-get" name="time-get">
<br>
        <label for="due-date">Due Date:</label>
        <input type="datetime-local" id="due-date" name="due-date">
<br>
        <div class="buttons">
                <button class="save" type="button" onclick="location.href='item.php'">
                <span>Save</span>
                </button>
                
                <button class="cancel" type="button" onclick="location.href='item.php'">
                <span>Cancel</span>
                </button>
            </div>
        </div>
    </div>
</body>
</html>
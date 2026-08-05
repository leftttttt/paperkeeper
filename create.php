<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto+Slab">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width"/>
    <title>create item</title>
</head>

<body>
    <div class="navbar">
        
        <div class="user-icon">
            <a href="signup.php">
        <img src="images/user.png" alt="the user icon" width="50" height="50">
        </a>
        </div>


        <div class="title">
            <h1>Create Item</h1>
        </div>
    </div>

    <div class="info add-item-form">
    <div class="image">
        <label for="upload-img">
            <img src="images/create.png" alt="Add Image" width="250" height="250">
        </label>
        
        <input id="upload-img" type="file" accept="image/png, image/jpeg">
    <p>Add icon/picture</p>
    </div>

    <div class="edit-item">
        <label for="item-name">Item Name:</label>
        <input type="text" id="item-name" name="item-name" placeholder="Enter item name">
<br>
        <label for="subject">Subject:</label>
        <select id="subject" name="subject">
            <option value="physics">Physics</option>
            <option value="math">Math</option>
            <option value="english">English</option>
            <option value="chinese">Chinese</option>
            <option value="digi tech">Digi Tech</option>
        </select>
<br>
        <label for="category">Category:</label>
        <select id="category" name="category">
            <option value="homework">Homework</option>
            <option value="quiz">Quiz</option>
            <option value="test">Test</option>
            <option value="note">Note</option>
        </select>
<br>
        <label for="time-get">Time You Get:</label>
        <input type="datetime-local" id="time-get" name="time-get">
<br>
        <label for="due-date">Due Date:</label>
        <input type="datetime-local" id="due-date" name="due-date">
<br>
    </div>
            </div>
<br>
<br>
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
</body>
</html>
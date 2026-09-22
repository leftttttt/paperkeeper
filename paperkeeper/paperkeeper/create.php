<?php
session_start();
require_once "config.php";
$name = $subject = $category = $get_date = $due_date = "";
$name_err = $subject_err = $get_date_err = "";

if($_SERVER["REQUEST_METHOD"]== "POST"){

    $input_name = trim($_POST["item-name"]);
    if(empty($input_name)){
        $name_err = "Please enter a name.";
    } else{
        $name = $input_name;
    }

    $input_subject = trim($_POST["subject"]);
    if(empty($input_subject)){
        $subject_err = "Please choose a subject.";
    } else{
        $subject = $input_subject;
    }

    $input_get_date = trim($_POST["get_date"] ?? "");
    if(empty($input_get_date)){
        $get_date_err = "Please choose a date.";
    } else{
        $get_date = $input_get_date;
    }
    
    $category = trim($_POST["category"] ?? "");
    $due_date = trim($_POST["due_date"] ?? "");

    if(empty($name_err) && empty($subject_err) && empty($get_date_err)){
        $sql = "INSERT INTO item (name, subject, category, get_date, due_date, user_id) VALUES (?, ?, ?, ?, ?, ?)";

        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "sssssi", $param_name, $param_subject, $param_category, $param_get_date, $param_due_date, $param_user_id);

            $param_name = $name;
            $param_subject = $subject;
            $param_category = $category;
            $param_get_date = $get_date;
            $param_due_date = $due_date;
            $param_user_id = $_SESSION["user_id"];

            if(mysqli_stmt_execute($stmt)){
                header("location: index.php");
                exit();
            }else{
                echo "Oops! Something went wrong. Please try again later.";
                }
            }

            mysqli_stmt_close($stmt);
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
    <title>create item</title>
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
            <h1>Create Item</h1>
        </div>
    </div>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">

    <div class="info add-item-form">
    <div class="edit-item">
        <label for="item-name">Item Name</label>
        <input type="text" id="item-name" name="item-name" placeholder="Enter item name" value="<?php echo $name; ?>">
        <span style="display: block; margin-top: 10px; color: #dc3545;"><?php echo $name_err; ?></span>
<br>
        <label for="subject">Subject</label>
        <select id="subject" name="subject">
            <option value="" selected>Please select subject</option>
            <option value="physics" <?php echo ($subject === 'physics') ? 'selected' : ''; ?>>Physics</option>
            <option value="math" <?php echo ($subject === 'math') ? 'selected' : ''; ?>>Math</option>
            <option value="english" <?php echo ($subject === 'english') ? 'selected' : ''; ?>>English</option>
            <option value="chinese" <?php echo ($subject === 'chinese') ? 'selected' : ''; ?>>Chinese</option>
            <option value="digi tech" <?php echo ($subject === 'digi tech') ? 'selected' : ''; ?>>Digi Tech</option>
        </select>
        <span style="display: block; margin-top: 10px; color: #dc3545;"><?php echo $subject_err; ?></span>
<br>
        <label for="category">Category (optional)</label>
        <select id="category" name="category">
            <option value="" selected>Please select category</option>
            <option value="homework" <?php echo ($category === 'homework') ? 'selected' : ''; ?>>Homework</option>
            <option value="quiz" <?php echo ($category === 'quiz') ? 'selected' : ''; ?>>Quiz</option>
            <option value="test" <?php echo ($category === 'test') ? 'selected' : ''; ?>>Test</option>
            <option value="note" <?php echo ($category === 'note') ? 'selected' : ''; ?>>Note</option>
        </select>
<br>
        <label for="get_date">Start Date</label>
        <input type="datetime-local" id="get_date" name="get_date" <?php echo !empty($get_date) ? 'value="' . htmlspecialchars($get_date) . '"' : ''; ?>>
        <span style="display: block; margin-top: 10px; color: #dc3545;"><?php echo $get_date_err; ?></span>
<br>
        <label for="due_date">Due Date (optional)</label>
        <input type="datetime-local" id="due_date" name="due_date" <?php echo !empty($due_date) ? 'value="' . htmlspecialchars($due_date) . '"' : ''; ?>>
<br>
    </div>
            </div>
<br>
<br>

        <div class="buttons">
        <button class="save" type="submit">
            Save
        </button>

        <button class="cancel" type="button" onclick="location.href='index.php'">
            Cancel
        </button>
        </div>
</body>
</html>
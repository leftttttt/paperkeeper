<?php

if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
    require_once "config.php";

    $sql = "SELECT * FROM item WHERE ID = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $param_id);

        $param_id = trim($_GET["id"]);

        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);
            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                $name = $row["name"];
                $subject = $row["subject"];
                $category = $row["category"];
                $get_date = $row["get_date"];
                $due_date = $row["due_date"];
            } else {
                header("location: index.php");
                exit();
            }
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }
    }

    // Close statement
    mysqli_stmt_close($stmt);

    // Close connection
    mysqli_close($link);
} else {
    header("location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto+Slab">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width" />
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

    <div class="item-info">
        <p>Item: <?php echo $row["name"]; ?></p>
        <p>Subject: <?php echo $row["subject"]; ?></p>
        <p>Category: <?php echo $row["category"]; ?></p>
        <p>Time you get: <?php echo $row["get_date"]; ?></p>
        <p>due date: <?php echo $row["due_date"]; ?></p>

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
</body>

</html>
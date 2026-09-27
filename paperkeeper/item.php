<?php
// Check existence of id parameter before processing further
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    // Include config file
    require_once "config.php";
    
    // Prepare a select statement
    $sql = "SELECT * FROM item WHERE id = ?";
    
    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
        // Set parameters
        $param_id = trim($_GET["id"]);
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
    
            if(mysqli_num_rows($result) == 1){
                /* Fetch result row as an associative array. Since the result set
                contains only one row, we don't need to use while loop */
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                
                // Retrieve individual field value
                $name = $row["name"];
                $subject = $row["subject"];
                $category = $row["category"];
                $get_date = $row["get_date"];
                $due_date = $row["due_date"];
            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: index.php");
                exit();
            }
            
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
    
    // Close connection
    mysqli_close($link);
} else{
    // URL doesn't contain id parameter. Redirect to error page
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
    <header>
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
</header>

    <div class="item-info">
        <p>Item: <?php echo $row["name"]; ?></p>
        <p>Subject: <?php echo $row["subject"]; ?></p>
        <p>Category: <?php echo $row["category"]; ?></p>
        <p>Time you get: <?php echo $row["get_date"]; ?></p>
        <p>due date: <?php echo $row["due_date"]; ?></p>

        <br>
        <div class="buttons">
            <button class="edit" type="button" onclick="location.href='item.php?id=<?php echo $row['ID']; ?>'">Edit</button>

            <button class="delete" type="button" onclick="location.href='delete.php?id=<?php echo $row['ID']; ?>'">Delete</button>

        </div>
    </div>
</body>

</html>
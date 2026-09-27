<?php
session_start();
require_once "config.php";
$name = $subject = $category = $get_date = $due_date = "";
$name_err = $subject_err = $category_err = $get_date_err = "";

// Processing form data when form is submitted
if (isset($_POST["id"]) && !empty($_POST["id"])) {
    // Get hidden input value
    $id = $_POST["id"];

    $input_name = trim($_POST["item-name"]);
    if (empty($input_name)) {
        $name_err = "Please enter a name.";
    } else {
        $name = $input_name;
    }

    $input_subject = trim($_POST["subject"]);
    if (empty($input_subject)) {
        $subject_err = "Please choose a subject.";
    } else {
        $subject = $input_subject;
    }

    $input_category = trim($_POST["category"]);
    if (empty($input_category)) {
        $category_err = "Please choose a category.";
    } else {
        $category = $input_category;
    }

    $input_get_date = trim($_POST["get_date"] ?? "");
    if (empty($input_get_date)) {
        $get_date_err = "Please choose a date.";
    } else {
        $get_date = $input_get_date;
    }

    $input_due_date = trim($_POST["due_date"] ?? "");
    $due_date = $input_due_date === '' ? NULL : $input_due_date;



    // Check input errors before inserting in database
    if (empty($name_err) && empty($subject_err) && empty($category_err) && empty($get_date_err)) {
        // Prepare an update statement
        $sql = "UPDATE item SET name=?, subject=?, category=?, get_date=?, due_date=? WHERE ID=?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "sssssi", $param_name, $param_subject, $param_category, $param_get_date, $param_due_date, $id);

            $param_name = $name;
            $param_subject = $subject;
            $param_category = $category;
            $param_get_date = $get_date;
            $param_due_date = $due_date;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Records updated successfully. Redirect to landing page
                header("location: index.php");
                exit();
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($link);
} else {
    // Check existence of id parameter before processing further
    if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
        // Get URL parameter
        $id = trim($_GET["id"]);

        // Prepare a select statement
        $sql = "SELECT * FROM item WHERE ID = ?";
        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);

            // Set parameters
            $param_id = $id;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                $result = mysqli_stmt_get_result($stmt);

                if (mysqli_num_rows($result) == 1) {
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                    // Retrieve individual field value
                    $name = $row["name"];
                    $subject = $row["subject"];
                    $category = $row["category"];
                    $get_date = $row["get_date"];
                    $due_date = $row["due_date"];
                } else {
                    // URL doesn't contain valid id. Redirect to error page
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
        // URL doesn't contain id parameter. Redirect to error page
        header("location: userinfo.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto+Slab">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width" />
    <title>Edit Item</title>
</head>

<body>
    <header>
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
    </header>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <div class="info edit-item-form">
            <div class="edit-item">
                <label for="item-name">Item Name</label>
                <input type="text" id="item-name" name="item-name" placeholder="Enter item name"
                    value="<?php echo $name; ?>">
                <span style="display: block; margin-top: 10px; color: #dc3545;"><?php echo $name_err; ?></span>
                <br>
                <label for="subject">Subject</label>
                <select id="subject" name="subject">
                    <option value="" selected>Please select subject</option>
                    <option value="Physics" <?php echo ($subject === 'Physics') ? 'selected' : ''; ?>>Physics</option>
                    <option value="Math" <?php echo ($subject === 'Math') ? 'selected' : ''; ?>>Math</option>
                    <option value="English" <?php echo ($subject === 'English') ? 'selected' : ''; ?>>English</option>
                    <option value="Chinese" <?php echo ($subject === 'Chinese') ? 'selected' : ''; ?>>Chinese</option>
                    <option value="Digi Tech" <?php echo ($subject === 'Digi Tech') ? 'selected' : ''; ?>>Digi Tech</option>
                </select>
                <span style="display: block; margin-top: 10px; color: #dc3545;"><?php echo $subject_err; ?></span>
                <br>
                <label for="category">Category</label>
                <select id="category" name="category">
                    <option value="" selected>Please select category</option>
                    <option value="Homework" <?php echo ($category === ' Homework') ? 'selected' : ''; ?>>Homework</option>
                    <option value="Quiz" <?php echo ($category === 'Quiz') ? 'selected' : ''; ?>>Quiz</option>
                    <option value="Test" <?php echo ($category === 'Test') ? 'selected' : ''; ?>>Test</option>
                    <option value="Note" <?php echo ($category === 'Note') ? 'selected' : ''; ?>>Note</option>
                    <option value="Other" <?php echo ($category === 'Other') ? 'selected' : ''; ?>>Other</option>
                </select>
                <span style="display: block; margin-top: 10px; color: #dc3545;"><?php echo $category_err; ?></span>
                <br>
                <label for="get_date">Start Date</label>
                <input type="datetime-local" id="get_date" name="get_date" <?php echo !empty($get_date) ? 'value="' . htmlspecialchars($get_date) . '"' : ''; ?>>
                <span style="display: block; margin-top: 10px; color: #dc3545;"><?php echo $get_date_err; ?></span>
                <br>
                <label for="due_date">Due Date (Optional)</label>
                <input type="datetime-local" id="due_date" name="due_date" <?php echo !empty($due_date) ? 'value="' . htmlspecialchars($due_date) . '"' : ''; ?>>
                <br>
            </div>
        </div>
        <br>
        <br>
        <input type="hidden" name="id" value="<?php echo $id; ?>" />
        <div class="buttons">
            <button class="save" type="submit">
                Save
            </button>

            <button class="cancel" type="button" onclick="location.href='index.php'">
                Cancel
            </button>
        </div>
        </div>
</body>

</html>
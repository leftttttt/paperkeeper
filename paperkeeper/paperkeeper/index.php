<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto+Slab">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Paperkeeper</title>
</head>

<body>
    <div class="navbar">
        <div class="leftside">
            <div class="user-icon">
                <a href="userinfo.php">
                    <img src="images/user.png" alt="the user icon" width="45" height="45">
                </a>
                <p>Personal Center</p>
            </div>

            <?php if(!isset($_SESSION["loggedin"])){ ?>
            <div class="headerbuttons">
                <button class="signinbtn" type="button" onclick="location.href='signin.php'">Sign In</button>
                <button class="signupbtn" type="button" onclick="location.href='signup.php'">Sign Up</button>
            </div>
            <?php }
             else { ?>
            <div class="headerbuttons">
                <button class="signinbtn" type="button" onclick="location.href='signout.php'">Sign Out <?php echo htmlspecialchars($_SESSION["username"]); ?></button>
            </div>
            <?php } ?>
        </div>

        <div class="title">
            <h1>Item</h1>
        </div>

        <div class="function-box">
            <form class="search" method="get" action="search.php">
                <div class="filter">
                    <select name="subject">
                        <option value="">Choose Subject</option>
                        <option value="physics">physics</option>
                        <option value="math">math</option>
                        <option value="english">english</option>
                        <option value="chinese">chinese</option>
                        <option value="digi tech">digi tech</option>
                    </select>
                </div>
            </form>
        </div>


    </div>

        <button class="create" type="button" onclick="location.href='accountchoose.php'">
        <div class="sign">+</div>
        <div class="text">Create</div>
        </button>
<br>
    <div class="item-box">

    </div>

    <?php
    // Include config file
    require_once "config.php";

    // Attempt select query execution
    $tempUID = htmlspecialchars($_SESSION["user_id"]);
    $sql = "SELECT * FROM item WHERE user_id = $tempUID";
    if ($result = mysqli_query($link, $sql)) {
        if (mysqli_num_rows($result) > 0) {
            echo '<table class="table table-bordered table-striped">';
            echo "<thead>";
            echo "<tr>";
            echo "<th>Name</th>";
            echo "<th>Subject</th>";
            echo "<th>Category</th>";
            echo "<th>Get date</th>";
            echo "<th>Due date</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['subject'] . "</td>";
                echo "<td>" . $row['category'] . "</td>";
                echo "<td>" . $row['get_date'] . "</td>";
                echo "<td>" . $row['due_date'] . "</td>";
                echo "<td>";
                echo '<a href="item.php?id=' . $row['id'] . '" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
                echo '<a href="edititem.php?id=' . $row['id'] . '" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                echo '<a href="delete.php?id=' . $row['id'] . '" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                echo "</td>";
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
            // Free result set
            mysqli_free_result($result);
        } else {
            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
        }
    } else {
        echo "Oops! Something went wrong. Please try again later.";
    }

    // Close connection
    mysqli_close($link);
    ?>

<a href="item.php">111</a>
</body>
<footer>

</footer>

</html>
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
    <header>
        <div class="navbar">
            <div class="leftside">
                <div class="user-icon">
                    <a href="userinfo.php">
                        <img src="images/user.png" alt="the user icon" width="45" height="45">
                    </a>
                    <p>Personal Center</p>
                </div>

                <?php if (!isset($_SESSION["loggedin"])) { ?>
                    <div class="headerbuttons">
                        <button class="signinbtn" type="button" onclick="location.href='signin.php'">Sign In</button>
                        <button class="signupbtn" type="button" onclick="location.href='signup.php'">Sign Up</button>
                    </div>
                <?php } else { ?>
                    <div class="headerbuttons">
                        <button class="signinbtn" type="button" onclick="location.href='signout.php'">Sign Out
                            <?php echo htmlspecialchars($_SESSION["username"]); ?></button>
                    </div>
                <?php } ?>
            </div>

            <div class="title">
                <h1>Item</h1>
            </div>

            <div class="function-box">
                <div class="filter">
                    <select name="subject" id="subjectFilter" onchange="filterBySubject()">
                        <option value="">Choose Subject</option>
                        <option value="Physics">Physics</option>
                        <option value="Math">Math</option>
                        <option value="English">English</option>
                        <option value="Chinese">Chinese</option>
                        <option value="Digi Tech">Digi Tech</option>
                    </select>
                </div>
            </div>


        </div>
    </header>

    <button class="create" type="button" onclick="location.href='accountchoose.php'">
        <div class="sign">+</div>
        <div class="text">Create</div>
    </button>
    <br>
    <div class="item-box">

        <?php
        // Include config file
        require_once "config.php";

        // Attempt select query execution
        $tempUID = htmlspecialchars($_SESSION["user_id"]);
        $sql = "SELECT * FROM item WHERE user_id = $tempUID";
        if ($result = mysqli_query($link, $sql)) {
            if (mysqli_num_rows($result) > 0) {
                echo '<table id="myTable" class="item-table">';
                echo "<thead>";
                echo "<tr>";
                echo "<th onclick=\"sortTable(0)\" >Name</th>";
                echo "<th onclick=\"sortTable(1)\">Subject</th>";
                echo "<th onclick=\"sortTable(2)\">Category</th>";
                echo "<th onclick=\"sortTable(3)\">Get date</th>";
                echo "<th onclick=\"sortTable(4)\">Due date</th>";
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
                    echo '<a href="item.php?id=' . $row['ID'] . '" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
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
    </div>
    <script>
        function sortTable(n) {
            var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
            table = document.getElementById("myTable");
            switching = true;
            //Set the sorting direction to ascending:
            dir = "asc";
            /*Make a loop that will continue until
            no switching has been done:*/
            while (switching) {
                //start by saying: no switching is done:
                switching = false;
                rows = table.rows;
                /*Loop through all table rows (except the
                first, which contains table headers):*/
                for (i = 1; i < (rows.length - 1); i++) {
                    //start by saying there should be no switching:
                    shouldSwitch = false;
                    /*Get the two elements you want to compare,
                    one from current row and one from the next:*/
                    x = rows[i].getElementsByTagName("TD")[n];
                    y = rows[i + 1].getElementsByTagName("TD")[n];
                    /*check if the two rows should switch place,
                    based on the direction, asc or desc:*/
                    if (dir == "asc") {
                        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                            //if so, mark as a switch and break the loop:
                            shouldSwitch = true;
                            break;
                        }
                    } else if (dir == "desc") {
                        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                            //if so, mark as a switch and break the loop:
                            shouldSwitch = true;
                            break;
                        }
                    }
                }
                if (shouldSwitch) {
                    /*If a switch has been marked, make the switch
                    and mark that a switch has been done:*/
                    rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                    switching = true;
                    //Each time a switch is done, increase this count by 1:
                    switchcount++;
                } else {
                    /*If no switching has been done AND the direction is "asc",
                    set the direction to "desc" and run the while loop again.*/
                    if (switchcount == 0 && dir == "asc") {
                        dir = "desc";
                        switching = true;
                    }
                }
            }
        }
        function filterBySubject() {
            var select, filterValue, table, tr, td, i, txtValue;
            select = document.getElementById("subjectFilter");
            filterValue = select.value;
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");

            for (i = 1; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (filterValue === "" || txtValue === filterValue) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }


    </script>
</body>
<footer>

</footer>

</html>
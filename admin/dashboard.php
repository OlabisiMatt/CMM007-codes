<?php require_once "config.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
     
    <!-- font awesome cdn link -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <!--Header start-->
    <section class="header">
        <a href="#" class="logo"></a>
        <nav class="navbar">
            <a class="active" href="dashboard.php">Home</a>
            <a  href="admin_reserve.php">Reservation</a>
            <a  href="admin_ticket.php">Tictket</a>
            <a  act="act" href="logout.php">Signout</a>

        </nav>

    </section>
    <!--Header Ends here-->

    <!-- Dashboard -->
    <section>
        <div>
            <h2>Customer Details</h2>
            <div class="table table-responsive">
                <?php
                    // Attempt select query exe
                    $sql = "SELECT * FROM  reserve";
                    if ($result = mysqli_query($connection, $sql)) {
                        if (mysqli_num_rows($result) > 0) {
                            echo "<table class='table table-bordered table-striped'>";
                            echo  "<thead>";
                            echo "<tr>";
                            echo  "<th scope = 'col'>S/N</th>";
                            echo "<th scope = 'col'>Name</th>";
                            echo "<th scope ='col'>Email</th>";
                            echo "<th scope ='col'>Phone Number</th>";
                            echo "<th scope ='col'>Address</th>";
                            echo "<th scope ='col'>Location</th>";
                            echo "<th scope ='col'>Guest</th>";
                            echo "<th scope ='col'>Arrivals</th>";
                            echo "<th scope ='col'>Departure</th>";
                            echo "<th colspan=3>Action</th>";
                            echo  "</tr>";
                            echo "</thead>";
                            echo "<tbody>";
                            while ($row = mysqli_fetch_array($result)) {
                                echo "<tr>";
                                echo "<td>" . $row['id'] . "</td>";
                                echo "<td>" . $row['name'] . "</td>";
                                echo "<td>" . $row['email'] . "</td>";
                                echo "<td> " . $row['pnumber'] . "</td>";
                                echo "<td>" . $row['addr'] . "</td>";
                                echo "<td>" . $row['location'] . "</td>";
                                echo "<td> " . $row['guest'] . " </td>";
                                echo "<td>" . $row['arrival'] . "</td>";
                                echo "<td> " . $row['departure'] . " </td>";

                                echo "<td>";
                                echo "<a href='view.php?id=" . $row['id'] . "' onclick='return confirm ('Are you sure')'>View</a>|<a href='delete.php?id=" . $row['id'] . "' onclick='return confirm ('Are you sure')'>Delete</a>";
                                echo "</td>";
                                echo "</tr>";
                            }
                            echo "</tbody>";
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else {
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else {
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
                    }

                    // Close connection
                    mysqli_close($connection);

                    ?>

        </div>
    </section>


</body>
</html>
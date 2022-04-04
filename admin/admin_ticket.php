<?php require_once "config.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Ticket</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!--swipe css link-->
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
</head>

<body>
    <div class="container-fluid">

       <!--Header start-->
    <section class="header">
        <a href="#" class="logo"></a>
        <nav class="navbar">
            <a  href="dashboard.php">Home</a>
            <a  href="admin_reserve.php">Reservation</a>
            <a class="active" href="admin_ticket.php">Tictket</a>
            <a  act="act" href="logout.php">Signout</a>

        </nav>

    </section>
    <!--Header Ends here-->

        <!--Start of main-->
        <main>

            <!--Section Banner Start-->
            <section>
                <div class="banner-area">
                    <div class="content-area">
                        <div class="content">
                            <h1>Customers Ticket</h1>

                        </div>
                        <section class="mainD">
                            <div class="bodyD">

                                <div class="table table-responsive">
                                    <?php
                                    // Attempt select query exe
                                    $sql = "SELECT * FROM  images";
                                    if ($result = mysqli_query($connection, $sql)) {
                                        if (mysqli_num_rows($result) > 0) {

                                            echo "<table class='table table-bordered table-striped'>";
                                            echo  "<thead>";
                                            echo "<tr>";
                                            echo  "<th scope = 'col'>S/N</th>";
                                            echo "<th scope = 'col'>Name</th>";
                                            echo "<th scope ='col'>Time</th>";
                                            echo "<th colspan=3>Action</th>";
                                            echo  "</tr>";
                                            echo "</thead>";
                                            echo "<tbody>";
                                            while ($row = mysqli_fetch_array($result)) {
                                                echo "<tr>";
                                                echo "<td>" . $row['id'] . "</td>";
                                                echo "<td>" . $row['file_name'] . "</td>";
                                                echo "<td>" . $row['uploaded_on'] . "</td>";
                                                echo "<td>";
                                                echo "<a href='ticket_view.php?id=" . $row['id'] . "' onclick='return confirm ('Are you sure')'>View</a> |<a href='ticket_delete.php?id=" . $row['id'] . "' onclick='return confirm ('Are you sure')'>Delete</a>";
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
                            </div>
                        </Section>


                    </div>

                </div>
            </section>
            <!--Section Banner Ends-->

        </main>
        <!--End of main-->

    </div>

</body>

</html>
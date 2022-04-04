<?php

// Check existence of id parameter before processing further

if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
    // Include config file
    require_once "config.php";

    // Prepare a select statement
    $query = "SELECT * FROM reserve WHERE id = ?";

    if ($stmt = mysqli_prepare($connection, $query)) {
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_id);

        // Set parameters
        $param_id = trim($_GET["id"]);

        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);

            if (mysqli_num_rows($result) == 1) {
                /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                // Retrieve individual field value
                $name = $row['name'];
                $email = $row['email'];
                $pnumber = $row['pnumber'];
                $addr = $row['addr'];
                $location = $row['location'];
                $guest = $row['guest'];
                $arrival = $row['arrival'];
                $departure = $row['departure'];
            } else {
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: error.php");
                exit();
            }
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }
    }

    // Close statement
    mysqli_stmt_close($stmt);

    // Close connection
    mysqli_close($connection);
} else {
    // URL doesn't contain id parameter. Redirect to error page
    header("location: error.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Reservation </title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</head>

<body>
    <!--Start of header-->
    <header class="col-md-12">
        <div class="row">
            <nav>
                <!--this is the navigation bar-->
                <ul class="nav justify-content-end">
                    <li class="nav-item">
                        <a class="nav-link" href="home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="reserve.php">Reservation</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ticket.php">Ticket</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="gallery.php">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">logout</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    <!--End of header-->

    <main>
        <!--Banner area-->
        <section>
            <div class="banner-area">
                <div class="content-area">
                    <div class="content">
                        <h1>Book Now</h1>

                    </div>

                </div>

            </div>
        </section>

        <!--resevation-->
        <section class="reservation">
            <h1 class="heading-title text-center">Make a Reservation</h1>
            <form class="container res" action="reserve_data.php" method="POST">
                <div class="row">
                    <div class="col">
                        <span>Name:</span>
                        <input type="text" class="form-control" value="<?php echo $row["name"]; ?>" name="name" readonly>
                    </div>
                    <div class="col">
                        <span>Email:</span>
                        <input type="text" class="form-control" value="<?php echo $row["email"]; ?>" name="email" readonly>
                    </div>
                </div>
                <br>
                <br>
                <div class="row">
                    <div class="col">
                        <span>Phone Number:</span>
                        <input type="text" class="form-control" value="<?php echo $row["pnumber"]; ?>" name="pnumber" readonly>
                    </div>
                    <div class="col">
                        <span>Address:</span>
                        <input type="text" class="form-control" value="<?php echo $row["addr"]; ?>" name="addr" readonly>
                    </div>
                </div>
                <br>
                <br>
                <div class="row">
                    <div class="col">
                        <span>Where To:</span>
                        <input type="text" class="form-control" value="<?php echo $row["location"]; ?>" name="location" readonly>
                    </div>
                    <div class="col">
                        <span>How Many:</span>
                        <input type="text" class="form-control" value="<?php echo $row["guest"]; ?>" name="guest" readonly>
                    </div>
                </div>
                <br>
                <br>
                <div>
                    <div class="row">
                        <div class="col">
                            <span>Arrival:</span>
                            <input type="date" class="form-control" name="arrival" value="<?php echo $row["arrival"]; ?>" readonly>
                        </div>
                        <div class="col">
                            <span>Departure:</span>
                            <input type="date" class="form-control" name="departure" value="<?php echo $row["departure"]; ?>" readonly>
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <a href="dashboard.php" class="btn btn-primary" name="send"> Back</a>

            </form>
        </section>

        <!--Footer-->
        <section>
            <!--Start of footer-->
            <footer class="text-center">
                <p>(c)2022 Olabisi Matthew</p>
            </footer>
            <!--End of footer-->
        </section>


    </main>


</body>

</html>
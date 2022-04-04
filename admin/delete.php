<?php
// Process delete operation after confirmation
if (isset($_POST["id"]) && !empty($_POST["id"])) {
    // Include config file
    include "config.php";

    // Prepare a delete statement
    $query = "DELETE FROM reserve WHERE id = ?";

    if ($stmt = mysqli_prepare($connection, $query)) {
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_id);

        // Set parameters
        $param_id = trim($_POST["id"]);

        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            // Records deleted successfully. Redirect to landing page
            header("location: dashboard.php");
            exit();
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }
    }

    // Close statement
    mysqli_stmt_close($stmt);

    // Close connection
    mysqli_close($connection);
} else {
    // Check existence of id parameter
    if (empty(trim($_GET["id"]))) {
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!--swipe css link-->
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
</head>

<body>
    <div class="container-fluid">
        <!--Start of header-->
        <header class="col-md-12">
            <div class="row">
                <nav>
                    <!--this is the navigation bar-->
                    <ul class="nav justify-content-end">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="home.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.php">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="reserve.php">Reservation</a>
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

        <!--Start of main-->
        <!--Section Banner Start-->
        <section>
            <div class="banner-area">
                <div class="content-area">
                    <div class="content">
                        <h1>Delete Record</h1>

                        <section class="booking">
                            <div class="bodyD">
                                <h1 class="heading-title">Delete Record</h1>
                                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                    <input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>">
                                    <h4>Are you sure you want to delete this record?</h4>

                                    <input type="submit" value="Yes" class="btn btn-success">
                                    <a href="dashboard.php" class="btn btn-danger">No</a>
                                </form>
                            </div>
                        </section>
                    </div>

                </div>

            </div>
        </section>
        <!--Section Banner Ends-->
        <!--End of main-->

        <!--Start of footer-->
        <footer class="text-center">
            <p>(c)2022 Olabisi Matthew</p>
        </footer>
        <!--End of footer-->
    </div>

</body>

</html>
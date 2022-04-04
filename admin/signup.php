<?php
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$aname = $apsw =  " ";
$aname_err = $apsw_err =  "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {


    // Validate username
    if (empty(trim($_POST["aname"]))) {
        $aname_err = "Please enter a username.";
    } else {
        // Prepare a select statement
        $sql = "SELECT id FROM admin_sign WHERE aname = ?";

        if ($stmt = mysqli_prepare($connection, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_aname);

            // Set parameters
            $param_aname = trim($_POST["aname"]);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                /* store result */
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $aname_err = "This username is already taken.";
                } else {
                    $aname = trim($_POST["aname"]);
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Validate password
    if (empty(trim($_POST["apsw"]))) {
        $apsw_err = "Please enter a password.";
    } else {
        $apsw = trim($_POST["apsw"]);
    }


    // Check input errors before inserting in database
    if (empty($aname_err) && empty($apsw_err)) {

        // Prepare an insert statement
        $request = "INSERT INTO admin_sign (aname, apsw) VALUES (?,?)";

        if ($stmt = mysqli_prepare($connection, $request)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_aname, $param_apsw);

            // Set parameters
            $param_aname = $aname;

            // Creates a password hash
            $param_apsw = password_hash($apsw, PASSWORD_DEFAULT);


            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Redirect to login page
                header("location: login.php");
            } else {
                echo "Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    //close connection
    mysqli_close($connection);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin|Sign up</title>
    <link rel="stylesheet" href="../assets/css/lstyle.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>


<body>

    <header class="col-md-12">
        <div class="row">
            <nav>
                <!--this is the navigation bar-->
                <ul class="nav justify-content-end">
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="usersignup.php">User</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../admin/signup.php">Admin</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <div class="body1">
            <div class="Container-fluid">
                <div class="header">
                        <h1>Admin Account</h1>
                </div>
                            <div class="main">
                                <form action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>' method="POST">

                                    <input type="text" placeholder="Username" name="aname">
                                    <p style="color: red;"><?php echo $aname_err; ?></p>

                                    <input type="password" placeholder="Password" name="apsw">
                                    <p style="color: red;"><?php echo $apsw_err; ?></p>

                                    <button>Signup</button>
                                    <p class="ques">Already have an account? <a href="login.php" style="color:red;">Login here</a>.</p>
                                </form>
                            </div>

            </div>
        </div>
    </main>
    </body>

</html>
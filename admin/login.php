<?php
// Initialize the session
session_start();

// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$aname = $apsw = "";
$aname_err = $apsw_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Check if username is empty
    if (empty(trim($_POST["aname"]))) {
        $aname_err = "Please enter your username.";
    } else {
        $aname = trim($_POST['aname']);
    }

    // Check if password is empty
    if (empty(trim($_POST["apsw"]))) {
        $apsw_err = "Please enter your password.";
    } else {
        $apsw = trim($_POST["apsw"]);
    }

    // Validate credentials
    if (empty($aname_err) && empty($apsw_err)) {
        // Prepare a select statement
        $sql = "SELECT id,aname, apsw FROM admin_sign WHERE aname = ?";

        if ($stmt = mysqli_prepare($connection, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_aname);

            // Set parameters
            $param_aname = $aname;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Store result
                mysqli_stmt_store_result($stmt);

                // Check if username exists, if yes then verify password
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $aname, $hashed_password);
                    if (mysqli_stmt_fetch($stmt)) {
                        if (password_verify($apsw, $hashed_password)) {
                            // Password is correct, so start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["aname"] = $aname;

                            // Redirect user to welcome page
                            header("location: dashboard.php");
                        } else {
                            // Display an error message if password is not valid
                            $apsw_err = "The password you entered was not valid.";
                        }
                    }
                } else {
                    // Display an error message if username doesn't exist
                    $aname_err = "No account found with that username.";
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Close connection
    mysqli_close($connection);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin|Login</title>
    <link rel="stylesheet" href="../assets/css/lstyle.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>

    <header class="col-md-12">
        <div class="row">
            <!--this is the navigation bar-->
            <ul class="nav justify-content-end">
                <li class="nav-item">
                    <a class="nav-link" href="../index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../user/usersignup.php">User</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="signup.php">Admin</a>
                </li>

            </ul>
        </div>
    </header>

    <main>
        <div class="body1">
            <div class="Container-fluid">
                <div class="header">
                            <h1>Admin Login</h1>
                </div>
                <div class="main">
                            <form action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>' method="POST">
                                <span>
                                    <i class="fa fa-user"></i>
                                    <input type="text" placeholder="Username" name="aname">
                                </span>
                                <p style="color: red;"><?php echo $aname_err; ?></p>
                                <span>
                                    <i class="fa fa-lock"></i>
                                    <input type="password" placeholder="password" name="apsw">
                                </span>
                                <p style="color: red;"><?php echo $apsw_err; ?></p>
                                <button>Login</button>

                                <!--  <p class="small mb-5 pb-lg-2"><a style="color:red;" href=" #!">Forgot password?</a></p> -->

                                <p class="ques">Don't have an account? <a href="signup.php" style="color:red;">Register here</a></p>

                            </form>
                </div>
            </div>

        </div>

    </main>

</body>

</html>
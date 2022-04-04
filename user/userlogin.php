<?php
// Initialize the session
session_start();

// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$email = $psw = " ";
$email_err = $psw_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Check if email is empty
    if (empty(trim($_POST["email"]))) {
        $email_err = "Please enter your email.";
    } else {
        $email = trim($_POST['email']);
    }

    // Check if password is empty
    if (empty(trim($_POST["psw"]))) {
        $psw_err = "Please enter your password.";
    } else {
        $psw = trim($_POST["psw"]);
    }

    // Validate credentials
    if (empty($email_err) && empty($psw_err)) {
        // Prepare a select statement
        $sql = "SELECT id,email, psw FROM user_sign WHERE email = ?";

        if ($stmt = mysqli_prepare($connection, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);

            // Set parameters
            $param_email = $email;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Store result
                mysqli_stmt_store_result($stmt);

                // Check if email exists, if yes then verify password
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $email, $hashed_password);
                    if (mysqli_stmt_fetch($stmt)) {
                        if (password_verify($psw, $hashed_password)) {
                            // Password is correct, so start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["email"] = $email;

                            // Redirect user to welcome page
                            header("location: home.php");
                        } else {
                            // Display an error message if password is not valid
                            $psw_err = "The password you entered was not valid.";
                        }
                    }
                } else {
                    // Display an error message if email doesn't exist
                    $email_err = "No account found with that email.";
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
    <title>User|Login</title>
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
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <div class="body1">
            <div class="Container-fluid">
                <div class="header">
                    <h1>User Login</h1>
                </div>
                <div class="main">
                    <form action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>' method="POST">
                        <span>
                            <i class="fa fa-user"></i>
                            <input type="email" placeholder="Email" name="email">
                        </span>
                        <p style="color: red;"><?php echo $email_err; ?></p>
                        <span>
                            <i class="fa fa-lock"></i>
                            <input type="password" placeholder="password" name="psw">
                        </span>
                        <p style="color: red;"><?php echo $psw_err; ?></p>
                        <button>Login</button>
                        <p class="ques">Don't have an account? <a href="usersignup.php" style="color:red;">Register here</a></p>

                    </form>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
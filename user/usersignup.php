<?php
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$fname = $lname = $email = $psw = $cpsw =  " ";
$email_err = $psw_err = $cpsw_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //Validate other variables
    $fname = trim($_POST['fname']);
    $lname = trim($_POST['lname']);

    //validate email
    if (empty(trim($_POST["email"]))) {
        $email_err = "Please enter your email .";
    } else {
        $sql = "SELECT id FROM user_sign WHERE email = ?";
        if ($stmt = mysqli_prepare($connection, $sql)) {

            mysqli_stmt_bind_param($stmt, "s", $param_email);


            $param_email = trim($_POST["email"]);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {


                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $email_err = "This email is already taken.";
                } else {
                    $email = trim($_POST["email"]);
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Validate password
    if (empty(trim($_POST["psw"]))) {
        $psw_err = "Please enter a password.";
    } elseif (strlen(trim($_POST["psw"])) < 6) {
        $psw_err = "Password must have atleast 6 characters.";
    } else {
        $psw = trim($_POST["psw"]);
    }

    // Validate confirm password
    if (empty(trim($_POST["cpsw"]))) {
        $cpsw_err = "Please confirm password.";
    } else {
        $cpsw = trim($_POST["cpsw"]);
        if (empty($psw_err) && ($psw != $cpsw)) {
            $cpsw_err = "Password did not match.";
        }
    }



    // Check input errors before inserting in database
    if (empty($email_err) && empty($psw_err) && empty($cpsw_err)) {

        // Prepare an insert statement
        $sql = "INSERT INTO user_sign (fname,lname,email, psw) VALUES (?, ?,?,?)";

        if ($stmt = mysqli_prepare($connection, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssss", $param_fname, $param_lname, $param_email, $param_psw);

            // Set parameters
            $param_fname = $fname;
            $param_lname = $lname;
            $param_email = $email;
            $param_psw = password_hash($psw, PASSWORD_DEFAULT);


            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Redirect to login page
                header("location: userlogin.php");
            } else {
                echo "Something went wrong. Please try again later.";
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
    <title>User|Sign up</title>
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
                        <h1>Create Account</h1>
                    </div>
                    <div class="main">
                        <form action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>' method="POST">
                            <span>
                                <input type="text" placeholder="First name" name="fname" required>
                            </span>
                            <span>
                                <input type="text" placeholder="Last name" name="lname" required>
                            </span>
                            <span>
                                <input type="email" placeholder="Email" name="email">
                            </span>
                            <p style="color: red;"><?php echo $email_err; ?></p>
                            <span>
                                <input type="password" placeholder="Password" name="psw">
                            </span>
                            <p style="color: red;"><?php echo $psw_err; ?></p>
                            <span>
                                <input type="password" placeholder="Repeat Password" name="cpsw">
                            </span>
                            <p style="color: red;"><?php echo $cpsw_err; ?></p>
                            <button>Signup</button>
                            <p class="ques">Already have an account? <a href="userlogin.php" style="color:red;">Login here</a>.</p>
                        </form>
                    </div>
                </div>

            </div>
        </main>

</body>

</html>
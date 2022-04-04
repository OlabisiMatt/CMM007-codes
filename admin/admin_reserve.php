<!DOCTYPE html>
<html lang="en">

<head>
    <title> Reservation</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!--swipe css link-->
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
</head>

<body>
    <!--Header start-->
    <section class="header">
        <a href="#" class="logo"></a>
        <nav class="navbar">
            <a  href="dashboard.php">Home</a>
            <a class="active" href="admin_reserve.php">Reservation</a>
            <a  href="admin_ticket.php">Tictket</a>
            <a  act="act" href="logout.php">Signout</a>

        </nav>

    </section>
    <!--Header Ends here-->
    <main>
        <!--Banner area-->
        <section>
            <div class="banner-area">
                <div class="content-area">
                    <div class="content">
                        <h1>Add Customer</h1>

                    </div>

                </div>

            </div>
        </section>

        <!--resevation-->
        <section class="reservation">
            <h1 class="heading-title text-center">Add Customer Manually</h1>
            <form class="container res" action="reserve_data.php" method="POST">
                <div class="row">
                    <div class="col">
                        <span>Name:</span>
                        <input type="text" class="form-control" placeholder="Enter your name" name="name">
                    </div>
                    <div class="col">
                        <span>Email:</span>
                        <input type="text" class="form-control" placeholder="Enter your email" name="email">
                    </div>
                </div>
                <br>
                <br>
                <div class="row">
                    <div class="col">
                        <span>Phone Number:</span>
                        <input type="text" class="form-control" placeholder="enter your number" name="pnumber">
                    </div>
                    <div class="col">
                        <span>Address:</span>
                        <input type="text" class="form-control" placeholder="enter your address" name="addr">
                    </div>
                </div>
                <br>
                <br>
                <div class="row">
                    <div class="col">
                        <span>Where To:</span>
                        <input type="text" class="form-control" placeholder="place to visit" name="location">
                    </div>
                    <div class="col">
                        <span>How Many:</span>
                        <input type="text" class="form-control" placeholder="number of guests" name="guest">
                    </div>
                </div>
                <br>
                <br>
                <div>
                    <div class="row">
                        <div class="col">
                            <span>Arrival:</span>
                            <input type="date" class="form-control" name="arrival">
                        </div>
                        <div class="col">
                            <span>Departure:</span>
                            <input type="date" class="form-control" name="departure">
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <input type="submit" value="Submit" class="btn btn-primary" name="send">
            </form>
        </section>

    </main>


</body>

</html>
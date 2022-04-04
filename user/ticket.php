<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tourism</title>
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
            <a  href="home.php">Home</a>
            <a  href="package.php">Packages</a>
            <a  href="reserve.php">Reservation</a>
            <a  class="active" href="ticket.php">Tictket</a>
            <a  href="about.php">About</a>
            <a  href="logout.php">Signout</a>

        </nav>
        <div id="menu-btn" class="fas fa-bars"></div>

    </section>
    <!--Header Ends here-->

    <main>
    <!--  home section starts -->
    <section class="home">
        <div class="home-slide">
            <div class="wrapper">
                <div class="slide" style="background:url(../assets/images/home1.jpg) no-repeat">
                    <div class="content">
                        <h3>Upload your ticket</h3>
                        <span>let us verify your payment</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  home section end -->
    
    <!-- Ticket section -->
    <section class="ticket">
        <div class="card">
            <div class="">
                <h2>Upload ticket</h2>

                <form action="ticket_data.php" method="POST" enctype="multipart/form-data">
                    <div class="">
                        <div class="inputBox">
                            <input type="file" value="" name="file_name">
                        </div>
                        <input type="submit" value="Add Ticket" class="btn btn-secondary" name="upload">
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Ticket section ends -->
    
    </main>
    
    <!--Footer Start-->
    <Footer>
        <div class="footer-content">
            <h3>Contact us</h3>
            <p>Telephone: +44-700-000-000</p>
            <p>Mobile: +44-700-000-000</p>
            <p>Email: tour@gmail.com</p>
            <ul class="socials">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
            </ul>
        </div>
        <div class="footer-bottom">
            <p>copyright &copy;2022 Olabisi. Created by <span>2201917</span> </p>

        </div>
    </Footer>
    <!--Footer Ends-->

    
</body>
</html>
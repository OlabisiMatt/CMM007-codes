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
            <a  class="active" href="reserve.php">Reservation</a>
            <a  href="ticket.php">Tictket</a>
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
                        <h3>Make Your reservation</h3>
                        <span>book now</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  home section end -->

    <!-- booking section starts -->
     <section class="booking">
        <h1 class="heading-title">Enter Your Details</h1>
        <form action="reserve_data.php" method="POST" class="book-form">
            <div class="flex">
                <div class="inputBox">
                    <span>name:</span>
                    <input type="text" placeholder="enter your name" name="name">
                </div>
                <div class="inputBox">
                    <span>email:</span>
                    <input type="email" placeholder="enter your email" name="email">
                </div>
                <div class="inputBox">
                    <span>phone:</span>
                    <input type="number" placeholder="enter your number" name="pnumber">
                </div>
                <div class="inputBox">
                    <span>address:</span>
                    <input type="text" placeholder="enter your address" name="addr">
                </div>
                <div class="inputBox">
                    <span>where to:</span>
                    <input type="text" placeholder="place to visit" name="location">
                </div>
                <div class="inputBox">
                    <span>how many:</span>
                    <input type="number" placeholder="number of guests" name="guest">
                </div>
                <div class="inputBox">
                    <span>arrivals:</span>
                    <input type="date" name="arrival">
                </div>
                <div class="inputBox">
                    <span>departure:</span>
                    <input type="date" name="departure">
                </div>
            </div>
            <input type="submit" value="submit" class="btn" name="send">
        </form>
     </section>
    

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
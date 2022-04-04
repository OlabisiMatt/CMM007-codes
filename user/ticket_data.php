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
            <a  href="">Signout</a>

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
                        <h3>Ticket</h3>
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  home section end -->

    <?php
                require_once 'config.php';

                $statusMsg = '';

                //file upload path
                $targetDir  = "../uploads/";
                $fileName = basename($_FILES["file_name"]["name"]);
                $targetFilePath = $targetDir . $fileName;
                $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

                if (isset($_POST['upload']) && !empty($_FILES["file_name"]["name"])) {

                    //Allow certain file formats
                    $allowTypes =  array('jpg', 'png', 'jpeg', 'gif');

                    if (in_array($fileType, $allowTypes)) {

                        //upload file to server
                        if (move_uploaded_file($_FILES['file_name']['tmp_name'], $targetFilePath)) {

                            //insert image file name iinto database
                            $insert = $connection->query("INSERT INTO images (file_name,uploaded_on)
                                     VALUES ('" . $fileName . "', NOW())");


                            if ($insert) {
                                $statusMsg = "The file " . $fileName . " has been uploaded successfully.";
                            } else {
                                $statusMsg = 'File upload failed, please try again.';
                            }
                        } else {
                            $statusMsg = "Sorry, there was an error uploading your file.";
                        }
                    } else {
                        $statusMsg = "Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.";
                    }
                } else {
                    $statusMsg = "Please select a file to upload.";
                }

                echo "<script>  alert('$statusMsg');  </script>";

                ?>

             <!--  booking section ends -->
    
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
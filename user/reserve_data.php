<?php
//database connection code
require_once "config.php";

//get the post records
if (isset($_POST['send'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $pnumber = $_POST['pnumber'];
  $addr = $_POST['addr'];
  $location = $_POST['location'];
  $guest = $_POST['guest'];
  $arrival = $_POST['arrival'];
  $departure = $_POST['departure'];

  //database insert SQL code
  $request = "INSERT INTO  reserve (name, email, pnumber,
    addr,location,guest, arrival,departure) VALUES ('$name', '$email', '$pnumber',
   '$addr','$location','$guest', '$arrival','$departure')";

  //insert in database
  mysqli_query($connection, $request);

  header('Location:reserve.php');
} else {
  echo "Something went wrong!";
}

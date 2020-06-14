<?php
    //include 'C:\Users\Alexander\Desktop\HTML Udemy\development_timecatch\db_connection.php';

  $username = $_POST['user'];
  $password = $_POST['pass'];

  //to prevent SQL Injection
  //$username = stripcslashes($username);
  //$password = stripcslashes($password);

  $con = new mysqli("localhost","root","","users");
  $sql = "SELECT password FROM creds WHERE username = $username;";
  $result = mysqli_query($con,$sql);

  //query the database for Users
  $resultCheck = mysqli_num_rows($result);
  if ($resultCheck = 1) {
    echo "User Existiert!";
    header("Location: http://localhost/www/timecatch/MobileTryout/rkaselector.html", true, 301);
      exit();


  } else {
    header("Location: http://localhost/www/timecatch/gatekeeper/gatekeeper.php", true, 301);
      exit();

  }
?>

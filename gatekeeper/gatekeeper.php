<?php
  include_once 'C:\Users\Alexander\Desktop\HTML Udemy\development_timecatch\gatekeeper\verify.php';
 ?>


<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="MobileTryout\rkaformdata1.css">
    <title>Gatekeeper RKA</title>
  </head>
  <body>

<?php

  $dbServername = "localhost";
  $dbUsername = "root";
  $dbPassword ="";
  $dbName="creds";

  $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

    $sql ="SELECT * FROM creds;";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck > 0){
        while($row = mysqli_fetch_assoc($result)){
          echo $row['username'];
        }
    }
?>

  </body>
</html>

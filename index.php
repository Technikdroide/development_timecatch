<?php
  include 'db_connection.php';
  $conn = OpenCon();
  echo "Connected Successfully";
?>
<br>

<?php
  $sql = "SELECT username, password FROM creds";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
          echo "Username: " . $row["username"]. " // Password: " . $row["password"]. "<br>";
      }
  } else {
      echo "0 results";
  }

  CloseCon($conn);
?>

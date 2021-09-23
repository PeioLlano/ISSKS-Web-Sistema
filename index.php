<?php
  echo '<h1>Yeah, it works!<h1>';
  // phpinfo();
  $hostname = "db";
  $username = "admin";
  $password = "test";
  $db = "database";

  $conn = mysqli_connect($hostname,$username,$password,$db);
  if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
  }



//$query = mysqli_query($conn, "SELECT * FROM usuarios")
$query = mysqli_query($conn, "SELECT * FROM bezeroa")
   or die (mysqli_error($conn));

while ($row = mysqli_fetch_array($query)) {
  echo
   "<tr>
    <td>{$row['izenAbizenak']}</td>
    <td>{$row['NAN']}</td>
    <td>{$row['telefonoa']}</td>
    <td>{$row['jaiotzeData']}</td>
    <td>{$row['email']}</td>
   </tr>";
   

}

?>

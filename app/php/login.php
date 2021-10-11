<?php
    echo"<h1> PHP-an sartu da </h1>";
  // phpinfo();
  $hostname = "db";
  $username = "admin";
  $password = "test";
  $db = "database";

  $conn = mysqli_connect($hostname,$username,$password,$db);
  if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
  }

  $email = $_POST['email'];
  $pasahitza = $_POST['pasahitza'];

  if ( isset( $_POST['izena'] ) ) { // retrieve the form data by using the element's name attributes value as key $firstname = $_POST['firstname']; $lastname = $_POST['lastname']; // display the results
    echo '<h3>Form POST Method</h3>'; 
    echo '<b>Zure datuak hurrengoak dira</b>: <br>' . $email. '<br> ' . $pasahitza ;
  }

  $query = mysqli_query($conn, "SELECT * FROM `bezeroa` WHERE `email` = '$email' AND `pasahitza` = '$pasahitza' ; ");

  if(!mysql_fetch_array ($query)){
    echo"existe una cuenta","<meta http-equiv='refresh' content='0; url=../logeatuta.html' />";
  }
  else{
    echo"Ez da contu hori existitzen.";
    //echo"Errore bat egon da. Errorea: " . $query . "<br>" . $conn->error;
  }

?>
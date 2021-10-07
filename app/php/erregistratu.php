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

  $izena = $_POST['izena'];
  $nan = $_POST['nan'];
  $tlf = $_POST['tlf'];
  $jaiotze = $_POST['jaiotze'];
  $email = $_POST['email'];
  $pasahitza = $_POST['pasahitza'];

  //echo "<h1>Welcome to {$izena}</h1>"

  //$query = mysqli_query($conn, "INSERT INTO bezeroa('$izena','$nan','$tlf','$jaiotze','$email','$pasahitza')");
  $query = mysqli_query($conn, "SELECT * FROM bezeroa");

  if(!$query){
    echo"Errore bat egon da";
  }
  else{
      echo"datos guardado correctamente","<a href='../index.html'>Volver</a>";
  }
?>
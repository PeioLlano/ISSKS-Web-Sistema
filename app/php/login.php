<?php
  //echo"<h1> PHP-an sartu da </h1>";
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

  $query = mysqli_query($conn, "SELECT * FROM `bezeroa` WHERE `email` = '$email' AND `pasahitza` = '$pasahitza' ; ");
  $ilara = mysqli_num_rows($query);

  if($ilara){
    echo"<meta http-equiv='refresh' content='0; url=../logeatuta.html' />";
  }
  else{
    //echo"<meta http-equiv='refresh' content='0; url=../logIn.html' />";
    echo"<script language='javascript'>alert('Saio-hasiera baliogabea, saiatu berriz, mesedez.');</script>";
    //echo"Errore bat egon da. Errorea: " . $query . "<br>" . $conn->error;
  }

  mysqli_free_result($query);

?>
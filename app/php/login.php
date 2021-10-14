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

  session_start();

  $email = $_POST['email'];
  $pasahitza = $_POST['pasahitza'];

  $query = mysqli_query($conn, "SELECT * FROM `bezeroa` WHERE `email` = '$email' AND `pasahitza` = '$pasahitza' ; ");
  $ilara = mysqli_num_rows($query);

  if($ilara){
    $unekoIlara = mysqli_fetch_array( $query );
    $_SESSION['uneko_izena'] = $unekoIlara['izenAbizenak'];
    $_SESSION['uneko_NAN'] = $unekoIlara['NAN'];
    $_SESSION['uneko_tlf'] = $unekoIlara['telefonoa'];
    $_SESSION['uneko_jaiotze'] = $unekoIlara['jaiotzeData'];
    $_SESSION['uneko_email'] = $unekoIlara['email'];
    $_SESSION['uneko_pasahitza'] = $unekoIlara['pasahitza'];

    //echo"<script>alert(" . $_SESSION . ")</script>";
    header("Location: logeatuta.php");
  }
  else{
    echo"<script language='javascript'>alert('Saio-hasiera baliogabea, saiatu berriz, mesedez.');</script>";
    //header("Location: ../logIn.html");
    echo"<meta http-equiv='refresh' content='0; url=../logIn.html' />";
    //echo"<script language='javascript'>alert('Saio-hasiera baliogabea, saiatu berriz, mesedez.');</script>";
  }

  mysqli_free_result($query);

?>
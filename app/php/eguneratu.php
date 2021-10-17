<?php
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

  $izena = $_POST['izena'];
  $nan = $_POST['nan'];
  $tlf = $_POST['tlf'];
  $jaiotze = $_POST['jaiotze'];
  $email = $_POST['email'];
  $pasahitza = $_POST['pasahitza'];
  
  //NAN berria dagoneko sartuta dagoen begiratzeko
  echo"Zegoena: " . $_SESSION['uneko_NAN'] ;
  echo " -->  Oraingoa: $nan";
  echo "<br>";
  $nanOndo=1;
  if($nan != $_SESSION['uneko_NAN']){
    $nanKonprobaketa = mysqli_query($conn, "SELECT * FROM `bezeroa` WHERE `NAN`='$nan'; ");
    if(!empty($nanKonprobaketa)){
      $nanOndo = 0;
      echo"<script>alert('NAN aldatu duzu, baina NAN berria dagoneko sartuta dago')</script>","<meta http-equiv='refresh' content='0; url=logeatuta.php' />";
    }
  }

  //Telefono berria dagoneko sartuta dagoen begiratzeko  
  echo"Zegoena: " . $_SESSION['uneko_tlf'] ;
  echo " -->  Oraingoa: $tlf";
  echo "<br>";
  $tlfOndo = 1;
  if($tlf != $_SESSION['uneko_tlf']){
    $tlfKonprobaketa = mysqli_query($conn, "SELECT * FROM `bezeroa` WHERE `tlf`='$tlf'; ");
    if(!empty($tlfKonprobaketa)){
      $tlfOndo = 0;
      echo"<script>alert('Telefonoa aldatu duzu, baina telefono berria dagoneko sartuta dago')</script>","<meta http-equiv='refresh' content='0; url=logeatuta.php' />";
    }
  }

  //Email berria dagoneko sartuta dagoen begiratzeko  
  echo"Zegoena: " . $_SESSION['uneko_email'] ;
  echo " -->  Oraingoa: $email";
  echo "<br>";
  $email = 1;
  if($email != $_SESSION['uneko_email']){
    $emailKonprobaketa = mysqli_query($conn, "SELECT * FROM `bezeroa` WHERE `email`='$email'; ");
    if(!empty($emailKonprobaketa)){
      $emailOndo = 0;
      echo"<script>alert('Emaila aldatu duzu, baina email berria dagoneko sartuta dago')</script>","<meta http-equiv='refresh' content='0; url=logeatuta.php' />";
    }
  }

  if($nanOndo AND $tlfOndo AND $emailOndo){
    $query = mysqli_query($conn, "UPDATE `bezeroa` SET `izenAbizenak`='$izena',`NAN`=$nan,`telefonoa`='$tlf',`jaiotzeData`='$jaiotze',`email`='$email',`pasahitza`='$pasahitza' WHERE `NAN`='" . $_SESSION['uneko_NAN'] . "'; ");
    if(!$query){
      echo"Errore bat egon da. Errorea: " . $query . "<br>" . $conn->error;
    }
    else{
        echo"datos guardado correctamente","<meta http-equiv='refresh' content='10; url=logeatuta.html' />";
    }
  }
  
?>
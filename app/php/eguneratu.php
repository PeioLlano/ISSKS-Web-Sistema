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
  $nanOndo=1;
  if($nan != $_SESSION['uneko_NAN']){
    $nanKonprobaketa = mysqli_query($conn, "SELECT * FROM `bezeroa` WHERE `NAN`='$nan'; ");
    if(mysqli_num_rows($nanKonprobaketa) != 0){
      $nanOndo = 0;
      echo"<script>alert('NAN aldatu duzu, baina NAN berria dagoneko sartuta dago')</script>","<meta http-equiv='refresh' content='0; url=logeatuta.php' />";
    }
  }

  //Telefono berria dagoneko sartuta dagoen begiratzeko  
  $tlfOndo = 1;
  if($tlf != $_SESSION['uneko_tlf']){
    $tlfKonprobaketa = mysqli_query($conn, "SELECT * FROM `bezeroa` WHERE `telefonoa`='$tlf'; ");
    if(mysqli_num_rows($tlfKonprobaketa) != 0){
      $tlfOndo = 0;
      echo"<script>alert('Telefonoa aldatu duzu, baina telefono berria dagoneko sartuta dago')</script>","<meta http-equiv='refresh' content='0; url=logeatuta.php' />";
    }
  }

  //Email berria dagoneko sartuta dagoen begiratzeko  
  $emailOndo = 1;
  if($email != $_SESSION['uneko_email']){
    $emailKonprobaketa = mysqli_query($conn, "SELECT * FROM `bezeroa` WHERE `email`='$email'; ");
    if(mysqli_num_rows($emailKonprobaketa) != 0){
      $emailOndo = 0;
      echo"<script>alert('Emaila aldatu duzu, baina email berria dagoneko sartuta dago')</script>","<meta http-equiv='refresh' content='0; url=logeatuta.php' />";
    }
  }

  if($nanOndo AND $tlfOndo AND $emailOndo){
    $query = mysqli_query($conn, "UPDATE `bezeroa` SET `izenAbizenak` = '$izena', `NAN` = '$nan', `telefonoa` = '$tlf', `jaiotzeData` = '$jaiotze', `email` = '$email', `pasahitza` = '$pasahitza' WHERE `bezeroa`.`NAN` = '". $_SESSION['uneko_NAN'] ."';  ");
    if(!$query){
      echo"Errore bat egon da. Errorea: " . $query . "<br>" . $conn->error;
    }
    else{
      $_SESSION['uneko_izena'] = $izena;
      $_SESSION['uneko_NAN'] = $nan;
      $_SESSION['uneko_tlf'] = $tlf;
      $_SESSION['uneko_jaiotze'] = $jaiotze;
      $_SESSION['uneko_email'] = $email;
      $_SESSION['uneko_pasahitza'] = $pasahitza;
      echo"<script>alert('Datuak, eguneratu dira!')</script>","<meta http-equiv='refresh' content='0; url=logeatuta.php' />";
    }
  }
  
?>
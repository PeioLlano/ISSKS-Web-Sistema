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

  $izena = $_POST['izena'];
  $nan = $_POST['nan'];
  $tlf = $_POST['tlf'];
  $jaiotze = $_POST['jaiotze'];
  $email = $_POST['email'];
  $pasahitza = $_POST['pasahitza'];

  /*if ( isset( $_POST['izena'] ) ) { // retrieve the form data by using the element's name attributes value as key $firstname = $_POST['firstname']; $lastname = $_POST['lastname']; // display the results
    echo '<h3>Form POST Method</h3>'; 
    echo '<b>Zure datuak hurrengoak dira</b>: <br>' . $izena . '<br> ' . $nan . '<br> ' . $tlf . '<br> ' . $jaiotze . '<br> ' . $email. '<br> ' . $pasahitza ;
  }*/
  
  //NAN bat dagoneko sartuta dagoen begiratzeko
  $nanKonprobaketa = mysqli_query($conn, "SELECT COUNT(*) FROM `bezeroa` WHERE `email`=$email; ");
  if($nanKonprobaketa == 1){
    $query = mysqli_query($conn, "UPDATE `bezeroa` SET `izenAbizenak`='$izena',`telefonoa`='$tlf',`jaiotzeData`='$jaiotze',`email`='$email',`pasahitza`='$pasahitza' WHERE `NAN`==' " . $_SESSION['uneko_NAN'] . "'; ");
    //$query = mysqli_query($conn, "INSERT INTO `bezeroa` (`izenAbizenak`, `NAN`, `telefonoa`, `jaiotzeData`, `email`, `pasahitza`) VALUES ('froga', 'froga2', '12', '2021-10-07', '12', ''); ");
    if(!$query){
      echo"Errore bat egon da. Errorea: " . $query . "<br>" . $conn->error;
    }
    else{
        echo"datos guardado correctamente","<meta http-equiv='refresh' content='10; url=logeatuta.html' />";
    }
  }
  else{
    echo"<script>alert('Errore bat egon da!! Dagoneko NAN hori sartuta dago')</script>","<meta http-equiv='refresh' content='0; url=../erregistratu.html' />";
    //echo"Errore bat egon da!! Dagoneko NAN hori sartuta dago","<meta http-equiv='refresh' content='4; url=../erregistratu.html' />";
  }
?>
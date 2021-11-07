<?php
  // datu basera konektatu;
  $hostname = "db";
  $username = "admin";
  $password = "test";
  $db = "database";

  $conn = mysqli_connect($hostname,$username,$password,$db);
  if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
  }

  // sesioa lehenengo aldiz hasi
  session_start();

  // form-etik sartu diren datuak gordetzeko
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
  
  //NAN-a, email-a eta telefonoa dagoneko sartuta dauden begiratzeko
  $nanKonprobaketa = mysqli_query($conn, "SELECT * FROM `bezeroa` WHERE NAN = '$nan'; ");
  $nanSartuta = 1;
  $tlfKonprobaketa = mysqli_query($conn, "SELECT * FROM `bezeroa` WHERE telefonoa = '$tlf'; ");
  $tlfSartuta = 1;
  $emailKonprobaketa = mysqli_query($conn, "SELECT * FROM `bezeroa` WHERE email = '$email'; ");
  $emailSartuta = 1;
  if(mysqli_num_rows($nanKonprobaketa) == 0){
    $nanSartuta = 0;
  }
  else{
    echo"<script>alert('Errore bat egon da!! Dagoneko NAN hori sartuta dago')</script>","<meta http-equiv='refresh' content='0; url=../erregistratu.html' />";
  }

  if(mysqli_num_rows($tlfKonprobaketa) == 0){
    $tlfSartuta = 0;
  }
  else{
    echo"<script>alert('Errore bat egon da!! Dagoneko telefono hori sartuta dago')</script>","<meta http-equiv='refresh' content='0; url=../erregistratu.html' />";
  }

  if(mysqli_num_rows($emailKonprobaketa) == 0){
    $emailSartuta = 0;
  }
  else{
    echo"<script>alert('Errore bat egon da!! Dagoneko email hori sartuta dago')</script>","<meta http-equiv='refresh' content='0; url=../erregistratu.html' />";
  }

  // unique datuak ez badaude errepikatuta
  if(!$nanSartuta AND !$tlfSartuta AND !$emailSartuta){
    //datuak sartu
    $query = mysqli_query($conn, "INSERT INTO `bezeroa` (`izenAbizenak`, `NAN`, `telefonoa`, `jaiotzeData`, `email`, `pasahitza`) VALUES ('$izena','$nan','$tlf','$jaiotze','$email','$pasahitza'); ");   
    //errorerik dagoen konprobatu
    if(!$query){
      echo"Errore bat egon da. Errorea: " . $query . "<br>" . $conn->error. "<br>";
    }
    else{
      //errorerik ez badaude, sesio aldagaiak sartu eta logeatuen bistara pasatu
      $_SESSION['uneko_izena'] = $izena;
      $_SESSION['uneko_NAN'] = $nan;
      $_SESSION['uneko_tlf'] = $tlf;
      $_SESSION['uneko_jaiotze'] = $jaiotze;
      $_SESSION['uneko_email'] = $email;
      $_SESSION['uneko_pasahitza'] = $pasahitza;
      header("Location: logeatuta.php");
    }
  }
?>
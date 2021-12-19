<?php
  /*Egileak:
            Julen Fuentes
            Peio Llano
  */


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
  $izena = htmlspecialchars($_POST['izena']);
  $nan = htmlspecialchars($_POST['nan']);
  $tlf = htmlspecialchars($_POST['tlf']);
  $jaiotze = htmlspecialchars($_POST['jaiotze']);
  $email = htmlspecialchars($_POST['email']);
  $pasahitza = htmlspecialchars($_POST['pasahitza']);

  /*if ( isset( $_POST['izena'] ) ) { // retrieve the form data by using the element's name attributes value as key $firstname = $_POST['firstname']; $lastname = $_POST['lastname']; // display the results
    echo '<h3>Form POST Method</h3>'; 
    echo '<b>Zure datuak hurrengoak dira</b>: <br>' . $izena . '<br> ' . $nan . '<br> ' . $tlf . '<br> ' . $jaiotze . '<br> ' . $email. '<br> ' . $pasahitza ;
  }*/
  
  //NAN berria dagoneko sartuta dagoen begiratzeko
  $nanOndo=1;
  if($nan != $_SESSION['uneko_NAN']){
    $nanKonprobaketa = $conn->prepare("SELECT * FROM `bezeroa` WHERE NAN = ?; ");
    $nanKonprobaketa->bind_param('s', $nan);
    $nanKonprobaketa->execute();
    $resultnan = $nanKonprobaketa->get_result();
    if(mysqli_num_rows($resultnan) != 0){
      $nanOndo = 0;
      echo"<script>alert('NAN aldatu duzu, baina NAN berria dagoneko sartuta dago')</script>","<meta http-equiv='refresh' content='0; url=logeatuta.php' />";
    }
  }

  //Telefono berria dagoneko sartuta dagoen begiratzeko  
  $tlfOndo = 1;
  if($tlf != $_SESSION['uneko_tlf']){
    $tlfKonprobaketa = $conn->prepare("SELECT * FROM `bezeroa` WHERE telefonoa = ?; ");
    $tlfKonprobaketa->bind_param('s', $tlf);
    $tlfKonprobaketa->execute();
    $resulttlf = $tlfKonprobaketa->get_result();
    if(mysqli_num_rows($resulttlf) != 0){
      $tlfOndo = 0;
      echo"<script>alert('Telefonoa aldatu duzu, baina telefono berria dagoneko sartuta dago')</script>","<meta http-equiv='refresh' content='0; url=logeatuta.php' />";
    }
  }

  //Email berria dagoneko sartuta dagoen begiratzeko  
  $emailOndo = 1;
  if($email != $_SESSION['uneko_email']){
    $emailKonprobaketa = $conn->prepare("SELECT * FROM `bezeroa` WHERE email = ?; ");
    $emailKonprobaketa->bind_param('s', $email);
    $emailKonprobaketa->execute();
    $resultemail = $emailKonprobaketa->get_result();
    if(mysqli_num_rows($resultemail) != 0){
      $emailOndo = 0;
      echo"<script>alert('Emaila aldatu duzu, baina email berria dagoneko sartuta dago')</script>","<meta http-equiv='refresh' content='0; url=logeatuta.php' />";
    }
  }

  // unique datuak ez badaude errepikatuta
  if(!$nanSartuta AND !$tlfSartuta AND !$emailSartuta){
    //datuak sartu
    $charset = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789/\\][{}\'";:?.>,<!@#$%^&*()-_=+|';
    $randStringLen = 16;

    $randString = "";
    for ($i = 0; $i < $randStringLen; $i++) {
        $randString .= $charset[mt_rand(0, strlen($charset) - 1)];
    }

    $opciones = [
      'salt' => $randString
    ];
    $pasahitzaHash = $randString.$pasahitza.$randString;
    $pasahitzaHash = hash("sha512", $pasahitzaHash);
    //datuak eguneratu
      $query = $conn->prepare("UPDATE `bezeroa` SET `izenAbizenak` = ?, `NAN` = ?, `telefonoa` = ?, `jaiotzeData` = ?, `email` = ?, `pasahitza` = ?, `salt` = ? WHERE `NAN` = ?;  ");
      $query->bind_param('ssssssss', $izena,$nan,$tlf,$jaiotze,$email,$pasahitzaHash,$randString, $_SESSION['uneko_NAN']);
      $query->execute();
      $result = $query->get_result();
      //errorerik dagoen konprobatu
    if($result != ""){
      echo"Errore bat egon da. Errorea: " . $result . "<br>" . $conn->error;
    }
    // $query = $conn->prepare("UPDATE `bezeroa` SET `izenAbizenak` = ?, `NAN` = ?, `telefonoa` = ?, `jaiotzeData` = ?, `email` = ?, `pasahitza` = ?; `salt` = ?");   
    // $query->bind_param('ssissss', $izena,$nan,$tlf,$jaiotze,$email,$pasahitzaHash,$randString);
    // $query->execute();
    // $result = $query->get_result();
    // //errorerik dagoen konprobatu
    // if($result != ""){
    //   //echo $result;
    //   echo"Errore bat egon da. Errorea: " . $result . "<br>" . $conn->error. "<br>";
    // }
    else{
      //errorerik ez badaude, sesio aldagaiak sartu eta logeatuen bistara pasatu
      $_SESSION['uneko_izena'] = $izena;
      $_SESSION['uneko_NAN'] = $nan;
      $_SESSION['uneko_tlf'] = $tlf;
      $_SESSION['uneko_jaiotze'] = $jaiotze;
      $_SESSION['uneko_email'] = $email;
      $_SESSION['uneko_pasahitza'] = $pasahitza;
      header("Location: logeatuta.php");
      // echo"Errore bat egon da. Errorea: " . $result . "<br>" . $conn->error. "<br>";
      // echo "Izena:" . $izena . "<br>";
      // echo strlen($izena) . "<br>";
      // echo "Email:" . $email;
      // header("Refresh:5; url=http://localhost:81/php/logeatuta.php", true, 303);
    }
  }
?>

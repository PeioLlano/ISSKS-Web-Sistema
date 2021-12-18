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
  $nanKonprobaketa = $conn->prepare("SELECT * FROM `bezeroa` WHERE NAN = ?; ");
  $nanKonprobaketa->bind_param('s', $nan);
  $nanKonprobaketa->execute();
  $resultnan = $nanKonprobaketa->get_result();

  $nanSartuta = 1;

  $tlfKonprobaketa = $conn->prepare("SELECT * FROM `bezeroa` WHERE telefonoa = ?; ");
  $tlfKonprobaketa->bind_param('s', $tlf);
  $tlfKonprobaketa->execute();
  $resulttlf = $tlfKonprobaketa->get_result();

  $tlfSartuta = 1;

  $emailKonprobaketa = $conn->prepare("SELECT * FROM `bezeroa` WHERE email = ?; ");
  $emailKonprobaketa->bind_param('s', $email);
  $emailKonprobaketa->execute();
  $resultemail = $emailKonprobaketa->get_result();

  $emailSartuta = 1;

  if(mysqli_num_rows($resultnan) == 0){
    $nanSartuta = 0;
  }
  else{
    echo"<script>alert('Errore bat egon da!! Dagoneko NAN hori sartuta dago')</script>","<meta http-equiv='refresh' content='0; url=../erregistratu.html' />";
  }

  if(mysqli_num_rows($resulttlf) == 0){
    $tlfSartuta = 0;
  }
  else{
    echo"<script>alert('Errore bat egon da!! Dagoneko telefono hori sartuta dago')</script>","<meta http-equiv='refresh' content='0; url=../erregistratu.html' />";
  }

  if(mysqli_num_rows($resultemail) == 0){
    $emailSartuta = 0;
  }
  else{
    echo"<script>alert('Errore bat egon da!! Dagoneko email hori sartuta dago')</script>","<meta http-equiv='refresh' content='0; url=../erregistratu.html' />";
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
    $query = $conn->prepare("INSERT INTO `bezeroa` (`izenAbizenak`, `NAN`, `telefonoa`, `jaiotzeData`, `email`, `pasahitza`, `salt`) VALUES (?,?,?,?,?,?,?); ");   
    $query->bind_param('sssssss', $izena,$nan,$tlf,$jaiotze,$email,$pasahitzaHash,$randString);
    $query->execute();
    $result = $query->get_result();

    //errorerik dagoen konprobatu
    if($result != ""){
      //echo $result;
      //echo"Errore bat egon da. Errorea: " . $result . "<br>" . $conn->error. "<br>";
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
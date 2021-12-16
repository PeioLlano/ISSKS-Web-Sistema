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
  $email = $_POST['email'];
  $pasahitza = $_POST['pasahitza'];

  //sartutako parametroak datu basean dauden parametroetako batekin bat egiten duten konprobatu
  $query = mysqli_query($conn, "SELECT * FROM `bezeroa` WHERE `email` = '$email'; ");
  $ilara = mysqli_num_rows($query);

  //bat egitekotan ilara bat izango du eta ilara horretarako
  if($ilara){
    $unekoIlara = mysqli_fetch_array( $query );

    if(hash("sha512", $unekoIlara['salt'].$pasahitza.$unekoIlara['salt']) == $unekoIlara['pasahitza']){
          // sesio aldagaiak sartu
    $_SESSION['uneko_izena'] = $unekoIlara['izenAbizenak'];
    $_SESSION['uneko_NAN'] = $unekoIlara['NAN'];
    $_SESSION['uneko_tlf'] = $unekoIlara['telefonoa'];
    $_SESSION['uneko_jaiotze'] = $unekoIlara['jaiotzeData'];
    $_SESSION['uneko_email'] = $unekoIlara['email'];
    $_SESSION['uneko_pasahitza'] = $pasahitza;

    // momentuko data baino lehenago diren erreserbak datu basetik ezabatu
    $gaur=getdate();
    $eguna = $gaur['year'] . "-" . $gaur['mon'] . "-" . $gaur['mday'];
    $ordua = $gaur['hours']+2 . ":" . $gaur['minutes'];
    mysqli_query($conn, "DELETE FROM `elementua` WHERE `data` < '$eguna' ; ");
    mysqli_query($conn, "DELETE FROM `elementua` WHERE `data` = '$eguna' AND `ordutegia` < '$ordua' ; ");
    header("Location: logeatuta.php");
    } else{
        echo hash('sha512', $unekoIlara['salt'].$pasahitza.$unekoIlara['salt']) . " " .$unekoIlara['pasahitza'];


    }

  }
  //ez badu bat egiten, jakinarazi eta bueltatu
  else{
    echo"<script language='javascript'>alert('Saio-hasiera baliogabea, saiatu berriz, mesedez.');</script>";
    echo"<meta http-equiv='refresh' content='0; url=../logIn.html' />";
  }

  mysqli_free_result($query);

?>
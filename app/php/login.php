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

  //Función para descifrar el mensaje
  function descifrar($mensaje, $llave){
    list($datos_encriptados, $inivec) = explode('::', base64_decode($mensaje), 2); //convert_uudecode() --> otra función para descifrar
    return openssl_decrypt($datos_encriptados, 'AES-256-CBC', $llave, 0, $inivec); //Método para descifrar la información
  }


  // form-etik sartu diren datuak gordetzeko
  $email = $_POST['email'];
  $pasahitza = $_POST['pasahitza'];

  //sartutako parametroak datu basean dauden parametroetako batekin bat egiten duten konprobatu
  //$query = mysqli_query($conn, "SELECT * FROM `bezeroa` WHERE `email` = '$email'; ");
  $query = $conn->prepare("SELECT * FROM `bezeroa` WHERE `email` = ?; ");
  $query->bind_param('s', $email);
  $query->execute();

  $result = $query->get_result();

  $ilaraKop = mysqli_num_rows($result);
  //echo $ilaraKop. "<br>";

  //bat egitekotan ilara bat izango du eta ilara horretarako
  if($ilaraKop){
    $unekoIlara = mysqli_fetch_array( $result );
    //$unekoilara = $result->fetch_assoc();
    //echo $unekoIlara. "<br>";
    if(hash("sha512", $unekoIlara['salt'].$pasahitza.$unekoIlara['salt']) == $unekoIlara['pasahitza']){
          // sesio aldagaiak sartu
    $_SESSION['uneko_izena'] = $unekoIlara['izenAbizenak'];
    $_SESSION['uneko_NAN'] = $unekoIlara['NAN'];
    $_SESSION['uneko_tlf'] = $unekoIlara['telefonoa'];
    $_SESSION['uneko_jaiotze'] = $unekoIlara['jaiotzeData'];
    $_SESSION['uneko_email'] = $unekoIlara['email'];
    $_SESSION['uneko_kk'] = descifrar($unekoIlara['kontuKorronte'], "ISSKS_Pentest");
    $_SESSION['uneko_pasahitza'] = $pasahitza;
    $_SESSION['denb'] = time();

    // momentuko data baino lehenago diren erreserbak datu basetik ezabatu
    $gaur=getdate();
    $eguna = $gaur['year'] . "-" . $gaur['mon'] . "-" . $gaur['mday'];
    $ordua = $gaur['hours']+2 . ":" . $gaur['minutes'];
    mysqli_query($conn, "DELETE FROM `elementua` WHERE `data` < '$eguna' ; ");
    mysqli_query($conn, "DELETE FROM `elementua` WHERE `data` = '$eguna' AND `ordutegia` < '$ordua' ; ");

    $file = fopen("login.txt", "a");
    fwrite($file, "ZUZENA --> NOR: $email || NOIZ? ". date(DATE_RFC2822) . PHP_EOL);
    fclose($file);

    header("Location: logeatuta.php");
    } else{
        //echo hash('sha512', $unekoIlara['salt'].$pasahitza.$unekoIlara['salt']) . " <br> " .$unekoIlara['pasahitza'];

        $file = fopen("login.txt", "a");
        fwrite($file, "OKERRA --> NOR: $email ||  NOIZ? ". date(DATE_RFC2822) . PHP_EOL);
        fclose($file);

        echo"<script language='javascript'>alert('Saio-hasiera baliogabea, saiatu berriz, mesedez.');</script>";
        echo"<meta http-equiv='refresh' content='0; url=../logIn.html' />";

    }

  }
  //ez badu bat egiten, jakinarazi eta bueltatu
  else{
    echo"<script language='javascript'>alert('Saio-hasiera baliogabea, saiatu berriz, mesedez.');</script>";
    echo"<meta http-equiv='refresh' content='0; url=../logIn.html' />";
  }

  mysqli_free_result($result);

?>
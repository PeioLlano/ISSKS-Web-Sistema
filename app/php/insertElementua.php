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

  // erregistroan edo sesio hasieran sortu den sesioan sartzeko;
  session_start();

  //momentuz ez denez ezer benetazkoa, monitore bat ausaz jartzeko
  function randomIzena(){
    $izenak = array('Peio','Julen','Maider','Asier','Ander','Aiala', 'Andoni', 'Miren','Claudia','Markel','Irene');
    return $izenak[rand(0,count($izenak)-1)];
  }

  //kirolaren arabera klase bat esleitzeko
  function klasea($kirola){
    $klasea = "Ez da zehazten";
    switch($kirola){
      case "Areto Futbola":
        $klasea = "P7I5";
        break;
      case "Saskibaloia":
        $klasea = "P1I1";
        break;
      case "Squash":
        $klasea = "P1I5";
        break;
      case "Igeriketa":
        $klasea = "P2I8";
        break;
      case "Gimnasioa":
        $klasea = "P1I3";
        break;
      case "Gimnasia Erritmikoa":
        $klasea = "P1I2";
        break;
    }
    return $klasea;
  }

  // form-etik sartu diren datuak gordetzeko
  $kirola = $_POST['kirola'];
  $data = $_POST['data'];
  $ordutegia = $_POST['ordutegia'];
  $monitorea = randomIzena();
  $gela = klasea($kirola);
  
  //Kirol eta egun horretan ordu hori hartuta dagoen begiratzeko
  $ordutegiKonprobaketa = mysqli_query($conn, "SELECT * FROM `elementua` WHERE `kirola` = '$kirola' AND `data` = '$data' AND `ordutegia` = '$ordutegia'; ");
  if(mysqli_num_rows($ordutegiKonprobaketa) == 0){
    //5 elementu dituen begiratzeko
    $elemKonprobaketa = mysqli_query($conn, "SELECT COUNT(*) FROM `elementua` WHERE `bezeroNAN`='" . $_SESSION['uneko_NAN'] . "'; ");
    $unekoIlara = mysqli_fetch_array($elemKonprobaketa);
    //5 elementu baino gutxiago badaude, elementua sartuko du
    if($unekoIlara['COUNT(*)'] < 5){
      $query = mysqli_query($conn, "INSERT INTO `elementua`(`kirola`, `data`, `ordutegia`, `monitorea`, `gela`, `bezeroNAN`) VALUES ('$kirola','$data','$ordutegia','$monitorea','$gela','". $_SESSION['uneko_NAN'] ."'); ");
      //errorea badago errorea imprimatu
      if(!$query){
        echo"Errore bat egon da. Errorea: " . $query . "<br>" . $conn->error;
      }
      //errorerik ez badago leku berdinera bueltatu
      else{
          echo"<script>alert('Erreserba bete da.')</script>","<meta http-equiv='refresh' content='0; url=klaseaKudeatu.php' />";
      }
    }
    //5 elementu baino gehiago badago, jakinarazi eta leku berdinera bueltatu
    else{
        echo"<script>alert('Errore bat egon da!! Dagoneko badituzu 5 erreserba eginda.')</script>","<meta http-equiv='refresh' content='0; url=klaseaKudeatu.php' />";
    }
  }
  else{
    //okupatuta badago, jakinarazi eta leku berdinera bueltatu
    echo"<script>alert('Errore bat egon da!! Dagoneko ordu hori okupatuta dago')</script>","<meta http-equiv='refresh' content='0; url=klaseaKudeatu.php' />";
  }
?>
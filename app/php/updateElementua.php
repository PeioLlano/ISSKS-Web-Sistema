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

  // textutik datuak ateratzeko metodoa
  function getBetween($string, $start = "", $end = ""){
    if (strpos($string, $start)) { // required if $start not exist in $string
        $startCharCount = strpos($string, $start) + strlen($start);
        $firstSubStr = substr($string, $startCharCount, strlen($string));
        $endCharCount = strpos($firstSubStr, $end);
        if ($endCharCount == 0) {
            $endCharCount = strlen($firstSubStr);
        }
        return substr($firstSubStr, 0, $endCharCount);
    } else {
        return '';
    }
}

  // form-etik hautatu den erreserba gordetzeko
  $erreserba = $_POST['erreserba']; //Aldatu behar den erreserba

  // textutik datuak ateratzeko
  $kirolZaharra= strtok($erreserba, ',');
  $dataZaharra=getBetween($erreserba, ', Data:', ', Ordua:');
  $ordutegiZaharra=getBetween($erreserba, ', Ordua:', '.');


  //Sartu behar diren balioak
  $kirola = $_POST['kirola'];
  $data = $_POST['data'];
  $ordutegia = $_POST['ordutegia'];
  
  // erreserba hutsa ez bada
  if($erreserba != ""){
    //Kirol eta egun horretan ordu hori hartuta dagoen begiratzeko
    $ordutegiKonprobaketa = mysqli_query($conn, "SELECT * FROM `elementua` WHERE `kirola`=$kirola AND `data`=$data AND `ordutegia`=$ordutegia; ");
    if(empty($ordutegiKonprobaketa)){
        //okupatuta ez badago, erreserba eguneratuko da
        $query = mysqli_query($conn, "UPDATE `elementua` SET `kirola`='$kirola',`data`='$data',`ordutegia`='$ordutegia' WHERE `kirola`='$kirolZaharra' AND `data`='$dataZaharra' AND `ordutegia`='$ordutegiZaharra'; ");
        if(!$query){
          echo"Errore bat egon da. Errorea: " . $query . "<br>" . $conn->error;
        }
        else{
            //errorerik ez badago leku berdinera bueltatu
            echo"<script>alert('Erreserba eguneratu da.')</script>","<meta http-equiv='refresh' content='0; url=klaseaKudeatu.php' />";
        }
    }
    else{
      //okupatuta badago, jakinarazi eta leku berdinera bueltatu
      echo"<script>alert('Errore bat egon da!! Dagoneko ordu hori okupatuta dago')</script>","<meta http-equiv='refresh' content='0; url=../klaseaSartu.html' />";
    }
  }
  else{
    //ez badago erreserbarik ezabatzeko
    echo"<script language='javascript'>alert('Ez duzu erreserbarik eguneratzeko.');</script>";
    echo"<meta http-equiv='refresh' content='0; url=klaseaKudeatu.php' />";
  }
  
?>
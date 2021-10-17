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

  $erreserba = $_POST['erreserba']; //Aldatu behar den erreserba

  $kirolZaharra= strtok($erreserba, ',');
  $dataZaharra=getBetween($erreserba, ', Data:', ', Ordua:');
  $ordutegiZaharra=getBetween($erreserba, ', Ordua:', '.');


  //Sartu behar diren balioak
  $kirola = $_POST['kirola'];
  $data = $_POST['data'];
  $ordutegia = $_POST['ordutegia'];
  
  //Kirol eta egun horretan ordu hori hartuta dagoen begiratzeko
  $ordutegiKonprobaketa = mysqli_query($conn, "SELECT * FROM `elementua` WHERE `kirola`=$kirola AND `data`=$data AND `ordutegia`=$ordutegia; ");
  if(empty($ordutegiKonprobaketa)){
      $query = mysqli_query($conn, "UPDATE `elementua` SET `kirola`='$kirola',`data`='$data',`ordutegia`='$ordutegia' WHERE `kirola`='$kirolZaharra' AND `data`='$dataZaharra' AND `ordutegia`='$ordutegiZaharra'; ");
      if(!$query){
        echo"Errore bat egon da. Errorea: " . $query . "<br>" . $conn->error;
      }
      else{
          echo"<script>alert('Erreserba eguneratu da.')</script>","<meta http-equiv='refresh' content='0; url=klaseaKudeatu.php' />";
      }
  }
  else{
    echo"<script>alert('Errore bat egon da!! Dagoneko ordu hori okupatuta dago')</script>","<meta http-equiv='refresh' content='0; url=../klaseaSartu.html' />";
  }
  
?>
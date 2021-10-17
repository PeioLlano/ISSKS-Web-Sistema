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

  $kirola = $_POST['kirola'];
  $data = $_POST['data'];
  $ordutegia = $_POST['ordutegia'];
  $monitorea = "Peio";
  $gela = "P7I5";
  
  //Kirol eta egun horretan ordu hori hartuta dagoen begiratzeko
  $ordutegiKonprobaketa = mysqli_query($conn, "SELECT * FROM `elementua` WHERE `kirola`=$kirola AND `data`=$data AND `ordutegia`=$ordutegia; ");
  if(empty($ordutegiKonprobaketa)){
    //5 elementu dituen begiratzeko
    $elemKonprobaketa = mysqli_query($conn, "SELECT COUNT(*) FROM `elementua` WHERE `bezeroNAN`=" . $_SESSION['uneko_NAN'] . "; ");
    $unekoIlara = mysqli_fetch_array($elemKonprobaketa);
    echo $unekoIlara['COUNT(*)'] ;
    if($unekoIlara['COUNT(*)'] < 5){
        $query = mysqli_query($conn, "INSERT INTO `elementua`(`kirola`, `data`, `ordutegia`, `monitorea`, `gela`, `bezeroNAN`) VALUES ('$kirola','$data','$ordutegia','$monitorea','$gela','" . $_SESSION['uneko_NAN'] . "'); ");
        if(!$query){
          echo"Errore bat egon da. Errorea: " . $query . "<br>" . $conn->error;
        }
        else{
            echo"<script>alert('Erreserba bete da.')</script>","<meta http-equiv='refresh' content='0; url=../logeatuta.html' />";
        }
    }
    else{
        echo"<script>alert('Errore bat egon da!! Dagoneko badituzu 5 erreserba eginda.')</script>","<meta http-equiv='refresh' content='0; url=../klaseaSartu.html' />";
    }
  }
  else{
    echo"<script>alert('Errore bat egon da!! Dagoneko ordu hori okupatuta dago')</script>","<meta http-equiv='refresh' content='0; url=../klaseaSartu.html' />";
  }
?>
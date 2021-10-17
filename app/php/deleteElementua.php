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

  $erreserba = $_POST['erreserba'];

  $kirola= strtok($erreserba, ',');
  $data=getBetween($erreserba, ', Data:', ', Ordua:');
  $ordutegia=getBetween($erreserba, ', Ordua:', '.');
  
  $query = mysqli_query($conn, "DELETE FROM `elementua` WHERE `kirola`='$kirola'  AND `data`='$data'  AND `ordutegia`='$ordutegia' ; ");
  echo"<script language='javascript'>alert('Erreserba ezabatua izan da.');</script>";
  echo"<meta http-equiv='refresh' content='0; url=klaseaKudeatu.php' />";

  //mysqli_free_result($query);
  
?>
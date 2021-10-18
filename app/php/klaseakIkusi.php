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
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="with=device-width, initial-scale=1.0">
        <title>JP Polikiroldegia</title>
        <link rel="icon" type="image/png" href="https://img.icons8.com/glyph-neue/64/000000/basketball.png" />	
        <link rel="stylesheet" href="../css/styleL.css">
        <!--Letra mota aldatu ahal izateko-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;300&display=swap" rel="stylesheet"> 
        <!--Letra mota aldatu ahal izateko-->
    </head>
    <body>
        <section class="header">
            <nav>
                <a href="../index.html"><img src="../images/logo.png" ></a>
                <div class="nav-links">
                    <ul>
                        <li><a href="klaseaKudeatu.php">Klasea erreserbatu</a></li>
                        <li><a href="klaseakIkusi.php">Klaseak Ikusi</a></li>
                        <li><a href="logeatuta.php">Nire Kontua</a></li>
                        <li><a href="itxiSesioa.php">Itxi sesioa</a></li>
                    </ul>
                </div>
            </nav>

            <div class="text-box">
                <h1>Klaseak Ikusi</h1>
                <p> Hemen erreserbatuta dituzun klaseak ikusi ahal izango dituzu.</p>
            </div>
        </section>
        
        <section class="erreserbaZer">
            <!--<table border=2px>-->
            <table>
                <?php
                    //Uneko erabiltzaileak dituen erreserbak pantailaratzeko
                    $elementuKontsulta = mysqli_query($conn, "SELECT * FROM `elementua` WHERE `bezeroNAN`='" . $_SESSION['uneko_NAN'] . "'; ");
                    if(mysqli_num_rows($elementuKontsulta) != 0){
                        echo
                        "<tr>
                        <td><b>Kirola</b></td>
                        <td><b>Data</b></td>
                        <td><b>Ordutegia</b></td>
                        <td><b>Monitorea</b></td>
                        <td><b>Gela</b></td>
                        </tr>";
                        while ($ilara = mysqli_fetch_array($elementuKontsulta)) {  
                            echo
                            "<tr>
                            <td>{$ilara['kirola']}</td>
                            <td>{$ilara['data']}</td>
                            <td>{$ilara['ordutegia']}</td>
                            <td>{$ilara['monitorea']}</td>
                            <td>{$ilara['gela']}</br></td>
                            </tr>";  
                        }
                    }
                    else{
                        echo"<p>Ez duzu klase erreserbaturik, nahi izatekotan joan klaseak kudeatu atalera eta klaseak klaseak erreserbatu.</p>";
                    }
                    
                ?>            
            </table>   
        </section>
	</body>
</html>
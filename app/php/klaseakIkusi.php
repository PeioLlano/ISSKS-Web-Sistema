<?php

    session_start();

    if(isset($_SESSION['tiempo']) ) {

        $inactivo = 60;//1min en este caso.

        $vida_session = time() - $_SESSION['tiempo'];

            if($vida_session > $inactivo)
            {

                session_unset();
                session_destroy();              
                //Berbideratu.
                echo"<script>alert('Jarduera eza dela eta, sesio itxi egin dar. Berriz sesioa hasi.')</script>","<meta http-equiv='refresh' content='0; url=../index.html' />";


                exit();
            } else {  
                $_SESSION['tiempo'] = time();
            }


    } else {
        $_SESSION['tiempo'] = time();
    }
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


?>
<!DOCTYPE html>
<html>
    <head>
    <!--Web orriaren hainbat datu (izenburua, logoa) eta itxura emateko script-ak-->
        <meta name="viewport" content="with=device-width, initial-scale=1.0">
        <title>JP Polikiroldegia</title>
        <link rel="icon" type="image/png" href="https://img.icons8.com/glyph-neue/64/000000/basketball.png" />	
        <link rel="stylesheet" href="../css/styleL.css">
        <link rel="stylesheet" href="../css/styleF.css">
        <!--Letra mota aldatu ahal izateko-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;300&display=swap" rel="stylesheet"> 
        <!--Footer-ean erabili diren logoak erabiltzeko-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body>
    <!--Web orriaren goialdean agertzen den menua sortzeko-->        
        <section class="header">
            <nav>
                <a href="../index.html"><img src="../images/logo.png" alt='JP kiroldegiko logoa.'></a>
                <div class="nav-links">
                    <ul>
                        <li><a href="klaseaKudeatu.php">Klaseak kudeatu</a></li>
                        <li><a href="klaseakIkusi.php">Klaseak Ikusi</a></li>
                        <li><a href="logeatuta.php">Nire Kontua</a></li>
                        <li><a href="itxiSesioa.php">Itxi sesioa</a></li>
                    </ul>
                </div>
            </nav>
        <!--Erreserbatutako klaseen taularen gainean ageri den testua idazteko-->
            <div class="text-box">
                <h1>Klaseak Ikusi</h1>
                <p> Hemen erreserbatuta dituzun klaseak ikusi ahal izango dituzu.</p>
            </div>
        </section>
        
        <!--Taula dinamikoki sortzeko, bezeroak dituen klaseen araberakoa-->
        <section class="erreserbaZer">
            <table>
                <?php
                    //Uneko erabiltzaileak dituen erreserbak pantailaratzeko
                    $elementuKontsulta = mysqli_query($conn, "SELECT * FROM `elementua` WHERE `bezeroNAN`='" . $_SESSION['uneko_NAN'] . "'; ");
                    if(mysqli_num_rows($elementuKontsulta) != 0){
                        echo
                        "<thead>
                            <tr>
                                <td><b>Kirola</b></td>
                                <td><b>Data</b></td>
                                <td><b>Ordutegia</b></td>
                                <td><b>Monitorea</b></td>
                                <td><b>Gela</b></td>
                            </tr>
                        </thead>";
                        echo
                        "<tbody>";
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
                        echo 
                        "</tbody>";
                    }
                    else{
                        echo"<p>Ez duzu klase erreserbaturik, nahi izatekotan joan klaseak kudeatu atalera eta klaseak klaseak erreserbatu.</p>";
                        echo"<img src='../images/arazoLogoa.webp' alt='Arazo irudia.' width=400px height=400px>";
                    }
                    
                ?>            
            </table>   
        </section>
        <!--------------------  Footer* --------------------->
        <section class="footer">
            <div class="social">
                <a href=""><i class="fab fa-instagram"></i></a>
                <a href=""><i class="fab fa-twitter"></i></a>
                <a href=""><i class="fab fa-snapchat"></i></a>
                <a href=""><i class="fab fa-facebook"></i></a>
                <a href=""><i class="fab fa-linkedin"></i></a>
            </div>
    
            <ul class="list">
                <li><a href="klaseaKudeatu.php">Klaseak kudeatu</a></li>
                <li><a href="klaseakIkusi.php">Klaseak ikusi</a></li>
                <li><a href="logeatuta.php">Nire Kontua</a></li>
                <li><a href="itxiSesioa.php">Itxi Sesioa</a></li>
            </ul>
        </section>
        <!--------------------  Footer* --------------------->
	</body>
</html>
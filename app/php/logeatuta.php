<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <script language="JavaScript" type="text/javascript" src="../js/erregistratu.js"></script>
        <meta name="viewport" content="with=device-width, initial-scale=1.0">
        <title>JP Polikiroldegia</title>
        <link rel="icon" type="image/png" href="https://img.icons8.com/glyph-neue/64/000000/basketball.png" />	
        <link rel="stylesheet" href="../css/styleE&LI.css">
        <link rel="stylesheet" href="../css/styleF.css">
        <meta charset="UTF-8">
        <!--Letra mota aldatu ahal izateko-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;300&display=swap" rel="stylesheet"> 
        <!--Letra mota aldatu ahal izateko-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body>
        <section class="header">
            <nav>
                <a href="../index.html"><img src="../images/logo.png" ></a>
                <div class="nav-links">
                    <ul>
                        <li><a href="klaseaKudeatu.php">Klaseak kudeatu</a></li>
                        <li><a href="klaseakIkusi.php">Klaseak Ikusi</a></li>
                        <li><a href="logeatuta.php">Nire Kontua</a></li>
                        <li><a href="itxiSesioa.php">Itxi sesioa</a></li>
                    </ul>
                </div>
            </nav>

            <div class="text-box">
                <?php
                    if(isset($_SESSION['uneko_izena'])){
                        echo '<h1>Ongi etorri ' . $_SESSION['uneko_izena'] . '!</h1>';
                        echo "<p> Hemen zure informazioa eguneratu ahalko duzu.</p>";
                    }
                    else{
                        echo '<h1>Ez dago sesiorik irekita!</h1>';
                    }
                ?>
            </div>
        </section>
        <section class="erregistroa">
            <form class="formularioa" id="form" method="post" action="eguneratu.php">
                <?php
                    echo '<input class="textBoxBakoitza" type="text" value="' . $_SESSION['uneko_izena'] .'" id="izena" name="izena" placeholder="Zure izen-abizenak sartu (Adb: Jon Llano Fuentes)"><br>';
                    echo '<input class="textBoxBakoitza" type="text" id="nan" value="' . $_SESSION['uneko_NAN'] . '" name="nan" placeholder="Zure NAN-a sartu (Adb: 12345678X)"><br>';
                    echo '<input class="textBoxBakoitza" type="text" id="tlf" value="' . $_SESSION['uneko_tlf'] . '" name="tlf" placeholder="Zure telefonoa sartu (Adb: 654789987)"><br>';
                    echo '<input class="textBoxBakoitza" type="text" id="jaiotze" value="' . $_SESSION['uneko_jaiotze'] . '" name="jaiotze" placeholder="Zure jaiotze data sartu (Adb: 1943-02-02)"><br>';
                    echo '<input class="textBoxBakoitza" type="email" id="email" value="' . $_SESSION['uneko_email'] . '" name="email" placeholder="Zure emaila sartu (Adb: fuentesllano@gmail.com)"><br>';
                    echo '<input class="textBoxBakoitza" type="password" id="pasahitza" value="' . $_SESSION['uneko_pasahitza'] . '" name="pasahitza" placeholder="Zure pasahitza sartu (6-20 karaktere)"><br>';
                    echo '<input class="textBoxBakoitza" type="password" id="repPasahitza" value="' . $_SESSION['uneko_pasahitza'] . '" name="repPasahitza" placeholder="Zure pasahitza berriro sartu"><br>';
                    echo '<button onclick="datuakKonprobatu(event);" class="botoia">Eguneratu </button>';
                ?>
            </form>
        </section>
        <!--------------------  Footer* --------- ----------->
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
        <!--------------------  Footer* --------- ----------->
	</body>
</html>
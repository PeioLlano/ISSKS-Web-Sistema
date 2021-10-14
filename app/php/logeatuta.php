<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <script language="JavaScript" type="text/javascript" src="../js/erregistratu.js"></script>
        <meta name="viewport" content="with=device-width, initial-scale=1.0">
        <title>JP Polikiroldegia</title>
        <link rel="icon" type="image/png" href="https://img.icons8.com/glyph-neue/64/000000/basketball.png" />	
        <link rel="stylesheet" href="../css/styleE&LI.css">
        <meta charset="UTF-8">
        <!--Letra mota aldatu ahal izateko-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;300&display=swap" rel="stylesheet"> 
        <!--Letra mota aldatu ahal izateko-->
    </head>
    <body>
        <section class="header">
            <nav>
                <a href="index.html"><img src="../images/logo.png" ></a>
                <div class="nav-links">
                    <ul>
                        <li><a href="../klaseaSartu.html">Klasea erreserbatu</a></li>
                        <li><a href="../klaseakIkusi.html">Klaseak Ikusi</a></li>
                        <li><a href="logeatuta.php">Nire Kontua</a></li>
                        <li><a href="itxiSesioa.php">Itxi sesioa</a></li>
                    </ul>
                </div>
            </nav>

            <div class="text-box">
                <?php
                    if(isset($_SESSION['uneko_erabiltzaile'])){
                        echo '<h1>Ongi etorri ' . $_SESSION['uneko_erabiltzaile'] . '!</h1>';
                        echo "<p> Hemen zure informazioa eguneratu ahalko duzu.</p>";
                    }
                    else{
                        echo '<h1>Ez dago sesiorik irekita!</h1>';
                    }
                ?>
            </div>
        </section>
        <section class="erregistroa">
            <form class="formularioa" id="form" method="post" action="php/erregistratu.php">
                <input class="textBoxBakoitza" type="text" value="Peio" id="izena" name="izena" placeholder="Zure izen-abizenak sartu"><br>
                <input class="textBoxBakoitza" type="text" id="nan" name="nan" placeholder="Zure NAN-a sartu"><br>
                <input class="textBoxBakoitza" type="text" id="tlf" name="tlf" placeholder="Zure telefonoa sartu"><br>
                <input class="textBoxBakoitza" type="text" id="jaiotze" name="jaiotze" placeholder="Zure jaiotze data sartu"><br>
                <input class="textBoxBakoitza" type="email" id="email" name="email" placeholder="Zure emaila sartu"><br>
                <input class="textBoxBakoitza" type="password" id="pasahitza" name="pasahitza" placeholder="Zure pasahitza sartu"><br>
                <input class="textBoxBakoitza" type="password" id="repPasahitza" name="repPasahitza" placeholder="Zure pasahitza berriro sartu"><br>
                <button onclick="datuakKonprobatu(event);" class="botoia">Eguneratu </button>
            </form>
        </section>
	</body>
</html>
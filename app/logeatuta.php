<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="with=device-width, initial-scale=1.0">
        <title>JP Polikiroldegia</title>
        <link rel="icon" type="image/png" href="https://img.icons8.com/glyph-neue/64/000000/basketball.png" />	
        <link rel="stylesheet" href="css/styleL.css">
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
                <a href="index.html"><img src="images/logo.png" ></a>
                <div class="nav-links">
                    <ul>
                        <li><a href="klaseaSartu.html">Klasea erreserbatu</a></li>
                        <li><a href="klaseakIkusi.html">Klaseak Ikusi</a></li>
                        <li><a href="logeatuta.html">Nire Kontua</a></li>
                        <li><a href="index.html">Itxi sesioa</a></li>
                    </ul>
                </div>
            </nav>

            <div class="text-box">
                <?php
                    if(isset($_SESSION['uneko_erabiltzaile'])){
                        echo '<h1>Ongi etorri' . $_SESSION['uneko_erabiltzaile'] . '!</h1>';
                        echo "<p> Hemen zure informazioa eskuragarri izango duzu.</p>";
                    }
                    else{
                        echo 'no funciona';
                    }
                ?>
            </div>
	</body>
</html>
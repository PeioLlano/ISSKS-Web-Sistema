<?php
 
    session_start();
    
    // At the top of page right after session_start();
    if (isset($_SESSION["locked"]))
    {
        $difference = time() - $_SESSION["locked"];
        if ($difference > 10)
        {
            unset($_SESSION["locked"]);
            unset($_SESSION["login_attempts"]);
            header("Refresh:0"); //esto lo he puesto yo, pero creo que no tiene porque dar problemas
        }
    }

?>

<!DOCTYPE html>
<html>
<!--Egileak: Julen Fuentes eta Peio Llano-->

<head>
    <!--Web orriaren hainbat datu (izenburua, logoa) eta itxura emateko script-ak-->
    <meta name="viewport" content="with=device-width, initial-scale=1.0">
    <title>JP Polikiroldegia</title>
    <link rel="icon" type="image/png" href="https://img.icons8.com/glyph-neue/64/000000/basketball.png" />
    <link rel="stylesheet" href="css/styleE&LI.css">
    <link rel="stylesheet" href="css/styleF.css">
    <meta charset="UTF-8">
    <!--Letra mota aldatu ahal izateko-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;300&display=swap" rel="stylesheet">
    <!--Footer-ean erabili diren logoak erabiltzeko-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer"
    />
</head>

<body>
    <!--Web orriaren goialdean agertzen den menua sortzeko-->
    <section class="header">
        <nav>
            <a href="index.html"><img src="images/logo.png" alt='JP kiroldegiko logoa.'></a>
            <div class="nav-links">
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="erregistratu.html">Erregistratu</a></li>
                    <li><a href="logInItxura.php">Log In</a></li>
                    <li><a href="guriBuruz.html">Guri buruz</a></li>
                </ul>
            </div>
        </nav>
        <!--Testu-eremuen gainean ageri den testua idazteko-->
        <div class="text-box">
            <h1>Log In</h1>
            <p> Sartu zure datuak Log In-a betetzeko.</p>
        </div>
    </section>
    <!--Bete beharreko testu-eremuak eta botoiak sortzeko. Informazioa "login.php" fitxategira bidaliko da-->
    <section class="erregistroa">
        <form class="formularioa" id="form" method="post" action="php/login.php">
            <input class="textBoxBakoitza" type="email" name="email" placeholder="Zure emaila sartu"><br>
            <input class="textBoxBakoitza" type="password" name="pasahitza" placeholder="Zure pasahitza sartu"><br>
            <?php 
            
            if ($_SESSION["login_attemps"]>2){
                $_SESSION["locked"] = time();
                echo "<p> Itxaron 10 segundo mesedez. </p>";
            }else{
            ?>
                <button type="reset" class="botoia">Ezabatu</button>
                <button type="submit" class="botoia">Sartu </button>
            <?php } ?>
        </form>
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
            <li><a href="index.html">Home</a></li>
            <li><a href="erregistratu.html">Erregistratu</a></li>
            <li><a href="logInItxura.php">LogIn</a></li>
            <li><a href="guriBuruz.html">Guri Buruz</a></li>
        </ul>
    </section>
    <!--------------------  Footer* --------------------->
</body>

</html>
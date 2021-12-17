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
?>
<!DOCTYPE html>
<html>
    <head>
    <!--Web orriaren hainbat datu (izenburua, logoa) eta itxura emateko script-ak-->
        <meta name="viewport" content="with=device-width, initial-scale=1.0">
        <title>JP Polikiroldegia</title>
        <link rel="icon" type="image/png" href="https://img.icons8.com/glyph-neue/64/000000/basketball.png" />	
        <link rel="stylesheet" href="../css/styleKK.css">
        <link rel="stylesheet" href="../css/styleF.css">
        <meta charset="UTF-8">
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
                        <li><a href="klaseakIkusi.php">Klaseak ikusi</a></li>
                        <li><a href="logeatuta.php">Nire Kontua</a></li>
                        <li><a href="itxiSesioa.php">Itxi sesioa</a></li>
                    </ul>
                </div>
            </nav>
        <!--Bete beharreko eremuen gainean ageri den testua idazteko (Klaseak Sartu)-->
            <div class="text-box">
                <h1>Klaseak Sartu</h1>
                <p> Hemen nahi dituzun erreserbak osatu ahalko dituzu.</p>
            </div>
        </section>
        <!--Bete beharreko eremuak eta botoiak sortzeko-->
        <section class="sartu">
            <form class="formularioa" id="form" method="post" action="insertElementua.php">
                <label class="label" for="kirola">Kirola hautatu:</label>

                <select class="select" name="kirola" id="kirola" required>
                  <option value="Areto Futbola">Areto futbola</option>
                  <option value="Saskibaloia">Saskibaloia</option>
                  <option value="Igeriketa">Igeriketa</option>
                  <option value="Gimnasioa">Gimnasioa</option>
                  <option value="Squash">Squash</option>
                  <option value="Gimnasia Erritmikoa">Gimnasia Erritmikoa</option>
                </select> 
                </select> 

                <br>

                <label class="label" for="data">Data:</label>

                <input class="data" type="date" id="data" name="data"
                    min="<?php echo date("Y-m-d");?>" max="2050-12-31" required>

                <br>

                <label class="label" for="ordua">Ordua:</label>
                <select class="select" id="ordutegia" name="ordutegia" required>
                  <option value="08:00-09:00">08:00-09:00</option>
                  <option value="09:00-10:00">09:00-10:00</option>
                  <option value="10:00-11:00">10:00-11:00</option>
                  <option value="11:00-12:00">11:00-12:00</option>
                  <option value="12:00-13:00">12:00-13:00</option>
                  <option value="13:00-14:00">13:00-14:00</option>   
                  <option value="16:00-17:00">16:00-17:00</option>
                  <option value="17:00-18:00">17:00-18:00</option> 
                  <option value="18:00-19:00">18:00-19:00</option> 
                  <option value="19:00-20:00">19:00-20:00</option>
                  <option value="20:00-21:00">20:00-21:00</option>               
                </select> 
                
                <br>

                <button type="reset" class="botoia">Ezabatu</button>
                <button class="botoia">Erreserbatu </button>
            </form>
        </section>
        <!--Bete beharreko eremuen gainean ageri den testua idazteko (Klaseak Ezabatu)-->
        <section class="ezabatu">
            <div class="ezabatu_goiburu">
                    <h1>Klaseak Kendu</h1>
                    <p> Hemen nahi dituzun erreserbak kendu ahalko dituzu.</p>
            </div>
        <!--Bete beharreko eremuak eta botoiak sortzeko-->
            <form class="formularioa" id="form" method="post" action="deleteElementua.php">
                <label class="labelEz" for="erreserba">Erreserba hautatu:</label>

                <select class="select" name="erreserba" id="erreserba">
                    <?php
                        $query = mysqli_query($conn, "SELECT * FROM `elementua` WHERE `bezeroNAN` = '" . $_SESSION['uneko_NAN'] . "' ; ");

                        if (mysqli_num_rows($query) > 0) {
                            while($ilara = mysqli_fetch_assoc($query)){
                                echo "<option value='" . $ilara["kirola"] . ", Data:" . $ilara["data"] . ", Ordua:". $ilara["ordutegia"] . ".'>" . $ilara["kirola"] . " --> " . $ilara["data"] . "-ean ". $ilara["ordutegia"] . " bitartean</option>";
                            }   
                        } else {
                            echo "<option value=' '>Ez duzu klase erreserbaturik.</option>";
                        }
                    ?>
                </select> 
                <br>

                <button type="reset" class="botoia">Ezabatu</button>
                <button class="botoia">Erreserba kendu </button>
            </form>
        </section>
        <!--Bete beharreko eremuen gainean ageri den testua idazteko (Klaseak Eguneratu)-->
        <section class="eguneratu">
            <div class="eguneratu_goiburu">
                    <h1>Klaseak Eguneratu</h1>
                    <p> Hemen nahi dituzun erreserbak eguneratu ahalko dituzu.</p>
            </div>
        <!--Bete beharreko eremuak eta botoiak sortzeko-->
            <form class="formularioa" id="form" method="post" action="updateElementua.php">
                <label class="label" for="kirola">Erreserba hautatu:</label>

                <select class="select" name="erreserba" id="erreserba">
            
                    <?php
                        $query = mysqli_query($conn, "SELECT * FROM `elementua` WHERE `bezeroNAN` = '" . $_SESSION['uneko_NAN'] . "' ; ");

                        if (mysqli_num_rows($query) > 0) {
                            while($ilara = mysqli_fetch_assoc($query)){
                                echo "<option value='" . $ilara["kirola"] . ", Data:" . $ilara["data"] . ", Ordua:". $ilara["ordutegia"] . ".'>" . $ilara["kirola"] . " --> " . $ilara["data"] . "-ean ". $ilara["ordutegia"] . " bitartean</option>";
                            }   
                        } else {
                            echo "<option value=' '>Ez duzu klase erreserbaturik.</option>";
                        }
                    ?>
                </select>
                <div class="iruzkina"> 
                    <p>-------------------------------- Hautatutako erreserba eguneratzeko. --------------------------------</p>
                </div>
                <br>
                <label class="label" for="kirola">Kirola hautatu:</label required>

                <select class="select" name="kirola" id="kirola">
                  <option value="Areto Futbola">Areto futbola</option>
                  <option value="Saskibaloia">Saskibaloia</option>
                  <option value="Igeriketa">Igeriketa</option>
                  <option value="Gimnasioa">Gimnasioa</option>
                  <option value="Squash">Squash</option>
                  <option value="Gimnasia Erritmikoa">Gimnasia Erritmikoa</option>
                </select> 

                <br>

                <label class="label" for="data">Data:</label>

                <input class="data" type="date" id="data" name="data"
                min="<?php echo date("Y-m-d");?>" max="2050-12-31" required>

                <br>

                <label class="label" for="ordua">Ordua:</label>
                <select class="select" id="ordutegia" name="ordutegia" required>
                  <option value="08:00-09:00">08:00-09:00</option>
                  <option value="09:00-10:00">09:00-10:00</option>
                  <option value="10:00-11:00">10:00-11:00</option>
                  <option value="11:00-12:00">11:00-12:00</option>
                  <option value="12:00-13:00">12:00-13:00</option>
                  <option value="13:00-14:00">13:00-14:00</option>   
                  <option value="16:00-17:00">16:00-17:00</option>
                  <option value="17:00-18:00">17:00-18:00</option> 
                  <option value="18:00-19:00">18:00-19:00</option> 
                  <option value="19:00-20:00">19:00-20:00</option>
                  <option value="20:00-21:00">20:00-21:00</option>               
                </select> 
                
                <br>

                <button type="reset" class="botoia">Ezabatu</button>
                <button class="botoia">Eguneratu </button>
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
                <li><a href="klaseaKudeatu.php">Klaseak kudeatu</a></li>
                <li><a href="klaseakIkusi.php">Klaseak ikusi</a></li>
                <li><a href="logeatuta.php">Nire Kontua</a></li>
                <li><a href="itxiSesioa.php">Itxi Sesioa</a></li>
            </ul>
        </section>
        <!--------------------  Footer* --------------------->
	</body>
</html>
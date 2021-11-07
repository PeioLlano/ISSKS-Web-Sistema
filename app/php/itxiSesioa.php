<?php
  /*Egileak:
            Julen Fuentes
            Peio Llano
  */

    // erregistroan edo sesio hasieran sortu den sesioan sartzeko;
    session_start();
    // sesioa bukatu eta sesio aldagaiak ezabatu
    session_destroy();
    //index-era joan
    header("Location: ../index.html")
?>
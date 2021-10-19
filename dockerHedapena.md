# Proiektua docker bidez hedatzeko argibideak

![](https://marcas-logos.net/wp-content/uploads/2020/03/DOCKER-LOGO.png)

##  1. Docker proiektuaren oinarrizko egitura eskuratzea

Horretarako komando lerroa ireki eta proiektua sortu nahi den katalogora mugitu behar da (cd agindua erabiliz). Behin katalogoan sartuta, irakasgaia honetako 0. laborategian erabilitako GitHub biltegi bera klonatuko dugu honako agindu hau erabiliz: 

`$ git clone https://github.com/mikel-egana-aranguren/docker-lamp/ `

Agindu honen ostean "docker-lamp" izeneko katalogo bat sortuko da, honako egitura izango duena eta proiektuan hainbat zerbitzu erabiltzeko baliagarria izango dena:

########
![](Aquí va el link de la imagen dockerHedapena1.png)
########

##  2. Proiektua docker bidez hedatu

  1. docker-lamp katalogoan sartu
  2. "web" izena duen irudia eraiki. Horretarako:
  
  `$ docker build -t="web" . `
  
  3. Zerbitzuak aktibatu hurrengo aginduarekin:
  
  `$ docker-compose up `
  
  4. Nahi duzun web nabigatzailea ireki eta  http://localhost:81 bilatu.
  ########
![](Podemos explicar como hacerlo con Visual Studio)
########
  5. Beharrezko datuak sartzeko, http://localhost:8890/ orrialdera jo eta han erabiltzailea eta pasahitza sartu (erabiltzailea: admin; pasahitza: test)
    ########
![](Captura de cuando entras al puerto 8890)
########
 Datuak sartu ondoren "database” sakatu eta gero “import", hor docker-lamp/database.sql artxiboa hautatu. 
 
  6. Begiratu http://localhost:81, informazio gehiago eduki beharko luke. 
  7. Zerbitzuak eteteko, beste terminal batean, $ docker-compose down  


  

Egileak: Peio Llano eta Julen Fuentes

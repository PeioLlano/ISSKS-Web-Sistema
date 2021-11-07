# Proiektua docker bidez hedatzeko argibideak

![](https://marcas-logos.net/wp-content/uploads/2020/03/DOCKER-LOGO.png)

##  1. Docker proiektuaren oinarrizko egitura eskuratzea

Horretarako komando lerroa ireki eta proiektua sortu nahi den katalogora mugitu behar da (cd agindua erabiliz). Behin katalogoan sartuta, gure proiektuko GitHub biltegia klonatuko dugu honako agindu hau erabiliz: 

`$ git clone https://github.com/PeioLlano/ISSKS-Web-Sistema.git `

Agindu honen ostean "ISSKS-Web-Sistema" izeneko katalogo bat sortuko da, honako egitura izango duena eta proiektuan hainbat zerbitzu erabiltzeko baliagarria izango dena:

![](https://github.com/PeioLlano/ISSKS-Web-Sistema/blob/main/app/images/dockerHedapena1.png)

##  2. Proiektua docker bidez hedatu

  1. "ISSKS-Web-Sistema" katalogoan sartu
  2. "web" izena duen irudia eraiki. Horretarako:
  
  `$ docker build -t="web" . `
  
  3. Zerbitzuak aktibatu hurrengo aginduarekin:
  
  `$ docker-compose up `
  
  4. Beharrezko datuak sartzeko, http://localhost:8890/ orrialdera jo eta han erabiltzailea eta pasahitza sartu (erabiltzailea: admin; pasahitza: test)
  
  ![](https://github.com/PeioLlano/ISSKS-Web-Sistema/blob/main/app/images/d3.png)
  
  Datuak sartu ondoren "database” sakatu eta gero “import", hor docker-lamp/database.sql fitxategia hautatu.
  
  ![](https://github.com/PeioLlano/ISSKS-Web-Sistema/blob/main/app/images/d4.png)
  
  5. Nahi duzun web nabigatzailea ireki eta  http://localhost:81 bilatu.
  
  ![](https://github.com/PeioLlano/ISSKS-Web-Sistema/blob/main/app/images/d2.png)
 
  6. Zerbitzuak eteteko, beste terminal batean, $ docker-compose down  


  

Egileak: Peio Llano eta Julen Fuentes

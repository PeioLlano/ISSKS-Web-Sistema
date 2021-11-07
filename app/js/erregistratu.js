 //Egileak: Julen Fuentes eta Peio Llano
 function datuakKonprobatu(evt) {
     evt.preventDefault()
     if (!izenaKonprobatu(document.getElementById('izena').value)) {
         return;
     }
     if (!nanKonprobatu(document.getElementById('nan').value)) {
         return;
     }
     if (!tlfKonprobatu(document.getElementById('tlf').value)) {
         return;
     }
     if (!dataKonprobatu(document.getElementById('jaiotze').value)) {
         return;
     }
     if (!emailaKonprobatu(document.getElementById('email').value)) {
         return;
     }
     if (document.getElementById('pasahitza').value != document.getElementById('repPasahitza').value) {
         alert('Sartutako pasahitzak ez dira berdinak.');
         return;
     }
     if (!pasahitzaKonprobatu(document.getElementById('pasahitza').value)) {
         return;
     }
     document.getElementById('form').submit();
 }


 function izenaKonprobatu(pIzena) {
     if (pIzena.length == 0) {
         alert('Ez duzu izenik sartu');
         return false;
     } else {
         return true;
     }
 }

 function nanKonprobatu(pNAN) {
     var formatua;
     formatua = /^\d{8}[a-zA-Z]$/;

     if (formatua.test(pNAN)) {
         zenb = pNAN.substr(0, pNAN.length - 1);
         letr = pNAN.substr(pNAN.length - 1, 1);
         zenb = zenb % 23;
         letra = 'TRWAGMYFPDXBNJZSQVHLCKET'
         letra = letra.substring(zenb, zenb + 1)
         if (letra != letr.toUpperCase()) {
             alert('Sartutako NAN-a ez da existitzen.');
             return false;
         } else {
             return true;
         }
     } else {
         alert('NAN formatu okerra sartu duzu.');
         return false;
     }
 }


 function dataKonprobatu(pData) {
     var dataFormatua = /^\d{2,4}\-\d{1,2}\-\d{1,2}$/;
     if (dataFormatua.test(pData)) {
         return true;
     } else {
         alert("Data formatu okerra sartu duzu.");
         return false;
     }
 }

 function tlfKonprobatu(pTlf) {
     var formatua;
     formatua = /^\d{9}$/;

     if (formatua.test(pTlf)) {
         return true;
     } else {
         alert('Telefono zenbaki okerra sartu duzu.');
         return false;
     }
 }

 function emailaKonprobatu(pEmail) {
     var formatua;
     formatua = /^([\da-z_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;
     if (formatua.test(pEmail)) {
         return true;
     } else {
         alert("Email helbide okerra sartu duzu.");
         return false;
     }
 }

 function pasahitzaKonprobatu(pPasahitza) {
     if (pPasahitza.length <= 5 || pPasahitza.length > 20) {
         alert('Pasahitzek ez dute formatu zuzena betetzen.');
         return false;
     } else {
         return true;
     }
 }

 function myFunction() {
     document.getElementById("demo").innerHTML = "Hello World";
 }
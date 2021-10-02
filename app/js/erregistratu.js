 function datuakKonprobatu() {
  if(!izenaKonprobatu(document.getElementsByName('izena').value)) {
    return;
  }
  if(!nanKonprobatu(document.getElementsByName('NAN').value)){
    return;
  }
  if(!tlfKonprobatu(document.getElementsByName('tlf').value)){
    return;
  }
  if(!dataKonprobatu(document.getElementsByName('jaiotze').value)){
    return;
  }
  if(!tlfKonprobatu(document.getElementsByName('email').value)){
    return;
  }
  if(document.getElementsByName('pasahitza')==document.getElementsByName('repPasahitza')){
    alert('Sartutako pasahitzak ez dira berdinak.');
    return;
  }
  alert('Datu guztiak zuzen');
  this.submit();
}


function izenaKonprobatu(pIzena) {
  if(izena.length == 0) {
    alert('Ez duzu izenik sartu');
    return false;
  }
  else{
    return true;
  }
}

function nanKonprobatu(pNAN) {
  var formatua;
  formatua = /^\d{8}[a-zA-Z]$/;

  if (formatua.test(pNAN)) {
    zenb = pNAN.substr(0,pNAN.length-1);
    letr = pNAN.substr(pNAN.length-1,1);
    zenb= zenb % 23;
    letra='TRWAGMYFPDXBNJZSQVHLCKET'
    letra=letra.substring(zenb,zenb+1)
    if(letra!=letr.toUpperCase()){
      alert('Sartutako NAN-a ez da existitzen.');
      return false;
    }
    else{
      return true;
    }
  }
  else{
    alert('NAN formatu okerra sartu duzu.');
    return false;
  }
}


function dataKonprobatu(pData) {
  var dataFormatua = /^\d{2,4}\-\d{1,2}\-\d{1,2}$/;
  if (dataFormatua.test(pData)) {
      return true;
  }
  else{
    alert("Data formatu okerra sartu duzu.");
    return false;
  }
}

function tlfKonprobatu(pTlf) {
  if(pTlf.length == 9 && pTlf.isInteger()) {
    return true;
  }
  else{
    alert('Telefono zenbaki okerra sartu duzu.');
    return false;
  }
}

function emailaKonprobatu(pEmail) {
  if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3,4})+$/.test(pEmail)){
   return true;
  } else {
   alert("Email helbide okerra sartu duzu.");
   return false;
  }
}
  
 function datuakKonprobatu() {
  if(!izenaKonprobatu(document.getElementsByName('izena').value)) {
    return
  }
  if(!nanKonprobatu(document.getElementsByName('NAN').value)){
    return;
  }
  if(!tlfKonprobatu(document.getElementsByName('tlf').value))
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

function tlfKonprobatu(pTlf) {
  if(pTlf.length == 9 && pTlf.isInteger()) {
    return true;
  }
  else{
    alert('Telefono okerra sartu duzu.');
    return false;
  }
}
  
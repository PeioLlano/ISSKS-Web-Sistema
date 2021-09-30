document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("form").addEventListener('submit', datuakKonprobatu); 
  });
  
  function datuakKonprobatu(evento) {
    evento.preventDefault();
    var izena = document.getElementsByName('izena').value;
    if(izena.length != 0) {
      alert('Ez duzu izenik sartu');
      return;
    }
    var NAN = document.getElementsByName('NAN').value;
    var formatua;
    formatua = /^\d{8}[a-zA-Z]$/;

    if (formatua.test(NAN)) {
      zenb = NAN.substr(0,NAN.length-1);
      letr = NAN.substr(NAN.length-1,1);
      zenb= zenb % 23;
      letra='TRWAGMYFPDXBNJZSQVHLCKET'
      letra=letra.substring(zenb,zenb+1)
      if(letra!=letr.toUpperCase()){
        alert('SArtutako NAN-a ez da existitzen.');
      return;
      }
      else{

      }
    }
    else{
      alert('NAN formatu okerra sartu duzu.');
      return;
    }
    this.submit();
  }
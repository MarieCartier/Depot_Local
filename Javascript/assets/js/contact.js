var societe = new RegExp("^[A-Za-z]+$");

var filtreSoc= societe.test(document.getElementById("société").value);
console.log(filtreSoc);
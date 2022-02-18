var x = prompt("entrez un premier nombre");
// ici on demande au navigateur d'afficher une boite de dialogue dans laquelle l'utilisateur va entrer une valeur, qui sera enregistrée et affectée à x
var y = prompt("entrez un seconde nombre");
//idem pour y
var z = x * y;

var texte1 = "le résultat de la multiplication de ";
var texte2 = " par ";
var texte3 = " est ";

alert(texte1 + x + texte2 + y + texte3 + z);

/* au final on aura donc (si x==2 et y==5)
boite de dialogue: entrez un premier nombre (écrire puis ok)
boite de dialogue: entrez un seconde nombre (écrire puis ok)
boite de dialogue: le résultat de la multiplication de 2 par 5 est 10 */
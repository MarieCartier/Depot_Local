// si une chaine de caractère en 1er, la suite sera aussi considéré en caractères

var x = 4 + 2 + "1"; // x == 61 car 4+2 et 1
var y = "1" + 2 + 4; // y == 1,2,4 car les 3 sont considérés comme caractères -> concaténation (additioner des chaines de caractère)
var z = 4 + "deux" + 1 // y == 4deux1

//Avec des caractères
var prenom = "Marie", nom = "Cartier";
var pn = prenom + nom;
alert(pn); // va afficher dans la boite de dialogue -> MarieCartier. Si on veut un espace, l'ajouter à la fin de la &ere variable
//on peut aussi l'afficher ainsi :
alert(prenom + nom);
alert("Marie" + "Cartier");

/*Autre maniere d'écrire les conditions
condition ternaire:*/

var heure = 19;
var bon = (heure < 17) ? "Bonjour" : "Bonsoir";
/*Ici on va tester avec la variable bon si l'heure est inférieure à 17, en stockant un message dans la variable bon.
Pour cela on utilise l'opérateur logique ?, on ecrit le message a afficher puis : pour dire OU (sinon) et la deuxieme instruction */
alert(bon)

// est équivalent à:
if (heure < 17)
{
alert("bonjour");
}
else
{
alert("bonsoir")
}

/* Cela permet de fortement raccourcir les conditions, afin que le code ne soit pas trop chargé.
Ici, si l'heure est < 17, la variable bon aura pour valeur "bonjour", si l'heure est > 17, alors la variable bon aura pour valeur "bonsoir"*/


/*switch est comme une condition pour gérer autant de cas que voulu, mais uniquement l'égalité, et non l'inégalité */

var heure = 16
switch(heure)
{
    case 8 : 
        alert("il est 8h");
        break;
    case 10 :
        alert("il est 10h");
        break;
    case 12 :
        alert("il est midi");
        break;
    case 16 :
        alert("il est 16h");
        break;
    default :
        alert("rien à afficher pour cette valeur")
}
/*pour chaque cas on écrit case + valeur + :, puis break pour sortir du switch si la condition est validée. 
Si on n'écrit pas break, la condition va exécuter tous les cas les uns après les autres sans sélectionner la valeur demandée.
0 la fin, on ajouter un cas par défaut, dans le cas où la valeur entrée n'est pas dans les cas donnés.
Pour cela on écrit default + :. 
si heure = 16, alors il sera affiché "il est 16", si heure = 15 alors il sera affiché "rien à afficher pour cette valeur".*/

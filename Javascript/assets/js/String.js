/*
Les méthodes de l'objet String:
1- length (taille de chaine de caractère)
2- prototype (ajouter des propriétés et méthodes à l'objet string)
3- constructor (retourner la fonction qui a créé le prototype d'un objet string)
4- toLowerCase (mettre en minuscules)
5- toUpperCase (mettre en majuscules)
6- charAt (retourner le caractère à une position donnée)
7- indexOf (retourner la première position à laquelle un caractère donné a été retrouvé dans une chaine)
8- lastIndexOf (retourner la dernière position à laquelle un caractère donné a été retrouvé dans une chaine)
9- replace (rechercher un caractère ou un expression, et de les remplacer par autre chose)
10-slice (extrait une partie de chaine, et retourne la partie extraite comme une chaine)
11-trim (supprimer les espaces en début et fin de chaine)
12-valueOf (retourner la valeur primitive d'un objet string)
13-search
14-match
15-split
*/

var texte = "Je m'appelle Marie CARTIER";

/*4*/alert(texte.toLowerCase()); //met toute la chaine en minuscules

/*6*/alert(texte.charAt(5)); // La position 5 correspond à la lettre a, puisque le décompte comment pas 0 (J=0), affiche donc la lettre a

/*7*/alert(texte.indexOf("p")); //indique la première position de p, à savoir 6
/*8*/alert(texte.lastIndexOf("p")); //indique la dernière position de p, à savoir 7. Bien différencier la majuscules et les minuscules

/* Si la suite de caractères donnée n'est pas trouvée, il sera indiqué -1.
On peut ajouter des paramètres à ces méthodes, notamment à partir de quelle position a démarré la recherche : */
/*7-8 bis*/alert(texte.indexOf("a", 6)); //cela recherchera tous les a à partir de la 6eme position, donc le premier a de appelle ne sera pas pris en compte

/*9*/ alert(texte.replace("Marie", "Pierre")) //va remplacer la premiere chaine par la 2eme, on peut écrire des chaine de longueur qu'on veut
 
/*10*/ var raccourci = texte.slice(0,2); // On doit déclarer un nouvelle variable pour stocker la nouvelle chaine, puis indiquer les positions de ce qu'on veut extraire
        alert(raccourci); // Ici, on a extrait le "Je"; la longueur peut être autant qu'on le souhaite. En commence par -1, on commence par la fin, 0 avant dernier, etc

        /* par exemple, si on écrit texte.slice(-13, -1), on récupère Marie CARTIE, car le dernier caractère ne peut pas être pris en compte, à moins de rajouter un espace et d'augmenter la position*/

/*11*/ var texte = "            Je m'appelle Marie CARTIER           "; //bcp d'espaces en début et fin a supprimer
        var texte2= texte.trim; // pas besoin d'ajouter des paramètres puisque la méthode va directement sélectionne les espaces et les supprimer, mais texte sans espaces à stocker dans une nouvelle variable
        alert("Avant : "+ texte + "\nAprès : " + texte2); //affiche les 2 chaine. \n permet un retour à la ligne, à insérer dans les guillemets
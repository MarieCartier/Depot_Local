/*Un tableau permet de regroupe un certain nombre de valeurs, sans avoir à les noter une par une
Par exemple, au lieu de noter moy= (n1+n2+n3+n4+n5+n6+n7+n8+n9+n10)/10, on va utiliser un tableau qui contiendra déja toutes les données 
et qui pourra faire une moyenne.
Le tableau va aussi nous donner à quelle "ligne" est chaque valeur.
La tableau étant utilisable comme variable, et chaque donnée étant elle meme utilisable comme variable (index/indixe/clé),
cela facilite grandement l'utilisation d'un grand nombre de données.
Le tableau peut être utilisé comme variable, et donc comme argument à une fonction, ou encore retourné comme résultat à une fonction.
*/

// DÉCLARATION

/*Pour déclarer un tableau, on utilise []
Par exemple : */
var monTableau = [];
var monTableau = [12, 24, 65];
var monTableau = ["chien", "chat", "poulet"];
//En javascript on peut avoir des données de types différents dans le même tableau.

/*Les tableaux sont des objets en JS, on peut donc les initialiser à l'aide de l'objet Array, mais cela n'est pas nécessaire puisque 
avec les accolades, la variable prend immédiatement les méthodes et propriétés de l'objet Array. En cas de doute, on peut l'utiliser
Par exemple:*/

var monTableau = Array(); // Tableau vide
var monTableau = Array(5); // Tableau qui contiendra 5 éléments
var monTableau = Array ("chien", "chat", "poulet"); // Tableau avec des données

 /*
 Pour remplir un tableau déclaré vide, on rempli en assignant une valeur à la position souhaitée:
 */
 var monTableau = [];
 monTableau[0] = ["chien"];
 monTableau[1] = ["chat"];
 monTableau[2] = ["poulet"]; 
// on peut aussi utiliser cette méthode pour changer les données déja rentrées

/*
 Pour utiliser les données du tableau, il faut appeler le tableau, puis utiliser les crochets [] avec à l'intérieur la position de la donnée qui nous intéresse.
 Penser que le 1er élément a tjr la position 0
 Exemple, pour accéder à la donner "chat:*/
 monTableau[1]; // Va sélectionner la valeur de l'index 1, soit la position 2, soit "chat"
alert(monTableau[1]); // Pour afficher

/*Pour connaitre le nombre de données contenues dans la tableau, il faut utiliser la méthode length */
alert("Ce tableau contient" + monTableau.length + " éléments.");

/* Pour ajouter un élément en fin de tableau dont on ne connait pas la longueur, on peut faire ceci: */
monTableau[monTableau.length] = "koala"

/*Pour parcourir un tableau et afficher toutes ses valeurs, il faudra utiliser une boucle for, qui passe en revue le tableau valeur par valeur
Il faudra sortir de la boucle en utilisant la méthode length*/
var monTableau = ["chien", "chat", "poulet", "koala"], p = "";
for(var i = 0; i < monTableau.length; i++)
{
    p += "Prénom n°" + (i+1) + " : " + monTableau[i] + "\n"; 
}
alert(p);
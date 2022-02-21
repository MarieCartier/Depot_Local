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

//Les tableaux sont des objets en JS, il faut donc les initialiser avec Array
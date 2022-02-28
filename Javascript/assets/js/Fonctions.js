/* une fonction correspond à un bloc de code écrit pour une tâche particulière par ex: afficher une boite de dialogue, pour cela on utilise la fonction alert*/

/* il existe des fonction natives, déja programmées, ou créer une nouvelle fonction */

// Création d'une fonction multiplication de 2 nombres
//Ces nombres s'appellent des paramètres
//On va commencer par écrire function
function multiplication(a,b)//a et b sont des paramètres (génériques)
{
    alert(a*b); //a et b sont des arguments (véritables valeurs)
}


/*Il s'agit là de la même fonctionnalité en CSS qui permet d'ajouter, par exemple sa propre police:
On va expliquer à la feuille que si on écrit multiplication (sans guillemets) dans la feuille, elle devra exécuter les instructions mentionnées, 
soit afficher le produit d'un nombre a par un nombre b*/

multiplication(4,5);
multiplication(22, 7);
multiplication(13,8);

/* Ici, on appelle notre fonction (par son nom, comme les variables), puis on lui indique les valeurs à ajouter à la fonction
On les indiques en les séparant juste d'une virgule, puisque la fonction sait déjà quel calcul elle doit effectuer.
Ensuite, il est inutile d'appeler la fonction alert, puisqu'il est déjà indiqué dans multiplication que la fonction doit afficher le résultat avec alert.*/

//Récupérer le résultat d'une fonction pour le réutiliser, on va donc retourner à notre résultat grâce à la fonction return


function multiplication(a,b)//l'appel de la fonction reste le même, il faut juste remplacer alert par return
{
    return(a*b); //là le résultat sera stocké avant d'être appelé dans une variable
}

var x = multiplication(4,5); //Ici on affecte le résultat de la fonction multiplication à la variable x
var y = multiplication(22, 7);

var z = multiplication(x,y); //On peut tout à fait réutiliser le résultat autant de fois que l'on veut, et même les imbriquer.

alert(z); // return ne fait que stocker, il faut donc penser à demander d'afficher le résultat avec la fonction alert
/*JS langage basé sur des objets
Quasiment tout est objet */

//Variables peuvent contenir plusieurs valeurs si contiennent un objet
//Un variable contenant plusieurs variables est un objet.

/*Objets natifs + création d'objets
Un objet contient:
propriétés = variables
méthodes = fonction 
Les objets natifs contiennent déjà leurs propriétés et leurs méthodes car pré-codés
*/

// string, number, boolean = objets
/*string est un objet 'parent' a partir duquel on peut créer d'autres objets string, objet constructeur. */


/*Valeur primitive ou objet ?
Par exemple */
var texte = "Bonjour"; //stock une valeur primitive
alert(typeof)(texte)); // affiche valeur string
var texte2 = new String("Bonjour"); //stock valeur objet de type string
alert(typeof(texte2)); //affiche valeur objet

/*Ici les variables stockent la même valeur, mais de type différent 
comme texte2 contient un objet, elle devient elle-même un objet

Fortement recommander d'utiliser les valeurs primitives si possible.*/

//Intérêt des objets
/* chaque type d'objet a des propriétés qui lui sont propres
Exemple, le type d'objets String a la propriété Length, qui permet de connaître la longueur de la chaine de caractères stockée
Ou encore toUpperCase qui permet de transformet la chaine en majuscules
Par exemple*/

alert(texte2.length); //on affiche + (nom de la variable . propriété)
var textemaj = texte2.toUpperCase();
alert(textemaj);

/* On n'est pas obliger de déclarer un objet pour utiliser ses fonctionnalités, puisqu'en JavaScript les données primitives vont être considérées/se comporter
comme objets (correspondants au type de la valeur primitive)
Cela signifie qu'une variable chaine de caractère pourra accéder aux propriétés/fonctionnalités de l'objet de type String*/

/*
Écrire un nouvel objet
3 façon:
créer un objet en utilisant un objet littéral
en utilisant le mot clé new
en utilisant un constructeur et on créer un objet a partir de ce constructeur-> String est un constructeur

Notre variable texte2 est donc une création d'objet puisqu'on a utilisé le mot clé new avec le constructeur String
 */

//objet littéral
var moi = 
{
    prenom:"Pierre",
    nom:"Giraud",
    age:"25"
};
//Nous avons créer un nouvel objet intitulé "moi", qui contient 3 paires de "nom-valeur"

//On peut donc utiliser les valeurs stockées dans l'objet comme ceci:
alert(moi.prenom); //en séparant le nom de l'objet par le nom de la valeur on accede à la valeur correspondant au nom, comme un chemin d'accès

//objet avec new
var moi = new Object();

moi.prenom = "Pierre";
moi.nom = "Giraud";
moi.age = 25
// On a définit les propriétés de l'objet sans définir le type d'objet.
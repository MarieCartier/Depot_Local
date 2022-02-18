/* les conditions permettent de choisir quoi afficher selon les données entrées.
En général on test si la valeur est supérieur, inférieure ou égale à une autre valeur.
Les opérateurs de comparaison sont:
== -> estégal à (valeur)
!= -> est différent de
=== -> est égale à (valeur ET type)
!== -> est différent de (valeur OU type)
> -> strictement supérieur à
< -> strictement inférieur à
>= -> supérieur ou égal à
<= -> inférieur ou égal à

Lorsque le javascript compare, il stock un booléen true ou false selon le résultat
Ex: 14 < 18, il va renvoyer true car c'est vrai*/

var x = 14, y = 18, z = 20;

alert(x < y); //true car 14 < 18
alert(z < y); //false car 20 > 18
alert(x == z); //false car 14 != 20

// condition
var heure = 14; 

if ((heure < 12) == true) //pas besoin de point virgule ici
{
    alert("C'est le matin");
}
/*Ici, le navigateur va afficher une boite de dialogue UNIQUEMENT si l'heure est plus petite que 18. 
Si on avait mis heure = 20, le navigateur n'aurait rien affiché du tout*/


    else //jamais de test dans le else, teste tous les autres cas
    {
        alert("Bonsoir");
    }
//si on ajoute else, on a plusieurs possiblités


//à la place de else, on peut mettre else if:
    else if((heure == 12) == true)
    {
        alert("il est midi pile");
    }
        else if((heure < 18) == true)
        {
            alert("c'est l'après-midi");
        }
            else 
            {
                alert("c'est le soir");
            }
/*le navigateur va donc afficher la boite de dialogue correspondant à la valeur de la variable heure.
Pour NONheure en pseudo code, on écrira !heure en Javascript, cela renvoie la valeur contraire.
On peut aussi remplacer true par false pour obtenir le même résultat.*/

/*on peut affiner en précisant l'heure de départ avec les opérateurs logiques
ET &&*/
if (((heure >= 0) && (heure < 12)) == true) //pas besoin de point virgule ici
{
    alert("C'est le matin");
}
    else if((heure == 12) == true)
    {
        alert("il est midi pile");
    }
        else if(((heure > 12) && (heure < 18)) == true)
        {
            alert("c'est l'après-midi");
        }
            else
            {
                alert("c'est le soir");
            }

/*OU ||*/

if(((heure < 0) || (heure > 24)) == true)
{
    alert("Cette heure n'est pas valide");
}

/*NON !*/
if (!(heure < 12) == true)
    alert("il est midi passé");

/*Va donner le contraire de heure < 12, soir heure > 12 */

// on peut écrire une condition sans écrire == true, car JS va forcément considérer que la condition est true.
// si on écrit:
if (!(heure > 12))
{
    alert("c'est le matin");
}
// cela équivaut à:
if ((heure < 12) == false)
{
    alert("c'est le matin");
}

// préferer la version courte pour plus de lisibilité

/*on peut tester des conditions même sans opérateur de comparaison
Pour cela, JS va consider que tout variable qui n'est pas null, undefined, NaN ou vide sera true, sinon ce sera false 
Par exemple*/
var w="feu", x=6, y=0, z="";

if (w)
{
    alert("ce code va s'exécuter");
}

if (x)
{
    alert("ce code va s'exécuter");
}

if (y)
{
    alert("ce code ne devrait pas marcher");
}

if (z)
{
    alert("ce code ne devrait pas marcher");
}

/*Pour w et x, le code devrait s'afficher car les valeur sont définies et non nulles,
alors que pour y et z, une valeure est nulle (0) et une non définie (""), ce qui empêche l'alerte de s'afficher puisque considéré comme false.
Pour qu'une boite de dialogue s'ouvre pour y et z, il suffira de mettre un else:*/

else
{
    alert("le contenu est false");
}

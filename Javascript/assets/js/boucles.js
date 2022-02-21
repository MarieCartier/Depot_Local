// /!\ IL FAUT BIEN ÊTRE CERTAIN DE TOUJOURS SORTIR DE LA BOUCLE AU MOINS 1 FOIS !! /!\ 
/* /!\ A l'incrémentation/décrémentation dans les calculs ! si y= x++ alors y prendra simplement la valeur de x car l'affectation d'une valeur de variable à une autre est prioritaire aux calculs
En revanche, si on écrit y = ++x, ALORS y prendra réellement la valeur de x+1. On peut palier à cela avec des parenthèses, ou tout simplement en pensant à inverser les ++ ou --.
Lors d'une instruction, sela fonctionne puisqu'il n'y a pas d'affectation de variables.*/


/*Boucles permettent d'executer une instruction tant qu'une variable n'aura pas atteint telle ou telle valeur
C'est un automatisme
Il faut absolument que la valeur devienne fausse à un moment donné (puisque true == recommencer la boucle), sinon la boucle tournera longtemps et créera un bug*/


/*Boucle while = tant que, permet de répéter une série d'instructions tant qu'une condition donnée est vrai
Tant que la variable x contient une valeur inférieure à 10, on va exécuter la boucle.*/
    var x = 0;
    while(x < 10)
        {
            alert("x vaut : " + x); //on affiche car au 1er tour x vaut zéro; si l'alerte est mise après l'incrémentation, la 1ere valeur affichée sera x+1 soit 1, et la derniere valeur sera 10 et non 9.
            x = x + 1; /*OU x ++ */ //au second tour x vaudra x+1 soit 1, donc on pourra de nouveau afficher le message, et ainsi de suite jusqu'à ce que la valeur devienne fausse, à savoir x=10
        }
    // Le navigateur va successivement afficher les résultats dans des boites de dialogues, et cessera les affichages à partir de 10, car la boucle est bouclée.


/*Boucle do while = faire tant que*/
    var x = 20;
    do
    {
        alert("x vaut : " + x);
    }
    while (x<10);

    /*Ici, la boucle va être lancée même si la valeur de la variable est fausse, puisque la boucle va en premier afficher combien vaut x avant de voir  la condition d'affichage 
    Si x=0, il faudra rajouter une instruction pour sortir au moins une fois de la boucle, sinon le navigateur n'affichera que "x vaut : 0"
    Exemple:
    */
    var x = 0;
    do
    {
        alert("x vaut : " + x);
        x++;
    }
    while (x<10);

    /*Ici, la boucle va en plus calculer x+1 à chaque tour, jusqu'à 10 */


/*Boucle for = pour*, permet de répter une série d'instructions pour une valeur donnée, et jusqu'a une valeur seuil.
C'est la plus simple à écrire.
ilfaut : déclarer une variable + poser la condition/test + incrémenter/décrémenter*/

    for(var i = 0; i <10; i++)
    //cela signifie: pour une variable i = 0, et tant que i inférieur à 10, ajouter 1 à i et éxecuter le code écrit après:
    {
        alert ("i vaut : " + i);
    }


/* On va utiliser:
for par défaut quand on sait à l'avance combien de passage on va faire dans la boucle,  while quand on ne sait pas combien de passages on va faire,
et do while quand on veut absolument faire un passage dans la boucle quelque soit la valeur de départ*/
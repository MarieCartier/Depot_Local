/*Boucles permettent d'executer une instruction tant qu'une variable n'aura pas atteint telle ou telle valeur
C'est un automatisme
Il faut absolument que la valeur devienne fausse à un moment donné (puisque true == recommencer la boucle), sinon la boucle tournera longtemps et créera un bug
Boucle while = tant que, permet de répéter une série d'instructions tant qu'une condition donnée est vrai
Tant que la variable x contient une valeur inférieure à 10, on va exécuter la boucle.*/
var x = 0;
while(x < 10);
    {
        alert("x vaut : " + x); //on affiche car au 1er tour x vaut zéro; si l'alerte est mise après l'incrémentation, la 1ere valeur affichée sera x+1 soit 1, et la derniere valeur sera 10 et non 9.
        x = x + 1 /*OU*/ x ++; //au second tour x vaudra x+1 soit 1, donc on pourra de nouveau afficher le message, et ainsi de suite jusqu'à ce que la valeur devienne fausse, à savoir x=10
    }
// Le navigateur va successivement afficher les résultats dans des boites de dialogues, et cessera les affichages à partir de 10, car la boucle est bouclée.

/* /!\ l'incrémentation/décrémentation dans les calculs ! si y= x++ alors y prendra simplement la valeur de x car l'affectation d'une valeur de variable à une autre est prioritaire aux calculs
En revanche, si on écrit y = ++x, ALORS y prendra réellement la valeur de x+1. On peut palier à cela avec des parenthèses, ou tout simplement en pensant à inverser les ++ ou --.
Lors d'une instruction, sela fonctionne puisqu'il n'y a pas d'affectation de variables.*/



/*Boucle do while = faire tant que*/




/*Boucle for = pour*/
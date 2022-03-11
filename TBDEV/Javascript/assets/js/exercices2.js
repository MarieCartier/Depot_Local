var prenom = prompt("entrez votre prénom ");
var nom = prompt("entrez votre nom " + prenom);
var sexe = confirm("êtes-vous un homme " + prenom + "?");
if(sexe) 
{
    alert("Bonjour Monsieur "+ prenom + nom);
} 
else 
{
    alert("Bonjour Madame " + prenom + " " + nom + " ,bienvenue sur notre site web");
}

// VÉRIFIÉ : OK

var a = "100"
var b = 100
var c = 1.0
var d = true

alert("Ceci est une chaîne de caractères : " + a);
b--;
c += parseInt(a);
d = !true;

alert(b);
alert(c);
alert(d);

// VÉRIFIÉ : OK

var a = prompt("Entrez un nombre");
var b = null;
if (a%2==0)
{
    alert("ce nombre est pair");
}
else
    alert("ce nombre est impair");

// VÉRIFIÉ : OK

var a = prompt("Entrez votre année de naissance");
var b = 2022 - a;
if (b >= 18)
{
    alert("Vous êtes majeur");
}
else
{
    alert("Vous êtes mineur");
}
//VÉRIFIÉ : OK

var a = prompt("Saisissez un nombre autre que 0");
var b = prompt("Saisissez un second nombre autre que 0");
var c = prompt("Entrez +, -, * ou /");
var d = null;
        
if(c==="+")
        {
            d=parseInt(a)+parseInt(b);
        }
            else if (c==="-")
            {
                d=parseInt(a)-parseInt(b);
            }
                else if (c==="*")
                {
                    d=parseInt(a)*parseInt(b);
                }
                    else if (c==="/")
                    {
                        d=parseInt(a)/parseInt(b);
                    } 
                    
if (a !== 0 || b !== 0 || (c === "+" || c === "-" || c === "*" || c === "/"))
{
    alert(d);
}
    else
    {
        alert("Erreur, mauvaise entrée");
    }

//VÉRIFIÉ : OK


//EX 1
var p = "", x = 1, y = 0;

do
{
    var a=prompt("Entrez un prénom n° " + x);
    if (a.length != 0)
    {
    p=p+a+"\n";
    x++;
    y++;
    }
}
while (a.length != 0) 

console.log(p, y);

// VÉRIFIÉ : OK


//EX 2
var n=prompt("entrez un nombre"); entier = 0
while (entier < n)
{
    console.log(entier);
    entier++;
}
//VÉRIFIÉ OK


//EX 3
var p = 0, y = 0, somme = 0;

do
{
    var a = Number(prompt("Entrez un nombre"));
    if (a!= 0)
    {
    p=p+a+"\n";
    somme = somme + a;
    y++;
    
    }
}
while (a!= 0) 

console.log(p, "Il y a " + y + " nombres");
console.log("La somme de ces nombres est : " + somme);

var moyenne = somme / y;

console.log("La moyenne de ces nombres est : " + moyenne);

// VÉRIFIÉ : OK


//EX 4
        //10                                     b                                                   
var n=Number(prompt("entrez un nombre")), x=Number(prompt('entrez un second nombre')), m=0;
do
{
    produit=m*(b);
    console.log(m + " x " + b + " = " + produit);
    m++;
}
while (m<=10)

//VÉRIFIÉ : OK


//EX 5

var mot = prompt('Entrez un mot');
console.log("mot entré : " + mot);
var long = mot.length;
console.log("longueur du mot : " + long);
//Ce morceau Fonctionne
var p=""; // pour stocker les lettres
var y = 0 //incrémenter la position d'extraction
var z = 1 // position fin d'extraction

do 
{
    var p=mot.substring(y, z)+ "\n";
    console.log("lettre extraite : " + p);
    y++;
    z++;
}

while (y<=mot.length);

console.log(p.length);

// Vérifié : chaque lettre est extraite

// Suite
var mot = prompt('Entrez un mot');
console.log("mot entré : " + mot);
var long = mot.length;
console.log("longueur du mot : " + long);
var voy = 'a';
console.log('voyelle cherchée :' + voy);
var x = mot.indexOf(voy);
console.log("position 1ere voyelle : " + mot.indexOf(voy));
do
{
    console.log("position autre voyelle : " + mot.indexOf(voy, x++));
}
while (x<=mot.length)
// Vérifié : affiche la position de la voyelle entrée

                                                                        //NON TERMINÉ


// TABLEAUX //
// EX 1

var nblignes= Number(prompt('Entrez le nombre de lignes'));
var tableau = Array (nblignes);
var x = 0;

/*
do 
{
    tableau [x] = [prompt("Entrez donnée ligne" + x)];
    x++
}
while (x<=nblignes)*/

for ( var x = 0; x != nblignes; x++)
{
    tableau [x] = [prompt("Entrez donnée ligne" + x)];
}

document.write(tableau);



// VÉRIFIÉ : OK

// EX 2+3

function GetInteger() // lire un nb entré au clavier
    {
        var nblignes = Number(prompt('Entrez le nombre de lignes désirées')); // variable dans laquelle stocker la valeur demandée
        return nblignes; //retourner la variable en attendant utilisation du nb de lignes
    }

var nblignes=GetInteger();    

function InitTab() // déclaration du tableau avec nb de lignes
    {
        var tableau = Array(nblignes); // tableau avec nb de lignes défini dans GetInteger
        return tableau; // retourner la variable en attendant utilisation du tableau
    }

var tableau=InitTab();

function SaisieTab() // saisie données dans tableau
    {
        var i = 0;
        do
        {
            tableau[i] = [Number(prompt("Entrez donnée ligne : " + (i+1)))];
            i++;
        }
        while(i<nblignes);
        return tableau;
    }

function AfficheTab() // Affiche les données
    {
        document.write("Les données du tableau sont : " + tableau + ". \n");
    }

console.log("le nb de lignes est : " + nblignes);

function InfoTab() // Affiche moyenne et donnée max
    {
        var somme=0;
        for(var x = 0; x<tableau.length; x++)
            {
                somme= somme + parseInt(tableau[x]);
            }
        console.log("la somme des lignes : " + somme);

        var moyenne=somme/nblignes;
        document.write("\n La moyenne des lignes est : " + moyenne + "\n");

        var vmax = 0, y = 0; // pour stocker valeur max
        do
            {
                if (parseInt(tableau[y])>vmax) // si la valeur de la ligne x est supérieure à vmax
                    {
                        vmax=tableau[y]; // alors vmax prend la valeur de la ligne x
                    }
                y++;
            }
        while (y < tableau.length) // x = n° de ligne du tableau, ne pas dépasser nb lignes total, incrémenter a chaque passage
        document.write("\n la valeur max est : " + vmax);
    }

function triTab()
{
    var sup; // variable booléenne
    do
    {
        sup = false; // sup vaut faux
        for(i=0; i < tableau.length; i++) // variable i vaut zéro, tant que i plus petit que nb lignes, incrémenter i
        {
            if (parseInt(tableau[i]) > parseInt(tableau [i+1])) // si ligne 1 plus grande que ligne 2
            {
                var stock = tableau[i]; // stocker valeur ligne 1 dans stock
                tableau[i] = tableau[i+1]; // donner valeur ligner 2 à ligner 1 (donc valeur + grande des 2)
                tableau[i+1] = stock; // donner valeur stock à ligne 1 (donc valeur la + petite des 2)
                sup = true; // donne valeur vrai à sup si ligne 1 > ligne 2
            }
        }
    }
    while(sup) // faire jusqu'à ce que sup ait la valeur faux, donc jusqu'a ce que ligne 1 < ligne 2
    document.write("\n Les données triées du tableau : " + tableau);
}

SaisieTab();
AfficheTab();
InfoTab();
triTab();

//VÉRIFIÉ : OK

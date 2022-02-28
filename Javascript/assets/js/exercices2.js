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
entier
somme
moy

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

var n=Number(prompt("entrez un nombre")), x=Number(prompt('entrez un second nombre')), m=0
do
{
    produit=m*(x);
    console.log(m + " x " + x + " = " + produit);
    m++;
}
while (m<=n)

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

// EX 2

function GetInteger() // lire un nb entré au clavier
{
    var a = Number(prompt('Entrez un nombre')); // variable dans laquelle stocker la valeur demandée
    return a; //retourner la variable en attendant utilisation du nb de lignes
}

function InitTab() // déclaration du tableau avec nb de lignes
{
    var b = Array(nblignes); // tableau avec nb de lignes défini dans GetInteger
    return b; // retourner la variable en attendant utilisation du tableau
}

var nblignes = GetInteger(); // METTRE A LA FIN
console.log(nblignes); 

var tableau=InitTab(); // METTRE A LA FIN
console.log(tableau); 

function SaisieTab() // saisie données dans tableau
{
    var i = 0;
    do
    {
        tableau[i] = [prompt("Entrez donnée ligne : " + i)];
        i++;
    }
    while(i<=nblignes);
    return tableau;
}

var donnees=SaisieTab(); // METTRE A LA FIN
console.log(donnees);

// VÉRIFIÉ : OK

//Suite

function AfficheTab() // Affiche les données
{
    document.write(donnees);
}

monTableau=AfficheTab()
document.write(monTableau);


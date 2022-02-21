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
var n = prompt("entrez un nombre");
var entier =

while ()

//


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


//


//EX 4

var n=prompt("entrez un nombre"), x=prompt('entrez un second nombre');
var m=0
do
{
    produit=m*parseInt(x);
    console.log(m + " x " + x + " = " + produit);
    m++;
}
while (m<=n)

//VÉRIFIÉ : OK


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


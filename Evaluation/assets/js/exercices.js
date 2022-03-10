// EXERCICE 1
var jeunes = document.getElementById("jeunes");
var adultes = document.getElementById("adultes");
var vieux = document.getElementById("vieux");
var ex1 = document.getElementById("ex1")
var nbJ = document.getElementById("nbJ")
var nbA = document.getElementById("nbA");
var nbV= document.getElementById("nbV");
var p=0, b=0, x=0, y=0, z=0;

do
{
    var a = Number(prompt("Entrez un âge")); // Demande des âges à l'utilisateur
    b++

// Cas si inférieur à 20
    if (a<20)
    {
    p=p+a+"\n";
    x++;
    jeunes.textContent = "Le nombre de moins de 20 ans est : " + x + ", ";
    }

// Cas si entre 20 et 40
        else if(a>=20 && a<=40)
        {
            p=p+a+"\n";
            y++;
            adultes.textContent = "Le nombre d'adultes est : " + y + ", ";
        }

// Cas si supérieur à 40
            else if(a>40)
            {
                p=p+a+"\n";
                z++;
                vieux.textContent = "Le nombre de plus de 40 ans est : " + z ;
            }
}
while (a<100) 

console.log("liste des âge :\n" + p);
ex1.textContent ="nombre total de personnes : "+b;


// EXERCICE 2

var b = prompt(Number("Quelle table de multiplication voulez-vous ?"));

function multiplication(b)//l'appel de la fonction reste le même, il faut juste remplacer alert par return
{
    return(a*b); //là le résultat sera stocké avant d'être appelé dans une variable
}


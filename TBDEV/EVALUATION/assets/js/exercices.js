// EXERCICE 1

var jeunes = document.getElementById("jeunes");
var adultes = document.getElementById("adultes");
var vieux = document.getElementById("vieux");
var ex1 = document.getElementById("ex1")
var nbJ = document.getElementById("nbJ")
var nbA = document.getElementById("nbA");
var nbV= document.getElementById("nbV");
var age= document.getElementById('age');
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
var nb = document.getElementById("nb");
var bouton1 = document.getElementById("bouton1");
var ex2 = document.getElementById("ex2");

var mult = null;

function multiplication(b)
{
    var b = nb.value;
    var m = 0;

    do
    {
        var produit= m*b;
        //mult= mult + produit + "\n";
        console.log(m + " x " + b + " = " + produit + "\n");
        ex2.innerHTML += m + " x " + b + " = " + produit + "<br>";

        m++;
    }
    while (m<=10)
}

bouton1.addEventListener("click", multiplication);

//EXERCICE 3

var tab = ["Audrey", "Aurélien", "Flavien", "Jérémy", "Laurent", "Melik", "Nouara", "Salem", "Samuel", "Stéphane"];
var prenom = document.getElementById("prenom");
var bouton2 = document.getElementById("bouton2");
var ex3 = document.getElementById("ex3");

bouton2.addEventListener("click", tabNom);


function tabNom()
{

    var cherche = tab.indexOf(prenom.value); //quel index a la valeur de la ZDT
    console.log(cherche); //affiche cet index

    if(cherche==-1) // si index cherché est -1
    {
        ex3.textContent="Raté, entre un autre prénom !"; // Jusqu'ici ça fonctionne
    }
        else // si autre index que -1 trouvé (donc présent dans tableau)
        {
            tab.splice(cherche, 1); // à partir de l'index trouvé, supprimer 1 ligne
            tab.push(""); // Ajouter une ligne vide à la fin du tableau
            ex3.textContent= "Bravo, tu as trouvé un prénom" 
            console.log(tab); // Affiche le nouveau tableau avec case vide à la fin    
        }

}

// EXERCICE 4
var ex4 = document.getElementById("ex4");
var bouton3 = document.getElementById("bouton3"); 
var REM = 0 // remise
var PORT = 0 // frais de port
var PAP = 0 // prix à payer

bouton3.addEventListener("click", commande);

function commande()
{
    var QTECOM = document.getElementById("QTCOM"); //quantité commandée, saisie au clavier
    var PU = document.getElementById("PU"); //prix unitaire, saisie au clavier
    var TOT = PU.value * QTECOM.value; // prix total HT
    console.log(PU.value);

    if(TOT >= 100 && TOT <=200)
    {
        REM = TOT * 0.05;
    }
        else if(TOT>200)
        {
            REM = TOT * 0.1;
        }
            else
            {
                REM = 0;
            }

    if((TOT-REM)>=500)
    {
        PORT = 0
    }
        else
        {
            PORT = (TOT-REM)*0.02;
            if(PORT<6)
            {
                PORT = 6;
            }
        }
    

    PAP = TOT-REM+PORT;

    ex4.innerHTML="Le prix est de : " + TOT + "€<br>" + "Le montant de la remise est de : " + REM + "€<br>" + "Les frais de ports sont de : " + PORT + "€<br>" + "Le prix TOTAL à payer est de : " + PAP + "€";
}

// Si TOT >=100 && <= 200, alors REM = 5%
// Si TOT >200 alors REM = 10%
// Si TOT - REM >= 500, alors PORT = 0
// Si TOT - REM < 500, alors PORT = 2%
// PORT min = 6


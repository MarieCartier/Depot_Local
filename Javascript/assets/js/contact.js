// OPTION DANS ZDT

var choix = document.getElementById("choix"); // id liste
var textArea = document.getElementById("textArea"); // id zone de texte


function afficheChoix()
{
    if(choix.value=="Choisissez") //si on clique sur choisissez
    {
        textArea.innerHTML = ""; // ne rien afficher
    }
    else //si on clique sur une autre option
    {  
    var select = choix.value; // stock valeur sélectionnée
    textArea.innerHTML = select; // affiche select dans zone de texte 
    }   
}

choix.addEventListener("change", afficheChoix); 
//Ajoute un évènement quand on choisi dans la liste "choix"
//chaque fois qu'on change de choix, appliquer la fonction


//OK FONCTIONNE JUSQU'ICI


//FILTRES

//Filtre société
var filtre1 = new RegExp("^[A-Za-z0-9]+$");
var filtreSoc= filtre1.test(document.getElementById("société").value);

//Filtre personne à contacter
var filtre2 = new RegExp("^[A-Za-z]+$");
var filtreContact= filtre2.test(document.getElementById("contacter").value);

//Filtre code postal
var filtre3 = new RegExp("^[0-9]{5}$");
var filtreCode= filtre3.test(document.getElementById("codePostal").value);

//Filtre Ville
var filtre4 = new RegExp("^[A-Za-z]+$");
var filtreVille= filtre4.test(document.getElementById("ville").value);

//Filtre mail
var filtre5 = new RegExp("^[@]{1}$");
var filtreMail= filtre5.test(document.getElementById("email").value);

function filtres()
{
    if(filtreSoc===true)
    {
        alert("Société : Veuillez entrez au moins un caractère");
    }

    if(filtreContact===false)
    {
        alert("Personne à contacter : Veuillez entrez au moins un caractère");   
    }

    if(filtreCode===false)
    {
        alert("Code Postal : Veuillez entrez 5 chiffres");
    }

    if(filtreVille===false)
    {
        alert("Ville : Veuillez entrez au moins un caractère");   
    }

    if(filtreMail===false)
    {
        alert("E-mail : Veuillez entrez une adresse avec @");
    }
    
    return false;
}




var envoyer = document.getElementById("envoyer")
envoyer.addEventListener("click", filtres)

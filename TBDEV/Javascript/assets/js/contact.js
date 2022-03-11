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
var societe = document.getElementById("societe");
var socMissing = document.getElementById("socMissing");
var filtre1 = new RegExp("^[A-Za-z0-9]+$");

//Filtre personne à contacter
var contact = document.getElementById("contacter");
var contMissing = document.getElementById("contMissing");
var filtre2 = new RegExp("^[A-Za-z]+$");

//Filtre code postal
var code = document.getElementById("codePostal")
var codeMissing = document.getElementById("codeMissing");
var filtre3 = new RegExp("^[0-9]{5}$");

//Filtre Ville
var ville = document.getElementById("ville");
var villeMissing = document.getElementById("villeMissing");
var filtre4 = new RegExp("^[A-Za-z]+$");

//Filtre mail
var mail = document.getElementById("email");
var mailMissing = document.getElementById("mailMissing");
var filtre5 = new RegExp("^[a-z0-9. -]+[@]{1}[a-z0-9. -]+$");

//Bouton envoyer
var envoyer = document.getElementById("envoyer");
envoyer.addEventListener("click", filtres);

//Fonction à appliquer
function filtres(e)
{
    //Société
    var filtreSoc= filtre1.test(societe.value);
 
    if(societe.value=="")
    {
        socMissing.textContent = "Veuillez entrez au moins un caractère";
        e.preventDefault();
    }
        else if(filtreSoc==false)
        {
            socMissing.textContent = "Veuillez entrez des caractères valides";
            e.preventDefault();
        }
            else
            {
                socMissing.textContent = "OK !";
                socMissing.style.color = "green";
            }

    //Contact
    var filtreContact= filtre2.test(contact.value);

    if(contact.value=="")
    {
        contMissing.textContent = "Veuillez entrez au moins un caractère";
        e.preventDefault();
    }
        else if(filtreContact==false)
        {
            contMissing.textContent = "Veuillez entrez des caractères valides";
            e.preventDefault();
        }
            else
            {
                contMissing.textContent = "OK !";
                contMissing.style.color = "green";
            }

    //Code postal
    var filtreCode = filtre3.test(code.value);

    if(code.value=="")
    {
        codeMissing.textContent = "Veuillez entrez 5 chiffres";
        e.preventDefault();
    }
        else if(filtreCode==false)
        {
            codeMissing.textContent = "Veuillez entrez 5 chiffres";
        }
            else
            {
                codeMissing.textContent = "OK !";
                codeMissing.style.color = "green";
            }

    //Ville
    var filtreVille= filtre4.test(ville.value);
    
    if(ville.value=="")
    {
        villeMissing.textContent = "Veuillez entrez au moins un caractère";
        e.preventDefault();
    }
        else if(filtreVille===false)
        {
            villeMissing.textContent = "Veuillez entrez des caractères valides";
            e.preventDefault();
        }            
            else
            {
                villeMissing.textContent = "OK !";
                villeMissing.style.color = "green";
            }

    //Mail
    var filtreMail= filtre5.test(mail.value);

    if(mail.value=="")
    {
        mailMissing.textContent = "Veuillez entrez une adresse mail avec @";
        e.preventDefault();
    }
        else if(filtreMail===false)
        {
            mailMissing.textContent = "Veuillez entrez une adresse mail avec @";
            e.preventDefault();
        }
            else
            {
                mailMissing.textContent = "OK !";
                mailMissing.style.color = "green";
            }
}






//Filtre nom
var nom = document.getElementById("nom");
var nomM = document.getElementById("nomM");
var filtre1 = new RegExp("^[A-Za-zÀ-ÿ -]{2,30}$");

//Filtre prénom
var prenom = document.getElementById("prenom");
var prenomM = document.getElementById("prenomM");
var filtre2 = new RegExp("^[A-Za-zÀ-ÿ -]{2,30}$");

//Filtre email
var mail = document.getElementById("mail");
var mailM = document.getElementById("mailM");
var filtre3 = new RegExp("^[a-z0-9.-]+@[a-z0-9.-]{2,}.[a-z]{2,4}$");

//Filtre mdp
var mdp = document.getElementById("mdp");
var mdpM = document.getElementById("mdpM");
var filtre4 = new RegExp("^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[\W]).{8,20} $");

//Bouton valider
var valider = document.getElementById("valider");
envoyer.addEventListener("click", filtres);

//Fonction à appliquer
function filtres(e)
{
    //Nom
    var filtreNom= filtre1.test(nom.value);

    if(nom.value=="")
    {
        nomM.textContent = "Veuillez entrez au moins un caractère";
        e.preventDefault();
    }
        else if(filtreNom==false)
        {
            nomM.textContent = "Veuillez entrez des lettres, espaces ou tirets";
            e.preventDefault();
        }
            else
            {
                nomM.textContent = "";
            }

    //Prenom
    var filtrePrenom= filtre2.test(prenom.value);

    if(prenom.value=="")
    {
        prenomM.textContent = "Veuillez entrez au moins un caractère";
        e.preventDefault();
    }
        else if(filtrePrenom==false)
        {
            prenomM.textContent = "Veuillez entrez des lettres, espaces ou tirets";
            e.preventDefault();
        }
            else
            {
                prenomM.textContent = "";
            }

    //Mail
    var filtreMail= filtre3.test(mail.value);

    if(mail.value=="")
    {
        mailM.textContent = "Veuillez entrez une adresse mail du type id@nom.fr";
        e.preventDefault();
    }
        else if(filtreMail==false)
        {
            mailM.textContent = "Veuillez entrez une adresse mail du type id@nom.fr";
            e.preventDefault();
        }
            else
            {
                mailM.textContent = "";
            }

    //Mot de passe
    var filtreMdp= filtre4.test(mdp.value);

    if(mdp.value=="")
    {
        mdpM.textContent = "Veuillez entrer un mot de passe";
        e.preventDefault();
    }
        else if(filtreMdp==false)
        {
            mdp.textContent = "Votre mot de passe doit contenir min. 8 caractères, dont 1 majuscule, 1 minuscule, 1 chiffre, 1 caractère spécial";
            e.preventDefault();
        }         
            else
            {
                mdpM.textContent = "";
            }

}

//Filtre nom
var nom = document.getElementById("nom");
var nomM = document.getElementById("nomM");
var filtre1 = new RegExp("^[A-Za-zÀ-ÿ -]{2,30}$");

//Filtre prénom
var prenom = document.getElementById("prenom");
var prenomM = document.getElementById("prenomM");
var filtre2 = new RegExp("^[A-Za-zÀ-ÿ -]{2,30}$");

//Filtre code postal
var code = document.getElementById("code");
var codeM = document.getElementById("codeM");
var filtre3 = new RegExp("^[0-9]{5}$");

//Filtre email
var email = document.getElementById("email");
var emailM = document.getElementById("emailM");
var filtre4 = new RegExp("^[a-z0-9.-]+@[a-z0-9.-]{2,}.[a-z]{2,4}$");

//Filtre question
var question = document.getElementById("question");
var questionM = document.getElementById("questionM");
var filtre5 = new RegExp("^[A-Za-z]+$");

//Filtre naissance
var naissance = document.getElementById("naissance");
var naissanceM = document.getElementById("naissanceM");
var filtre6 = new RegExp("^[0-9]{4}-[0-9]{2}-[0-9]{2}$");


//Bouton envoyer
var envoyer = document.getElementById("envoyer");
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

    //Code postal
    var filtreCode = filtre3.test(code.value);

    if(code.value=="")
    {
        codeM.textContent = "Veuillez entrez 5 chiffres";
        e.preventDefault();
    }
        else if(filtreCode==false)
        {
            codeM.textContent = "Veuillez entrez 5 chiffres";
        }
            else
            {
                codeM.textContent = "";
            }

    //Mail
    var filtreEmail= filtre4.test(email.value);

    if(email.value=="")
    {
        emailM.textContent = "Veuillez entrez une adresse mail du type id@nom.fr";
        e.preventDefault();
    }
        else if(filtreEmail==false)
        {
            emailM.textContent = "Veuillez entrez une adresse mail du type id@nom.fr";
            e.preventDefault();
        }
            else
            {
                emailM.textContent = "";
            }

    //Question
    var filtreQuestion= filtre5.test(question.value);

    if(question.value=="")
    {
        questionM.textContent = "Veuillez entrez au moins un caractère";
        e.preventDefault();
    }
        else if(filtreQuestion==false)
        {
            questionM.textContent = "Veuillez entrez des caractères valides";
            e.preventDefault();
        }            
            else
            {
                questionM.textContent = "";
            }
    
    //Sexe
    var sexe = document.getElementsByClassName("sexe");
    var sexeM = document.getElementById("sexeM");


    if (sexe[0].checked || sexe[1].checked)
    {
        sexeM.textContent="";
    }
        else
        {
            sexeM.textContent = "Veuillez sélectionner votre sexe";
            e.preventDefault();
        }

    //Date de naissance
    var filtreNaissance= filtre6.test(naissance.value);

    if(naissance.value=="")
    {
        naissanceM.textContent = "Veuillez entrer votre date de naissance";
        e.preventDefault();
    }
       else if(filtreNaissance==false)
        {
            naissanceM.textContent = "Veuillez entrer une date au format JJ/MM/AAAA";
            e.preventDefault();
        }         
            else
            {
                naissanceM.textContent = "";
            }


    //Sujet
    var sujet = document.getElementById("sujet");
    var sujetM = document.getElementById("sujetM");


    if (sujet.value == "")
    {
        sujetM.textContent = "Veuillez sélectionner le sujet de votre demande";
        e.preventDefault();
    }
        else
        {
            sujetM.textContent="";
        }

}

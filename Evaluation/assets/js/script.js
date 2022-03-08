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
var filtre6 = new RegExp("^[a-z0-9.-]+@[a-z0-9.-]{2,}.[a-z]{2,4}$");

//Filtre question
var question = document.getElementById("question");
var questionM = document.getElementById("questionM");
var filtre7 = new RegExp("^[A-Za-z]+$");

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
    var filtreEmail= filtre6.test(email.value);

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
    var filtreQuestion= filtre7.test(question.value);

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
    var date = document.getElementById("date");
    var dateM = document.getElementById("dateM");
    if(date.value=="jj/mm/aaaa")
    {
        dateM = "Entrez votre date de naissance";
        e.preventDefault();
    }

    //Sujet
    var sujet = document.getElementsById("sujet");
    var sujetM = document.getElementById("sexeM");


    if (sujet[1].checked || sujet[2].checked || sujet[3].checked || sujet[4].checked)
    {
        sujetM.textContent="";
    }
        else
        {
            sujetM.textContent = "Veuillez sélectionner le sujet de votre demande";
            e.preventDefault();
        }

}

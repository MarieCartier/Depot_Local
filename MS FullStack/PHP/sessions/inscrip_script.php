<?php
//Validation du formulaire d'inscription avec filtres, et enregistrement dans la BDD quand les données sont vérifiées
//Redirection vers connexion
session_start();
if (isset($_SESSION['post']))
    {
        unset($_SESSION['post']);
    };

//Récupération des données du formulaire
$nom = (isset($_POST['nom']) && $_POST['nom'] != "") ? $_POST['nom'] : Null;
$prenom = (isset($_POST['prenom']) && $_POST['prenom'] != "") ? $_POST['prenom'] : Null;
$mail = (isset($_POST['mail']) && $_POST['mail'] != "") ? $_POST['mail'] : Null;
$mdp = (isset($_POST['mdp']) && $_POST['mdp'] != "") ? password_hash($_POST['mdp'], PASSWORD_DEFAULT) : Null; //hachage du mdp 

//Les champs ne peuvent etre nuls
if ($nom == Null || $prenom == Null || $mail == Null || $mdp == Null) 
{
    header("Location: inscription.php");
    exit;
}

//Vérification des données avec des Regex
$filtre1= '#^[A-Za-zÀ-ÿ -]{2,30}$#';
$filtre2= '#^[A-Za-zÀ-ÿ -]{2,30}$#';
$filtre3= '#^[a-z0-9.-]+@[a-z0-9.-]{2,}.[a-z]{2,4}$#';
$filtre4= '#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{8,}$#';

//Si pas de correspondance, retour sur le formulaire d'inscription
if(!preg_match($filtre1, $nom))
{
    $_SESSION['erreur']['nom'] = "Votre nom doit comporter entre 2 et 30 lettres, espaces ou tirets";

} elseif (isset($_SESSION['erreur']['nom']))
    {
        unset($_SESSION['erreur']['nom']);
    };

if(!preg_match($filtre2, $prenom))
{
    $_SESSION['erreur']['prenom'] = "Votre prenom doit comporter entre 2 et 30 lettres, espaces ou tirets";

} elseif (isset($_SESSION['erreur']['prenom']))
    {
        unset($_SESSION['erreur']['prenom']);
    };

if(!preg_match($filtre3, $mail))
{
    $_SESSION['erreur']['mail'] = "Votre e-mail doit être du type nom@domaine.fr";

} elseif (isset($_SESSION['erreur']['mail']))
    {
        unset($_SESSION['erreur']['mail']);
    };

if(!preg_match($filtre4, $_POST['mdp']))
{
    $_SESSION['erreur']['mdp'] = "Votre mot de passe doit comporter 8 caractères minimum, dont au moins 1 majuscule, 1 minuscule, 1 chiffre, 1 caractère spécial";

} elseif (isset($_SESSION['erreur']['mdp']))
    {
        unset($_SESSION['erreur']['mdp']);
    };



// Si la variable erreur + type est enregistrée dans Session c'est que les champs sont mal remplis donc redirection vers inscription.
// Comme on ne dé
if(isset($_SESSION['erreur']['mdp']) || isset($_SESSION['erreur']['mail']) || isset($_SESSION['erreur']['prenom']) || isset($_SESSION['erreur']['nom'])) {
    $_SESSION["post"] = $_POST;
    header("Location: inscription.php");
    exit; // sortie du script pour pas afficher les erreurs si la case est bien remplie
};



//Une fois tout vérifié, connexion à la base pour enregistrement

require "db.php";
$db = connexionBase();

try {

        $requete = $db->prepare("INSERT INTO identifiants (ident_nom, ident_prenom, ident_mail, ident_mdp) VALUES (:nom, :prenom, :mail, :mdp);");

        $requete->bindValue(":nom", $nom, PDO::PARAM_STR);
        $requete->bindValue(":prenom", $prenom, PDO::PARAM_STR);
        $requete->bindValue(":mail", $mail, PDO::PARAM_STR); 
        $requete->bindValue(":mdp", $mdp, PDO::PARAM_STR);
        $requete->execute();
        $requete->closeCursor();
    }

catch (Exception $e) {
        var_dump($requete->queryString); // Où est l'erreur
        var_dump($requete->errorInfo()); // Infos de l'erreur
        echo "Erreur : ".$requete->errorInfo()[2]."<br>"; // Affiche quelle erreur
        die("Fin du script (inscrip_script.php)"); // Stop le script
    }

    header("Location: login_form.php");
    exit;


?>
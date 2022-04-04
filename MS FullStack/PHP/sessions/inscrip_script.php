<?php
//Validation du formulaire d'inscription avec filtres, et enregistrement dans la BDD quand les données sont vérifiées
//Redirection vers connexion


$nom = (isset($_POST['nom']) && $_POST['nom'] != "") ? $_POST['nom'] : Null;
$prenom = (isset($_POST['prenom']) && $_POST['prenom'] != "") ? $_POST['prenom'] : Null;
$mail = (isset($_POST['mail']) && $_POST['mail'] != "") ? $_POST['mail'] : Null;
$mdp = (isset($_POST['mdp']) && $_POST['mdp'] != "") ? password_hash($_POST['mdp'], PASSWORD_DEFAULT) : Null;
$nomM = (isset($_POST['nomM']) && $_POST['nomM'] != "") ? $_POST['nomM'] : Null;
$prenomM = (isset($_POST['prenomM']) && $_POST['prenomM'] != "") ? $_POST['prenomM'] : Null;
$mailM = (isset($_POST['mailM']) && $_POST['mailM'] != "") ? $_POST['mailM'] : Null;
$mdpM = (isset($_POST['mdpM']) && $_POST['mdpM'] != "") ? $_POST['mdpM'] : Null;


if ($nom == Null || $prenom == Null || $mail == Null || $mdp == Null) 
{
    header("Location: inscription.php");
    die;
}

// $filtre1= preg_match('#^[A-Za-zÀ-ÿ -]{2,30}$#', $nom);
// $filtre2= preg_match('#^[A-Za-zÀ-ÿ -]{2,30}$#', $prenom);
// $filtre3= preg_match('#^[a-z0-9.-]+@[a-z0-9.-]{2,}.[a-z]{2,4}$#', $mail);
// $filtre4= preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{8,}$#', $password);



// if ($filtre1 == 0)
// {
//     $nomM = "Veuillez entrer un nom valide";
// };


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
        echo "Erreur : ".$requete->errorInfo()."<br>"; // Affiche quelle erreur
        die("Fin du script (inscrip_script.php)"); // Stop le script
    }

    header("Location: login_form.php");
    exit;


?>
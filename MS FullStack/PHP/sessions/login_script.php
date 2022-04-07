<?php
$mail = (isset($_POST['mail']) && $_POST['mail'] != "") ? $_POST['mail'] : Null;
$mdp = (isset($_POST['mdp']) && $_POST['mdp'] != "") ? $_POST['mdp'] : Null;
if ($mail == Null || $mdp == Null) header("Location: login_form.php");


require "db.php";
$db = connexionBase();
$requete = $db->prepare("SELECT * FROM identifiants where ident_mail=:mail"); 
$requete->bindParam(":mail",$mail);
$requete->execute();
$myIdents = $requete->fetchAll(PDO::FETCH_OBJ);
$requete->closeCursor();

var_dump($myIdents);


// si le nom entré correspond à un identifiant dans la bdd, utiliser cet id pour ouvrir la session

if (count($myIdents) == 0)
{
    echo "Veuillez entrer un mail valide <br><a href='login_form.php'> retour à la connexion</a>, <br>Pour vous inscrire, <a href='inscription.php'> suivre ce lien</a>";
    die;
}
else
{
    $mdpDB = $myIdents['0'];



    if (password_verify($mdp, $mdpDB->ident_mdp))
    {
        session_start();
        $_SESSION["login"] = $mdpDB->ident_mail;
        $_SESSION["mdp"] = $mdpDB->ident_mdp;
        header("Location: page.php");
    }
    else
    {
        session_start();
        unset($_SESSION["mdp"]);
        unset($_SESSION["login"]);
        echo "Echec de l'identification, <a href='login_form.php'>retour à la page de connexion</a>";
    };
}

?>

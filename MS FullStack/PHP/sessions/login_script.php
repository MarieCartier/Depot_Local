<?php

$mail = (isset($_POST['mail']) && $_POST['mail'] != "") ? $_POST['mail'] : Null;
$mdp = (isset($_POST['mdp']) && $_POST['mdp'] != "") ? $_POST['mdp'] : Null;
if ($mail == Null || $mdp == Null) header("Location: login_form.php");


require "db.php";
$db = connexionBase();
$requete = $db->prepare("SELECT * FROM identifiants"); 
$requete->execute();
$myIdents = $requete->fetchAll(PDO::FETCH_OBJ);
$requete->closeCursor();

foreach($myIdents as $ident)
{
    $mdpDB = $ident->ident_mdp;
}


if (password_verify($mdp, $mdpDB))
{
    session_start();
    $_SESSION["login"] = $ident->ident_mail;
    $_SESSION["mdp"] = $ident->ident_mdp;
    header("Location: page.php");
}
else
{
    unset($_SESSION["mdp"]);
    unset($_SESSION["login"]);
    echo "Echec de l'identification, <a href='login_form.php'>retour à la page de connexion</a>";
};




?>
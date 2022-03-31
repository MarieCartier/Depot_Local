<?php
    // Contrôle de l'ID (si inexistant ou <= 0, retour à la liste) :
    if (!(isset($_GET["id"])) || intval($_GET['id']) <= 0) 
    {
        header("Location: discs.php");
    };

    // Si la vérification est ok :
    require "db.php"; 
    $db = connexionBase();

    $id = $_GET["id"];

    try {
        // Construction de la requête DELETE sans injection SQL :
        $requete = $db->prepare("DELETE FROM disc WHERE disc_id = $id;");
        $requete->execute(array($_GET["id"]));
        $requete->execute();
        $requete->closeCursor();
    }
    catch (Exception $e) {
        echo "Erreur : " . $e->getMessage() . "<br>";
        die("Fin du script (script_disc_delete.php)");
    };

    // Si OK: redirection vers la page discs.php
    TrtRedirection:
    header("Location: discs.php");
exit;
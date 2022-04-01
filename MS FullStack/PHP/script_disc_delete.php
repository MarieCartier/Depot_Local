<?php
//Pour gérer la suppression d'une ligne, il faut une case unique, en général l'id de la ligne

    // Contrôle de l'ID (si inexistant ou <= 0, retour à la liste) :
    if (!(isset($_GET["id"])) || intval($_GET['id']) <= 0) 
    {
        header("Location: discs.php");
    };

    // Si la vérification est ok :
    require "db.php"; 
    $db = connexionBase();

    $id = $_GET["id"]; // On récupère l'id passé en argument dans l'url, via le bouton 'supprimer' de la page détail

    try {
        // Construction de la requête DELETE sans injection SQL :
        $requete = $db->prepare("DELETE FROM disc WHERE disc_id = $id;"); // On pense à ne sélectionner QUE la ligne correspondante avec un filtre WHERE
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
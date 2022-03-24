<?php
//appel de la BDD: lancement de MySQL, adresse du serveur, nom de la BDD, encodage, identifiant, mdp

function ConnexionBase() {
    try 
    {
        $db = new PDO("mysql:host=localhost;charset=utf8;dbname=record", "Marie", "Théophile24051995");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } 
    catch (Exception $e) 
    {
        echo 'Erreur : ' . $e->getMessage() . '<br />';
        echo 'N° : ' . $e->getCode();
        die('Fin du script');
    }
}

?>
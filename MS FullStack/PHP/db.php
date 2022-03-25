<?php
//appel de la BDD: lancement de MySQL, adresse du serveur, nom de la BDD, encodage, identifiant, mdp

function ConnexionBase() {
    try 
    {
        $connexion = new PDO("mysql:host=localhost;charset=utf8;dbname=record", "Marie", "Théophile24051995");
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $connexion;
    } 
    catch (Exception $e) 
    {
        echo 'Erreur : '.$e->getMessage().'<br>';
        echo 'N° : '.$e->getCode();
        die('Fin du script');
    }
}
/*setAttribute() indique à PDO qu'il faut générer une exception à chaque fois qu'un problème est rencontré.
TRY... CATCH capte l'exception (dans $e) si échec de connexion et utilise les infos 
sur cette exception pour obtenir un message d'erreur avec getMessage() et getCode().
die() pour que le serveur arrête la lecture du script PHP.*/

?>
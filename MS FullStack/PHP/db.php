<?php
//appel de la BDD: lancement de MySQL, adresse du serveur, nom de la BDD, encodage, identifiant, mdp

function ConnexionBase() { // fonction qui permet la connection à la BDD
    try //fonctionne comme un si/else
    {
        $db = new PDO("mysql:host=localhost;charset=utf8;dbname=record", "Marie", "Théophile24051995"); // initialisation de la variable db en tant que PDO, qui représente la connection entre la BDD et PHP, avec les infos entrées en paramètres
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Instances permettant de gérer les erreurs
        return $db; //sauvegarde la variable db
    } 
    // Pour capter une erreur dans l'élément
    catch (Exception $e) 
    {
        echo 'Erreur : '.$e->getMessage().'<br>'; // Affiche l'erreur de l'élément en cours
        echo 'N° : '.$e->getCode(); // Affiche le code erreur de l'élément en cours
        die('Fin du script'); // permet d'arreter le script s'il y a une erreur, et donc de ne pas faire planter le site
    }
}
/*setAttribute() indique à PDO qu'il faut générer une exception à chaque fois qu'un problème est rencontré.
TRY... CATCH capte l'exception (dans $e) si échec de connexion et utilise les infos 
sur cette exception pour obtenir un message d'erreur avec getMessage() et getCode().
die() pour que le serveur arrête la lecture du script PHP.*/

?>
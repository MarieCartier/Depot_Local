<?php

function ConnexionBase() 
{
    try 
    {
        $db = new PDO("mysql:host=localhost;charset=utf8;dbname=user", "Marie", "Théophile24051995");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    } 

    catch (Exception $e) 
    {
        echo 'Erreur : '.$e->getMessage().'<br>';
        echo 'N° : '.$e->getCode();
        die('Fin du script');
    }
}
?>

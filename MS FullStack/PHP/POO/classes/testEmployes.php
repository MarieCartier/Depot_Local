<?php

include "Employes.class.php";

$employe1 = new Employes("Cartier", "Marie", 27000, new DateTime("31-11-2010"));
$employe1->setEnseigne("Pimkie");
$employe1->setVille("Rennes");
$employe1->setPoste("DRH");
$employe1->setService("Ressources Humaines");
$employe1->setAdresse("15 rue des choux");
$employe1->setCode(35000);
$employe1->setRestaurant(false);
$employe1->setEnfants(array(12));

echo "Voici les infos de l'employé 1 : <br>";
$employe1->duree();
$employe1->prime();
$employe1->repas();
$employe1->cadeaux();


echo "<br><br>";

$employe2 = new Employes("Noël", "Père", 57500, new DateTime("03-12-1862"));
$employe2->setEnseigne("Décathlon");
$employe2->setVille("Lille");
$employe2->setPoste("Designer");
$employe2->setService("Production");
$employe2->setAdresse("125 avenue des carottes");
$employe2->setCode(59000);
$employe2->setRestaurant(true);
$employe2->setEnfants(array(1, 12, 15, 18));

echo "Voici les infos de l'employé 2 : <br>";
$employe2->duree();
$employe2->prime();
$employe2->repas();
$employe2->cadeaux();




?>
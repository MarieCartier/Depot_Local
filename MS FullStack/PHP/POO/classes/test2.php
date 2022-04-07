<?php
require_once "Magasins.class.php";

$employe1 = new Employes("Cartier", "Marie", 27000, new DateTime("31-11-2010"));

$employe2 = new Employes("Noël", "Père", 57500, new DateTime("03-12-1862"));

$pimkie = new Magasins("Pimkie", "Rennes");
$pimkie->setRestaurant(false);
$pimkie->repas();
// $pimkie->addEmploye($employe1);


$decat = new Magasins("Décathlon", "Paris");
$decat->setRestaurant(true);
$decat->repas();
// $decat->addEmploye($employe2);
$decat->setAdresse("7 rue des champs");

var_dump($employe1);
var_dump($pimkie);
var_dump($employe2);
var_dump($decat);

?>
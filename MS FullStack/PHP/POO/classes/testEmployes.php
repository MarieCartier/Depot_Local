<?php

include "Employes.class.php";

$employe1 = new Employes("Cartier", "Marie", 27000, new DateTime("31-11-2010"));
$employe1->duree();
$employe1->prime();

echo "<br><br>";

$employe2 = new Employes("Noël", "Père", 57500, new DateTime("03-12-1862"));
$employe2->duree();
$employe2->prime();

// echo "<br><br>";

// $employe3 = new Employes("l'éponge", "Bob", 13000, new DateTime("13-07-1995"));
// $employe3->duree();
// $employe3->prime();

// echo "<br><br>";

// $employe4 = new Employes("Snow", "Jon", 36000, new DateTime("31-11-2021"));
// $employe4->duree();
// $employe4->prime();

// echo "<br><br>";

// $employe5 = new Employes("Duck", "Donald", 19342, new DateTime("05-05-2019"));
// $employe5->duree();
// $employe5->prime();

echo "<br><br>";

$decat = new Magasins("Décathlon", "Paris");
$decat->setRestaurant(true);
$decat->repas();
// $decat->addEmploye($employe2);

echo "<br><br>";

$pimkie = new Magasins("Pimkie", "Rennes");
$pimkie->setRestaurant(false);
$pimkie->repas();
// $pimkie->addEmploye($employe1);


var_dump($decat);
echo "<br><br>";

var_dump($pimkie);
echo "<br><br>";

$employe1->addMagasin($decat);
var_dump($employe1);
echo "<br><br>";


echo "<br><br>";


?>
<?php
include "Personnages.class.php";

$perso = new Personnage();
$perso->setNom("Cartier");
$perso->setPrenom("Marie");
$perso->setAge("28");
$perso->setSexe("Féminin");

var_dump($perso);
?>
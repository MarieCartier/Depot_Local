<?php
// Cette page serte à controler l'affichage de toutes les pages, notamment l'affichage des bilelts et de leur id
// En 1er lieu on appelle la page controleur.php

require 'controller/Controleur.php';

try { //On cherche la méthode action de la superglobale GET
    if(isset($_GET['action'])) {
        //Si elle existe et qu'elle vaut billet
        if($_GET['action'] == 'billet'){
            // Et si on appelle un id
            if(isset($_GET['id'])){
                //idBillet vaut la valeur de Get id (en int)
                $idBillet = intval($_GET['id']);
                // Si l'id n'est pas 0
                if ($idBillet != 0)
                    //Afficher le billet correspondant
                    billet($idBillet);
                //Si billet == 0, afficher l'exception
                else
                    throw new Exception("id billet non valide");
            // Si l'id billet n'est pas défini, afficher exception
            }else
                throw new Exception("id billet non défini");
        // Si l'action n'est pas = à billet, afficher l'exception
        }else
            throw new Exception("action non valide");
    // Si pas d'action défini du tout, afficher la fonction accueil
    }else {
        accueil();
    }

}catch(Exception $e) {
    erreur($e->getMessage());
}
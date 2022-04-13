<?php
// Cette page sert à définir toutes les fonctions "générales" utilisables dans toutes les pages
// Elle necessite l'appel de la page model.php

require 'model/Model.php';

// Quand on appelle la fonction accueil, cela affiche la liste de tous les billets du blog
function accueil() {
    $billets = getBillets(); // On récupère la fonction getBillets (avec un S) qui se trouve dans model.php
    require 'vue/vueAccueil.php'; // On redirige vers vueAccueil, qui sert de page d'accueil avec tous les billets 
}

// Quand on appelle la fonction billet, cela affiche les détails d'un seul billet
function billet($idBillet) {
    $billet = getBillet($idBillet); // On récupère la fonction getBillet qui se trouve dans model.php pour afficher le billet
    $commentaires = getComments($idBillet); // On récupère la fonction getComments qui se trouve dans model.php pour afficher les commentaires du billet
    require 'vue/vueBillet.php'; // On renvoie vers vueBillet qui sert de page spécifique pour chaque billet
}

// Quand on appelle la fonction erreur, cela affiche l'erreur en question
function erreur($msgErreur) {
    require 'vue/vueErreur.php';// Il suffit d'appeler la page vueErreur.php car tout est géré dedans
}
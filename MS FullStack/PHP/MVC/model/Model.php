<!--Model.php-->
<?php

// Cette page va définir toutes les fonctions spécifiques à intégrer dans les fonctions générales, notamment en intégrant la BDD

// Cette fonction intègre la base de donnée et permet d'accéder aux tables et d'afficher les erreurs s'il y en a
function getBdd()
{
    $bdd = new PDO("mysql:host=localhost;charset=utf8;dbname=user", "Marie", "Théophile24051995",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    return $bdd;
}

// Cette fonction affiche tous les billets
function getBillets()
{
    $bdd = getBdd(); // Pour cela elle a besoin d'accéder à la BDD
    //On écrit la requête qui va accéder aux données en précisant les alias, dans la table BILLET et trié en ordre décroissant
    $billets = $bdd->query('SELECT BIL_ID as id, BIL_DATE as date, BIL_TITRE as titre, BIL_CONTENU as contenu FROM T_BILLET order by BIL_ID desc');
    return $billets;
}


// Cette fonction affiche les détails d'un seul billet
function getBillet($idBillet){
    $bdd= getBdd(); // Elle accède donc à la BDD
    //On écrit la requête nécessaire avec les alias, la table BILLET en précisant quel id est à retenir
    $billet=$bdd->prepare('SELECT BIL_ID as id, BIL_DATE as date, BIL_TITRE as titre, BIL_CONTENU as contenu FROM T_BILLET WHERE BIL_ID =?;');
    $billet->execute(array($idBillet)); // On execute la requete affichant dans un tableau les infos concernant l'id

    // Si ce tableau contient bien 1 colonne contenant l'id en question
    if($billet->rowCount() == 1){
        // On affiche le billet en question avec fetch
        return $billet->fetch();
    }
    // Si le tableau 0 colonne, cela signifie que l'id n'existe pas dans la BDD
    else{
        throw new Exception("Aucun billet ne correspond à cet identifiant");
    }
}
// Cette fonction affiche les commentaires associés à un billet
function getComments($idBillet)
{
    $bdd = getBdd(); // On accède à la BDD
    // On écrit la requète nécessaire avec les alias, dans la table COMMENTAIRE, et on recherche uniquement l'id du billet en question
    $comments = $bdd->prepare('SELECT COM_ID as id, COM_DATE as date, COM_AUTEUR as auteur, COM_CONTENU as contenu FROM T_COMMENTAIRE WHERE BIL_ID =?');
    $comments->execute(array($idBillet)); // On execute la requete affichant dans un tableau l'id du billet
    return $comments;
}

?>
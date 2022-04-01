<?php
//Page d'accueil du site. On commence par intégrer la connection à la BDD pour avoir accès aux données

    // on importe le contenu du fichier "db.php"
    include "db.php";

    // on exécute la fonction de connexion à notre BDD
    $db = connexionBase();

    // on lance une requête pour chercher toutes les fiches d'artistes. La requête (query) se fait à partir de la BD ($bd) et est enregistrée dans une variable ($requete)
    $requete = $db->query("SELECT * FROM disc JOIN artist ON disc.artist_id = artist.artist_id ORDER BY disc_title"); // fonctionne avec langage SQL

    // on récupère tous les résultats trouvés dans une variable
    $tableau = $requete->fetchAll(PDO::FETCH_OBJ); // Fetch all permet de capter tous les objets contenus dans la table citée dans FROM, à partir de la requete enregistrée dans $requete
    
    // on clôt la requête en BDD
    $requete->closeCursor(); // Penser à cloturer la requete à la fin de celle-ci

    

/*
Connexion créée avec notre méthode connexionBase() = stockée dans $db (qui récupère l'objet PDO renvoyé avec return $connexion;)
SELECT en BDD est lancée grâce à query() de l'objet PDO et la réponse est stockée dans $requete
la méthode fetchAll() extrait les enregistrements trouvés et les renvoie sous forme de tableau d'objets, dans la variable $tableau
la méthode closeCursor(); libère la requête, pour pouvoir en lancer d'autres
*/

?>

<!--Un fois la demande de connection et les infos nécessaires précisées, on peut intégrer la page html qui nous sert de contenu-->

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Velvet Records</title>
        <link rel="icon" href="jaquettes/note.png" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="discs.css"/>

    </head>
    <body>
        <!--Début container-->
        <div class="container">
            <!--Titre + Ajouter-->
            <div class="row headerD">
                <h1 class="col-lg-10">Liste des disques (<?=count($tableau)?>)</h1> <!--Si on a besoin d'une donnée de la BDD, il faut intégrer des balises PHP dans le HTML--> 
                    <a class="btn btn-info" href="disc_new.php?id=">Ajouter</a>
            </div>
        </div>
            
        <div class="container">
        <!--division en 2 colonnes-->
            <section class="row" id="section1">

                <!--Liste des disques avec boucle PHP-->
                <?php foreach ($tableau as $disc): //$tableau étant un tableau contenant tous les éléments de la table disc, on peut boucler dessus
                    // $tableau = toute la table disc
                    // $disc = chaque ligne de la table
                    // $disc->nom_colonne = case de la colonne indiquée, correspondant à la ligne mentionnée avant?>

                    <!--Division pour chaque CD-->
                    <img class="col-xl-4 img-fluid" id="imgD" src="<?= $disc->disc_picture ?>" alt="jaquette de <?= $disc->disc_title?>" title="jaquette de <?= $disc->disc_title?>">
                    <div class="col-xl-2" id="infosD">
                        <div id="infos">
                            <h5><?= $disc->disc_title ?></h5>
                                <li type='none'><!--Ici, chaque point de la liste va contenir une case par ligne et par colonne-->
                                <li type='none'><b><?= $disc->artist_name ?></b></li>
                                <li type='none'><b>label: </b><?= $disc->disc_label ?></li>
                                <li type='none'><b>Year : </b><?= $disc->disc_year ?></li>
                                <li type='none'><b>Genre : </b><?= $disc->disc_genre ?></li>
                            </li>
                        </div>

                        <div id="détails">
                            <a class="btn btn-info" href="disc_detail.php?id=<?= $disc->disc_id ?>">Détails</a>
                        </div>
                    </div>
                    
                <?php endforeach; // Fin de la boucle PHP, permet d'afficher chaque balise HTML selon la case correspondante indiquée à l'intérieur des balises PHP?>
            </section>
        </div>
    </body>
</html>

<?PHP // /!\ fetchAll != fetch étant un tableau, fetch est un objet, on ne peut donc pas procéder de la même manière pour invoquer les éléments dans le HTML?>
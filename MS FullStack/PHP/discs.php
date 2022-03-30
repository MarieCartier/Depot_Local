<?php

    // on importe le contenu du fichier "db.php"
    include "db.php";

    // on exécute la méthode de connexion à notre BDD
    $db = connexionBase();

    // on lance une requête pour chercher toutes les fiches d'artistes
    $requete = $db->query("SELECT * FROM disc JOIN artist ON disc.artist_id = artist.artist_id ORDER BY disc_title");

    // on récupère tous les résultats trouvés dans une variable
    $tableau = $requete->fetchAll(PDO::FETCH_OBJ);
    
    // on clôt la requête en BDD
    $requete->closeCursor();

    

/*
Connexion créée avec notre méthode connexionBase() = stockée dans $db (qui récupère l'objet PDO renvoyé avec return $connexion;)
SELECT en BDD est lancée grâce à query() de l'objet PDO et la réponse est stockée dans $requete
la méthode fetchAll() extrait les enregistrements trouvés et les renvoie sous forme de tableau d'objets, dans la variable $tableau
la méthode closeCursor(); libère la requête, pour pouvoir en lancer d'autres
*/

?>

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
                <h1 class="col-lg-10">Liste des disques (<?=count($tableau)?>)</h1>
                    <a class="btn btn-info" href="disc_new.php?id=">Ajouter</a>
            </div>
        </div>
            
        <div class="container">
        <!--division en 2 colonnes-->
            <section class="row" id="section1">

                <!--Liste des disques avec boucle PHP-->
                <?php foreach ($tableau as $disc): ?>

                    <!--Division pour chaque CD-->
                    <img class="col-xl-3 img-fluid" id="imgD" src="<?= $disc->disc_picture ?>" alt="jaquette de <?= $disc->disc_title?>" title="jaquette de <?= $disc->disc_title?>">
                    <div class="col-xl-3" id="infosD">
                        <h5><?= $disc->disc_title ?></h5>
                        <br>
                        <ul type='none'>
                            <li><b><?= $disc->artist_name ?></b></li>
                            <li><b>label: </b><?= $disc->disc_label ?></li>
                            <li><b>Year : </b><?= $disc->disc_year ?></li>
                            <li><b>Genre : </b><?= $disc->disc_genre ?></li>
                        </ul>
                        <br>

                        <a class="btn btn-info" href="disc_detail.php?id=<?= $disc->disc_id ?>">Détails</a>

                    </div>
                    
                <?php endforeach; ?>
            </section>
        </div>
    </body>
</html>
<?php

    // on importe le contenu du fichier "db.php"
    include "db.php";

    // on exécute la méthode de connexion à notre BDD
    $db = connexionBase();

    // on lance une requête pour chercher toutes les fiches d'artistes
    $requete = $db->query("SELECT * FROM disc");

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
    <title>Liste discs</title>
</head>
<body>
<table>
    <h1>Liste des discs</h1>
    <button>
        <a href="script_disc_ajout.php?id=">Ajouter</a>
    </button>

        <?php foreach ($tableau as $disc): ?>
        <section>
            <h4><?= $disc->disc_title ?></h4>
            <ul type='none'>
                <li><?= $disc->artist_id ?></li>
                <li>label: <?= $disc->disc_label ?></li>
                <li>Year : <?= $disc->disc_year ?></li>
                <li>Genre : <?= $disc->disc_genre ?></li>
            </ul>
            <button>
            <a href="disc_detail.php?id=<?= $disc->disc_id ?>">Détail</a>
            </button>
        </section>
        <?php endforeach; ?>

</body>
</html>
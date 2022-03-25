<?php
    // On se connecte à la BDD via notre fichier db.php :
    require "db.php";
    $db = connexionBase();

    // On récupère l'ID passé en paramètre :
    $id = $_GET["id"];

    // On crée une requête préparée avec condition de recherche :
    $requete = $db->prepare("SELECT * FROM disc WHERE disc_id=?");

    // on ajoute l'ID du disque passé dans l'URL en paramètre et on exécute :
    $requete->execute(array($id));

    // on récupère le 1e (et seul) résultat :
    $myDisc = $requete->fetch(PDO::FETCH_OBJ);

    // on clôt la requête en BDD
    $requete->closeCursor();
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Détails</title>
    </head>
    <body>
        <h1>Details</h1>

        <form action ="script_disc_modif.php" method="post">

            <input type="hidden" name="id" disabled value="<?= $myDisc->disc_id ?>">

            <label for="nom_for_label">Title</label><br>
            <input type="text" name="title" id="title_of_disc" disabled value="<?= $myDisc->disc_title ?>">
            <br><br>

            <label for="url_for_label">Year</label><br>
            <input type="text" name="year" id="year_of_disc" disabled value="<?= $myDisc->disc_year ?>">
            <br><br>

            <label for="url_for_label">Label</label><br>
            <input type="text" name="label" id="label_of_disc" disabled value="<?= $myDisc->disc_label ?>">
            <br><br>

            <label for="url_for_label">Artist</label><br>
            <input type="text" name="artist" id="artist_of_disc" disabled value="<?= $myDisc->artist_id ?>">
            <br><br>

            <label for="url_for_label">Genre</label><br>
            <input type="text" name="genre" id="genre_of_disc" disabled value="<?= $myDisc->disc_genre ?>">
            <br><br>

            <label for="url_for_label">Price</label><br>
            <input type="text" name="price" id="price_of_disc" disabled value="<?= $myDisc->disc_price ?>">
            <br><br>

            <label for="img_of_disc">Picture</label>
            <img src="<?= $myDisc->disc_img ?>" alt="jaquette de <?= $myDisc->disc_title //penser a ajouter la colonne url dans la bdd?>">
            <br><br>

            <button><a href="script_disc_modif.php">Modifier</a></button>
            <button><a href="script_disc_delete.php">Supprimer</a></button>
            <button><a href="discs.php">Retour</a></button>

        </form>
    </body>
</html>
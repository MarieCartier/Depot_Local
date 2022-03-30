<?php
    // On se connecte à la BDD via notre fichier db.php :
    require "db.php";
    $db = connexionBase();

    // On récupère l'ID passé en paramètre :
    $id = $_GET["id"];

    // On crée une requête préparée avec condition de recherche :
    $requete = $db->prepare("SELECT * FROM disc JOIN artist ON disc.artist_id = artist.artist_id WHERE disc_id=?");

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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="jaquettes/note.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="discs.css"/>
    <title>Velvet Records</title>
</head>
<body>
    <!--Début container-->
    <div class="container">
        <!--Titre-->
        <div>
            <h1>Modifier un vinyle</h1>
        </div>

    <br>
    <br>

        <form action ="script_disc_modif.php" method="post">

            <input type="hidden" name="id" disabled value="<?= $myDisc->disc_id ?>">

            <label for="title_of_disc">Title</label><br>
            <input class="inputNew" type="text" name="title" id="title_of_disc" value="<?= $myDisc->disc_title ?>">
            <br><br>
        
            <label for="artist_of_disc">Artist</label><br>
            <select class="inputNew" name="artist" id="artist_of_disc">
                <option value=""></option>                 
            </select>
            <br><br>

            <label for="year_of_disc">Year</label><br>
            <input class="inputNew" type="text" name="year" id="year_of_disc" value="<?= $myDisc->disc_year ?>">
            <br><br>

            <label for="genre_of_disc">Genre</label><br>
            <input class="inputNew" type="text" name="genre" id="genre_of_disc" value="<?= $myDisc->disc_genre ?>">
            <br><br>

            <label for="url_for_label">Label</label><br>
            <input class="inputNew" type="text" name="label" id="label_of_disc" value="<?= $myDisc->disc_label ?>">
            <br><br>

            <label for="url_for_label">Price</label><br>
            <input class="inputNew" type="text" name="price" id="price_of_disc" value="<?= $myDisc->disc_price ?>">
            <br><br>

            <label for="img_of_disc">Picture</label><br>
            <img class="img-fluid" width="500px" src="<?= $myDisc->disc_picture ?>" alt="jaquette de <?= $myDisc->disc_title?>" title="jaquette de <?= $myDisc->disc_title?>" width="250">
            <br><br>

            <a class="btn btn-info" href="script_disc_modif.php?id=">Modifier</a>
            <a class="btn btn-info" href="discs.php">Retour</a>
        </form>
    </div>

</body>
</html>
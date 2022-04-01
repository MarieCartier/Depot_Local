<?php
// Même syntaxe sur toutes les pages pour la connection à la BDD
    require "db.php";
    $db = connexionBase(); // Connection
    $requete = $db->query("SELECT * FROM disc JOIN artist ON disc.artist_id = artist.artist_id"); // Ici on demande l'accès à toutes les données de la base
    $requete = $db->query("SELECT DISTINCT artist_name, artist_id FROM artist"); // Ici on demande en plus que les noms d'artists trouvé soient uniques
    $myDisc = $requete->fetchAll(PDO::FETCH_OBJ); // On enregistre dans myDisc le tableau contenant toutes les infos demandées au dessus
    $requete->closeCursor(); //Fin de requete

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
            <h1>Ajouter un vinyle</h1>
        </div>

    <br>
    <br>
        <!--Quand on ouvre un formulaire, il faut déclarer le fichier de traitement des données, et ajouter enctype pour la prise en compte des fichiers ajoutés-->
        <form action ="script_disc_ajout.php" method="post" enctype="multipart/form-data">

            <label for="title_of_disc">Title</label><br>
            <input class="inputNew" type="text" name="title" id="title_of_disc">
            <br><br>

            <label for="artist_of_disc">Artist</label><br>
            <select class="inputNew" name="artist" id="artist_of_disc">
                    <option value=""></option>
                <?php foreach ($myDisc as $artist): //Boucle de récupération des noms d'artistes pour liste déroulante?>
                    <option value="<?= $artist->artist_id ?>"><?= $artist->artist_name ?></option>
                <?php endforeach; ?>
            </select>
            
            <br><br>

            <label for="year_of_disc">Year</label><br>
            <input class="inputNew" type="text" name="year" id="year_of_disc">
            <br><br>

            <label for="genre_of_disc">Genre</label><br>
            <input class="inputNew" type="text" name="genre" id="genre_of_disc">
            <br><br>

            <label for="label_of_disc">Label</label><br>
            <input class="inputNew" type="text" name="label" id="label_of_disc">
            <br><br>

            <label for="price_of_disc">Price</label><br>
            <input class="inputNew" type="text" name="price" id="price_of_disc">
            <br><br>

            <label for="picture_of_disc">Picture</label><br>
            <input type="file" name="picture" id="picture_of_disc">
            <br><br>

            <input type="submit" class="btn btn-info" value="Ajouter"></input> 
            <input type="reset" class="btn btn-info" value="Annuler"></input>
            <a class="btn btn-info" href="discs.php">Retour</a>
            <!--Pour validation d'un formulaire avec récupération des données entrées, on a besoin d'un input type submit, qui renvoie au fichier mentionnée dans la déclaration du formulaire-->
        </form>

    </div>
</body>
</html>

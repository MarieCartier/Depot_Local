<?php
// Formulaire de modification 
// Dans cette partie, nous avons besoin de récupérer les infos d'une ligne (id en cours), mais aussi de toute la table artist (pour la liste déroulante)
// Pour cela, on va lancer 2 requetes, une en fetch et une en fetchAll
// On lance une requete (ciblée sur l'id), on execute fetch dans une variable
// puis on lance une seconde requete (ciblée sur le nom de tous les artistes uniques), on execute fetchAll dans une autre variable
// On pourra par la suite utiliser distinctement ces deux variables selon le besoin

    require "db.php";
    $db = connexionBase();
    $id = $_GET["id"];
    $requete = $db->prepare("SELECT * FROM disc JOIN artist ON disc.artist_id = artist.artist_id WHERE disc_id = ?"); // Penser à ajouter l'id sinon toutes les infos seront celles de la 1ere ligne de la table
    $requete->execute(array($id));
    $myDisc = $requete->fetch(PDO::FETCH_OBJ);

    $requete = $db->query("SELECT DISTINCT artist_name, artist_id FROM artist");
    $artists = $requete->fetchAll(PDO::FETCH_OBJ);

    // var_dump($myDisc);
    // var_dump($artists); //=> Permet de voir ce que contient la variable quand on bloque

    //Penser à cloturer APRES les 2 requetes
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
    <div class="container discBottom"">
        <!--Titre-->
        <div>
            <h1>Modifier un vinyle</h1>
        </div>

    <br>
    <br>
        <form action ="script_disc_modif.php" method="post" enctype="multipart/form-data">

            <input type="hidden" name="id" value="<?= $myDisc->disc_id // Ici on récupère un OBJ en fetch?>">

            <label for="title_of_disc">Title</label><br>
            <input class="inputNew" type="text" name="title" id="title_of_disc" value="<?= $myDisc->disc_title ?>">
            <br><br>
        
            <label for="artist_of_disc">Artist</label><br>
            <select class="inputNew" name="artist" id="artist_of_disc">
            
                <?php foreach ($artists as $artist): // Ici on récupère un Array en fetchAll?>
                    <!--En plus de la boucle, il faut pré-sélectionner l'artiste de l'id en question, on intègre donc une condition dans la boucle-->
                    <option value="<?= $artist->artist_id ?>" <?= ($artist->artist_id == $myDisc->artist_id) ? "selected" : "" ?>><?= $artist->artist_name // Version simplifiée?> </option>
                <?php endforeach; ?>

            </select>
            <br><br>

            <label for="year_of_disc">Year</label><br>
            <input class="inputNew" type="text" name="year" id="year_of_disc" value="<?= $myDisc->disc_year ?>">
            <br><br>

            <label for="genre_of_disc">Genre</label><br>
            <input class="inputNew" type="text" name="genre" id="genre_of_disc" value="<?= $myDisc->disc_genre ?>">
            <br><br>

            <label for="label_of_disc">Label</label><br>
            <input class="inputNew" type="text" name="label" id="label_of_disc" value="<?= $myDisc->disc_label ?>">
            <br><br>

            <label for="price_of_disc">Price</label><br>
            <input class="inputNew" type="text" name="price" id="price_of_disc" value="<?= $myDisc->disc_price ?>">
            <br><br>

            <label for="img_of_disc">Picture</label><br>
            <input type="file" name="picture" id="picture_of_disc"><br>
            <img class="img-fluid" width="500px" src="<?= $myDisc->disc_picture ?>" alt="jaquette de <?= $myDisc->disc_title?>" title="jaquette de <?= $myDisc->disc_title?>">
            <br><br>

            <input class="btn btn-info" type="submit" value="Modifier">
            <a class="btn btn-info" href="discs.php">Retour</a>
        </form>
    </div>

</body>
</html>
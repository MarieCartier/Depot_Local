<?php
    require "db.php";
    $db = connexionBase();
    $requete = $db->prepare("SELECT * FROM disc JOIN artist ON disc.artist_id = artist.artist_id WHERE disc_id = :id");
    $requete->execute(array(
        ":id" => $_GET["id"]
    ));
    $myDisc = $requete->fetch(PDO::FETCH_OBJ);

    $requete = $db->query("SELECT DISTINCT artist_name, artist_id FROM artist");
    $artists = $requete->fetchAll(PDO::FETCH_OBJ);

    // var_dump($myDisc);
    // var_dump($artists);
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
        <form action ="script_disc_modif.php" method="get" enctype="multipart/form-data">

            <input type="hidden" name="id" value="<?= $myDisc->disc_id ?>">

            <label for="title_of_disc">Title</label><br>
            <input class="inputNew" type="text" name="title" id="title_of_disc" value="<?= $myDisc->disc_title ?>">
            <br><br>
        
            <label for="artist_of_disc">Artist</label><br>
            <select class="inputNew" name="artist" id="artist_of_disc">
            
                <?php foreach ($artists as $artist): ?>
                    <option value="<?= $artist->artist_id ?>" <?= ($artist->artist_id == $myDisc->artist_id) ? "selected" : "" ?>><?= $artist->artist_name ?> </option>
                    <!-- <option value="<?= $artist->artist_id ?>" <?php if ($artist->artist_id == $myDisc->artist_id) echo "selected" ?>><?= $artist->artist_name ?> </option> -->
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
<?php
    // Récupération des valeurs :
    $id = (isset($_POST['id']) && $_POST['id'] != "") ? $_POST['id'] : Null;
    $title = (isset($_POST['title']) && $_POST['title'] != "") ? $_POST['title'] : Null;
    $year = (isset($_POST['year']) && $_POST['year'] != "") ? $_POST['year'] : Null;
    $label = (isset($_POST['label']) && $_POST['label'] != "") ? $_POST['label'] : Null;
    $genre = (isset($_POST['genre']) && $_POST['genre'] != "") ? $_POST['genre'] : Null;
    $price = (isset($_POST['price']) && $_POST['price'] != "") ? $_POST['price'] : Null;
    //$artist = (isset($_POST['artist']) && $_POST['artist'] != "") ? $_POST['artist'] : Null;


    // En cas d'erreur, on renvoie vers le formulaire
    if ($title == Null || $year == Null || $label == Null || $genre == Null || $price == Null /*|| $artist == Null*/) header("Location: disc_form.php?id=?");

    // Si la vérification des données est ok :
    require "db.php"; 
    $db = connexionBase();

    try {
        // Construction de la requête UPDATE sans injection SQL :
        $requete = $db->prepare("UPDATE disc SET disc_title = :title, disc_year = :year, disc_label = :label, disc_genre = :genre, disc_price = :price;");
        $requete->bindValue(":title", $title, PDO::PARAM_STR);
        $requete->bindValue(":year", $year, PDO::PARAM_STR);
        //$requete->bindValue(":picture", $picture, PDO::PARAM_STR);
        $requete->bindValue(":label", $label, PDO::PARAM_STR);
        $requete->bindValue(":genre", $genre, PDO::PARAM_STR);
        $requete->bindValue(":price", $price, PDO::PARAM_STR);
        //$requete->bindValue(":artist", $artist, PDO::PARAM_STR);
    
        $requete->execute();
        $requete->closeCursor();
    }

    catch (Exception $e) {
        var_dump($requete->queryString);
        var_dump($requete->errorInfo());    
        echo "Erreur : " . $requete->errorInfo()[2] . "<br>";
        die("Fin du script (script_disc_modif.php)");
    }

    // Si OK: redirection vers la page artist_detail.php
    header("Location: disc_detail.php?id=$id");
    exit;

    ?>
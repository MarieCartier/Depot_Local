<?php

// var_dump($_GET);
// var_dump($_POST);
// die;
    // Récupération des valeurs :
    $id = (isset($_POST['id']) && $_POST['id'] != "") ? $_POST['id'] : Null;
    $title = (isset($_POST['title']) && $_POST['title'] != "") ? $_POST['title'] : Null;
    $year = (isset($_POST['year']) && $_POST['year'] != "") ? $_POST['year'] : Null;
    $label = (isset($_POST['label']) && $_POST['label'] != "") ? $_POST['label'] : Null;
    $genre = (isset($_POST['genre']) && $_POST['genre'] != "") ? $_POST['genre'] : Null;
    $price = (isset($_POST['price']) && $_POST['price'] != "") ? $_POST['price'] : Null;
    $artist = (isset($_POST['artist']) && $_POST['artist'] != "") ? $_POST['artist'] : Null;

    if ($title == Null || $year == Null || $genre == Null || $label == Null || $price == Null || $artist == Null) header("Location: disc_new.php");

    // Si la vérification des données est ok :
    require "db.php"; 
    $db = connexionBase();


    if ($_FILES["picture"]["name"] != "")
    {
        // Gestion erreur de chargement de fichier
        if ($_FILES["picture"]["error"] > 0) {
            var_dump($_FILES);
            echo 'Erreur de chargement, ';
        };
        
        // On met les types autorisés dans un tableau (ici pour une image)
        $aMimeTypes = array("image/gif", "image/jpeg", "image/pjpeg", "image/png", "image/x-png", "image/tiff");
        
        // On extrait le type du fichier via l'extension FILE_INFO 
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mimetype = finfo_file($finfo, $_FILES["picture"]["tmp_name"]);
        finfo_close($finfo);
        
        
        if (in_array($mimetype, $aMimeTypes))
        {
        /* Le type est parmi ceux autorisés, donc OK, on va pouvoir 
        déplacer et renommer le fichier */
        move_uploaded_file($_FILES["picture"]["tmp_name"], "jaquettes/jaquette_$title.jpg");
        $picture = "jaquettes/jaquette_$title.jpg";
        
        } 
        else 
        {
        // Le type n'est pas autorisé, donc ERREUR
        
            echo "Type de fichier non autorisé";    
            exit;
        }  

        // requête update pour l'image
        // try {
        //     $requete = $db->prepare("UPDATE disc SET disc_picture = :picture WHERE disc_id = :id;");
        //     $requete->bindValue(":picture", $picture, PDO::PARAM_STR);        
        //     $requete->execute();
        //     $requete->closeCursor();
        // }
        //     catch (Exception $e) {
        //     var_dump($requete->queryString);
        //     var_dump($requete->errorInfo());    
        //     echo "Erreur : " . $requete->errorInfo()[2] . "<br>";
        //     die("Fin du script (script_disc_modif.php)");
        // }
    }

    try {

        if ($picture != Null) {
            $requete = $db->prepare("UPDATE disc SET disc_title = :title, disc_year = :year, disc_picture = :picture, disc_label = :label, disc_genre = :genre, disc_price = :price, artist_id = :artist WHERE disc_id = :id;");
            $requete->bindValue(":picture", $picture, PDO::PARAM_STR);
        }
        else {
        $requete = $db->prepare("UPDATE disc SET disc_title = :title, disc_year = :year, disc_label = :label, disc_genre = :genre, disc_price = :price, artist_id = :artist WHERE disc_id = :id;");
        }
        // Construction de la requête UPDATE sans injection SQL :
        $requete->bindValue(":title", $title, PDO::PARAM_STR);
        $requete->bindValue(":year", $year, PDO::PARAM_STR);
        $requete->bindValue(":label", $label, PDO::PARAM_STR);
        $requete->bindValue(":genre", $genre, PDO::PARAM_STR);
        $requete->bindValue(":price", $price, PDO::PARAM_STR);
        $requete->bindValue(":id", $id, PDO::PARAM_INT);
        $requete->bindValue(":artist", $artist, PDO::PARAM_STR);
    
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
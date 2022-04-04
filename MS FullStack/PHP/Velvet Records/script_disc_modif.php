<?php
//Script qui va valider la modification des infos
// En plus de ce qu'on a fait dans l'ajout, il faut donner une condition de gestion de fichier, qui n'est pas obligatoire

    // Récupération des valeurs :
    $id = (isset($_POST['id']) && $_POST['id'] != "") ? $_POST['id'] : Null;
    $title = (isset($_POST['title']) && $_POST['title'] != "") ? $_POST['title'] : Null;
    $year = (isset($_POST['year']) && $_POST['year'] != "") ? $_POST['year'] : Null;
    $label = (isset($_POST['label']) && $_POST['label'] != "") ? $_POST['label'] : Null;
    $genre = (isset($_POST['genre']) && $_POST['genre'] != "") ? $_POST['genre'] : Null;
    $price = (isset($_POST['price']) && $_POST['price'] != "") ? $_POST['price'] : Null;
    $artist = (isset($_POST['artist']) && $_POST['artist'] != "") ? $_POST['artist'] : Null;

    // Artist étant dans une liste déroulante automatiquement sélectionnée, il n'est pas obligatoire de l'inclure dans la condition filtre
    if ($title == Null || $year == Null || $genre == Null || $label == Null || $price == Null || $artist == Null) header("Location: disc_form.php");

    // Si la vérification des données est ok :
    require "db.php"; 
    $db = connexionBase();

    // Puisque l'ajout d'un nouveau fichier n'est pas obligatoire, on intègre toute la gestion dans une condition

    if ($_FILES["picture"]["name"] != "") //On récupère les infos avec $_FILES, le nom ne doit pas etre vide pour commencer la gestion
    {
        // En premier on gère les erreurs et on arrete le script
        if ($_FILES["picture"]["error"] > 0) {
            var_dump($_FILES);
            echo 'Erreur de chargement, ';
            die;
        };
        
        // On met les types autorisés dans un tableau
        $aMimeTypes = array("image/gif", "image/jpeg", "image/pjpeg", "image/png", "image/x-png", "image/tiff");
        
        // On extrait le type du fichier via l'extension FILE_INFO 
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mimetype = finfo_file($finfo, $_FILES["picture"]["tmp_name"]);
        finfo_close($finfo);
        
        //On filtre le type de fichier pour vérifier la correspondance
        if (in_array($mimetype, $aMimeTypes))
        {
            // Le type est parmi ceux autorisés, donc on va pouvoir déplacer et renommer le fichier
            move_uploaded_file($_FILES["picture"]["tmp_name"], "jaquettes/jaquette_$title.jpg");
            $picture = "jaquettes/jaquette_$title.jpg";
        
        } 
        else 
        {
            // Le type n'est pas autorisé, donc ERREUR
            echo "Type de fichier non autorisé";    
            exit;
        }  

        // On peut s'arrêter ici et gérer le reste en dehors de la condition, OU on peut inclure directement la requete contenant l'image, 
        // En intégrant toute la partie execute et close, ainsi que la gestion d'erreurs, mais ca fait 2x plus de lignes de code

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

    //Si on inclue pas la requete dans la condition, il faut penser à faire une condition avec 2 requetes:
    //La 1ere si il n'y a pas de fichier uploadé
    //La 2nde si il y a bien un fichier uploadé
    
    try {
        //Si un fichier, on n'inclue picture dans la requete et un fait un bindValue pour associer donnée et colonne
        if ($picture != Null) {
            $requete = $db->prepare("UPDATE disc SET disc_title = :title, disc_year = :year, disc_picture = :picture, disc_label = :label, disc_genre = :genre, disc_price = :price, artist_id = :artist WHERE disc_id = :id;");
            $requete->bindValue(":picture", $picture, PDO::PARAM_STR);
        }
        //Si pas de fichier, on construit une requete sans picture
        else {
        $requete = $db->prepare("UPDATE disc SET disc_title = :title, disc_year = :year, disc_label = :label, disc_genre = :genre, disc_price = :price, artist_id = :artist WHERE disc_id = :id;");
        }

        //Dans les 2 cas, on continue la requete avec bindValue de tous les autres alias
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

    //Fin classique de la requête
    catch (Exception $e) {
        var_dump($requete->queryString);
        var_dump($requete->errorInfo());    
        echo "Erreur : " . $requete->errorInfo()[2] . "<br>";
        die("Fin du script (script_disc_modif.php)");
    }

    header("Location: disc_detail.php?id=$id");
    exit;

    ?>
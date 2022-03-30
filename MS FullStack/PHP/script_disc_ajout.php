<?php
    // Récupération des données:
    $title = (isset($_POST['title']) && $_POST['title'] != "") ? $_POST['title'] : Null;
    $year = (isset($_POST['year']) && $_POST['year'] != "") ? $_POST['year'] : Null;
    $label = (isset($_POST['label']) && $_POST['label'] != "") ? $_POST['label'] : Null;
    $genre = (isset($_POST['genre']) && $_POST['genre'] != "") ? $_POST['genre'] : Null;
    $price = (isset($_POST['price']) && $_POST['price'] != "") ? $_POST['price'] : Null;
    $artist = (isset($_POST['artist']) && $_POST['artist'] != "") ? $_POST['artist'] : Null;

    // En cas d'erreur, on renvoie vers le formulaire
    if ($title == Null || $year == Null || $genre == Null || $label == Null || $price == Null || $artist == Null) header("Location: disc_new.php");

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

//verification si l'image est chargée ou erreur, verification du type ou erreur, déplacer le fichier avec les autres
//Vérifier upload_max (taile max image) dans php.ini

    // S'il n'y a pas eu de redirection vers le formulaire (= si la vérification des données est ok) :
    require "db.php";
    $db = connexionBase();


/*en PHP, les données envoyées en POST sont stockées dans la superglobale $_POST. 
Chaque input du formulaire portant un attribut name génère une cellule dans $_POST 
(qui est un tableau associatif), accessible grâce à la syntaxe suivante : $valeur_input = $_POST["attribut_name"].
*/


    
try {
    // Construction de la requête INSERT sans injection SQL :
    $requete = $db->prepare("INSERT INTO disc (disc_title, disc_year, disc_label, disc_genre, disc_price, artist_id, disc_picture) VALUES (:title, :year, :label, :genre, :price, :artist, :picture);");

    // Association des valeurs aux paramètres via bindValue() :
    $requete->bindValue(":title", $title, PDO::PARAM_STR);
    $requete->bindValue(":year", $year, PDO::PARAM_STR);
    $requete->bindValue(":picture", $picture, PDO::PARAM_STR);
    $requete->bindValue(":label", $label, PDO::PARAM_STR);
    $requete->bindValue(":genre", $genre, PDO::PARAM_STR);
    $requete->bindValue(":price", $price, PDO::PARAM_STR);
    $requete->bindValue(":artist", $artist, PDO::PARAM_STR);


    // Lancement de la requête :
    $requete->execute();

    // Libération de la requête (utile pour lancer d'autres requêtes par la suite) :
    $requete->closeCursor();
}

// Gestion des erreurs
catch (Exception $e) {
    var_dump($requete->queryString);
    var_dump($requete->errorInfo());
    echo "Erreur : " . $requete->errorInfo()[2] . "<br>";
    die("Fin du script (script_disc_ajout.php)");
}

// Si OK: redirection vers la page artists.php
header("Location: discs.php");

// Fermeture du script
exit;
?>
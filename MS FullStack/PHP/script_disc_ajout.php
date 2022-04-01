<?php // Ici on a le script de récupération des données contenues dans le formulaire d'ajout d'un disc.
    // Pas besoin de déclarer la BDD car on récupère des données

    // en PHP, les données envoyées en POST sont stockées dans la superglobale $_POST. 
    // Chaque input du formulaire portant un attribut name génère une cellule dans $_POST 
    // (qui est un tableau associatif), accessible grâce à la syntaxe suivante : $valeur_input = $_POST["attribut_name"].
    // Récupération des données. Chaque variable va contenir la données dont l'alias est formulé dans le 'name' de chaque input.

    // isset permet de vérifier que le name existe bien, POST est un tableau associatif (superglobale) qui enregistre les infos récupérées.
    // ici on a une forme simplifiée de conditon avec (condition)?(inst1):(else inst2)
    // DONC: si chaque input décrit existe et n'est pas vide, indiqué la valeur contenue, sinon indiquer Null

    $title = (isset($_POST['title']) && $_POST['title'] != "") ? $_POST['title'] : Null;
    $year = (isset($_POST['year']) && $_POST['year'] != "") ? $_POST['year'] : Null;
    $label = (isset($_POST['label']) && $_POST['label'] != "") ? $_POST['label'] : Null;
    $genre = (isset($_POST['genre']) && $_POST['genre'] != "") ? $_POST['genre'] : Null;
    $price = (isset($_POST['price']) && $_POST['price'] != "") ? $_POST['price'] : Null;
    $artist = (isset($_POST['artist']) && $_POST['artist'] != "") ? $_POST['artist'] : Null;

    // En cas d'erreur, on renvoie vers le formulaire. Pour cela on établie une condition, qui indique que si un des input est vide on doit renvoyer au formulaire
    // en cours pour que tous les champs indiqués soient remplis
    // Pour gérer le fichier uploadé, il faut penser à utiliser la superglobale FILES, qui est un tableau associatif. Comme un nom est obligatoire au fichier, 
    // ici on part du principe que le 'name' de 'picture' contenu dans FILES ne doit pas être vide, pour pouvoir controler le chargement du fichier
    if ($title == Null || $year == Null || $genre == Null || $label == Null || $price == Null || $artist == Null || $_FILES["picture"]["name"] == "") header("Location: disc_new.php");

    // Gestion erreur de chargement de fichier. On utilise la superglobale FILES pour voir si la clé/array 'error' est supérieure à 0, si oui cela signifie qu'une erreur est enregistrée
    if ($_FILES["picture"]["error"] > 0) {
        var_dump($_FILES); // On affiche le tableau Files pour savoir quelle erreur apparait
        echo "Erreur de chargement: ".$_FILES['picture']['error'];
        die;
    };
    
    // On met les types autorisés dans un tableau (ici pour une image)
    $aMimeTypes = array("image/gif", "image/jpeg", "image/pjpeg", "image/png", "image/x-png", "image/tiff");
    
    // On extrait le type du fichier via l'extension FILEINFO, qui ouvre les informations du fichier chargé
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mimetype = finfo_file($finfo, $_FILES["picture"]["tmp_name"]);
    finfo_close($finfo);
    
    //On vérifie si le mimetype trouvé correspond à un élément du tableau indiqué en filtre
    if (in_array($mimetype, $aMimeTypes))
    {
    /* si type est parmi ceux autorisés, on va pouvoir déplacer et renommer le fichier en lui fournissant le dossier d'enregistrement
    (dans le meme répertoire que le fichier PHP), on le nom qu'on veut lui donner */
    move_uploaded_file($_FILES["picture"]["tmp_name"], "jaquettes/jaquette_$title.jpg");
    $picture = "jaquettes/jaquette_$title.jpg"; //Ici, on attribue le chemin indiqué à la variable picture qui sera réutilisée après
    } 
    else 
    {
    // si le type n'est pas autorisé, on affiche l'erreur et on coupe l'execution du script
    
        echo "Type de fichier non autorisé";
        exit;
    }  

//Penser à vérifier upload_max (taile maximum de l'image) dans php.ini, pour que cela corresponde, et ne fasse pas planter le serveur



// Maintenant que les données sont récupérées, si'il n'y a pas d'erreurs, on peut se connecter à la base pour les enregistrer 

    require "db.php";
    $db = connexionBase();

// On lance un try/catch pour enregistrer les données, et capter les erreurs s'il y en a 
    
    try {
        // On utilise des requêtes préparées pour assurer la sécurité des données, cad on ne met pas les données directement dans la requête, on donne uniquement l'alias.
        //Les alias sont formulés en récupérant le 'name' de l'input, associé à deux point => :alias
        // Construction de la requête INSERT, sans injection SQL, comme dans la BDD :
        $requete = $db->prepare("INSERT INTO disc (disc_title, disc_year, disc_label, disc_genre, disc_price, artist_id, disc_picture) VALUES (:title, :year, :label, :genre, :price, :artist, :picture);");

        // On associe ensuite les valeurs indiquées dans la requête aux données stockées dans les variables, via bindValue() :
        $requete->bindValue(":title", $title, PDO::PARAM_STR);
        $requete->bindValue(":year", $year, PDO::PARAM_STR);
        $requete->bindValue(":picture", $picture, PDO::PARAM_STR); //requete + bind value ("alias + donnée + PDO::PARAM_+ type variable, STR, INT, ...")
        $requete->bindValue(":label", $label, PDO::PARAM_STR);
        $requete->bindValue(":genre", $genre, PDO::PARAM_STR);
        $requete->bindValue(":price", $price, PDO::PARAM_STR);
        $requete->bindValue(":artist", $artist, PDO::PARAM_STR);

        // Une fois l'association des données formulée, on demande l'exécution de la requête qui va ajouter les données dans la BDD
        $requete->execute();

        // On clos la requête en cours, ce qui permet par la suite de lancer d'autres requêtes si besoin)
        $requete->closeCursor();
    }

    // On termine le catch en demandant la gestion des potentielles erreurs
    catch (Exception $e) {
        var_dump($requete->queryString); // Où est l'erreur
        var_dump($requete->errorInfo()); // Infos de l'erreur
        echo "Erreur : ".$requete->errorInfo()."<br>"; // Affiche quelle erreur
        die("Fin du script (script_disc_ajout.php)"); // Stop le script
    }

    // Si pas d'erreurs, on redirige vers la page d'accueil où l'ajout sera visible
    header("Location: discs.php");

    // Fermeture du script
    exit;
?>
<?php
//Formulaire d'inscription qui renvoie vers le script inscrip_script.php
    include "db.php";
    $db = connexionBase();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="discs.css"/>
    <title>Inscription</title>
</head>
    <body>
        <div class="container">
            <h1>Créer mon espace personnel</h1>
            <br>
            <form action="inscrip_script.php" method="post">
            <div class="row">

                <label class="col-2" for="nom" id="nom">Nom : </label>
                <input class="col-4" type="text" name="nom">
                <div class="required" id="nomM"></div>
<br>

                <label class="col-2" for="prenom" id="prenom">Prénom : </label>
                <input class="col-4" type="text" name="prenom">
                <div class="required" id="prenomM"></div>
<br>

                <label class="col-2" for="mail" id="mail">Adresse mail : </label>
                <input class="col-4" type="text" name="mail">
                <div class="required" id="mailM"></div>
<br>

                <label class="col-2" for="mdp" id="mdp">Mot de passe : </label>
                <input class="col-4" type="password" name="mdp">
                <div class="required" id="mdpM"></div>

            </div>

<br>

                <input class="btn btn-warning" type="submit" value="Valider" id="valider">
                <input class="btn btn-warning" type="reset" value="Effacer">
                <a class="btn btn-warning" href="index.php">Retour</a>
            </form>
        </div>
    </body>
</html>
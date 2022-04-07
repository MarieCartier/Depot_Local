<?php
//Formulaire de connexion
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="discs.css"/>
    <title>Connexion</title>
</head>
    <body>
        <div class="container">

            <h1>Connexion à mon espace personnel</h1>
            <form action="login_script.php" method="post">

            <div class="row">
                <label class="col-2" for="mail" id="login">Login : </label>
                <input class="col-4" type="text" name="mail">
                <div class="required" id="nomM"></div>
                <br>

                <label class="col-2" for="mdp" id="mdp">Mot de passe : </label>
                <input class="col-4" type="password" name="mdp">
                <div class="required" id="nomM"></div>
                <br>
            </div>

                <input class="btn btn-warning" type="submit" value="Connexion">
                <input class="btn btn-warning" type="reset" value="Effacer">
                <a class="btn btn-warning" href="index.php">Retour</a>

            </form>

        </div>
    </body>
</html>
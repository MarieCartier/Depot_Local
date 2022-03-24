<!DOCTYPE html>
    <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
        </head>
        <body>
            <?php 
//Ex 1
/*function lien($url, $title)
{
    echo "Voici votre lien : <a href='$url'>$title</a>";
}

lien("https://www.reddit.com/", "Reddit Hug");



//Ex 2
$tab = array(4, 3, 8, 2);
global $a, $b;

function somme($a)
{
    $sum=0;
    for($b=0; $b<count($a); $b++)
    {
        $sum+=$a[$b];
    }
    echo "<br> La somme du tableau est : $sum";
};

$resultat = somme($tab);

//Ex 3

function complex_password ($mdp)
{
    $filtre = preg_match_all("~<?=.+[A-Z]><?=.+[a-z]><?=.+\d><?=.+[-+!\*$@%_]><[-\+!\*@%_\w]{8,15}>$", $mdp);
    $filtre = "~([A-Z]+[a-z]+[\d]+[,#!.?%$*]+){8,}~", $mdp);

    if($filtre==true)
    {
        echo "<br>true";
    }
    else if($filtre==false)
    {
        echo "<br>false";
    }

};

$resultats = complex_password("Topsec12-");*/

$datePattern = "/^[0-9]{4}-[0-1][0-9]-[0-3][0-9]$/";
$date = "2019-13-32";

if (preg_match($datePattern, $date))
{
    echo "Date ".$date." valide.<br>";
}
else
{
    echo "Date ".$date." erronée.<br>";
}


$oDate =  DateTime::createFromFormat("d/m/Y H:i:s", "17/12/1966 03:42:11");

$errors = DateTime::getLastErrors();

if ($errors["error_count"]>0 || $errors["warning_count"]>0) {
    echo "ARGHHHH !";
}
            ?> 
        </body>
    </html>
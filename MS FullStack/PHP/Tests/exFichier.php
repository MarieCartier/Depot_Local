<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="post.php" method="post" enctype="multipart/form-data">
    <input type="file" name="fichier"> 
    <button type="submit">Envoyer</button>


    <?php











/*// On déclare une variable dont la valeur (contenu) sera écrite dans le fichier
$myVar = "Bonjour le monde";

// Ouverture en écriture seule 
$fp = fopen("essai.txt", "a"); 

// Ecriture du contenu ($myVar) 
fputs($fp, $myVar); 

// Fermeture du fichier  
fclose($fp); 

// Ouverture en lecture seule  
$fp = fopen("essai.txt", "r"); 

// Boucle jusqu'à la fin du fichier
while (!feof($fp)) 
{ 
    // Lecture d'une ligne, le contenu de la ligne est affecté à la variable $ligne  
    $ligne = fgets($fp, 4096); 
    echo $ligne."<br>"; 
} 


$path = "/home/httpd/html/index.php"; 
$file = basename($path);
echo $file;

$fichier = "toto.txt"; 
/* création d'un fichier toto.txt.bak 
copy($fichier, $fichier.'.bak');


    // On ouvre le fichier moncompteur.txt
    $fichier = fopen("moncompteur.txt","r+");

    // on lit la première ligne du fichier, le résultat est stocké dans la variable $visiteurs
    $visiteurs = fgets($fichier);

    // on ajoute 1 au nombre de visiteurs
    $visiteurs++;

    // on se positionne au début du fichier
    fseek($fichier,0);

    // on écrit le nouveau nombre dans le fichier
    fputs($fichier,$visiteurs);

    // on referme le fichier moncompteur.txt
    fclose($fichier);

    // on indique sur la page le nombre de visiteurs
    echo "$visiteurs personnes sont passées par ici";*/



    ?>
</body>
</html>
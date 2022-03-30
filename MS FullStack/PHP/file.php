<?php
var_dump($_FILES);


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

$title= 'titre_de_ce_disque';

if (in_array($mimetype, $aMimeTypes))
{
/* Le type est parmi ceux autorisés, donc OK, on va pouvoir 
déplacer et renommer le fichier */
move_uploaded_file($_FILES["picture"]["tmp_name"], "jaquettes/jaquette_$title.jpg");
echo "nom du fichier : jaquettes/jaquette_$title";

} 
else 
{
// Le type n'est pas autorisé, donc ERREUR

    echo "Type de fichier non autorisé";    
    exit;
}  
?>
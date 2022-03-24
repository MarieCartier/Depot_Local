<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

$fichier = file("lien.txt");

for ($a=0; $a<count($fichier); $a++)
{
    echo"<a href='$fichier[$a]'>$fichier[$a]</a><br>";
};



    ?>
</body>
</html>
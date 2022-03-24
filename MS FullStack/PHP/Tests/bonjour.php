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





        $myVar = "KO";

                /*if ($myVar != "OK") 
                {
                    error_log("Ouh là pas bien");
                    // Message enregistré dans le fichier 'C:/<repertoire_logs>/php_error.log' 
                }*/


                /*echo "Bonjour le monde,\rcomment allez-vous ? <br>"; 

                $var1 = "bonjour";
                $$var1 = "le monde"; 

                echo $bonjour;*/

                /*$message = __FILE__." l.".__LINE__." : Ouh là pas bien ";
                error_log($message); */

                /*$age = 25; 

                $reponse = ($age >= 18) ? "majeur" : "mineur"; 
            
                echo "Vous êtes $reponse .";*/

// Exercice 1
                /*$a = 0;
                while ($a <= 150)
                {
                    if ($a%2)
                    {
                        echo $a." ";
                        $a++;
                    }
                    else
                    {
                        
                        $a++;
                    }
                };*/

// Exercice 3

// $NbrCol : le nombre de colonnes
// $NbrLigne : le nombre de lignes
$NbrCol = 12;
$NbrLigne = 12;

// on affiche en plus sur les 1ere ligne et 1ere colonne 
// les valeurs a multiplier
// le tableau fera donc 14 x 14

echo '<table border="1" width="400">';

// 1ere ligne (ligne 0)
echo '<tr>';
echo '<td>i X j</td>';
for ($j=0; $j<=$NbrCol; $j++) 
{
    echo '<td>'.$j.'</td>';//affiche sur chaque case de la 1ere colonne (td) la valeur de j
}
echo '</tr>';

// lignes suivantes
for ($i=0; $i<=$NbrLigne; $i++) 
{
    echo '<tr>';
    for ($j=0; $j<=$NbrCol; $j++) 
    {
        // 1ere colonne (colonne 0) // si i vaut 1, afficher i(1)
        if ($j==0) 
        {
            echo '<td>'.$i.'</td>';
        }

        // colonnes suivantes
        if ($i==$j) 
        {
            echo '<td>'; //créer une nouvelle colonne
        } 
        else 
        {
            echo '<td>';
        }

        // AFFICHAGE ligne $i, colonne $j // qui affichera i multiplié par 
        echo $i*$j;

        echo '</td>';
    }
    echo '</tr>';
}
echo '</table>';


/* Exercice 2
                $b = 0;
                while($b<=500)
                {
                    echo "<br>Je dois faire des sauvegardes régulières de mes fichiers";
                    $b++;
                };*/


                $facture = array("Janvier"=>500, "Février"=>620, "Mars"=>300, "Avril"=>130, "Mai"=>560, "Juin"=>350); 
                $facture_sixmois=0; 
            
                foreach ($facture as $mois => $valeur) 
                { 
                    echo "Facture du mois de $mois : $valeur Euros<br />"; 
                    $facture_sixmois +=$valeur; 
                } 
            
                echo "Facture total de six mois : <b>$facture_sixmois Euros</b><br>"; 
                
                $nom = array("franck","laurent","caroline","magali","veronique");   
sort($nom);

for ($nb1=0;$nb1<=count($nom)-1; $nb1++) 
{
echo "$nom[$nb1]<br>";

}

$tableau = array("a" => "Lundi",
                "b" => "Mardi",
                "c" => "Mercredi",
                "d" => "Jeudi",
                "e" => "Vendredi"
            ); 
asort($tableau);

foreach($tableau as $cle => $valeur) 
{ 
    echo "jour ".$cle ." : ".$valeur."<br>"; 
}

arsort($tableau);

foreach($tableau as $cle => $valeur) 
{ 
    echo "jour ".$cle ." : ".$valeur."<br>"; 
}
$tableau = array("Lundi","Mardi","Mercredi", "Jeudi", "Vendredi"); 
$nb = count($tableau); 
echo"Le tableau contient ".$nb." éléments."; 

            ?> 
        </body>
    </html>
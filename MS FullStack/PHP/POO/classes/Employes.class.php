<?php
require_once "Magasins.class.php";

// Création de la classe qui va servir à instancier des objets.
// On définit tous les paramètres qui seront nécessaire dans l'utilisation des objets
class Employes extends Magasins
{
    // Déclaration des attributs: ce sont les données qui seront utilisables
    // On ajoute la portée de l'attribut.
    // A écrire avec _ pour différencier des méthodes et variables classiques
    private $_nom;
    private $_prenom;
    private $_date;
    private $_poste;
    private $_salaire;
    private $_service;
    private $_enfants;

    // Attribut de classe


    // Pour la sécurité des données, on déclare des variables privées, qui ne peuvent pas être modifiées/utilisées directement.
    // Pour cela on utilise des getters et des setters.
    // setNom est une fonction, qui, quand elle sera appelée permettra de définir le contenu de la variable sNom, elle même reliée à l'attribut _nom
    // getNom est une fonction, qui, quand elle sera appelée permettra d'afficher le contenu de l'attribut _nom
    // On peut définir directement le type de données attendu avec string, int, DateTime, etc

    // Nom
    public function setNom(string $sNom) // On appelle en donnant une chaine entre parenthèses
    {
        return $this->_nom = $sNom; // La fonction enregistrera cette chaine comme valeur de l'attribut
    }
    public function getNom() // On appelle simplement la variable
    {
        return $this->_nom; // qui retourne la valeur de l'attribut en question
        echo "Votre nom s'affiche";
    }

    // Prenom
    public function setPrenom(string $sPrenom)
    {
        return $this->_prenom = $sPrenom;
    }
    public function getPrenom() 
    {
        return $this->_prenom;
    }

    // Date d'embauche
    public function getDate()
    {
        return $this->_date;
    }
    public function setDate(dateTime $sDate) // Ici on demande que la valeur soit un DateTime, soit "yyyy-mm-dd"
    {
        return $this->_date = $sDate;
    }

    // Fonction (poste)
    public function setPoste(string $sPoste)
    {
        return $this->_poste = $sPoste;
    }
    public function getPoste() 
    {
        return $this->_poste;
    }

    // Salaire
    public function setSalaire(int $sSalaire)
    {
        return $this->_salaire = $sSalaire;
    }
    public function getSalaire() 
    {
        return $this->_salaire;
    }

    // Service
    public function setService(string $sService)
    {
        return $this->_service = $sService;
    }
    public function getService() 
    {
        return $this->_service;
    }

    // Service
    public function setEnfants(array $sEnfants)
    {
        return $this->_enfants = $sEnfants;
    }
    public function getEnfants() 
    {
        return $this->_enfants;
    }
    

    // La fonction __construct permet de déterminer ce qu'il se passe lorsqu'on instancie la classe.
    // On peut définir des paramètres obligatoires ou facultatifs (entre parenthèses), et affecter ces paramètres aux attributs.

    function __construct($nom, $prenom, $salaire, DateTime $date = Null ) // Nom et prenom obligatoires, date null par défaut et salaire 1200 par défaut, tous 2 facultatifs
    {
        $this->_nom = $nom; // la donnée nom affectée à attribut nom, string uniquement
        $this->_prenom = $prenom; // la donnée prenom affectée à attribut prenom, string uniquement
        $this->_salaire = $salaire; // la donnée salaire affectée à attribut salaire, entier uniquement
        $this->_date = ($date == Null) ? new DateTime() : $date; // donnée date attribuée à attribut date, si non renseigné, date du jour attribuée
	}

    // On peut appeler la fonction durée qui permettra de calculer depuis cb de temps est embauché le salarié
    public function duree() // pas de paramètres obligatoires
    {
        // Format OO: 
        // On utilise la méthode format (->format()), qui détermine le format de date souhaité
        // De la méthode diff (->diff(date)), qui est un objet Interval DateTime et qui calcule l'interval entre la date entrée
        // Et l'attribut _date (->_date), qui est un DateTime
        // De la classe en cours ($this)
        // Chacun découle du parent dont il dépend, on peut donc les lier en 1 seule ligne.

        $intvl = $this->_date->diff(new DateTime())->format('%y');
        echo $this->_prenom." ".$this->_nom." est embauché.e depuis ".$intvl." an(s) à la date d'aujourd'hui, et perçoit un salaire annuel brut de ".$this->_salaire."€<br>";
        $intvl = $this->_date->diff(new DateTime());

        // On peut aussi utiliser la méthode précédurale, qui fait juste appel à une fonction
        // On utilise tout de meme l'objet, mais cette méthode est plus lisible si bcp de méthodes utilisées:
        // $intvl = date_diff($this->_date, new DateTime()); // On déclare un date_diff, qui utilise l'attribut et un DateTime
        // return $intvl->format('%y ans, %m mois, %d jours'); // Et qui retourne cet interval au format indiqué
    }


    // Calcul des primes
    public function prime()
    {

        // Date du jour
        $today = new DateTime();
        $todayFormat = $today->format('d-m');

        // Date de versement des primes
        $dPrime = new DateTime("2022-11-30");
        $dPrimeFormat = $dPrime->format('d-m');
        echo " Date de versement des primes : ".$dPrimeFormat."<br>";

        //Prime sur salaire, 5% pour tous
        $primeS = $this->_salaire * 0.05;
        echo "Prime annuelle : ".$primeS."€ <br>";

        // Calcul de la durée d'embauche
        $intvl = $this->_date->diff($dPrime);

        // Condition pour percevoir la prime d'ancienneté (si durée < 1)
        if ($intvl->y < 1) 
        {
            echo "Embauche de moins d'un an, dommage, pas de prime d'ancienneté cette année ! <br>";
            echo "Vous n'avez pas encore droit aux chèques-vacances, vous resterez chez vous cette année... <br>";
            // Condition de versement (si on est le 30/11) avec affichage du transfert à la banque
            if ($todayFormat != $dPrimeFormat)
                {
                    echo "Aujourd'hui n'est pas le 30/11, on ne paie pas les primes.<br>";
                    $salaireNew = $this->_salaire + $primeS;
                    echo "Le nouveau salaire annuel brut de cet.te employé.e sera de ".$salaireNew."€<br>";
                }
            else
                {
                    $salaireNew = $this->_salaire + $primeS;
                    echo "Le nouveau salaire annuel brut de cet.te employé.e sera de ".$salaireNew."€.<br> L'ordre de transfert a été envoyé à la banque.<br>";
                }

            
        }
        else //Si durée > 1 an, calcul de 2% sur salaire annuel
        {
            echo "Au 30/11, cet employé.e sera embauché.e depuis ".$intvl->y." an(s). Il peut percevoir la prime d'ancienneté.<br>";
            echo "Vous pouvez bénéficier de chèques vacances, à vous Bora-Bora ! <br>";
            $primeA = 0.02 * $this->_salaire;
            echo "Prime d'ancienneté : ".$primeA."€ <br>";

            // Condition de versement (si on est le 30/11) avec affichage du transfert à la banque
            if ($todayFormat != $dPrimeFormat)
                {
                    echo "Aujourd'hui n'est pas le 30/11, on ne paie pas les primes.<br>";
                    $salaireNew = $this->_salaire + $primeS + $primeA;
                    echo "Le nouveau salaire annuel brut de cet.te employé.e sera de ".$salaireNew."€<br>";
                }
            else
                {
                    $salaireNew = $this->_salaire + $primeS + $primeA;
                    echo "Le nouveau salaire annuel brut de cet.te employé.e sera de ".$salaireNew."€.<br> L'ordre de transfert a été envoyé à la banque.<br>";
                }
        }
        
    }
    
    // Fonction pour calculer le prix des chèques cadeaux accordés
    public function cadeaux()
    {            
        // On commence par compter le nb d'enfants entrés
        $nbenfants= count($this->_enfants);

        //On doit donner un nb d'enfants si on appelle setEnfants
        if ($nbenfants > 0)
        {
            $jeune = 0;
            $preado = 0;
            $ado = 0;
            // Pour chaque enfant déclaré, on le met dans une catégorie d'age
            for ($i=0; $i<$nbenfants; $i++)
            {
                //si la 1ere ligne entrée est 0, il n'y a pas d'enfants
                if ($this->_enfants[0] == 0)
                {
                    echo "Vous n'avez pas d'enfants, donc pas de chèque cadeaux <br>";
                }
                // Sinon, si la ligne entrée est supérieure à 0, et inférieure à 11, ce sont des jeunes
                elseif ($this->_enfants[0] > 0 && $this->_enfants[$i] <= 10)
                {
                    $jeune++;
                }
                // Si la ligne entrée est entre 10 et 16, ce sont des préados
                if ($this->_enfants[$i] > 10 && $this->_enfants[$i] < 16)
                {
                    $preado++;
                }
                // Si la ligne entrée est entre 15 et 19, ce sont des ados
                if ($this->_enfants[$i] > 15 && $this->_enfants[$i] < 19)
                {
                    $ado++;
                }
            }
            // S'il n'y a qu'un enfant
            if($nbenfants == 1)
            {
                // Et si l'age entre dans une catégorie (=> ne vaut pas 0)
                if ($jeune == 1 XOR $preado == 1 XOR $ado == 1)
                {
                    echo "Vous avez ".$nbenfants." enfant dont : <br>";
                    if ($jeune == 1)
                    {
                        echo "- ".$jeune." jeune <br>";
                    }
                    elseif ($preado == 1)
                    {
                        echo "- ".$preado." pré-ado <br>";
                    }
                    elseif ($ado == 1)
                    {
                        echo "- ".$ado." ado <br>";
                    }
                }
            }
            
            // S'il y a plusieurs enfants, on gère le singulier et le pluriel pour chaque catégorie
            // Ex s'il y a un jeune et 2 ados, ou 1 ado, 1 préado et plusieurs jeunes, etc
            if ($nbenfants > 1)
            {
                echo "Vous avez ".$nbenfants." enfants dont : <br>";

                if ($jeune == 1)
                {
                    echo "- ".$jeune." jeune <br>";
                }
                elseif ($jeune > 1)
                {
                    echo "- ".$jeune." jeunes <br>";
                }

                if ($preado == 1)
                {
                    echo "- ".$preado." pré-ado <br>";
                }
                if ($preado > 1)
                {
                    echo "- ".$preado." pré-ados <br>";
                }

                if ($ado == 1)
                {
                    echo "- ".$ado." ado <br>";
                }
                elseif ($ado > 1)
                {
                    echo "- ".$ado." ados <br>";
                }               
            }

        }

        // Calcul du montant des chèques cadeaux selon le nb d'enfants
        $cadeauJeune = 0;
        $cadeauPreado = 0;
        $cadeauAdo = 0;

        // Gestion du singulier et du pluriel (si un ou plusieurs enfants, et si 1 ou + de chaque catégorie)

        if ($nbenfants == 1 && $jeune == 1)
        {
            $cadeauJeune = 1 * 20;
            echo "Vous aurez ".$cadeauJeune."€ de chèque Noël pour votre enfant <br>";

        }
        elseif ($nbenfants == 1 && $preado == 1)
        {
            $cadeauPreado = 1 * 30;
            echo "Vous aurez ".$cadeauPreado."€ de chèque Noël pour votre enfant <br>";

        }
        elseif ($nbenfants == 1 && $ado == 1)
        {
            $cadeauAdo = 1 * 50;
            echo "Vous aurez ".$cadeauAdo."€ de chèque Noël pour votre enfant <br>";

        }



        if ($nbenfants > 1)
        {

            if ($jeune == 1)
            {
                $cadeauJeune = 1 * 20;
                echo "Vous aurez ".$cadeauJeune."€ de chèque Noël pour votre jeune <br>";    
            }
            elseif ($jeune > 1)
            {
                for ($a = 0; $a < $jeune; $a++)
                {
                    $cadeauJeune++;
                }
                $cadeauJeune = $cadeauJeune * 20;
                echo "Vous aurez ".$cadeauJeune."€ de chèque Noël pour vos jeunes <br>";
            }

            if ($preado == 1)
            {
                $cadeauPreado = 1 * 30;
                echo "Vous aurez ".$cadeauPreado."€ de chèque Noël pour votre preado <br>";
            }
            elseif ($preado > 1)
            {
                for ($b = 0; $b < $preado; $b++)
                {
                    $cadeauPreado++;
                }
                $cadeauPreado = $cadeauPreado * 30;
                echo "Vous aurez ".$cadeauPreado."€ de chèque Noël pour vos preado <br>";
            }

            if ($ado == 1)
            {
                $cadeauAdo = 1 * 50;
                echo "Vous aurez ".$cadeauAdo."€ de chèque Noël pour votre ado <br>";
            }
            elseif ($ado > 1)
            {
                for ($c = 0; $c < $ado; $c++)
                {
                    $cadeauAdo++;
                }
                $cadeauAdo = $cadeauAdo * 50;
                echo "Vous aurez ".$cadeauAdo."€ de chèque Noël pour vos ados <br>";
            }

            // Affichage du total si plusieurs enfants
            $totalCadeaux = $cadeauAdo + $cadeauJeune + $cadeauPreado;
            echo "Vous aurez en tout ".$totalCadeaux."€ de chèques Noël <br>";
        }

    }



}   


?>
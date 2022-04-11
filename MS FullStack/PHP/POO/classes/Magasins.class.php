<?php

class Magasins
{
    private $_enseigne; 
    private $_adresse;
    private $_code;
    private $_ville;
    private $_restaurant;

    public function setEnseigne(string $sEnseigne)
    {
        return $this->_enseigne = $sEnseigne;
    }
    public function getEnseigne()
    {
        return $this->_enseigne;
    }

    public function setAdresse(string $sAdresse)
    {
        return $this->_adresse = $sAdresse;
    }
    public function getAdresse()
    {
        return $this->_adresse;
    }

    public function setCode(string $sCode)
    {
        return $this->_code = $sCode;
    }
    public function getCode()
    {
        return $this->_code;
    }

    public function setVille(string $sVille)
    {
        return $this->_ville = $sVille;
    }
    public function getVille()
    {
        return $this->_ville;
    }

    public function setRestaurant(bool $sRestaurant)
    {
        return $this->_restaurant = $sRestaurant;
    }
    public function getRestaurant()
    {
        return $this->_restaurant;
    }


    public function __construct($nom, $_ville)
    {
        $this->_nom = $nom;
        $this->_ville = $_ville;
    }

    public function repas()
    {
        if($this->_restaurant == false)
        {
            echo "A ".$this->_enseigne." ".$this->_ville.", vous avez droit à des tickets restaurants <br>";
        }
        else
        {
            echo "A ".$this->_enseigne." ".$this->_ville.", vous mangerez à la cantine <br>";
        }
    }


}




?>
<?php

/**
 * Created by PhpStorm.
 * User: julien
 * Date: 22/09/2017
 * Time: 13:49
 */
class Categorie
{
    private $idCat;
    private $nomCat;

    function __construct($a, $b)
    {
        $idCat = $a;
        $nomCat = $b;
    }

    /**
     * @return mixed
     */
    public function getIdCat()
    {
        return $this->idCat;
    }

    /**
     * @param mixed $idCat
     */
    public function setIdCat($idCat)
    {
        $this->idCat = $idCat;
    }

    /**
     * @return mixed
     */
    public function getNomCat()
    {
        return $this->nomCat;
    }

    /**
     * @param mixed $nomCat
     */
    public function setNomCat($nomCat)
    {
        $this->nomCat = $nomCat;
    }
}
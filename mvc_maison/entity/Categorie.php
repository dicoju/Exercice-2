<?php

/**
 * Created by PhpStorm.
 * User: julien
 * Date: 22/09/2017
 * Time: 13:49
 */
class Categorie
{
    private $_idCat;
    private $_nomCat;

    /**
     * Categorie constructor.
     * @param $idCat
     * @param $nomCat
     */
    function __construct($idCat, $nomCat)
    {
        $this->_idCat = $idCat;
        $this->_nomCat = $nomCat;
    }

    /**
     * @return mixed
     */
    public function getIdCat()
    {
        return $this->_idCat;
    }

    /**
     * @param mixed $idCat
     */
    public function setIdCat($idCat)
    {
        $this->_idCat = $idCat;
    }

    /**
     * @return mixed
     */
    public function getNomCat()
    {
        return $this->_nomCat;
    }

    /**
     * @param mixed $nomCat
     */
    public function setNomCat($nomCat)
    {
        $this->_nomCat = $nomCat;
    }
}
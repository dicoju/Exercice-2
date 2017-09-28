<?php

/**
 * Created by PhpStorm.
 * User: julien
 * Date: 22/09/2017
 * Time: 13:49
 */
class Photo
{
    private $_idPhoto;
    private $_nomFich;
    private $_description;
    private $_categorie;

    function __construct($a, $b, $c, $d)
    {
        $this->_idPhoto = $a;
        $this->_nomFich = $b;
        $this->_description = $c;
        $this->_categorie = $d;
    }

    /**
     * @return mixed
     */
    public function getIdPhoto()
    {
        return $this->_idPhoto;
    }

    /**
     * @param mixed $idPhoto
     */
    public function setIdPhoto($idPhoto)
    {
        $this->_idPhoto = $idPhoto;
    }

    /**
     * @return mixed
     */
    public function getNomFich()
    {
        return $this->_nomFich;
    }

    /**
     * @param mixed $nomFich
     */
    public function setNomFich($nomFich)
    {
        $this->_nomFich = $nomFich;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->_description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->_description = $description;
    }

    /**
     * @return mixed
     */
    public function getCategorie()
    {
        return $this->_categorie;
    }

    /**
     * @param mixed $categorie
     */
    public function setCategorie($categorie)
    {
        $this->_categorie = $categorie;
    }


}
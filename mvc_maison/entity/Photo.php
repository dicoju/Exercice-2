<?php

/**
 * Created by PhpStorm.
 * User: julien
 * Date: 22/09/2017
 * Time: 13:49
 */
class Photo
{
    private $idPhoto;
    private $nomFich;
    private $description;
    private $categorie;

    function __construct($a, $b, $c, $d)
    {
        $idPhoto = $a;
        $nomFich = $b;
        $description = $c;
        $categorie = $d;
    }

    /**
     * @return mixed
     */
    public function getIdPhoto()
    {
        return $this->idPhoto;
    }

    /**
     * @param mixed $idPhoto
     */
    public function setIdPhoto($idPhoto)
    {
        $this->idPhoto = $idPhoto;
    }

    /**
     * @return mixed
     */
    public function getNomFich()
    {
        return $this->nomFich;
    }

    /**
     * @param mixed $nomFich
     */
    public function setNomFich($nomFich)
    {
        $this->nomFich = $nomFich;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * @param mixed $categorie
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;
    }
}
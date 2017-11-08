<?php

/**
 * Created by PhpStorm.
 * User: julien
 * Date: 22/09/2017
 * Time: 14:00
 */

require_once(PATH_MODELS.'DAO.php');


/**
 * Class PhotoDAO
 * Classe permettant d'intéragir avec la table Photos dans la base de données
 */
class PhotoDAO extends DAO
{
    /**
     * @return array|null
     * Permet de récupérer un tableau contenant des objets Photo
     */
    public function getPhotos(){
        require_once (PATH_ENTITY.'Photo.php');

        // requete pour récupérer toutes les photos
        $res = $this->queryAll('select * from photo');

        // tableau pour récupérer toutes les photos
        $tabPhotos = array();
        if ($res){
            for ($i = 0; $i < count($res); $i++){
                // Pour chaque ligne renvoyée par la requete SQL, on cré un objet Photo que l'on insert à l'index i du tableau
                $tabPhotos[$i] = new Photo(
                    $res[$i]['photoId'],
                    $res[$i]['nomFich'],
                    $res[$i]['description'],
                    $res[$i]['catId']);
            }
            // Une fois que le tableau contient toutes les photos, on le renvoie
            return $tabPhotos;
        }
        return null;
    }

    /**
     * @param $idPhoto
     * @return null|Photo
     * Permet de retourner un objet photo en fonction de son paramètre
     */
    public function getPhoto($idPhoto){
        require_once (PATH_ENTITY.'Photo.php');

        // préparation du tableau de paramètres pour la requette préparée
        $param = array($idPhoto);
        // requete préparée
        $res = $this->queryRow('select * from photo where photoId = ?', $param);


        // Si la requete est valide
        if ($res){
            // On crée une un objet Photo puis on le retourne
            $caracsPhoto = new Photo(
                $res['photoId'],
                $res['nomFich'],
                $res['description'],
                $res['catId']);

            return $caracsPhoto;
        }
        return null;
    }

    public function getPhotoByNomFic($nomFic){
        require_once (PATH_ENTITY.'Photo.php');

        // préparation du tableau de paramètres pour la requette préparée
        $param = array($nomFic);
        // requete préparée
        $res = $this->queryRow('select * from photo where nomFich = ?', $param);


        // Si la requete est valide
        if ($res){
            // On crée une un objet Photo puis on le retourne
            $caracsPhoto = new Photo(
                $res['photoId'],
                $res['nomFich'],
                $res['description'],
                $res['catId']);

            return $caracsPhoto;
        }
        return null;
    }

    public function addPhoto($nomFic, $description, $catId){
        $param = array($nomFic, $description, $catId);
        $res = $this->addSupprRow('insert into photo(nomFich, description, catId) VALUES (?, ?, ?)', $param);
        return $res;
    }

    public function deletePhoto($photoId){
        $param = array($photoId);
        $res = $this->addSupprRow('delete from photo WHERE photoId = ?', $param);
        return $res;
    }
}



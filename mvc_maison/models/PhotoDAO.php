<?php

/**
 * Created by PhpStorm.
 * User: julien
 * Date: 22/09/2017
 * Time: 14:00
 */
class PhotoDAO extends DAO
{
    public function getPhotos(){
        require_once (PATH_ENTITY.'Photo.php');
        $res = $this->queryAll('select * from photos');

        if ($res){
            $arrObj = array();
            $i = 0;
            while ($donnees = $res->fetch()){
                $arrObj[$i] = new Photo($donnees['photoId'],
                                        $donnees['nomFich'],
                                        $donnees['description'],
                                        $donnees['catId']);
                $i++;
            }
            return $arrObj;

        }
        else return null;
    }
}



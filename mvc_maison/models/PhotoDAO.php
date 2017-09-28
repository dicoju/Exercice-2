<?php

/**
 * Created by PhpStorm.
 * User: julien
 * Date: 22/09/2017
 * Time: 14:00
 */

require_once(PATH_MODELS.'DAO.php');

class PhotoDAO extends DAO
{
    public function getPhotos(){
        require_once (PATH_ENTITY.'Photo.php');
        $res = $this->queryAll('select * from photo');

        $tabPhotos = array();
        if ($res){
            for ($i = 0; $i < count($res); $i++){
                $tabPhotos[$i] = new Photo(
                    $res[$i]['photoId'],
                    $res[$i]['nomFich'],
                    $res[$i]['description'],
                    $res[$i]['catId']);
            }
            return $tabPhotos;
        }
        else return null;
    }
}



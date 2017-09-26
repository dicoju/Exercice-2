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

        if ($res){
            return $res;
        }
        else return null;
    }
}



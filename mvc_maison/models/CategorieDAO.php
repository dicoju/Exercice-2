<?php

/**
 * Created by PhpStorm.
 * User: julien
 * Date: 22/09/2017
 * Time: 14:00
 */
require_once(PATH_MODELS.'DAO.php');

class CategorieDAO extends DAO
{
    public function getCategories(){
        require_once (PATH_ENTITY.'Categorie.php');
        $res = $this->queryAll('select * from categorie');

        $tabCategories = array();
        if ($res){
            for ($i = 0; $i < count($res); $i++){
                $tabCategories[$i] = new Categorie(
                    $res[$i]['catId'],
                    $res[$i]['nomCat']
                );
            }
            return $tabCategories;
        }
        else return null;
    }
}
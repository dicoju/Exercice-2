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

    public function getCategorie($catId){
        require_once (PATH_ENTITY.'Categorie.php');
        $param = array($catId);
        $res = $this->queryRow('select * from categorie WHERE catId = ?', $param);

        if ($res){
            $caracsCategorie = new Categorie(
                $res['catId'],
                $res['nomCat']);

            return $caracsCategorie;
        }

        return null;

    }
}
<?php

/**
 * Created by PhpStorm.
 * User: julien
 * Date: 20/10/2017
 * Time: 14:23
 */

require_once(PATH_MODELS.'DAO.php');

class UserDAO extends DAO
{
    public function getUser($userName){
        require_once (PATH_ENTITY.'user.php');

        // préparation du tableau de paramètres pour la requette préparée
        $param = array($userName);
        // requete préparée
        $res = $this->queryRow('select * from user where userName = ?', $param);


        // Si la requete est valide
        if ($res){
            // On crée une un objet User puis on le retourne
            $user = new User(
                $res['userId'],
                $res['userName'],
                $res['userPassword'],
                $res['userEmail']);

            return $user;
        }
        return null;
    }

    public function createUser($userName, $userPassword, $userEmail){
        $param = array($userName, $userPassword, $userEmail);
        $res = $this->addSupprRow('insert into user (userName, userPassword, userEmail) VALUES (?, ?, ?)', $param);
        return $res;
    }

    public function deleteUser($userId){
        $param = array($userId);
        $res = $this->addSupprRow('delete from user WHERE userId = ?', $param);
        return $res;
    }
}
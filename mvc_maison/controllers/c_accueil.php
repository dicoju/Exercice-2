<?php

//Appel du modèle
require_once(PATH_MODELS.'PhotoDAO.php');
$photoDAO = new PhotoDAO();

$photo = $photoDAO->getPhotos();

if(is_null($photo))
{
    if(!is_null($photoDAO->getErreur()))
    {
        $erreur = 'query';
        if(DEBUG)
            die($photoDAO->getErreur());
    }
    else
        $erreur = 'photo';
}




//Redirection ou appel de la vue
if(isset($erreur)) // affichage des erreurs de pas de photos
{
    header('Location: index.php?nom='.$nom.'&message='.$erreur);
    exit();
}
else
{                  // affichage des photos
    require_once(PATH_VIEWS.$page.'.php');
}

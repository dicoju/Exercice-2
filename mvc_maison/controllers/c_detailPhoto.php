<?php
/**
 * Created by PhpStorm.
 * User: julien
 * Date: 29/09/2017
 * Time: 14:42
 */
require_once (PATH_ENTITY.'Photo.php');
require_once (PATH_ENTITY.'Categorie.php');
require_once(PATH_MODELS.'CategorieDAO.php');
require_once(PATH_MODELS.'PhotoDAO.php');


if (isset($_GET['photo'])){
    $idPhoto = htmlspecialchars($_GET['photo']);


    // Modèle photo
    $photoDAO = new PhotoDAO();
    $caracsPhoto = $photoDAO->getPhoto($idPhoto);


    // Modèle categories
    $catId = $caracsPhoto->getCategorie();
    $categorieDAO = new CategorieDAO();
    $caracsCategorie = $categorieDAO->getCategorie($catId);

}
else{
    $erreur = 'Erreur : aucune photo sélectionnée';
}



//Redirection ou appel de la vue
if(isset($erreur)) // affichage des erreurs de pas de photos
{
    header('Location: index.php?nom='.$nom.'&message='.$erreur);
    exit();
}

else {
    // rediriger vers la page
    require_once(PATH_VIEWS.$page.'.php');
}



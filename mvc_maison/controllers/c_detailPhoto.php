<?php
session_start();
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
    // On récupère l'ID de la photo sélectionnée grâce à GET
    $idPhoto = htmlspecialchars($_GET['photo']);


    // Modèle photo
    $photoDAO = new PhotoDAO();
    $caracsPhoto = $photoDAO->getPhoto($idPhoto);  // On récupère la photo pour laquelle on doit afficher les détails


    // Modèle categories
    $catId = $caracsPhoto->getCategorie();
    $categorieDAO = new CategorieDAO();
    $caracsCategorie = $categorieDAO->getCategorie($catId); // On récupère la catégorie pour laquelle on doit afficher les détails

    if (isset($_POST['btonSupprPhoto'])){
        $photoDAO->deletePhoto($idPhoto);
        $success = "Photo supprimée avec succès";
    }

}
else{
    $erreur = 'Erreur : aucune photo sélectionnée';
}



//Redirection ou appel de la vue
if(isset($erreur)) // affichage des erreurs de pas de photos
{
    header('Location: index.php?page=accueil&erreur='.$erreur);
    exit();
}
elseif(isset($success)) // affichage des erreurs de pas de photos
{
    header('Location: index.php?page=accueil&success='.$success);
    exit();
}
else {
    // rediriger vers la page
    require_once(PATH_VIEWS.$page.'.php');
}



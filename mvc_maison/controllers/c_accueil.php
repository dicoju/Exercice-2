<?php


//Appel du modèle(pour les photos)
require_once(PATH_MODELS.'PhotoDAO.php');

$photoDAO = new PhotoDAO();
$tabPhotos = $photoDAO->getPhotos(); // On récupère toutes les photos


// On regarde s'il y a des erreurs
if(is_null($tabPhotos))
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



//Appel du modèle (pour les catégories)
require_once(PATH_MODELS.'CategorieDAO.php');
$categorieDAO = new CategorieDAO();
$tabCategories = $categorieDAO->getCategories(); // On récupère toutes les catégories

// On regarde s'il y a des erreurs
if(is_null($tabCategories))
{
    if(!is_null($categorieDAO->getErreur()))
    {
        $erreur = 'query';
        if(DEBUG)
            die($categorieDAO->getErreur());
    }
    else
        $erreur = 'photo';
}


// on regarde si l'utilisateur a cliqué sur le bouton pour choisir la catégorie
// ou alors si on revient à l'accueil par le lien pour le détail d'une photo
if (isset($_POST['btonValider'])  or isset($_GET['catId']) ){

    // Si l'utilisateur a cliqué sur le bouton
    if (isset($_POST['btonValider'])){
        // On récupère l'ID de la catégorie qu'il a sélectionné grace au POST
        $cat = htmlspecialchars($_POST['selectCategorie']);
    }

    // Si l'utilisateur revient à l'accueil par le lien de la page détailPhotos
    else{
        // On récupère l'ID de la catégorie grace au GET
        $cat = htmlspecialchars($_GET['catId']);
    }

    // Si la catégorie est 'allPhotos', on ne rentre pas dans la boucle
    // car on affichera tout le contenu du tableau de Photos
    if ($cat != 'allPhotos'){
        $i = 0;

        // Sinon on boucle sur chaque Photo du tableau et si la catégorie est différente
        // de la catégorie seléctionnée par l'utilisateur, alors on enlève cet objet Photo du tableau
        foreach ($tabPhotos as $key){
            if ($key->getCategorie() != $cat) {
                unset($tabPhotos[$i]);
            }
            $i++;
        }


        // On parcourt les catégories pour trouver le nom de celle que l'utilisateur à sélectionné
        foreach ($tabCategories as $key){
            if ($key->getIdCat() == $cat){
                $nomCat = $key->getNomCat();
            }
        }
    }

}

//Redirection ou appel de la vue
if(isset($erreur)) // affichage des erreurs 
{
    header('Location: index.php?nom='.$nom.'&message='.$erreur);
    exit();
}
else
{
    // On regarde si le nom de la categorie est définie
    // Sinon on le met à 'toutes les photos'
    if (!isset($nomCat)){
        $nomCat = 'Toutes les photos';
    }

    // affichage des photos
    require_once(PATH_VIEWS.$page.'.php');
}





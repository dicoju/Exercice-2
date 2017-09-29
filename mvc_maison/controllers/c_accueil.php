<?php


//Appel du modèle
require_once(PATH_MODELS.'PhotoDAO.php');

$photoDAO = new PhotoDAO();
$tabPhotos = $photoDAO->getPhotos();

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


require_once(PATH_MODELS.'CategorieDAO.php');

$categorieDAO = new CategorieDAO();
$tabCategories = $categorieDAO->getCategories();

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


if (isset($_POST['btonValider'])){
    if ($_POST['selectCategorie'] != 'allPhotos'){
        $i = 0;
        foreach ($tabPhotos as $key){
            if ($key->getCategorie() != $_POST['selectCategorie']) {
                unset($tabPhotos[$i]);
            }
            $i++;
        }

        foreach ($tabCategories as $key){
            if ($key->getIdCat() == $_POST['selectCategorie']){
                $nomCat = $key->getNomCat();
            }
        }

    }

}

//Redirection ou appel de la vue
if(isset($erreur)) // affichage des erreurs de pas de photos
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





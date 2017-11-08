<?php
session_start();

if (isset($_SESSION['userName'])){
    // Code habituel

    //Appel du modèle (pour les catégories)
    require_once(PATH_MODELS.'CategorieDAO.php');
    $categorieDAO = new CategorieDAO();
    $tabCategories = $categorieDAO->getCategories(); // On récupère toutes les catégories


    // Ajout de la catégorie
    if (isset($_POST['btonAddCat'])){
        $catName = htmlspecialchars($_POST['catName']);
        if ($catName){
            // On crée une catégorie
            $req = $categorieDAO->addCategorie($catName);
            $success = 'La catégorie à été ajoutée avec succès';
        }
        else{
            $erreur = 'Veuillez donner un nom à la catégorie';
        }
    }


    // Suppression de la catégorie
    if (isset($_POST['btonSupprCat'])){
        // On supprime la catégorie
        $catId = htmlspecialchars($_POST['catSuppr']);
        $req = $categorieDAO->deleteCategorie($catId);
        $success = 'La catégorie à bien été supprimée';
    }

    //Redirection ou appel de la vue
    if (isset($success)){
        header('Location: index.php?page=accueil&success=' . $success);
        exit();
    }
    elseif (isset($erreur)) // affichage des erreurs
    {
        header('Location: index.php?page=adminCat&erreur=' . $erreur);
        exit();
    }
    else
    {
        require_once(PATH_VIEWS.$page.'.php');
    }


}

else{
    header('Location: index.php?page=login&erreur=Veuillez vous connecter pour accéder à cet espace');
}

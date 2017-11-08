<?php
session_start();

if (isset($_SESSION['userName'])){
    // Code habituel

    //Appel du modèle (pour les catégories)
    require_once(PATH_MODELS.'CategorieDAO.php');
    $categorieDAO = new CategorieDAO();
    $tabCategories = $categorieDAO->getCategories(); // On récupère toutes les catégories



    if (isset($_POST['btonAddPhoto'])) {
        if ($_POST['desciptionPhoto'] and $_POST['catPhoto']) {
            $photoDescription = $_POST['desciptionPhoto'];
            $photoCat = $_POST['catPhoto'];

            // On copie la photo dans le répertoire des images
            $fichier = basename($_FILES['fich']['name']);
            $taille_maxi = 5000000;
            $taille = filesize($_FILES['fich']['tmp_name']);
            $extensions = array('.png', '.jpg', '.jpeg');
            $extension = strrchr($_FILES['fich']['name'], '.');

            if (!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
            {
                $erreur = "l'extension ." . $extension . " n'est pas prise en charge";
            }
            if ($taille > $taille_maxi) {
                $erreur = 'La taille du fichier est supérieure à 5MO';
            }
            if (!isset($erreur)) //S'il n'y a pas d'erreur, on upload
            {
                //On formate le nom du fichier ici...
                $fichier = strtr($fichier,
                    'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
                    'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
                $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
                if (move_uploaded_file($_FILES['fich']['tmp_name'], PATH_GALERIE . $fichier)) {
                    // On ajoute la photo en base de données
                    $dimensions = getimagesize($_FILES['fich']['tmp_name']);
                    $width_orig = $dimensions[0];
                    $height_orig = $dimensions[1];

                    // Redimensionnement
                    $width = 100;
                    $height = 100;
                    $image_p = imagecreatetruecolor($width, $height);
                    $image = imagecreatefrompng(PATH_GALERIE . $fichier);
                    imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
                    require_once(PATH_MODELS.'PhotoDAO.php');
                    $photoDAO = new PhotoDAO();
                    $photoDAO->addPhoto($fichier, $photoDescription, $photoCat);
                    $photo = $photoDAO->getPhotoByNomFic($fichier);
                    $success = 'Importation effectuée avec succès';
                } else //Sinon (la fonction renvoie FALSE).
                {
                    $erreur = "Echec de l'importation";
                }
            }



        }
        else {
            $erreur = 'Veuillez renseigner tous les champs';
        }
    }


    //Redirection ou appel de la vue
    if (isset($success)){
        header('Location: index.php?page=detailPhoto&photo=' . $photo->getIdPhoto() .'&success=' . $success);
        exit();
    }
    elseif (isset($erreur)) // affichage des erreurs
    {
        header('Location: index.php?page=adminPhoto&erreur=' . $erreur);
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





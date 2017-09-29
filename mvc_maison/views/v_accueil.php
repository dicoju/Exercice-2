<?php
/*
 * DS PHP
 * Vue page index - page d'accueil
 *
 * Copyright 2016, Eric Dufour
 * http://techfacile.fr
 *
 * Licensed under the MIT license:
 * http://www.opensource.org/licenses/MIT
 *
 */
//  En tête de page
?>
<?php require_once(PATH_VIEWS.'header.php');?>

<!--  Zone message d'alerte -->
<?php require_once(PATH_VIEWS.'alert.php');?>

<p class="alert alert-success"> <?php echo count($tabPhotos) . ' ';?>
    photo(s) selectionnée(s) !</p>


<form method="post" action="<?= 'index.php' ?>">
    <label> Quelles photos souhaitez vous afficher ? </label>
    <select name="selectCategorie">
        <option value="allPhotos">
            Toutes les photos
        </option>
        <?php
        foreach ($tabCategories as $key){
            ?>
            <option value="<?php echo $key->getIdCat(); ?>">
                <?php echo $key->getNomCat(); ?>
            </option>  <?php
        }
    ?>
    </select>

    <input class="btn btn-primary" type="submit" name="btonValider" value="Valider">
</form>


<!--  Début de la page -->
<h1><?= $nomCat ?></h1>

<!-- Affichage des photos -->
<?php




foreach ($tabPhotos as $key){
    ?>
    <a href="v_footer.php">
        <img src= <?php echo PATH_GALERIE . $key->getNomFich() ?>
             alt= <?php echo $key->getDescription() ?>
        />
    </a>
    <?php

}

echo "<br>";



?>
<!--  Fin de la page -->

<!--  Pied de page -->
<?php require_once(PATH_VIEWS.'footer.php'); 

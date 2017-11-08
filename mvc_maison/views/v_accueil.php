<?php require_once(PATH_VIEWS.'header.php');?>
<?php include(PATH_VIEWS.'menu.php'); ?>
<!--  Zone message d'alerte -->
<?php require_once(PATH_VIEWS.'alert.php');?>


<!-- On affiche le nombre de photos affichées -->
<p class="alert alert-success"> <?php echo count($tabPhotos) . ' ';?>
    photo(s) selectionnée(s) !</p>


<!-- Formulaire pour sélectionner une catégorie -->
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


<!--  Affichage du nom de la catégorie -->
<h1><?= $nomCat ?></h1>

<!-- Affichage des photos -->
<?php
foreach ($tabPhotos as $key){
    ?>
    <a href= <?= 'index.php?page=detailPhoto&photo=' . $key->getIdPhoto(); ?> >
        <img src= <?= PATH_GALERIE . $key->getNomFich() ?>
             alt= <?= $key->getDescription() ?>
             width="200px"
        />
    </a>
    <?php

}

echo "<br>";



?>
<!--  Fin de la page -->

<!--  Pied de page -->
<?php require_once(PATH_VIEWS.'footer.php'); 

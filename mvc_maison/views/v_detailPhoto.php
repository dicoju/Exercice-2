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
<?php include(PATH_VIEWS.'menu.php'); ?>

    <!--  Zone message d'alerte -->
<?php require_once(PATH_VIEWS.'alert.php');?>


    <!--  Début de la page -->

<div class="row">

    <!-- Affichage de la photo -->
    <div class="col-lg-6">
        <img
            src= "<?= PATH_GALERIE . $caracsPhoto->getNomFich() ?>"
            alt= <?= $caracsPhoto->getDescription() ?>
            width="350px"
        />
    </div>


    <!-- Tableau affichant les détails de la photo -->
    <div class="col-lg-6">
        <table class="table table-bordered">
            <tr>
                <th> Description </th>
                <td> <?= $caracsPhoto->getDescription() ?> </td>
            </tr>
            <tr>
                <th> Nom du fichier </th>
                <td> <?= $caracsPhoto->getNomFich() ?> </td>
            </tr>
            <tr>
                <th> Categorie </th>
                <td>
                    <a href= <?= 'index.php?page=accueil&catId=' . $caracsCategorie->getIdCat() ?> >
                        <?= $caracsCategorie->getNomCat() ?>
                    </a>
                </td>
            </tr>
        </table>

        <?php
        if (isset($_SESSION['userName'])){
        ?>
            <form method="POST">
                <input
                    type="submit"
                    class="btn btn-danger"
                    value="Supprimer cette photo"
                    name="btonSupprPhoto"
                    onclick="return confirm('Êtes vous sur de vouloir supprimer cette photo ?')"
                    >
            </form>
        <?php
        }
        ?>

    </div>
</div>



    <!--  Fin de la page -->

    <!--  Pied de page -->
<?php require_once(PATH_VIEWS.'footer.php');

<?php require_once(PATH_VIEWS.'header.php');?>


<?php include(PATH_VIEWS.'menu.php'); ?>

<?php require_once(PATH_VIEWS.'alert.php');?>

    <h1> <?= MENU_ADMIN_CAT ?> </h1>

    <br>

    <h3> Créer une catégorie </h3>
    <form method="post">
        <label> Nom de la catégorie </label>
        <br>
        <div class="form-group">
            <input type="text" name="catName" placeholder="Nom de la catégorie">
        </div>

        <input
                class="btn btn-success"
                type="submit"
                name="btonAddCat"
                value="Ajouter la catégorie">
    </form>

    <br><br>



    <h3> Supprimer une catégorie </h3>
    <div class="alert alert-danger" >
        <strong> Attention, supprimer une catégorie supprimera toutes les images qui lui sont liées</strong>
    </div>

    <form method="post">
        <label> Nom de la catégorie </label>
        <br>
        <div class="form-group">
            <select name="catSuppr">
            <?php
                foreach ($tabCategories as $key){
            ?>
                <option value="<?php echo $key->getIdCat(); ?>">
                <?php echo $key->getNomCat(); ?>
                </option>
            <?php
                }
            ?>
            </select>
        </div>

        <input
                onclick="return confirm('Étes vous sur de vouloir supprimer la catégorie ?')"
                class="btn btn-danger"
                type="submit"
                name="btonSupprCat"
                value="Supprimer la catégorie">
    </form>

    <!--  Pied de page -->
<?php require_once(PATH_VIEWS.'footer.php');

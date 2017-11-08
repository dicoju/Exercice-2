<?php require_once(PATH_VIEWS.'header.php');?>


<?php include(PATH_VIEWS.'menu.php'); ?>

<?php require_once(PATH_VIEWS.'alert.php');?>


    <h1> <?= MENU_ADMIN_PHOTOS ?> </h1>

    <br>

    <h3> Ajouter une photo </h3>
    <form method="post" enctype="multipart/form-data">

        <!-- On limite le fichier à 1Mo -->
        <input type="hidden" name="MAX_FILE_SIZE" value="5000000">
        <label> Url de la photo (jpg, jpeg, png) 5Mo maxi</label>
        <br>
        <div class="form-group">
            <input type="file" name="fich">
        </div>


        <label> Description de la photo </label>
        <br>
        <div class="form-group">
            <input type="text" name="desciptionPhoto" placeholder="Description">
        </div>

        <label> Catégorie de la photo </label>
        <div class="form-group">
            <select name="catPhoto">
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
                class="btn btn-success"
                type="submit"
                name="btonAddPhoto"
                value="Ajouter la photo">
    </form>



    <!--  Pied de page -->
<?php require_once(PATH_VIEWS.'footer.php');

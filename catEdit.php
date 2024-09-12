<?php

require('partials/header.php');
require('partials/adminLock.php');

if (isset($_POST['nomCat'], $_POST['iconURL'], $_POST['points']) && !empty($_POST['nomCat']) && !empty($_POST['iconURL']) && !empty($_POST['points'])) {
    createCat($_POST['nomCat'], $_POST['iconURL'], $_POST['points']);
}

if (isset($_GET['action'], $_GET['target']) && !empty($_GET['action']) && !empty($_GET['target'])){
    if ($_GET['action'] === "delete"){
        deleteCat($_GET['target']);
    }
}

$categories = getAllCategories();
?>

    <main class="editCat">
        <div class="editCatTop">
            <?php foreach($categories as $categorie) { ?>
                <div class="catSpec">
                        <div><?php echo $categorie['Cat_nom'] ?></div>
                        <div><?php echo $categorie['points'] ?> points</div>
                        <div><?php echo $categorie['icon'] ?></div>
                        <img class="icons" src="<?php echo $categorie['icon']?>" alt="">
                    <div class="editBtns">
                    <div onclick="checkIf(<?php echo $categorie['Cat_Id']; ?>, '<?php echo $categorie['Cat_nom']; ?>')"><img class="mini" src="./images/supprimer.png" alt=""></div>
                        <a href="newCat.php?action=edit&target=<?php echo $categorie['Cat_Id'] ?>"><img class="mini" src="./images/editer.png" alt=""></a>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
        <label for="newCat">Ajouter une Catégorie</label>
        <fieldset id="newCat">
            <form action="" method="post" >
                <input type="text" name="nomCat" placeholder="Nommer la Catégorie">
                <input type="text" name="iconURL" placeholder="URL de l'icône">
                <input type="number" name="points" placeholder="0">
                <input type="submit">
            </form>
        </fieldset>
    </main>



<?php require('partials/footer.php');?>
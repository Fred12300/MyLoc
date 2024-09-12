<?php
require('partials/header.php');
require('partials/adminLock.php');
if(isset($_POST['owner'], $_POST['objName'], $_POST['objDesc'], $_POST['objImg'], $_POST['categorie']) && !empty($_POST['owner']) && !empty($_POST['objName']) && !empty($_POST['objDesc']) && !empty($_POST['objImg']) && !empty($_POST['categorie'])){
    createObjet($_POST['owner'], $_POST['objName'], $_POST['objDesc'], $_POST['objImg'], $_POST['categorie']);
}

if (isset($_GET['action'], $_GET['target']) && !empty($_GET['action']) && !empty($_GET['target'])){
    if ($_GET['action'] === "delete"){
        deleteObject($_GET['target']);
    }
}

$categories = getAllCategories();
$users = getAllUsers();
$objets = getAllObjects();
?>
    <main class="split">
        <div class="right toLeft">
            <h3>Objets existants</h3>
            <?php foreach($objets as $objet){?>
                <div class="objet">
                    <h4><?php echo $objet['obj_nom']?></h4><div onclick="checkIf(<?php echo $objet['object_id']; ?>, '<?php echo $objet['obj_nom']; ?>')"><img class="mini" src="./images/supprimer.png" alt=""></div>
                </div>
            <?php
            }
            ?>
        </div>
        <div class="right">
            <label for="newObjField">Créer un nouvel Objet</label>
            <fieldset id="newObjField">
                <form action="" method="post">
                    <label for="owner">Propriétaire</label>
                    <select name="owner" id="owner">
                        <?php foreach($users as $user){?>
                        <option value="<?php echo $user['id'] ?>"><?php echo $user['prenom'] . ' ' . $user['nom'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <label for="objName">Nom de l'objet</label>
                    <input id="objName" name="objName" type="text">
                    <label for="objDesc">Description de l'objet</label>
                    <input id="objDesc" name="objDesc" type="text">
                    <label for="objImg">Lien vers l'image</label>
                    <input id="objImg" name="objImg" type="text">
                    <label for="categories">Catégorie</label>
                    <select name="categorie" id="categories">
                        <?php foreach($categories as $categorie){?>
                        <option value="<?php echo $categorie['Cat_Id'] ?>"><?php echo $categorie['Cat_nom'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
            
                    <input type="submit" class="btn">
                </form>
            </fieldset>
        </div>
    </main>
<?php require('partials/footer.php'); ?>
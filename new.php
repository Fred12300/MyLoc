<?php require('partials/header.php');
$categories = getAllCategories();
?>
    <main>
        <label for="newObjField">Créer un nouvel Objet</label>
        <fieldset id="newObjField">
            <form action="POST">
                <label for="objName">Nom de l'objet</label>
                <input id="objName" type="text">
                <label for="objDesc">Description de l'objet</label>
                <input type="text">
                <label for="objImg">Lien vers l'image</label>
                <input type="text">
                <select name="categories" id="categories">
                    <?php foreach($categories as $categorie){?>
                    <option value="<?php echo $categorie['Cat_nom'] ?>"><?php echo $categorie['Cat_nom'] ?></option>
                    <?php
                    }
                    ?>
                </select>
                
                <button type="submit">Envoyer</button>
            </form>
        </fieldset>
    </main>
</body>
</html>
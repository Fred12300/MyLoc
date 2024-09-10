<?php require('partials/header.php');
$users = getAllUsers();
?>

    <main class="users">
        <?php foreach($users as $user){
            $objetsPossedes = getOwnedObjects($user['id'])
            ?>
            <div class="userCard2">
                <a class="user" href="userDetails.php?userSelected=<?php echo $user['id'] ?>">
                    <h2><?php echo $user['prenom']?></h2>
                    <h2><?php echo $user['nom']?></h2>
                    <img src="./images/loupe.png" alt="" class="mini">
                </a>
                <div class="objetsPossedes">
                    <?php foreach($objetsPossedes as $objetPossede){
                    $cat = getCategorie($objetPossede['FK_Cat_Id'])
                    ?>
                    <div class="objetPossede">
                        <div><?php echo $objetPossede['obj_nom'] ?></div>
                        <img class="mini" src="<?php echo $cat['icon']?>" alt="">
                    </div>
                    
                    <?php
                    }
                    ?>
                </div>
            </div>

        <?php
        }
        ?>
    </main>
</body>
</html>
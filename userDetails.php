<?php require('partials/header.php');
$userSelected = isset($_GET['userSelected']) && !empty($_GET['userSelected']) ? $_GET['userSelected'] : 3;
$user = getUser($userSelected);
$objetsPossedes = getOwnedObjects($userSelected)
?>

<main class="center">
    <div class="userCard">
        <div class="top">
            <div class="topL">
                <h1><?php
                echo $user['prenom'].' '.$user['nom']?></h1>
                <p><?php
                echo $user['cp'].' '.$user['ville']?></p>
            </div>
            <a href="index.php" class="btn topR">Contacter</a>
        </div>
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
</main>
<?php require('partials/footer.php');?>
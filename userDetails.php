<?php require('partials/header.php');
$userSelected = isset($_GET['userSelected']) && !empty($_GET['userSelected']) ? $_GET['userSelected'] : 3;
$user = getUser($userSelected);
?>

<main class="userCard">
    <div class="top">
        <div class="topL">
            <h1><?php
            echo $user['prenom'].' '.$user['nom']?></h1>
            <p><?php
            echo $user['cp'].' '.$user['ville']?></p>
        </div>
        <a href="index.php" class="btn topR">Contacter</a>
    </div>
</main>
<?php require('partials/footer.php');?>
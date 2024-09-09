<?php require('./functions.php');
$users = getAllUsers();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>MyLoc</title>
</head>
<body>
    <header class="header">
        <h1 class="brand">MyLoc</h1>
        <nav class="nav">
            <ul class="links">
                <a href="./index.php">Objets</a>
                <a>Utilisateurs</a>
            </ul>
        </nav>
    </header>
    <main class="users">
        <?php foreach($users as $user){
            $objetsPossedes = getOwnedObjects($user['id'])
            ?>
            <div class="userCard">
                <div class="user">
                    <h2><?php echo $user['prenom']?></h2>
                    <h2><?php echo $user['nom']?></h2>
                </div>
                <div class="objetsPossedes">
                    <?php foreach($objetsPossedes as $objetPossede){?>
                    <div class="objetPossede">
                        <div><?php echo $objetPossede['obj_nom'] ?></div>
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
<?php require('./functions.php');
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
                <a>Objets</a>
                <a href="./users.php">Utilisateurs</a>
            </ul>
        </nav>
    </header>
    <main class="objects">
        <?php $Objects = getAllObjects();
        foreach($Objects as $objet){
            $owner = getOwner($objet['FK_User_Id']);
            $bookings = getBookings($objet['object_id']);
            $cat = getCategorie($objet['FK_Cat_Id'])
            ?>
            <div class="objCard">
                <div class="objHeader">
                    <div class="objTitle">
                        <h2><?php echo $objet['obj_nom']?></h2>
                        <h6 id=<?php echo $owner['id']?>>Propriétaire: <?php
                            echo $owner['prenom'];
                            echo ' ';
                            echo $owner['nom'] ?>
                        </h6>
                    </div>
                    <div class="objCat">cat. : <?php echo $cat['Cat_nom'] ?></div>
                </div>
                <div class="cardContent">
                    <?php $image = $objet["obj_image"];?>
                    <img  class="objImg" src=<?php echo $image?> alt="Ooops">
                    <div class="right">
                        <p class="description"><?php echo $objet['obj_description']?></p>
                        <div class="dispo">
                            <?php if (!empty($bookings)) {
                                foreach ($bookings as $booking) { ?>
                                    <p>Réservé du : <?php echo $booking['date_debut']; ?></p>
                                    <p>Au : <?php echo $booking['date_fin']; ?></p>
                                <?php }
                                } else { ?>
                                    <p>Aucune réservation actuellement.</p>
                                    <?php } ?>
                                    <button class="btn">Réserver</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </main>
</body>
</html>
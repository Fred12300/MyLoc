<?php require('partials/header.php');
$categories = getAllCategories();
$catSelected = isset($_GET['catSelected']) ? $_GET['catSelected'] : "All";
?>

    <div class="filter">
        <a href="index.php?catSelected=All" class="filterBtn link">All<img class="icon" src="./images/search.png" alt=""></a>
        <?php foreach($categories as $categorie){?>
            <a href="index.php?catSelected=<?php echo $categorie['Cat_Id']; ?>" class="filterBtn link"><?php echo $categorie['Cat_nom'] ?> <img class="icon" src="<?php echo $categorie['icon']?>" alt=""></a>
        <?php
        }
        ?>
    </div>
    <main class="objects">
        <?php $Objects = getACategorie($catSelected);
        foreach($Objects as $objet){
            $owner = getOwner($objet['FK_User_Id']);
            $bookings = getBookings($objet['object_id']);
            $cat = getCategorie($objet['FK_Cat_Id'])
            ?>
            <div class="objCard">
                <!-- <section class="objCard pop booking">
                    <h2>Réservation</h2>
                    <div class="calendrier">calendrier</div>
                    <div class="resaBottom">
                        <button class="btn">Valider</button>
                        <button class="btn red">Annuler</button>
                    </div>
                </section> -->
                <div class="objHeader">
                    <div class="objTitle">
                        <h2 class="title"><?php echo $objet['obj_nom']?></h2>
                        <a href="userDetails.php?userSelected=<?php echo $owner['id'] ?>">
                            <h5 class="title" id=<?php echo $owner['id']?>>Propriétaire: <?php
                                echo $owner['prenom'];
                                echo ' ';
                                echo $owner['nom'] ?>
                            <img class="mini2" src="./images/loupe.png" alt="">
                            </h5>
                        </a>
                    </div>
                    <div class="objCat"><?php echo $cat['Cat_nom'] ?> <img class="icons" src="<?php echo $cat['icon']?>" alt=""></div>
                </div>
                <div class="cardContent">
                    <?php $image = $objet["obj_image"];?>
                    <img  class="objImg" src=<?php echo $image?> alt="Ooops">
                    <div class="right">
                        <p class="description"><?php echo $objet['obj_description']?></p>
                        <div class="dispo">
                            <?php if (!empty($bookings)) {
                                foreach ($bookings as $booking) { ?>
                                    <p class="title">Réservé du : <?php echo $booking['date_debut']; ?></p>
                                    <p class="title">Au : <?php echo $booking['date_fin']; ?></p>
                                <?php }
                                } else { ?>
                                    <p class="title">Aucune réservation actuellement.</p>
                                    <?php } ?>
                                    <a class="btn title">Réserver</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
        


    </main>
    <?php require 'partials/footer.php' ?>
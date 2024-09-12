<?php require('./functions.php');
session_start();
if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
    $connected = 1;
    $user_prenom = $_SESSION['user']['prenom'];
    $user_role = $_SESSION['user']['isAdmin'];
    $user_id = $_SESSION['user']['id'];
} else {
    $connected = 0;
    $user_prenom = 'Invité';
    $user_role = 2; 
}
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
        <a href="index.php">
            <h1 class="brand">MyLoc</h1>
        </a>
        <nav class="nav">
            <ul class="links">
                <a class="link" href="./index.php">Objets</a>
                <a class="link" href="./users.php">Utilisateurs</a>
                <?php if($user_role == 1){?>
                <div class="adminPanel">
                    <a class="link" href="./objEdit.php">Gérer les Objets</a>
                    <a class="link" href="./catEdit.php">Gérer les Catégories</a>
                    <a class="link" href="./userEdit.php">Gérer les Utilisateurs</a>
                </div>
                <?php } 
                ?>
                <a href="<?php echo $connected ? 'logout.php' : 'login.php'; ?>" class="btn" ><?php echo $connected ? 'Se déconnecter' : 'Se connecter'; ?></a>
            </ul>
        </nav>
    </header>
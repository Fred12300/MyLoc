<?php require('partials/header.php');
if(isset($_POST)&&!empty($_POST)){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $user = isUser($email);
    if($user){
        $registeredPWD = $user['mdp'];
        $isLogOk = password_verify($password, $registeredPWD);
        if($isLogOk){
            $_SESSION['user'] = [
                'id'=>$user['id'],
                'prenom'=>$user['prenom'],
                'isAdmin'=>$user['isAdmin']
            ];
            header('location:index.php');
        }else{
            echo 'Mot de Passe incorrect';
        }
    }else{
        echo "utilisateur inconnu";
    }
}

?>
<form class="loginBox" action="" method="post">
    <input type="email" placeholder="Votre Email" name="email">
    <input type="password" placeholder="Votre mot de passe" name="password">
    <input type="submit" value="">
</form>
<?php require('partials/footer.php');?>
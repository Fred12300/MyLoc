<?php if(!isset($_SESSION['user']) || empty($_SESSION['user']) || $_SESSION['user']['isAdmin'] != 1){
    header('location:503.php');
}?>
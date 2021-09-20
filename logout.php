<?php
    
    session_start();
    unset($_SESSION["id"]);
    unset($_SESSION["login"]);
    $_SESSION['logout_msg'] = ' Vous êtes bien déconnecté. Au revoir !';
    header('Location: index_connexion.php');

?>
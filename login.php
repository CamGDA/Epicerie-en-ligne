<?php

session_start(); 

    include('database_connexion.php');
    include('util.php');

    //connexion

    if ($_POST['authentication_type'] == 'connexion') {
          if(isset($_POST['login']) && isset($_POST['password'])){

                $login = $_POST['login'];
                $password = $_POST['password'];
                

                if(empty($login) || empty($password)){
                    $util->redirectWithError('index_connexion.php', 'Merci de compléter tous les champs.');

                } else {

                    $query = "SELECT * 
                    FROM utilisateur 
                    WHERE login = '" . $login ."'";

                    $req = $DB->query($query);
        
                    $result = $req->fetch();

                    if (!$result) {
                        $util->redirectWithError('index_connexion.php', 'Mauvais login ou mot de passe !');
                    }

                    $DB_hash = $result['pass'];

                    if (!password_verify($password, $DB_hash)) {
                        $util->redirectWithError('index_connexion.php', 'Mauvais login ou mot de passe !');

                    }

                    $_SESSION['id'] = $result['id'];
                    $_SESSION['login'] = $login;

                    $util->redirect('galerie.php');
                        
                    }
                } 
            }

?>

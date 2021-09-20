<?php

session_start(); 

    include('database_connexion.php');
    include('util.php');

    //inscription
        if ($_POST['authentication_type'] == 'inscription') {
            if(isset($_POST['login']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['address']) && isset($_POST['phone'])){
            
                $login = $_POST['login'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $address = $_POST['address'];
                $phone = $_POST['phone'];

                if(empty($login) || empty($email) || empty($password) || empty($address) || empty($phone)){
                    $util->redirectWithError('index_register.php', 'Merci de compléter tous les champs.');

                } else {

                    $result = $DB->getUser($login, $email);

                    if (!empty($result)) {
                        $util->redirectWithError('index_register.php', 'Ce compte existe déjà.');
                        
                    } else {

                        $DB->addUser(
                            [
                                'login' => $login,
                                'password' => $password,
                                'email' => $email,
                                'address' => $address,
                                'phone' => $phone
                            ]
                        );

                        $_SESSION['sub_msg'] = "Merci de votre inscription. Veuillez à présent vous connecter.";
                        $util->redirect('index_connexion.php');
                    }
                }
            } 
        }
?>

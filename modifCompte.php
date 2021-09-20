<?php

session_start(); 

    include('database_connexion.php');
    include('util.php');

    if(isset($_POST['newLogin']) && isset($_POST['newPassword']) && isset($_POST['newEmail']) && isset($_POST['newAddress']) && isset($_POST['newPhone'])){

        $newLogin = $_POST['newLogin'];
        $newPassword = $_POST['newPassword']; 
        $newEmail = $_POST['newEmail'];
        $newAddress = $_POST['newAddress'];
        $newPhone = $_POST['newPhone'];
        $id = $_SESSION['id'];
        
        if(!empty($newLogin)){
            $query = "UPDATE utilisateur 
                    SET login = :newLogin
                    WHERE id = :id ";

            $DB->update($query, $id,
                [
                'newLogin' => $newLogin,
                ]);

        }

        if(!empty($newPassword)){

            $hashed_password = password_hash($newPassword, PASSWORD_DEFAULT);

            $query = "UPDATE utilisateur 
                    SET pass = :hashed_password
                    WHERE id = :id ";

            $DB->update($query, $id,
                [
                'hashed_password' => $hashed_password,
                ]);
        }

        if(!empty($newEmail)){
            $query = "UPDATE utilisateur 
                    SET email = :newEmail
                    WHERE id = :id ";

            $DB->update($query, $id,
                [
                'newEmail' => $newEmail,
                ]);

        }

        if(!empty($newAddress)){
            $query = "UPDATE utilisateur 
                    SET adresseLivraison = :newAddress
                    WHERE id = :id ";

            $DB->update($query, $id,
                [
                'newAddress' => $newAddress,
                ]);

        }

        if(!empty($newPhone)){
            $query = "UPDATE utilisateur 
            SET telephone = :newPhone
            WHERE id = :id ";

            $DB->update($query, $id,
                [
                'newPhone' => $newPhone,
                ]);

        }


        $_SESSION['edit_msg'] = "Votre profil a été modifié.";
        $util->redirect('monCompte.php');

    }
?>

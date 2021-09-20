<?php 

session_start(); 
include('database_connexion.php');
include('util.php');

$idUtilisateur = $_SESSION['id'];
$idProduit = $_GET['productId'];

if($_GET['method']== 'add') {
    if (isset($idUtilisateur) && isset($idProduit)) {

        $DB->addCartProduct($idProduit, $idUtilisateur);

        $util->redirect('galerie.php');
    }
} 

if($_GET['method']== 'remove') {
    if (isset($idUtilisateur) && isset($idProduit)) {

        $DB->removeCartProduct($idProduit, $idUtilisateur);

        $util->redirect('panier.php');
    }
} 


?>

<?php

session_start(); 
include('database_connexion.php');
include('util.php');


/* Initialisation du panier, on utilise les session pour garder le panier en mémoire
$_SESSION['panier']['produit_Id'] = array();
Subdivision du panier
$_SESSION['panier']['idProduit'] = array();
$_SESSION['panier']['idUtilisateur'] = array();

array_push( $_SESSION['panier']['idProduit'],$idProduit);
array_push( $_SESSION['panier']['idUtilisateur'],$idUtilisateur);

*/

?>

<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <link rel="icon" href="images/fevicon.png" type="image/gif" />
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Epicerie Dupont</title>


  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />

  <style type="text/css">

  .product_section .box .detail-box a {
    font-size: 15px;
  }

  </style>

</head>

<body>

  <!-- header section strats -->
  <header class="header_section header_inner">
    <div class="container">
      <nav class="navbar navbar-expand-lg custom_nav-container ">
        <a class="navbar-brand" href="index.html">
          <span>Epicerie Dupont</span>
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""> </span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav  ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="galerie.php">Galerie</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="panier.php"><i class="fas fa-shopping-cart"></i>Panier</a>
            </li> 
            <li class="nav-item">
              <a class="nav-link" href="monCompte.php"><i class="fas fa-user-circle"></i>Mon Compte</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i>Se Deconnecter</a>
            </li> 
          </ul>
        </div>
      </nav>
    </div>
  </header>
  <!-- end header section -->

  <!-- product section -->

  <section class="product_section layout_padding2-top layout_padding-bottom">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Nos Produits
        </h2>
      </div>
      <div class="row">
      <?php 
      
      $productList = $DB->getAllProduct();

      foreach ($productList as $product) {?>
          <div class="col-sm-6 col-lg-4">
            <div class="box">
              <div class="img-box">
                <a href="produit.php?productId=<?php echo $product['id'] ?>">
                <img src="<?php echo $product['url'] ?>" alt=""></a>
              </div>
              <div class="detail-box">
                <span class="rating">
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fas fa-star-half-alt"></i>
                </span>
                <a class="description">
                <?php echo $product['description'] ?>
                </a>
                <div class="price_box">
                  <h5 class="price_heading">
                  <?php echo $product['prix'] ?> <span>€</span>
                  </h5>
                </div>
                <div class="button-cart-container">
                  <button class="add-to-cart-button">
                      <span class="add-to-cart"><a href="managePanier.php?productId=<?php echo $product['id']?>&method=add"><i class="fas fa-shopping-cart"></i>Ajouter au Panier</a></span>
                  </button>
                </div>
              </div>
            </div>
          </div>
      <?php
      }
      ?>
    </div>
    <div class="btn-box">
      <a href="panier.php">
        Aller au panier
      </a>
    </div>
  </section>

  <!-- end product section -->

  <!-- info section -->

  <section class="info_section ">
    <div class="info_container ">
      <div class="container">
        <div class="row">
          <div class="col-lg-9">
            <div class="info_contact ">
              <div class="row">
                <div class="col-md-3">
                  <a href="#" class="link-box">
                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                    <span>
                      Location
                    </span>
                  </a>
                </div>
                <div class="col-md-5">
                  <a href="#" class="link-box">
                    <i class="fa fa-phone" aria-hidden="true"></i>
                    <span>
                      Call +01 1234567890
                    </span>
                  </a>
                </div>
                <div class="col-md-4">
                  <a href="#" class="link-box">
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                    <span>
                      demo@gmail.com
                    </span>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-5  col-lg-3 mx-auto">
            <div class="info_form ">
              <form action="#">
                <input type="email" placeholder="Enter Your Email" />
                <button>
                  <i class="fa fa-arrow-right" aria-hidden="true"></i>
                </button>
              </form>
            </div>
          </div>
        </div>
        <div class="info_logo">
          <a class="navbar-brand" href="index.html">
            <span>
            Epicerie Dupont
            </span>
          </a>
        </div>
        <div class="social-box">
          <a href="">
            <i class="fa fa-facebook" aria-hidden="true"></i>
          </a>
          <a href="">
            <i class="fa fa-twitter" aria-hidden="true"></i>
          </a>
          <a href="">
            <i class="fa fa-instagram" aria-hidden="true"></i>
          </a>
          <a href="">
            <i class="fa fa-youtube" aria-hidden="true"></i>
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- end info section -->

  <!-- footer section -->
  <footer class="footer_section">
    <div class="container">
      <p>
        &copy; <span id="displayYear"></span> All Rights Reserved By
        <a href="https://html.design/">Free Html Templates</a>
      </p>
    </div>
  </footer>
  <!-- footer section -->

  <!-- jQery -->
  <script src="js/jquery-3.4.1.min.js"></script>
  <!-- bootstrap js -->
  <script src="js/bootstrap.js"></script>
  <!-- custom js -->
  <script src="js/custom.js"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap"></script>
  <!-- End Google Map -->

</body>

</html>
<?php 

session_start(); 
include('database_connexion.php');
include('util.php');

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
  <link rel="stylesheet" type="text/css" href="css/paiement.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />

</head>

<body>

  <!-- header section strats -->
  <header class="header_section">
    <div class="container">
      <nav class="navbar navbar-expand-lg custom_nav-container ">
        <a class="navbar-brand" href="newUser.html">
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
  
  <!-- about section -->

    <section class="product_section layout_padding2-top layout_padding-bottom">
        <div class="heading_container heading_center">
            <h2>
            Paiement
            </h2>
        </div>
        <div class="container block">
          <div class="left">
            <div class="row back">
              <h5 class="description" href="">
                Numéro de commande : #NCDM1563
              </h5>
            </div>
            <table class="table">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">#</th>
                  <th class="col-4">Produit</th>
                  <th scope="col">Prix</th>
                </tr>
              </thead>
              <?php 

                $idUtilisateur = $_SESSION['id'];

                $query="SELECT *
                FROM panier
                INNER JOIN produit ON panier.idProduit = produit.id
                WHERE panier.idUtilisateur = $idUtilisateur";

                $req = $DB->query($query);
                        
                $productList = $req->fetchAll();

                foreach ($productList as $product) {?>
                  <tbody>
                    <tr>
                      <th scope="row"><?php echo $product['id']?></th>
                      <td><img src="<?php echo $product['url'] ?>" width="50px" ></td>
                      <td><?php echo $product['prix'] ?><span>€</span></td>
                    </tr>
                  </tbody>
                <?php 
                  } 
                ?>
            </table>
          </div>
          <div class="right">
            <div class="row back">
              <h5 class="description" href="">
                Totaux
              </h5>
            </div>
            <table class="table">
              <thead class="thead-light">
                <tr>
                  <th class="col-8">Commande #NCDM1563 </th>
                  <th class="col-4"></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">Total HT</th>
                  <td><?php 
              
                    $totalHT = $DB->getTotalPriceHT($idUtilisateur);

                    echo $totalHT['totalHT'];

                    ?>
                    <span>€</span>
                  </td>
                </tr>
                <tr>
                  <th scope="row">Total TTC</th>
                  <td><?php echo 
              
                    $totalTTC = $DB->getTotalPriceTTC($idUtilisateur);
                    
                    ?>
                    <span>€</span>
                  </td>
                </tr>
              </tbody>
            </table>
            <table class="table">
              <thead class="thead-light">
                <tr>
                  <th class="col-8">Adresse de livraison </th>
                  <th class="col-4"></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td scope="row" colspan="2"><?php 
                    
                    $adresseLivraison = $DB->getAddress($idUtilisateur);

                    echo $adresseLivraison['adresseLivraison']
                    
                    ?></th>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
    </section>
  <!-- end about section -->

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
                      Epicerie.Dupont@gmail.com
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
        <a href="https://html.design/">Epicerie Dupont</a>
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

<?php
    unset($_SESSION["er_msg"]);
    unset($_SESSION['sub_msg']);
    unset($_SESSION['logout_msg']);
?>

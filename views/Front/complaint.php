<?php
require "panier.class.php";
require "C:/xampp/htdocs/Naturimal/Controller/commandeC.php";
require "C:/xampp/htdocs/Naturimal/Controller/reclamationC.php";

$db = getConnexion();
$panier = new panier();
$comC = new commandeC();
$recC = new reclamationC();
if (isset($_GET['assistance'])) {
    header('location: chat/users.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include('HeaderClient.php');
    ?>

</head>

<body class="goto-here">
    <div class="hero-wrap hero-bread" style="background-image: url('images/Botanique.jpg');">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2" style="color:black"><a href="Accueil.php">Home</a></span> <span>Boutique</span></p>
                    <h1 class="mb-0 bread" style="color:black">Mes Achats</h1>
                </div>
            </div>
        </div>
    </div>
    <?php
    $ids_commandes = $recC->get_id_commandes_in_reclamation();
    if ( empty($ids_commandes)){ ?>
        <section class="ftco-section ftco-cart">
        <div class="container">
          <div class="row">
            <div class="col-md-12 ftco-animate">
              <div class="cart-list">
                <table class="table">
                  <thead class="thead-primary">
                    <tr class="text-center">
                      <th>&nbsp;</th>
                      <th>Product name</th>
                      <th>Price</th>
                      <th>Quantity</th>
                      <th>Total</th>
                      <th>Complaints</th>
                    </tr>
                  </thead>
                  
                </table>
          <input type="text" name="quantity" value="Listes des reclamations est vide " class="quantityy form-control cart"  readonly>
                    </div>
            </div>
          </div>
         
        </div>
      </section>
      <?php }
      else{
    foreach ($ids_commandes as $id_co) :
        //echo $id_co->id_commande;
    ?>
        <section class="ftco-section ftco-cart">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 ftco-animate">
                        <div class="cart-list">
                            <table class="table">
                                <thead class="thead-primary">
                                    <tr class="text-center">
                                        <th>&nbsp;</th>
                                        <th>Product name</th>
                                        <th> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $ids_produit = array();
                                    $email = $_SESSION['user'];
                                    $adresse = $comC->get_adresse_commande($email);

                                    $products = $recC->get_reclamation_for_complaints($email, $id_co->id_commande, "jardinage");

                                    if (!empty($products)) {
                                        foreach ($products as $product) {
                                            array_push($ids_produit, $product->idproduit);
                                            $fullname = $product->nom . " " . $product->prenom;
                                        }

                                        $purchases = $panier->product_table($db, $ids_produit, "jardinage");
                                        $i = 0;
                                        $tot = 0;
                                        if (!empty($purchases)) {
                                            foreach ($purchases as $product) :

                                    ?>
                                                <div class="itemsspecial">
                                                    <tr class="text-center">
                                                        <td class="image-prod">
                                                            <div class="img" style="background-image:url(<?= "images/" . $product->ImageArticle; ?>);"></div>
                                                        </td>

                                                        <td class="product-name">
                                                            <h3><?= $product->NomArticle; ?></h3>
                                                            <p><?= $product->DescriptionArticle; ?></p>
                                                        </td>

                                                    </tr><!-- END TR-->
                                                </div>
                                            <?php
                                            endforeach;
                                        }
                                    }

                                    //   ############################# ACCESS #########################################

                                    $ids_produit = array();
                                    $adresse = $comC->get_adresse_commande($email);
                                    $products = $recC->get_reclamation_for_complaints($email, $id_co->id_commande, "access");
                                    if (!empty($products)) {
                                        foreach ($products as $product) {
                                            array_push($ids_produit, $product->idproduit);
                                            $fullname = $product->nom . " " . $product->prenom;
                                        }

                                        $purchases = $panier->product_table($db, $ids_produit, "access");
                                        $i = 0;
                                        $tot = 0;
                                        if (!empty($purchases)) {
                                            foreach ($purchases as $product) :

                                            ?>
                                                <div class="itemsspecial">
                                                    <tr class="text-center">
                                                        <td class="image-prod">
                                                            <div class="img" style="background-image:url(<?= "images/" . $product->image; ?>);"></div>
                                                        </td>

                                                        <td class="product-name">
                                                            <h3><?= $product->nom; ?></h3>
                                                        </td>

                                                    </tr><!-- END TR-->
                                                </div>
                                            <?php
                                            endforeach;
                                        }
                                    }


                                    //   ############################# ALIMENT #########################################

                                    $ids_produit = array();
                                    $adresse = $comC->get_adresse_commande($email);
                                    $products = $recC->get_reclamation_for_complaints($email, $id_co->id_commande, "aliment");
                                    if (!empty($products)) {
                                        foreach ($products as $product) {
                                            array_push($ids_produit, $product->idproduit);
                                            $fullname = $product->nom . " " . $product->prenom;
                                        }

                                        $purchases = $panier->product_table($db, $ids_produit, "aliment");
                                        $i = 0;
                                        $tot = 0;
                                        if (!empty($purchases)) {
                                            foreach ($purchases as $product) :

                                            ?>
                                                <div class="itemsspecial">
                                                    <tr class="text-center">
                                                        <td class="image-prod">
                                                            <div class="img" style="background-image:url(<?= "images/" . $product->image; ?>);"></div>
                                                        </td>

                                                        <td class="product-name">
                                                            <h3><?= $product->nom; ?></h3>
                                                        </td>
                                                    </tr><!-- END TR-->
                                                </div>
                                    <?php
                                            endforeach;
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-end">

                    <div class="col-lg-12 mt-5 cart-wrap ftco-animate">
                        <div class="cart-total mb-3">
                            <h3>Information : </h3>
                            <p>full name : <?= $fullname ?></p>
                            <p>Adress : <?= $adresse ?></p>
                            <form action="#" class="info">
                                <div class="form-group">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="cart-detail p-3 p-md-4">
                        <a href="chat/users.php">
                            <input type="submit" value="ask for assistance" name="assistance" class="btn btn-primary py-3 px-4"></input>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    <?php endforeach; }?>
    <?php include("footer.php");?>

</body>

</html>
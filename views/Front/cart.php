<?php require '../../config1.php';
require 'panier.class.php';
$db = getConnexion();
$panier = new panier();

if (isset($_GET['id'])) {
    $ids = explode(" ", $_GET['id']);
    $id_article = $ids[0];
    $type_article = $ids[1];
    // echo $type_article;
    $_SESSION['typearticle'] = $type_article;
    $product = $panier->add_product_to_cart($db, array('id' => $_GET['id']), $_SESSION['typearticle']);



    if ($_SESSION['typearticle'] == "jardinage") {
        $panier->add_product($product[0]->IdArticle, "jardinage");
        if (!isset($_SESSION['total'][1])) {
            $_SESSION['total'][1] = 0;
        } else {
            $_SESSION['total'][1] += $product[0]->PrixArticle;
        }
    } else if ($_SESSION['typearticle'] == "access") {
        $panier->add_product($product[0]->id, "access");
        if (!isset($_SESSION['total'][1])) {
            $_SESSION['total'][1] = 0;
        } else {
            $_SESSION['total'][1] += $product[0]->prix;
        }
    } else if ($_SESSION['typearticle'] == "aliment") {
        $panier->add_product($product[0]->id, "aliment");
        if (!isset($_SESSION['total'][1])) {
            $_SESSION['total'][1] = 0;
        } else {
            $_SESSION['total'][1] += $product[0]->prix;
        }
    }
}




unset($_GET['id']);
// print_r($_SESSION["panierjar"]);
// echo "<br>";
// print_r($_SESSION["panieraccess"]);
// echo "<br>";
// print_r($_SESSION["panieraliment"]);

if (isset($_GET['delete_product_id'])) {
    $panier->DeleteProductId($_GET['delete_product_id']);
}
unset($_GET['delete_product_id']);

$_SESSION['quantityjar'] = array();
$_SESSION['totalindivjar'] = array();
$_SESSION['quantityaccess'] = array();
$_SESSION['totalindivaccess'] = array();
$_SESSION['quantityaliment'] = array();
$_SESSION['totalindivaliment'] = array();

if (!isset($_SESSION['totaljar'])) {
    $_SESSION['totaljar'] = array();
    $_SESSION['totaljar'][1] = 0;
}
if (!isset($_SESSION['totalaliment'])) {
    $_SESSION['totalaliment'] = array();
    $_SESSION['totalaliment'][1] = 0;
}
if (!isset($_SESSION['totalaccess'])) {
    $_SESSION['totalaccess'] = array();
    $_SESSION['totalaccess'][1] = 0;
}
if (!isset($_SESSION['total'][1])) {
    $_SESSION['total'][1] = 0;
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
                    <h1 class="mb-0 bread" style="color:black">Panier</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section ftco-cart">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ftco-animate">
                    <div class="cart-list">
                        <table class="table">
                            <thead class="thead-primary">
                                <tr class="text-center">
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    <th>Product name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $ids = array_keys($_SESSION['panierjar']);
                                // echo '<br>';
                                // print_r($_SESSION['panierjar']);
                                // echo '<br>';
                                sort($ids);
                                // print_r($ids);
                                // echo count($_SESSION['panier']);
                                if (!empty($ids)) {
                                    $products = $panier->product_table($db, $ids, "jardinage");

                                    $i = 0;
                                    foreach ($products as $product) :

                                        $_SESSION['quantityjar'][$ids[$i]] = $_SESSION['panierjar'][$product->IdArticle];
                                        $_SESSION['totalindivjar'][$ids[$i]] = $product->PrixArticle * $_SESSION['panierjar'][$product->IdArticle];
                                        $i++;
                                        $_SESSION['totaljar'][1] +=  $product->PrixArticle * $_SESSION['panierjar'][$product->IdArticle];
                                ?>
                                        <div class="itemsspecial">
                                            <tr class="text-center">
                                                <td class="product-remove"><a href="cart.php?delete_product_id=<?= $product->IdArticle . " " . "jardinage"; ?>"><span class="ion-ios-close"></span></a></td>

                                                <td class="image-prod">
                                                    <div class="img" src="images/<?= $product->ImageArticle; ?>" style="background-image:url(<?= "images/" . $product->ImageArticle; ?>);"></div>
                                                </td>

                                                <td class="product-name">
                                                    <h3><?= $product->NomArticle; ?></h3>
                                                    <p><?= $product->DescriptionArticle; ?></p>
                                                </td>

                                                <td class="productprice"><?= number_format($product->PrixArticle, 2, ',', ' '); ?> $ </td>

                                                <td class="quantity">

                                                    <input type="number" name="quantity" class="quantityy form-control cart" value="<?= $_SESSION['panierjar'][$product->IdArticle]; ?>" min="1" max="<?= number_format($product->QuantiteArticle); ?>">

                                                </td>
                                                <td class="producttotal"><?= number_format($product->PrixArticle * $_SESSION['panierjar'][$product->IdArticle], 2, ',', ' '); ?> $</td>
                                            </tr><!-- END TR-->
                                        </div>
                                <?php endforeach;
                                }

                                ?>
                            </tbody>
                            <!-- ############################## ACCCESS ############################## -->
                            <tbody>
                                <?php
                                $ids = array_keys($_SESSION['panieraccess']);
                                // echo '<br>';
                                // print_r($_SESSION['panieraccess']);
                                // echo '<br>';
                                sort($ids);
                                // print_r($ids);
                                // echo count($_SESSION['panier']);
                                if (!empty($ids)) {
                                    $products = $panier->product_table($db, $ids, "access");
                                    $i = 0;
                                    foreach ($products as $product) :

                                        $_SESSION['quantityaccess'][$ids[$i]] = $_SESSION['panieraccess'][$product->id];
                                        $_SESSION['totalindivaccess'][$ids[$i]] = $product->prix * $_SESSION['panieraccess'][$product->id];
                                        $i++;
                                        $_SESSION['totalaccess'][1] +=  $product->prix * $_SESSION['panieraccess'][$product->id];
                                ?>
                                        <div class="itemsspecial">
                                            <tr class="text-center">
                                                <td class="product-remove"><a href="cart.php?delete_product_id=<?= $product->id . " " . "access"; ?>"><span class="ion-ios-close"></span></a></td>

                                                <td class="image-prod">
                                                    <div class="img" src="images/<?= $product->ImageArticle; ?>" style="background-image:url(<?= "images/" . $product->image; ?>);"></div>
                                                </td>

                                                <td class="product-name">
                                                    <h3><?= $product->nom; ?></h3>
                                                </td>

                                                <td class="productprice"><?= number_format($product->prix, 2, ',', ' '); ?> $ </td>

                                                <td class="quantity">

                                                    <input type="number" name="quantity" class="quantityy form-control cart" value="<?= $_SESSION['panieraccess'][$product->id]; ?>" min="1" max="<?= number_format($product->qte); ?>">

                                                </td>
                                                <td class="producttotal"><?= number_format($product->prix * $_SESSION['panieraccess'][$product->id], 2, ',', ' '); ?> $</td>
                                            </tr><!-- END TR-->
                                        </div>
                                <?php endforeach;
                                }

                                ?>
                            </tbody>
                            <!-- ############################## ALIMENTS ############################## -->
                            <tbody>
                                <?php
                                $ids = array_keys($_SESSION['panieraliment']);
                                // echo '<br>';
                                // print_r($_SESSION['panieraliment']);
                                // echo '<br>';
                                sort($ids);
                                // print_r($ids);
                                // echo count($_SESSION['panier']);
                                if (!empty($ids)) {
                                    $products = $panier->product_table($db, $ids, "aliment");
                                    $i = 0;
                                    foreach ($products as $product) :

                                        $_SESSION['quantityaliment'][$ids[$i]] = $_SESSION['panieraliment'][$product->id];
                                        $_SESSION['totalindivaliment'][$ids[$i]] = $product->prix * $_SESSION['panieraliment'][$product->id];
                                        $i++;
                                        $_SESSION['totalaliment'][1] +=  $product->prix * $_SESSION['panieraliment'][$product->id];
                                ?>
                                        <div class="itemsspecial">
                                            <tr class="text-center">
                                                <td class="product-remove"><a href="cart.php?delete_product_id=<?= $product->id . " " . "aliment"; ?>"><span class="ion-ios-close"></span></a></td>

                                                <td class="image-prod">
                                                    <div class="img" src="images/<?= $product->ImageArticle; ?>" style="background-image:url(<?= "images/" . $product->image; ?>);"></div>
                                                </td>

                                                <td class="product-name">
                                                    <h3><?= $product->nom; ?></h3>
                                                </td>

                                                <td class="productprice"><?= number_format($product->prix, 2, ',', ' '); ?> $ </td>

                                                <td class="quantity">

                                                    <input type="number" name="quantity" class="quantityy form-control cart" value="<?= $_SESSION['panieraliment'][$product->id]; ?>" min="1" max="<?= number_format($product->qte); ?>">

                                                </td>
                                                <td class="producttotal"><?= number_format($product->prix * $_SESSION['panieraliment'][$product->id], 2, ',', ' '); ?> $</td>
                                            </tr><!-- END TR-->
                                        </div>
                                <?php endforeach;
                                }

                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row justify-content-end">

                <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
                    <div class="cart-total mb-3">
                        <h3>Cart Totals</h3>
                        <hr>
                        <p class="d-flex total-price">
                            <span>Total</span>
                            <span id="totall"><?= number_format($_SESSION['total'][1], 2, ',', ' '); ?> $ </span>
                        </p>
                    </div>
                    <p><a href="checkout.php" class="btn btn-primary py-3 px-4">Proceed to Checkout</a></p>
                </div>
            </div>
        </div>
    </section>

    <?php include("footer.php");?>


</body>

</html>
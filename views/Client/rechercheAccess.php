<?PHP
include "../../core/animalerieC.php";
include '../../config.php';
include_once 'HeaderClient.php';
?>
<!DOCTYPE html>
<html lang="en">

<div class="hero-wrap hero-bread" style="background-image: url('images/backG.jpg');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Produits</span></p>
                <h1 class="mb-0 bread">Produits</h1>
            </div>
        </div>
    </div>
</div>
<body>
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 mb-5 text-center">
                <ul class="product-category">
                    <li><a class="active">Accessoires</a></li>
                    <li><a href="AfficherAlimentCL.php">Aliments</a></li>
                </ul>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10 mb-5 text-center">
                <ul class="product-category"
                <li><a class="active">les plus recents </a></li>
                <li><a href="moinsCherAccess.php">les moins chers</a></li>
                <li><a href="accessType.php">Filtre</a></li>

                </ul>
            </div>
        </div>

        <form action="rechercheAccess.php" method="POST" novalidate="novalidate" name="form">
            <div class="form-group">
                <input type="search" class="form-control"  name="access" id="access">
            </div>
            <div>
                <input type="submit" name="recherche" value="recherche" ></a>

            </div>
        </form>

        <div class="row">
            <?php
            $access1=$_POST["access"];
            $access=new AccessC();
            $access=$access->rechercheAccess($access1);
            echo ($access1);

                //foreach ($liste as $access) {


                    ?>


                    <div class="col-md-6 col-lg-3 ftco-animate"   style="display: inline;">
                        <div class="product" >
                            <a href="#" class="img-prod"><img class="img-fluid" style="width: 250px;height: 350px;" src="images/<?php echo $access['image']?>" alt="Colorlib Template">
                                <div class="text py-3 pb-4 px-3 text-center">
                                    <h3><a href="#"><?php echo $access['nom']?></a></h3>
                                    <div class="d-flex">
                                        <div class="pricing">
                                            <p class="price"><span><?php echo $access['prix'].'DT'?></span></p>
                                        </div>
                                        <div class="iddd">
                                            <p class="idd"><span> pour <?php echo $access['type']?></span></p>
                                        </div>
                                    </div>
                                    <div class="bottom-area d-flex px-3">
                                        <div class="m-auto d-flex">
                                            <a href="oneaccess.php?id=<?PHP echo $access['id']; ?>" class="add-to-cart d-flex justify-content-center align-items-center text-center">
                                                <span><i class="ion-ios-menu"></i></span>
                                            </a>
                                            <a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">
                                                <span><i class="ion-ios-cart"></i></span>
                                            </a>
                                            <a href="#" class="heart d-flex justify-content-center align-items-center ">
                                                <span><i class="ion-ios-heart"></i></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>


                <?php
                //}
            ?>

        </div>
</section>
<?php
include_once 'footer.php'
?>

</body>
</html>


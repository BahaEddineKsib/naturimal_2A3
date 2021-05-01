<?php
include '../../config.php';
include '../../core/animalerieC.php';
$typeC= new typeC();
$types= $typeC->afficherType();
if(isset($_POST['type']) && isset($_POST['search'])){
    $list = $typeC->filtreAccessoire($_POST['type']);
}
?>
<div class="form-container">
    <form action="" method="POST">
        <div class="row">
            <div class="col-25">
                <label> recherche </label>
            </div>
            <div class="col-75">
                <select name="type" id="type">
                    <?php
                    foreach ($types as $type){
                        ?>
                        <option
                            value="<?=$type['id'] ?>"
                            <?php
                            if (isset($_POST['search']) && ($type['id'] ==$_POST['type'])){
                                ?>
                                selected
                            <?php } ?>
                        >
                            <?= $type['type'] ?>
                        </option>
                        <?php
                    }
                    ?>
                </select>
            </div>
        </div>
        <br>
        <div class="row" >
            <input type="submit" value="search" name="search" href="accessType.php">
        </div>
    </form>
</div>
<?php if(isset($_POST['search'])){ ?>
    <section class="container">
        <h2>Aliments</h2>
        <div class="shop-items">
            <?php
            foreach ($list as $item ){ ?>
                <div class="shop-item">
                    <strong class="shop-item-title"> <?= $item['nom'] ?> </strong>
                    <img scr="images/<?= $item['image'] ?>" class="shop-item-image">
                    <div class="shop-item-details">
                        <span class="shop-item-price"> <?= $item['prix'] ?> dt. </span>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </section>
    <?php
}
?>
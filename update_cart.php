<?php
    require 'panier.class.php' ;
    if ( isset($_POST['data_info'])){
    $datas = json_decode($_POST['data_info']);
    $total = end($datas);
    array_pop($datas);

    $count = 0;
    $quantity = array();
    $total_indiv = array();
    foreach($datas as $data){
        if ( $count % 2 == 0)
        {
            array_push($quantity,json_decode($data));
        }
        else
        {
            array_push($total_indiv,json_decode($data));

        }
        $count++;
    }
    print_r($total_indiv);

    $parc = 0;
    $panier = new panier();
    $ids = array_keys($_SESSION['panier']);
    sort($ids);
    print_r($ids);



    foreach($quantity as $q){
        $panier->update_product_quantity_cart(  $ids[ $parc ]  , $q);
        $_SESSION['quantity'][ $ids[ $parc ] ] = $q;
        $parc++;
    }

    $parc = 0;
    foreach($total_indiv as $t){
        $_SESSION['totalindiv'][ $ids[ $parc ] ] = $t;
        $parc++;
    }

    $_SESSION['total'][1] = $total;
    }

?>
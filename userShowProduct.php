<?php
    //controler user afficher les produits 
    include './utils/connectBdd.php';
    include './model/product.php';
    include './view/userViewshowProduct.php';
    $prod = new Product();
    $prod->showProdUser($bdd);
?>
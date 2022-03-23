<?php
    //controler admin sélectionner les produits à afficher (vue user)
    include './utils/connectBdd.php';
    include './model/product.php';
    include './view/admViewSelectVisibleproduct.php';

    $prod = new Product();
    echo '<form action="" method="post">';
    $prod->showProd($bdd);
    echo ' <button type="submit">Sélectionner</button>';
    echo '</form>';
    //vérification des id_prod
    if(isset($_POST['id_prod'])){
        //boucle pour chaque tâches cochées
        foreach($_POST['id_prod'] as $value)
        {   
            //éxécution de la méthode updateProd qui permet 
            //de changer le statut de visibilité des produits
            $prod->updateProd($bdd, $value);            
        }
        //redirection vers admSelectVisibleProduct.php
        header("Location: admSelectVisibleProduct.php");
    }
?>
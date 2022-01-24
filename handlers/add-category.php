<?php

include_once '../models/Product_cat.php';

try {
    if (isset($_POST['name']) && !empty($_POST['name'])) 
    {
        $newProductcat = new ProductCat();
        $newProductcat->addOneProductCat( [$_POST['name']] );
        $success="Catégorie ajouté.";
        header('Location: ../index.php?view=dashboard/add-product-cat&success=' .$success);
        exit();
    }
    else {
        throw new Exception ( "Veuillez remplir tous les champs") ;
    }
}

catch ( Exception $yeah ) {
        header('Location: ../index.php?view=dashboard/add-product-cat&error=' . $yeah->getMessage());
        exit();
}
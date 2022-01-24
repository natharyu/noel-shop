<?php

include_once '../models/Product_cat.php';


try 
{
    if (isset($_POST['name']) && !empty($_POST['name'])
    && isset($_POST['id']) && !empty($_POST['id'])) 
    {
        
        $newProductCat = new ProductCat();
        
        $modifyCat = [
            'name'=> $_POST['name']
        ];
        
        $newProductCat->updateProductCat( $modifyCat, $_POST['id'] );
        
        $success="Catégorie modifiée.";
        header('Location: ../index.php?view=dashboard/product-cat&success=' .$success);
        exit();
    }
    else {
        throw new Exception ( "Veuillez remplir tous les champs") ;
    }
}

catch ( Exception $yeah ) {
    header('Location: ../index.php?view=dashboard/modify-product-cat&id='. $_POST['id'] .'&error=' . $yeah->getMessage());
    exit();
}

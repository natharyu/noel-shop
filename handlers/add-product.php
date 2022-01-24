<?php

include_once '../models/Product.php';

try {
    if (   isset($_POST['name']) && !empty($_POST['name'])
        && isset($_POST['description']) && !empty($_POST['description'])
        && isset($_POST['image']) && !empty($_POST['image'])
        && isset($_POST['stock_quantity']) && !empty($_POST['stock_quantity'])
        && isset($_POST['price']) && !empty($_POST['price'])
        && isset($_POST['category']) && !empty($_POST['category'])) 
        {
            $newProduct = new Product();
            $product = [
                $_POST['name'],
                $_POST['description'],
                $_POST['image'],
                $_POST['stock_quantity'],
                $_POST['price'],
                $_POST['category']
            ];
            $newProduct->addOneProduct( $product );
            $success = "Votre produit à été ajouté avec succès!";
            header('Location: ../index.php?view=dashboard/add-product&success= '.$success);
            exit();
    }
    else {
        throw new Exception ( "Veuillez remplir tous les champs") ;
    }
}

catch ( Exception $yeah )
{
    header('Location: ../index.php?view=dashboard/add-product&error=' . $yeah->getMessage());
    exit();
}
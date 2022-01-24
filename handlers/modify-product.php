<?php
include_once '../models/Product.php';

// functions pour la modification des produits
if( isset( $_POST['id'] ) && !empty( $_POST['id'] ) &&
    isset( $_POST['name'] ) && !empty( $_POST['name'] ) &&
    isset( $_POST['description'] ) && !empty( $_POST['description'] ) &&
    isset( $_POST['image'] ) && !empty( $_POST['image'] ) &&
    isset( $_POST['stock_quantity'] ) && !empty( $_POST['stock_quantity'] ) &&
    isset( $_POST['price'] ) && !empty( $_POST['price'] ) ) 
{
    $newProduct = new Product();

    $newProductData = 
    [
        'name'=> $_POST['name'],
        'description'=> $_POST['description'],
        'image'=> $_POST['image'],
        'stock_quantity' => $_POST['stock_quantity'],
        'price' => $_POST['price'],
        'category'=> $_POST['category']
    ];
    $newProduct->updateProduct($newProductData, $_POST['id']);

    $success = "Votre produit à bien été mis à jour!";
    header ('Location: ../index.php?view=dashboard/list-products&success= '.$success);
    exit();
}

else
{
    $error = "Tous les champs sont obligatoires.";
    header( "Location: ../index.php?view=dashboard/modify-product&id=". $_POST['id'] . "&error=" . $error );
    exit();
}

?>
<?php
include_once 'models/Product.php';


$newProduct = new Product();
$products= $newProduct->getAllProducts();

?>

<div id="listProducts">
    <div class="column card">
        <h1 class="glow">Gérer les produits</h1>
        <div class="flex">
            <a class="button" href="index.php?view=dashboard/home"><i class="fas fa-long-arrow-alt-left"></i> Retour au panneau d'administration</a>
            <a class="button" href="index.php?view=dashboard/add-product"><i class="fas fa-plus-circle"></i> Ajouter un produit</i></a>
        </div>
    
    <table>
        <thead>          
                <td>Nom du produit</td>
                <td>Description</td>
                <td>Quantité en stock</td>
                <td>Prix</td>
                <td>Actions</td>           
        </thead>
        <tbody>
            <?php foreach ($products as $product) : ?>
                <tr>
                <td><?= $product['name'] ?></td>
                <td><?= $product['description'] ?></td>
                <td><?= $product['stock_quantity'] ?> unité(s)</td>
                <td><?= $product['price'] ?> €</td>
                <td>
                    <div class="flex">
                        <a class="buttonModify" href="index.php?view=dashboard/modify-product&id=<?= $product['id']?>">Modifier ce produit</a>
                        <a class="button" id="delete" href="handlers/delete-product.php?&id=<?= $product['id']?>">Supprimer</a>
                    </div>
                </td>
                </tr>
            <?php endforeach ?>
        </tbody>


    </table>
    </div>
</div>
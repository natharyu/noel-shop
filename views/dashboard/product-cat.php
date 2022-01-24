<?php

include_once 'models/Product_cat.php';
$newCat = new ProductCat();
$productCats= $newCat->getAllProductCat()
?>


<div id="productCategories">
    <div class="column card">
        <h1 class="glow">Gerer les catégories</h1>
        <div class="flex">
            <a class="button" href="index.php?view=dashboard/home"><i class="fas fa-long-arrow-alt-left"></i> Retour au panneau d'administration</i></a>
            <a class="button" href="index.php?view=dashboard/add-product-cat"><i class="fas fa-plus-circle"></i> Ajouter une catégorie de produit</i></a>
        </div>
            <?php if (isset ($_GET['success']) ) :?>
            <p class="success"> 
                <?= $_GET['success'] ?>
            </p>
        <?php endif; ?>
        <table>
            <thead>
                <td>Id</td>
                <td>Nom</td>
                <td>Actions</td>
            </thead>
            <tbody>
                <?php foreach ($productCats as $productCat) : ?>
                    <tr>
                        <td><?= $productCat['id'] ?></td>
                        <td><?= $productCat['name'] ?></td>
                        <td> 
                            <a class="buttonSubmit" href="index.php?view=dashboard/modify-product-cat&id=<?= $productCat['id'] ?>">Modifier cette catégorie</i></a>
                            <a class="button" href="handlers/delete-category.php?id=<?= $productCat['id'] ?>">Supprimer cette catégorie</a>
                        </td>
                     </tr>
                <?php endforeach ?>
            </tbody>
                 
                 
        </table>
    </div>
</div>
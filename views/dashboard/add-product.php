<?php
include_once 'models/Product_cat.php';
$newProductCat = new ProductCat() ;
$productCats = $newProductCat->getAllProductCat();
?>

<div class="column card" id="addProduct">
<a class="button" href="index.php?view=dashboard/home"><i class="fas fa-long-arrow-alt-left"></i> Retour au panneau d'administration</i></a>
    <h1 class="glow">Ajouter un produit</h1>

    <?php if (isset ($_GET['error']) ) :?>
        <p class="error"> 
            <?= $_GET['error'] ?>
        </p>
    <?php endif; ?>

    <?php if (isset ($_GET['success']) ) :?>
        <p class="success"> 
            <?= $_GET['success'] ?>
        </p>
    <?php endif; ?>

    <form class="addProduct" action="./handlers/add-product.php" method="POST">
       
        <div class="flex">
            <div class="addProductLeft">
                <h2 class="column">Informations</h2>
                <label for="name">Nom du produit</label>
                <input type="text" name="name" placeholder="Nom du produit">
    
                <label for="description">Description</label>
                <textarea rows="5" cols="55" name="description" placeholder="Description du produit"></textarea>
    
                <label for="image">Visuel</label>
                <input type="text" name="image" placeholder="indiquer le nom du fichier image">
            </div>
                
            <div class="addProductRight">
                <h2 class="column">Prix et quantité</h2>
                <label for="stock_quantity">Quantité en stock</label>
                <input type="text" name="stock_quantity">
    
                <label for="price">Prix</label>
                <input type="number" name="price">

                <h2 class="column">Catégorie</h2>
                    
                <select name="category">
                    <?php foreach ($productCats as $productCat) : ?>
                        <option value="<?= $productCat['id'] ?>"><?= $productCat['name'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>
        

        <div class="column">
                
    
            <button class="button" type="submit">Ajouter le produit</button>
        </div>
        
    </form>
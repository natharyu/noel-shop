<?php

include_once 'models/Product_cat.php';
$newCat = new ProductCat();
$categorie = $newCat->getOneProductCatById($_GET['id']);

include_once 'models/Product.php';
$newProduct = new Product();
$products = $newProduct->getAllProducts();

?>
<div id="shop">
    
    <div class="card ">
        <a class="button" href="index.php?view=front/shop"><i class="fas fa-long-arrow-alt-left"></i> Retour</a>      
        <h1 class="column glow"><?= $categorie['name'] ?></h1>
            
            <div class="column">
                <div class="products">
                    <?php foreach( $products as $product ): ?>
                    
                        <?php if( $product['category'] === $categorie['id'] ) : ?>
                            <div class="product">
                                <h3><?= $product['name'] ?></h3>
                                <img src="./assets/images/shop/<?= $product['image'] ?>">
                                <p>Prix :<?= $product['price'] ?> €</p>
                                <p><?= $product['stock_quantity'] ?> unité(s) en stock</p>
                                <a class="buttonSubmit" href="index.php?view=front/product&id=<?= $product['id'] ?>"><i class="fas fa-info-circle"></i> Détails</a>
                                <a class="button" href=""><i class="fas fa-cart-arrow-down"></i> Ajouter au panier</a>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
    
             </div>
    </div>
</div>